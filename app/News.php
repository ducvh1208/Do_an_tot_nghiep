<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['name'];

   
    public function category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }
}
