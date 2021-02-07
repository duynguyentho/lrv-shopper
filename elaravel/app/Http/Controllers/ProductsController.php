<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use File;
session_start();

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products = DB::table('tbl_products')->paginate(5);
        $manager = view('admin.products')->with('products',$products);
        return view('admin')->with('admin.products',$manager);
    }
    public function addProducts()
    {
        $categories = DB::table('tbl_categories_product')->orderby('category_id','desc')->get();
        $brands = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_products')->with('categories',$categories)->with('brands',$brands);
    }
    public function saveProducts(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_description'] = $request->product_description;
        $data['product_price'] = $request->product_price;
        $data['product_discount'] = $request->product_discount;
        $data['product_status'] = $request->product_status;
        $data['product_content'] = $request->product_content;
        $data['product_sale'] = $request->product_sale;
        $get_image = $request->file('product_image');
        if($get_image){
            $new_image = rand(11111,999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('upload/products'),$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_products')->insert($data);
            session::put('message','Thêm danh mục thành công');
            return redirect('admin/products');
        }
        else{
            $data['product_image']='';
            DB::table('tbl_products')->insert($data);
            session::put('message','Thêm danh mục thành công');
            return redirect('admin/products');
        }
        //print_r($data);
    }
    public function editProducts($product_id)
    {      
        $products = DB::table('tbl_products')->where('product_id',$product_id)->first();
        $categories = DB::table('tbl_categories_product')->orderby('category_id','desc')->get();
        $brands = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.edit_products')->with('categories',$categories)->with('brands',$brands)->with('products',$products);
    }
    public function updateProducts(Request $request,$product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_description'] = $request->product_description;
        $data['product_price'] = $request->product_price;
        $data['product_discount'] = $request->product_discount;
        $data['product_status'] = $request->product_status;
        $data['product_content'] = $request->product_content;
        $data['product_sale'] = $request->product_sale;
        $image = $request->file('product_image');
       
        if ($image) {
             // delete old images
            $oldImage = DB::table('tbl_products')->where('product_id',$product_id)->first();
            $oldImageName = $oldImage->product_image;
            $image_path = public_path('upload/products/'.$oldImageName);
            if (file_exists($image_path)) {
                FILE::delete($image_path);
            }
            // create new image
            $new_image = rand(11111,999999).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/products/'),$new_image);
            $data['product_image'] = $new_image;
        }
        // upload data
        DB::table('tbl_products')->where('product_id',$product_id)->update($data);
        session::put('messages','Cap nhat thanh cong');
        return redirect('admin/products');
    }
    public function deleteProducts($product_id)
    {
        $product = DB::table('tbl_products')->where('product_id',$product_id)->delete();
        return redirect('admin/products');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = DB::table('tbl_products')->where('product_name','like','%'.$search.'%')->paginate(10);
        $manager = view('admin.products')->with('products',$products);
        return view('admin')->with('admin.products',$manager);
    }
    public function fill(Request $request)
    {
        $fill_value = $request->get('fill');
        $products =DB::table('tbl_products')->where('product_status',$fill_value)->paginate(10);
        $manager = view('admin.products')->with('products',$products);
        return view('admin')->with('admin.products',$manager);
    }
}
