<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Abraham\TwitterOAuth\TwitterOAuth;

class TweetController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function authenticate(Request $request){
        $request->session()->put('img', $request->input('img'));
        // $access_token = env('ACCESS_TOKEN');
        // $access_token_secret = env('ACCESS_TOKEN_SECRET');
        $connection = new TwitterOAuth(env('API_KEY'), env('API_SECRET'));
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => function(){echo "aa";}));
        var_dump($request_token);
        $request->session()->put('oauth_token', $request_token['oauth_token']);
        $request->session()->put('oauth_token_secret', $request_token['oauth_token_secret']);
        $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        var_dump($url);
        header('Location: '.$url);
        exit;
    }

    public function index(Request $request){
        var_dump($request->input('oauth_token'));
        var_dump($request->input('oauth_verifier'));
        if (!empty($request->input('oauth_token')) && !empty($request->input('oauth_verifier'))) {
            $connection = new TwitterOAuth(env('API_KEY'), env('API_SECRET'), $request->session()->get('oauth_token'), $request->session()->get('oauth_token_secret'));
            $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $request->input('oauth_verifier')]);
            $request->session()->put('access_token', $access_token);
        }
        return view('welcome');
    }

    public function get(){
        echo "aaa";
    }
}
