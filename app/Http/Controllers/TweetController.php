<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Abraham\TwitterOAuth\TwitterOAuth;
use Session;
use Log;
use Redirect;

class TweetController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function authenticate(Request $request){
        Session::put("img", $request->input('img'));
        $connection = new TwitterOAuth(env('API_KEY'), env('API_SECRET'));
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => env('OAUTH_CALLBACK')));
        Session::put("oauth_token", $request_token['oauth_token']);
        Session::put('oauth_token_secret', $request_token['oauth_token_secret']);
        $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        return Redirect::to($url);
    }

    public function index(Request $request){
        Log::info("Session oauth_token indecx : ".Session::get('oauth_token'));
        if (!empty($request->input('oauth_token')) && !empty($request->input('oauth_verifier')) && ($request->input('oauth_token') === Session::get('oauth_token'))){
            $connection = new TwitterOAuth(env('API_KEY'), env('API_SECRET'), Session::get('oauth_token'), Session::get('oauth_token_secret'));
            $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $request->input('oauth_verifier')]);
            Session::put('access_token', $access_token);

            $connection = new TwitterOAuth(env('API_KEY'), env('API_SECRET'), $access_token['oauth_token'], $access_token['oauth_token_secret']);
            $media = $connection->upload('media/upload', ['media' => Session::get('img')]);
            var_dump($media);
            $parameters = [
                'status' => "APIからテスト",
                'media_ids' => $media->media_id_string,
            ];
            try{
                $result = $connection->post('statuses/update', $parameters);
            } catch (ErrorException $e) {
                Log::info("TweetError");
            }
        }
        return view('welcome');
    }

    public function get(){
        echo "aaa";
    }
}
