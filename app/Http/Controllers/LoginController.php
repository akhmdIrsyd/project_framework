<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('login');
        }
    }
    public function authenticated (Request $request, $user)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        
        if ($user->hasRole('admin')) {
            return redirect('/dashboard');
        }

    return redirect('/dashboard');

    }

    

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}
