<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Brand List';
        $brand = new Brand();
        $brand = $brand->withTrashed();
        if($request->has('search') && ($request->search !=null)){
            $brand = $brand->where('name','like','%'.$request->search.'%');
        }
        if($request->has('status') && ($request->status !=null)){
            $brand = $brand->where('status',$request->status);
        }

        $brand = $brand->orderBy('id','DESC')->paginate(10);
        $data['brands'] = $brand;

        if(isset($request->status) || ($request->search)){

            $render['status'] = $request->status;
            $render['search'] = $request->search;
            $brand = $brand->appends($render);
        }


        $data['serial'] = managePagination($brand);
        return view('admin.brand.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Brand';
        return view('admin.brand.create',$data);
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

            'name' => 'required',
            'details' => 'required',
            'status' => 'required'
        ]);

        $brand_data = $request->except('_token');
        $brand_data['created_by'] = 1;
        $brand_data['updated_by'] = 0;

        Brand::create($brand_data);
        //session()->flash('message','Brand Created Successfully!');
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $data['title'] = 'Edit Brand';
        $data['brandInfo'] = $brand ;
        return view('admin.brand.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([

            'name' => 'required',
            'status' => 'required'

        ]);

        $brand_data = $request->except('_token','_method');
        $brand_data['created_by'] = 1;
        $brand_data['updated_by'] = 1;
        $brand->update($brand_data);
        //session()->flash('message','brand Updated Successfully!');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index');
    }


    public function restore($id){

        Brand::where('id',$id)->onlyTrashed()->restore();
        //session()->flash('message','brand Restored!');
        return redirect()->route('brand.index');
    }

    public function delete($id){
      Brand::where('id',$id)->onlyTrashed()->forceDelete();
        //session()->flash('message','brand Deleted Permanently');
        //echo "brand Deleted permanently";
        return redirect()->route('brand.index');
    }
}
