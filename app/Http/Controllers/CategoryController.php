<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Categroy List';
        $data['categories'] = Category::withTrashed()->orderBy('id','desc')->paginate(10);
        return view('admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Category';
        return view('admin.category.create',$data);
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
            'status' => 'required'
        ]);

        $category_data = $request->except('_token');
        $category_data['created_by'] = 1;
        $category_data['updated_by'] = 0;

        Category::create($category_data);
        //session()->flash('message','Category Created Successfully.');


        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );

       // dd($notification);
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['title'] = 'Edit Category';
        $data['categoryInfo'] = $category ;
        return view('admin.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       $request->validate([

           'name' => 'required',
           'status' => 'required'

       ]);

       $category_data = $request->except('_token','_method');
       $category_data['created_by'] = 1;
       $category_data['updated_by'] = 1;
       $category->update($category_data);
       //session()->flash('message','Category Updated Successfully!');
       return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }

    public function restore($id){

        Category::where('id',$id)->onlyTrashed()->restore();
        //session()->flash('message','Category Restored!');
        return redirect()->route('category.index');
    }

    public function delete($id){
        Category::where('id',$id)->onlyTrashed()->forceDelete();
        //session()->flash('message','Category Deleted Permanently');
        //echo "Category Deleted permanently";
        return redirect()->route('category.index');
    }
}
