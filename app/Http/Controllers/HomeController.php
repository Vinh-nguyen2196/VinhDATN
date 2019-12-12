<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Slide;
use App\product;
use Illuminate\Support\Facades\Input;
use Hash;
use App\Reprice;
use App\Notify;
use App\Comments;
use App\Schedules;
use Log;
use App\Productype;
use Auth;
use DB;
use Illuminate\Support\Facades\File;
 

 class HomeController extends Controller

 {
 	function getHome(){
 		if(Auth::check()){
            $reprice=Reprice::where('id_user_post',Auth::user()->id)->paginate(8);
            $sche=Schedules::all();
            
            $my_schedule=Schedules::where(function($query){
                $query->where('id_user_nhan',Auth::user()->id)->orwhere('id_user_doi',Auth::user()->id);
            })->where('ismeet',1)->paginate(8);
 			$my_prd=product::where('id_user',Auth::user()->id)->paginate(15);
 			 $notifyOfUser=Auth::user()->Notify()->paginate(8);
 			 
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->paginate(15);
        }
        else{
            $reprice=null;
             $sche=null;
            $my_schedule=null;
            $notify=null;
            $notifyOfUser=null;
            $my_prd=null;
        }
        return view('home.user',compact('notify','notifyOfUser','my_prd','my_schedule','sche','reprice'));
 	}

 	function getMyProduct(){
 		if(Auth::check()){
            $reprice=Reprice::where('id_user_post',Auth::user()->id)->paginate(8);
             $my_schedule=Schedules::where(function($query){
                $query->where('id_user_nhan',Auth::user()->id)->orwhere('id_user_doi',Auth::user()->id);
            })->where('ismeet',1)->paginate(8);
        $my_prd=product::where('id_user',Auth::user()->id)->paginate(8);
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->paginate(15);
        }
        else{
            $reprice=null;
             $my_schedule=null;
            $notify=null;
            $my_prd=null;
        }
    return view('home.my_post',compact('my_prd','notify','my_schedule','reprice'));
 		}
        function DeleteMyProduct($id){
            product::find($id)->delete();
            return redirect()->back();
        }


 		function getSchedule(){
 			if(Auth::check()){
                $reprice=null;
                $reprice=Reprice::where('id_user_post',Auth::user()->id)->paginate(8);
                $my_schedule=Schedules::where(function($query){
                    $query->where('id_user_nhan',Auth::user()->id)->orwhere('id_user_doi',Auth::user()->id);
                })->where('ismeet',1)->paginate(8); 
            // $my_schedule=Schedules::where('id_user_nhan',Auth::user()->id)->orwhere('id_user_doi',Auth::user()->id)->where('ismeet',1)->paginate(8);
 			$my_prd=product::where('id_user',Auth::user()->id)->paginate(8);
 			 $notifyOfUser=Auth::user()->Notify()->paginate(8);
 			 
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->paginate(15);
        }
        else{
            $my_schedule=null;
            $notify=null;
            $notifyOfUser=null;
            $my_prd=null;
        }
        return view('home.schedule',compact('notify','notifyOfUser','my_prd','my_schedule','reprice'));
         }


         function getSend(Request $r,$id_product_notify,$id_product_doi,$id_nhan){
            $schedule= new Schedules();
            $schedule->id_prd_post=$id_product_notify;
            $schedule->id_prd_doi=$id_product_doi;
            $schedule->id_user_doi=Auth::user()->id;
            $schedule->id_user_nhan=$id_nhan;
            $schedule->hour=$r->hour;
            $schedule->time=$r->date;
            $schedule->address=$r->address;
            $schedule->phone=$r->phone;
            $schedule->save();
            $noti=Notify::where('id_user_send',$id_nhan)->where('id_product_convert',$id_product_notify)->delete();
            $reprice=Reprice::where('id_user_reprice',$id_nhan)->where('id_product_post',$id_product_notify)->delete();
         
           return redirect()->back()->with('status','Gửi thành công');
         }
        function deleteSchedule($id){
           $my_schedule = Schedules::find($id);
           $my_schedule->ismeet=2;
           $my_schedule->save();

            return redirect()->back();
        }

        function getReprice(){
            if(Auth::check()){
                $reprice=Reprice::where('id_user_post',Auth::user()->id)->paginate(8);
                $my_schedule=Schedules::where(function($query){
                    $query->where('id_user_nhan',Auth::user()->id)->orwhere('id_user_doi',Auth::user()->id);
                })->where('ismeet',1)->paginate(8);
                 $my_prd=product::where('id_user',Auth::user()->id)->paginate(2);
                  $notifyOfUser=Auth::user()->Notify()->paginate(8);
                  
            $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->paginate(15);
            }
            else{
                $reprice=null;
                $my_schedule=null;
                $notify=null;
                $notifyOfUser=null;
                $my_prd=null;
            }
            return view('home.reprice',compact('notify','notifyOfUser','my_prd','my_schedule','reprice'));


        }




 }