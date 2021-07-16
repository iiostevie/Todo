<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // create new user
    public function store(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);             // The other way to hash the password
        $user->save();

    }

    // existing user login
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/{user}/tasks');
        }
        else{
            return redirect('/');
        }

    }

    // log out the current user
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }


}
