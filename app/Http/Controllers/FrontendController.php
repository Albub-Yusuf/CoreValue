<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $data['title'] = 'Frontend Home';
        return view('front.home',$data);

    }
}
