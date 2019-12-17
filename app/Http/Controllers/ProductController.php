<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Product List';
        $product = new Product();
        $product = $product->withTrashed();
        if($request->has('search') && ($request->search !=null)){
            $product = $product->where('name','like','%'.$request->search.'%');
        }
        if($request->has('status') && ($request->status !=null)){
            $product = $product->where('status',$request->status);
        }

        $product = $product->orderBy('id','DESC')->paginate(10);
        $data['products'] = $product;

        if(isset($request->status) || ($request->search)){

            $render['status'] = $request->status;
            $render['search'] = $request->search;
            $product = $product->appends($render);
        }


        $data['serial'] = managePagination($product);
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Product';
        $data['categories'] = Category::orderBy('name')->pluck('name','id');
       // dd($data['categories']);
        $data['brands'] = Brand::orderBy('name')->pluck('name','id');
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required'

        ]);

        $product_data = $request->except('_token');
        $product_data['created_by'] = 1;
        $product_data['updated_by'] = 0;
        Product::create($product_data);
       //session()->flash('message','Product Created Successfully!!!');
       return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['title'] = 'Edit Product';
        $data['product'] = $product;
        $data['categories'] = Category::orderBy('name')->pluck('name','id');
        $data['brands'] = Brand::orderBy('name')->pluck('name','id');

        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required'

        ]);

        //dd($request->all());

        $product_data = $request->except('_token','_method');
        $product_data['created_by'] = 1;
        $product_data['updated_by'] = 1;
        $product->update($product_data);
        //session()->flash('message','Product Updated Successfully!!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        //session()->flash('message','Product Deleted Successfully');
        return redirect()->route('product.index');
    }

    public function restore($id){

        Product::where('id',$id)->onlyTrashed()->restore();
        //session()->flash('message','product Restored!');
        return redirect()->route('product.index');
    }

    public function delete($id){
        Product::where('id',$id)->onlyTrashed()->forceDelete();
        //session()->flash('message','product Deleted Permanently');
        //echo "product Deleted permanently";
        return redirect()->route('product.index');
    }
}
