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
        if(auth()->attempt($attribute)){
            session()->regenerate();
            //redirect with success message
            return redirect('/')->with('success', 'Welcome back!');
        }

        // if auth failed
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
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
