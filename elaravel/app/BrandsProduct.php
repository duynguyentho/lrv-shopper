<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandsProduct extends Model
{
    //
    public $timestamps = false;
    protected $fillable =[
        'brand_id','brand_name','brand_status'
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand_product';
}
