<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;

class GithubAuthController extends Controller
{

    public function __construct()
    {
     $this->middleware(['guest']);//로그인한 사용자가아니어야 컨트롤이 가능
    }

    public function redirect() {
        return Socialite::driver('github')->redirect();
    }

    public function callback() {
        $user = Socialite::driver('github')->user();
        dd($user);
        // $user->token

        // DB에 사용자 정보를 저장한다.
        // 이미 이 사용자 정보가 DB에 저장되어 있다면
        // 저장할 필요가 없다.

    }
}

