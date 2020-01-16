<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category_id=false){

        $data['title']='Product List';
        $products = new Product();
        $products = $products->with(['brand','category','product_image']);
        if($category_id!=false){
            $products = $products->where('category_id',$category_id);
        }
        $products = $products->where('status','active');
        $products = $products->orderBy('id','DESC')->paginate(6);
        $data['products'] = $products;
       // dd($products->total());
        //currentpage*total --- productperpage
        return view('front.product.index',$data);
    }

    public function details($id){
        $data['title'] = 'Product Details';
        $data['product'] = Product::with('product_image')->findOrFail($id);
        $data['featured_products'] = Product::with(['category','brand'])->where('status','active')->where('is_featured','1')->orderBy('id','DESC')->limit(6)->get();
        $data['latest_products'] = Product::with(['category','brand'])->where('status','active')->orderBy('id','DESC')->limit(6)->get();
        return view('front.product.details',$data);

    }
}
