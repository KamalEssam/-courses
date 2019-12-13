<?php

namespace App\Http\Controllers;

use App\faculty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
// get login page view
    public function getLogin()
    {
        $faculties = faculty::all();
        return view('layouts.login', compact('faculties'));
    }
//get register page view
    public function getReg()
    {
        $faculties = faculty::all();
        return view('layouts.register', compact('faculties'));
    }
// login user page action check if user exist or not
    public function loginUser(Request $request)
    {
        $remember = $request->remember == 1 ? true : false;
        if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('/home');
        } else {
            return back()->withErrors('password or Email not correct ');
        }
    }
//register user action page
    public function regUser(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'faculty_id' => 'required'
        ], [], [
            'name' => 'please enter your name is required',
            'email' => 'please enter your name is required',
            'password' => 'please enter your password is required',
            'faculty' => 'please choose your faculty is required',
        ]);
        $user['password'] = bcrypt($request['password']);
        $request['role_id'] = 1;

        User::create($user);
        return redirect('/home');
    }
    //logout of the page
    public function logout(){
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/login');
    }
}
