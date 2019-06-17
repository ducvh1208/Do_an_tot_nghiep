<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    protected $table = 'product_type';
    protected $fillable = ['name'];

    public function product(){
    	return $this->hasMany('App\Product','product_id','id');
    }
}
