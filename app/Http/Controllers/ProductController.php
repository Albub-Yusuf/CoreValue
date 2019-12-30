<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
       // dd($request->all());
        $request->validate([

            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'images.*' => 'image'

        ]);

        $product_data = $request->except('_token','images');
        $product_data['created_by'] = 1;
        $product_data['updated_by'] = 0;
        $product = Product::create($product_data);

        //image upload
        if(count($request->images))
        {
            foreach($request->images as $image){
                //dd($product_data);
                $product_image['product_id'] = $product->id;
                $image->move('images/products/',$image->getClientOriginalName());
                $product_image['file_path'] = 'images/products/'.$image->getClientOriginalName();
                ProductImage::create($product_image);
            }

        }




       //session()->flash('message','Product Created Successfully!!!');
       return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($product);
        $data['title'] = 'Product Details';
        $data['product'] = Product::with(['category','brand','product_image'])->findOrFail($id);
        $data['categories'] = Category::orderBy('name')->pluck('name','id');
        $data['brands'] = Brand::orderBy('name')->pluck('name','id');


        return view('admin.product.show',$data);
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
            'status' => 'required',
            'images.*' => 'image'

        ]);

        //dd($request->all());

        $product_data = $request->except('_token','_method');
        $product_data['created_by'] = 1;
        $product_data['updated_by'] = 1;
        $product->update($product_data);

        //image upload
        if(count($request->images))
        {
            foreach($request->images as $image){
                //dd($product_data);
                $product_image['product_id'] = $product->id;
                $image->move('images/products/',$image->getClientOriginalName());
                $product_image['file_path'] = 'images/products/'.$image->getClientOriginalName();
                ProductImage::create($product_image);
            }

        }




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
        $product = Product::where('id',$id)->onlyTrashed()->with('product_image')->findOrFail($id);
        if(count($product->product_image))
        {
            foreach($product->product_image as $image){

                File::delete($image->file_path);
                $image->delete();

            }

        }


        $product->forceDelete();
        //session()->flash('message','product Deleted Permanently');
        //echo "product Deleted permanently";
        return redirect()->route('product.index');
    }

    public function delete_image($image_id){

       $image = ProductImage::findOrFail($image_id);
       //File::delete($image->file_path);
        File::delete($image->file_path);
       $image->delete();
       return redirect()->back();
    }
}
