<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('userAuthentication.login');
    }
    public function destroyLogout()
    {
        auth()->logout();
        return redirect(route('home'));
    }

    public function storeLogin(LoginPostRequest $request)
    {

        if (Auth::attempt(request(['email', 'password']))) {
            $user = User::where(["email" => $request['email']])->first();

            Auth::login($user);
            return redirect(route('home'));

        }

        return redirect()->back()->withInput()->withError("Wrong credentials! Insert valid one!");

    }
}
