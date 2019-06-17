<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'posts';

    public function post(){
    	return $this->belongsTo('App\Post','id_category','id');
    }

     public function category(){
    	return $this->belongsTo('App\Category','id_category','id');
    }
}
