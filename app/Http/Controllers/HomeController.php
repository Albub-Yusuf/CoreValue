<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $data['title'] = "Core Value Enterprise";
        $data['products'] = Product::withoutTrashed()->get();
        return view('frontend.home',$data);
    }

}
