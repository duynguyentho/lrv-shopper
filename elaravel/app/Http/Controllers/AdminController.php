<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Categories;
use App\Exports\Brands;
class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');//
    }
    public function exportCategories()
    {
        return Excel::download(new Categories, 'categories.xlsx');
    }
    public function exportBrands()
    {
        return Excel::download(new Brands, 'brands.xlsx');
    }
}
