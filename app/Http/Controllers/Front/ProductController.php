<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){

        $data['title'] = 'Product Details';
        $data['product'] = Product::with('product_image')->findOrFail($id);
        $data['featured_products'] = Product::with(['category','brand'])->where('status','active')->where('is_featured','1')->orderBy('id','DESC')->limit(6)->get();
        $data['latest_products'] = Product::with(['category','brand'])->where('status','active')->orderBy('id','DESC')->limit(6)->get();
        return view('front.product.details',$data);
    }
}
