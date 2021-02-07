<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();
class CategoriesController extends Controller
{
    //
    public function index()
    {
        $categories = DB::table('tbl_categories_product')->paginate(2);
        $manager = view('admin.categories')->with('categories',$categories);
        return view('admin')->with('admin.categories',$manager);
    }
    public function addCategories()
    {
        return view('admin.add_categories');
    }
    public function saveCategories(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_status'] = $request->category_status;
        $data['category_description'] = $request->category_description;
        //print_r($data);
        DB::table('tbl_categories_product')->insert($data);
        session::put('message','Thêm danh mục thành công');
        return redirect('admin/category');
    }
    public function editCategories($category_id)
    {       
        $edit_categories = DB::table('tbl_categories_product')->where('category_id',$category_id)->first();
        $manager = view('admin.edit_categories')->with('edit_categories',$edit_categories);
        return view('admin')->with('admin.edit_categories',$manager);
    }
    public function updateCategories(Request $request,$category_id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_status'] = $request->category_status;
        $data['category_description'] = $request->category_description; 
        DB::table('tbl_categories_product')->where('category_id',$category_id)->update($data);
        session::put('messages','Cap nhat thanh cong');
        return redirect('admin/category');
    }
    public function deleteCategories($category_id)
    {
        $category = DB::table('tbl_categories_product')->where('category_id',$category_id)->delete();
        return redirect('admin/category');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = DB::table('tbl_categories_product')->where('category_name','like','%'.$search.'%')->paginate(5);
        $manager = view('admin.categories')->with('categories',$categories);
        return view('admin')->with('admin.categories',$manager);
    }
    public function fill(Request $request)
    {
        $fill_value = $request->get('fill');
        $categories =DB::table('tbl_categories_product')->where('category_status',$fill_value)->paginate(10);
        $manager = view('admin.categories')->with('categories',$categories);
        return view('admin')->with('admin.categories',$manager);
    }
    
}
