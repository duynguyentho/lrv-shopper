<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesProduct extends Model
{
    //
    public $timestamps = false;
    protected $fillable =[
        'category_id','category_name','category_description','category_status'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_categories_product';
}
