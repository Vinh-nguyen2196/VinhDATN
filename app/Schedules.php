<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $table='schedule';
    public function prd_post(){
    	return $this->belongsTo('App\product','id_prd_post','id');
    }
  
    public function user_shedule_send(){
    	return $this->belongsTo('App\User','id_user_doi','id');
    }
    public function user_shedule_receive(){
    	return $this->belongsTo('App\User','id_user_nhan','id');
    }
}
