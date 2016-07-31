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
        $img = $request->input('img');
        $access_token = env('ACCESS_TOKEN');
        $access_token_secret = env('ACCESS_TOKEN_SECRET');
        $connection = new TwitterOAuth(env('API_KEY'), env('API_SECRET'), $access_token, $access_token_secret);
        $content = $connection->get("account/verify_credentials");
        var_dump($content);

    }

    public function index(){
        echo "aaa";
    }
}
