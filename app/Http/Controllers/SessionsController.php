<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function store()
    {
        $attribute = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //login
        if(! auth()->attempt($attribute)){
            // if auth failed
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }


        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back!');
    }
    public function create(){
        return view('sessions.create');
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
