<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationPostRequest;
use App\Models\User;
use Auth;

class RegistrationController extends Controller
{

    public function add()
    {
        return view('userAuthentication.registration');
    }
    public function create(RegistrationPostRequest $request)
    {
        $users = User::all();

        $user = User::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('lastname'),
            'type' => 'normal',
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'street' => $request->input('street'),
            'strNumber' => $request->input('strNumber'),
            'remember_token' => 0,

        ]);

        Auth::login($user);
        return redirect(route('home'));

    }

}
