<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
	protected $table ="notifies";

	public function prd(){
    	return $this->belongsTo('App\product','id_product','id');
    }
    public function user_send(){
    	return $this->belongsTo('App\User','id_user_send','id');
    }
    public function product_send(){
    	return $this->belongsTo('App\product','id_product','id');
    }
     public function product_convert(){
    	return $this->belongsTo('App\product','id_product_convert','id');
    }
    //
}