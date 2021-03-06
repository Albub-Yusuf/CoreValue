<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $data['title'] = 'Frontend Home';
        $data['latest_products'] = Product::with(['category','brand'])->where('status','active')->orderBy('id','DESC')->limit(6)->get();
        $data['featured_products'] = Product::with(['category','brand'])->where('status','active')->where('is_featured','1')->orderBy('id','DESC')->limit(6)->get();
       //dd($data);
        return view('front.home',$data);

    }
}
