<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        $data['title'] = 'Checkout';
        $data['cart'] = session('cart');
        return view('front.checkout.index',$data);

    }

    public function payment($customer_id,$order_id){


        $data['customer'] = Customer::findOrFail($customer_id);
        $data['order'] = Order::findOrFail($order_id);
        $data['cart'] = session('cart');
        return view('front.checkout.payment',$data);
    }
}
