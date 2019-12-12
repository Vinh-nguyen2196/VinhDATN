<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reprice extends Model
{
    protected $table='reprice';
    public function product_post(){
        return $this->belongsTo('App\product','id_product_post','id');   
    }
    public function user_reprice(){
    	return $this->belongsTo('App\User','id_user_reprice','id');
    }
    public function user_post(){
    	return $this->belongsTo('App\User','id_user_post','id');
    }
}
