<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function destroyLogout()
    {
        auth()->logout();
        return redirect(route('home'));
    }

    public function storeLogin(Request $request)
    {

        if (Auth::attempt(request(['email', 'password']))) {
            $user = User::where(["email" => $request['email']])->first();

            Auth::login($user);
            return redirect(route('home'));

        }

        return redirect()->back()->withInput()->withError('wrongCredentials', "Невалидни данни. Моля въведете съществуващ профил!");

    }
}
