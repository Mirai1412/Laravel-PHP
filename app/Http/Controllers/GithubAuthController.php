<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // $user->token

        // DB에 사용자 정보를 저장한다.
        // 이미 이 사용자 정보가 DB에 저장되어 있다면
        // 저장할 필요가 없다.
       $user = User::firstOrCreate(
            ['email' => $user->getemail()],
            ['password' => Hash::make(Str::random(24)), //인크립트 시켜서 저장한다.
            'name' => $user->getname()]
        );


        //로그인 처리..
        Auth::login($user);

        //사용자가 원래 요청했던 페이지로 redirection
        // 원래 요청했던 페이지가 없으면 /dashboard로 redirection
        return redirect()->intended('/dashboard');
    }
}

