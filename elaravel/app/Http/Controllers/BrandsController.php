<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();
class BrandsController extends Controller
{
    //
    public function index()
    {
        $brands = DB::table('tbl_brand_product')->paginate(5);
        $manager = view('admin.brands')->with('brands',$brands);
        return view('admin')->with('admin.brands',$manager);
    }
    public function addBrands()
    {
        return view('admin.add_brands');
    }
    public function saveBrands(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_status'] = $request->brand_status;
        //print_r($data);
        DB::table('tbl_brand_product')->insert($data);
        session::put('message','Thêm danh mục thành công');
        return redirect('admin/brand');
    }
    public function editBrands($brand_id)
    {       
        $edit_brands = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->first();
        $manager = view('admin.edit_brands')->with('edit_brands',$edit_brands);
        return view('admin')->with('admin.edit_brands',$manager);
    }
    public function updateBrands(Request $request,$brand_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_status'] = $request->brand_status;
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update($data);
        session::put('messages','Cap nhat thanh cong');
        return redirect('admin/brand');
    }
    public function deleteBrands($brand_id)
    {
        $brand = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->delete();
        return redirect('admin/brand');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $brands = DB::table('tbl_brand_product')->where('brand_name','like','%'.$search.'%')->paginate(10);
        $manager = view('admin.brands')->with('brands',$brands);
        return view('admin')->with('admin.brands',$manager);
    }
    public function fill(Request $request)
    {
        $fill_value = $request->get('fill');
        $brands =DB::table('tbl_brand_product')->where('brand_status',$fill_value)->paginate(10);
        $manager = view('admin.brands')->with('brands',$brands);
        return view('admin')->with('admin.brands',$manager);
    }
}
