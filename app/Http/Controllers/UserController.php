<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('userAuthentication.profile', compact('user'));
    }

    public function updateProfile(UserPostRequest $request, User $user)
    {

        $users = User::all();
        $typeOfUser = 'normal';
        foreach ($users->except([$user->id]) as $userObject) {
            if ($userObject->email == $request->input('email')) {
                return redirect()->back()->withInput()->withError('emailErr', "This Email is already in use!");

            }
        }

        if ($user->type == 'admin') {
            $typeOfUser = 'admin';
        }

        $user->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('lastname'),
            'email' => $request->input('email'),
            'type' => $typeOfUser,
            'password' => bcrypt($request->input('password')),
            'street' => $request->input('street'),
            'strNumber' => $request->input('strNumber'),
        ]);

        return redirect(route('home'));
    }

    public function allUsers()
    {
        $allUsers = User::all();
        return view('administration.allUsers', compact('allUsers'));

    }

    public function deleteUser($id)
    {
        $user = User::find(intval($id));

        $user->delete();

        return redirect(route('users.index'));

    }

    public function setEmail()
    {
        return view('userAuthentication.setEmail');

    }

    public function passwordReset(Request $request)
    {

        $user = User::whereEmail($request->email)->first();

        if ($user == null) {
            return back()->with(['error' => 'There is no user with this email!']);
        }

        $user = User::find($user->id);

        \Mail::to($user)->send(new ResetPasswordEmail($user));

        return back()->with(['success' => 'Check your email for a link to change your passowrd!']);
    }

    public function change($user)
    {
        $user = User::find($user);

        return view('userAuthentication.changePassword', compact('user'));
    }

    public function changePassword(UserPostRequest $request, User $user)
    {

        $user->update([

            'password' => bcrypt($request->input('password')),
        ]);

        return redirect(route('login'));

    }
}
