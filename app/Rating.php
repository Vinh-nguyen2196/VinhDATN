<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table ="rating";
   
  
    public function user_rated(){
    	return $this->belongsTo('App\User','id_user_rated','id');
    }
    public function prd_rated(){
    	return $this->belongsTo('App\product','id_product','id');
    }
    public function user_rate(){
    	return $this->belongsTo('App\User','id_user_rate','id');
    }
}
