<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('frontend.home');
});
Route::get('/home','HomeController@index')->name('home');
Auth::routes();
Route::get('/logout',function(){
    Auth::logout();
    return view('auth.login');
})->name('logout');
Route::get('/admin',function(){
    if(Auth::check()){
        return view('admin.home');
    }
    return view('auth.login');
});
// 

Route::group(['prefix'=>'admin'],function(){
    Route::get('dashboard','AdminController@index')->name('dashboard');
    //==========Categories products
    Route::get('category','CategoriesController@index')->name('category');
    // add
    Route::get('add-category','CategoriesController@addCategories')->name('add-category');
    Route::post('save-category','CategoriesController@saveCategories')->name('post.category');
    //edit
    Route::get('edit-category/{id}','CategoriesController@editCategories')->name('edit');
    Route::post('update-category/{id}','CategoriesController@updateCategories');
    // delete
    Route::get('delete-category/{id}','CategoriesController@deleteCategories');
    //search
    Route::get('search-category','CategoriesController@search')->name('search-category');
    //
    Route::get('fill-category','CategoriesController@fill')->name('fill-category');
    // =========Branch Product
    //
    Route::get('add-brand','BrandsController@addBrands')->name('add-brand');
    Route::post('save-brand','BrandsController@saveBrands')->name('post.brand');
    //edit
    Route::get('edit-brand/{id}','BrandsController@editBrands')->name('edit-brand');
    Route::post('update-brand/{id}','BrandsController@updateBrands');
    // delete
    Route::get('delete-brand/{id}','BrandsController@deleteBrands');
    Route::get('brand','BrandsController@index')->name('brand');
    //search
    Route::get('search-brand','BrandsController@search')->name('search-brand');
    //
    Route::get('fill-brand','BrandsController@fill')->name('fill-brand');
    // ===============PRODUCT
        Route::get('add-product','ProductsController@addProducts')->name('add-product');
    Route::post('save-product','ProductsController@saveProducts')->name('post.product');
    //edit
    Route::get('edit-product/{id}','ProductsController@editProducts')->name('edit-product');
    Route::post('update-product/{id}','ProductsController@updateProducts');
    // delete
    Route::get('delete-product/{id}','ProductsController@deleteProducts');
    Route::get('products','ProductsController@index')->name('product');
    //search
    Route::get('search-product','ProductsController@search')->name('search-product');
    Route::get('fill-product','ProductsController@fill')->name('fill-product');
});
Route::get('categories/export/','AdminController@exportCategories')->name('export-category');
Route::get('brands/export/','AdminController@exportBrands')->name('export-brand');
Route::get('products/export/','AdminController@exportBrands')->name('export-product');


