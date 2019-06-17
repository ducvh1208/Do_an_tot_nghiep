<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name'];

    public function product_type(){
    	return $this->belongsTo('App\Product','product_id','id');
    }

}
