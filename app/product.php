<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	protected $table ="products";

	public function product_type(){

		return $this->belongsTo('App\Productype','id_type','id');
	}
    //
    public function user(){

		return $this->belongsTo('App\User','id_user','id');
	}
	public function Comment(){
        return $this->hasMany('App\Comments','id_prd','id');
    }

}
