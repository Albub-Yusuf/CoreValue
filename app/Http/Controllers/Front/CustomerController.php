<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Mail\OrderPlaceMail;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function store(Request $request){

        $request->validate([

            'first_name'=>'required',
            'last_name' => 'required',
            'street_address' => 'required',
            'district'=>'required',
            'zip'=>'required',
            'phone'=>'required',
            'email'=>'required',

        ]);

        DB::beginTransaction();
        try{

            //store customer
            $data = $request->except('_token');
            $customer_id= Customer::insertGetId($data);

            // $count = 0;
            //if(is_array(session('cart'))){
            //  $count = count(session('cart'));
            // }
            //order
            $order['order_number'] = 'OID'.time();
            $order['customer_id']=$customer_id;
            $order['date'] = now();
            $order_id = Order::insertGetId($order);
            //order details
            $cart = session('cart');
            $total = 0;
            if(count($cart)){

                foreach ($cart as $item){
                    $product = Product::findOrFail($item['product_id']);
                    if($product->stock >= $item['quantity']){
                        $order_details['order_id'] = $order_id;
                        $order_details['product_id'] = $item['product_id'];
                        $order_details['product_name'] = $item['name'];
                        $order_details['price'] = $item['price'];
                        $order_details['quantity']= $item['quantity'];
                        $order_details['total'] = $item['quantity'] * $item['price'];
                        OrderDetail::create($order_details);


                        $total += $order_details['total'];

                        $product->stock = $product->stock - $item['quantity'];
                        $product->save();

                    }else{
                        return redirect()->route('checkout');
                    }
                }
            }

            Order::findOrFail($order_id)->update(['total_price'=>$total]);
            DB::commit();

            $customer = Customer::findOrFail($customer_id);
            //dd($customer);
            Mail::to($customer->email)->send(new OrderPlaceMail($order_id));
            //dd('try block success');

            //dd('try');

            return redirect()->route('payment',[$customer_id,$order_id]);
        }catch (\Exception $exception){

            DB::rollBack();
            Log::error('CustomerController@store Message - '.$exception->getMessage());
           // dd('catch');
            return redirect()->back();
        }





    }
}
