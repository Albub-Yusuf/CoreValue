<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminLoginController extends Controller
{
    public function loginForm(){


        $data['title'] = 'Core Value Enterprise Admin Login';
        return view('admin.login',$data);

    }

    public function login(Request $request){

        $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);

        //dd($request->all());

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard');

        }
        else{
            echo "not working";
        }
        //Session::flash('message');
        return redirect()->back()->withInput(['email'=>$request->email]);



    }
}
