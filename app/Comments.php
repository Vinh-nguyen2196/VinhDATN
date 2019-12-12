<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	use Notifiable;
    protected $table ="comments";
    public function prd(){
    	return $this->belongsTo('App\product','id_prd','id');
    }
    public function user_comment(){
    	return $this->belongsTo('App\User','id_user_comment','id');
    }

}
