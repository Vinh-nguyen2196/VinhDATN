<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Slide;
use App\product;
use Illuminate\Support\Facades\Input;
use Hash;
use App\Notify;
use App\Rating;
use App\Reprice;
use App\Comments;
use App\Schedules;
use Log;
use App\Productype;
use Auth;
use DB;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
	public function getIndex(){
		$slide=Slide::all();
		$sanpham_hientang= DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('state','tặng')->orderBy('products.created_at', 'desc')->paginate(8);
		$new_product = DB::table('users')->join("products", "users.id","=","products.id_user")->orderBy('products.created_at', 'desc')->paginate(8);
        $count=0;
        if(Auth::check()){
		$notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }

        return view('page.trangchu',compact('slide','new_product','sanpham_hientang','notify','count'));






	}
	public function getLoaiSP($type){
		$sp_theoloai = product::where('id_type',$type)->get();
		$new_product =DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('id_type',$type)->orderBy('products.created_at', 'desc')->paginate(8);
        $count=0;
        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }

		return view('page.loai-sanpham',compact('sp_theoloai','new_product','notify','count'));
	}
    //
    public function getChitiet(Request $req){
        // $comment=DB::table('comments')->where('id_prd',$req->id_prd)->get();
       $rate=Rating::where('id_product',$req->id_prd)->get();
       //$rateOfme=Rating::where('id_user_rate',Auth::user()->id)->where('id_product',$req->id_prd)->get();

       //dd($my_schedule);

        $prd=product::find($req->id_prd);
        $commentsOfProduct=product::find($req->id_prd)->Comment()->paginate(4);
        $sanpham = product::where('id', $req->id_prd)->first();
    	$new_product =DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('state','tặng')->orderBy('products.created_at', 'desc')->paginate(4);
       if(Auth::check()){
        $my_schedule=Schedules::where('id_user_nhan',Auth::user()->id)->where('id_prd_doi',$req->id_prd)->where('ismeet',2)->get();

        $rateOfme=Rating::where('id_user_rate',Auth::user()->id)->where('id_product',$req->id_prd)->get();
       $my_product= DB::table('products')->where('id_user', Auth::user()->id)->get();
        }
        else{
            $my_schedule=null;
            $my_product=null;
            $rateOfme=null;
        }
         if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }
    	return view('page.chitiet-sanpham',compact('sanpham','new_product','my_product','notify','prd', 'commentsOfProduct','rate','rateOfme','my_schedule'));
    }
    public function getLogin(){

    	return view('page.dangnhap');
    }
    public function getSigin(){

    	return view('page.dangky');
    }
     public function postSigin(Request $req){
     	$this->validate($req,
     		[
               'email'=>'required|email|unique:users,email',
               'password'=>'required|min:6|max:20',
               'fullname'=> 'required',
               're_password'=>'required|same:password'


     		],
     		[
     			'email.required'=>'vui lòng nhập email',
     			'email.email'=>'không đúng định dạng email',
     			'email.unique'=>'email đã có người sử dụng',
     			'password.required'=>'vui lòng nhập mật khẩu',
     			're_password.same'=>'mật khẩu không giống nhau',
     			'password.min'=>'mật khẩu it nhất 6 kí tự'



     		]


     	);
     	$user = new User();
     	$user->full_name=$req->fullname;
     	$user->email=$req->email;
     	$user->password = Hash::make($req->password);
     	$user->phone=$req->phone;
     	$user->address=$req->address;
     	$user->save();
     	return redirect()->back()->with('thanhcong','tạo tài khoản thành công');


    }

     public function postLogin(Request $req){
     	$this->validate($req ,
     		[
               // 'email'=>'required|email|unique:users,email',
               // 'password'=>'required|min:6|max:20',
     		],
     		[
     			// 'email.required'=>'vui lòng nhập email',
     			// 'email.email'=>'không đúng định dạng email',
     			// 'email.unique'=>'email đã có người sử dụng',
     			// 'password.required'=>'vui lòng nhập mật khẩu',
     		]
     	);

     	$email = $req->email;
     	$password = $req->password;
     	$data = array('email'=>$email, 'password'=>$password);
     	if(Auth::attempt($data)){
     		$slide=Slide::all();
		$sanpham_hientang=DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('state','tặng')->orderBy('products.created_at', 'desc')->paginate(8);
		$new_product = DB::table('products')->join("users", "users.id","=","products.id_user")->orderBy('products.created_at', 'desc')->paginate(8);
		Log::debug("========== : ".$new_product);

		      return redirect('/trang-chu')->with(['flag'=>'success','message'=>'đăng nhập thành công']);
     	}
        else{
     		return redirect()->back()->with(['flag'=>'warning','message'=>'Đăng nhập không thành công']);
     	}


    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('trang-chu');
    }

    public function getAddPost( ){


    	$Productype=Productype::get();
        $count=0;
        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }

    	return view('page.post',compact('Productype','notify','count'));


}
	public function savePost(Request $req){
		// điền những thông tin cần lấy ra đây, rồi save vào db
			$this->validate($req,
     		[
                'nameproduct'=>'required',
                'pic'=>'required',
                'theloai'=>'required',
                'state'=>'required',
     		],
     		[
     			 'nameproduct.required'=>'vui lòng nhập email',
     			  'pic.required'=>'vui lòng chọn ảnh',
     			   'theloai.required'=>'vui lòng chọn thể loại',
     			    'state.required'=>'vui lòng chọn trạng thái',

     		]
     	);

		 $image = $req->file('pic');

		 	$imagename=$image->getClientOriginalName();
		 	$image->move('source/image/product/',$imagename);


		 //product::create($input);




        $nameproduct = $req->input('nameproduct');
		//$type        = $req->theloai;//thể loại chưa get từ server về
		$description   = $req->description;
		//$pic          = $req->pic;//ảnh
		//$state       = $req->state;

		// viết rồi lưu vào db
		$product = new product();

		$product->id_user= Auth::user()->id;

		$product->id_type= $req->theloai;



		$product->name=$nameproduct;
		//$product->id_type=$type;
		$product->description=$description;
		$product->state = $req->state;
        $product->unit_price = $req->price;

		$product->image   = "$imagename";
		//$product->state=$state;
		$product->save();

		return redirect()->back()->with('status','Đăng thành công');




	}

public function getSearch(Request $req){
	// $new_product =DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('name','like','%'.$req->key.'%')
	// 						->orWhere('unit_price',$req->key)
	// 						->orderBy('products.created_at', 'desc')->paginate(8);
		$product =  product::where('name','like','%'.$req->key.'%')
							->orWhere('unit_price',$req->key)
                            ->orWhere('description','like','%'.$req->key.'%')
							->paginate(8);
                            $count=0;

        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }
				return view('page.search',compact('product','notify','count'));

}
 public function getTang(Request $req){
 		$sanpham_hientang=product::where('state','Tặng')->paginate(8);
        $count=0;
        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }
 		return view('page.tang',compact('sanpham_hientang','notify','count'));

 }
  public function getTraodoi(Request $req){
 		$sanpham_hientang=product::where('state','Trao đổi')->paginate(8);
        $count=0;
        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }
 		return view('page.traodoi',compact('sanpham_hientang','notify','count'));

 }
  public function getThue(Request $req){
 		$sanpham_hientang=product::where('state','Cho thuê')->paginate(8);
        $count=0;
        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }
 		return view('page.thue',compact('sanpham_hientang','notify','count'));

 }
  public function getThoathuan(Request $req){
 		$sanpham_hientang=product::where('state','Thỏa thuận')->paginate(8);
        $count=0;
        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }
 		return view('page.thoathuan',compact('sanpham_hientang','notify','count'));


 }
 public function getMuon(Request $req){
 		$sanpham_hientang=product::where('state','Mượn')->paginate(8);
        $count=0;
        if(Auth::check()){
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
        }
 		return view('page.chomuon',compact('sanpham_hientang','notify','count'));

 }
 public function getDoiSP(Request $req){

            $notify=new Notify();
            $notify->id_product = $req->id_sp;

            $notify->content=$req->product;
            $notify->id_user_receive= $req->id;
            $notify->id_product_convert=$req->product;
            $notify->id_user_send=Auth::user()->id;
            $notify->save();
            return redirect()->back();
 }



 public function postComment($id,Request $req){
    $id_sp=$id;
    $comment= new Comments();
    $comment->id_prd=$id_sp;
    $comment->id_user_comment=Auth::user()->id;

//    $comment->content_cmt=$req->content;
    $comment->save();
    return redirect()->back()->with('thongbao','thanh cong');
 }

 public function getReprice(Request $req){
     $reprice= new Reprice;
     $reprice->id_user_reprice=Auth::user()->id;
     $reprice->id_user_post=$req->id_user_post;
     $reprice->id_product_post=$req->id_product;
     $reprice->price=$req->re_price;
     $reprice->save();
    return redirect()->back();
 }
 public function getRate(Request $r){
     $rate=new Rating;
     $rate->id_user_rate=Auth::user()->id;
     $rate->id_product=$r->id_product;
     $rate->id_user_rated=$r->id_user_rated;
     $rate->rate=$r->rate;
     $rate->cmt=$r->cmt;
     $rate->save();
     return redirect()->back();
 }


 public function getNotify(){

    if(Auth::check()){
        $notifyOfUser=Auth::user()->Notify()->paginate(8);
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
            $notifyOfUser=null;
        }
    return view('page.notify',compact('notify','notifyOfUser'));
 }
 function getDelNotify($id){
    Notify::destroy($id);
    return redirect()->back();
 }
 function getMyProduct(){

     if(Auth::check()){
        $my_prd=product::where('id_user',Auth::user()->id)->get();
        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;
            $my_prd=null;
        }
    return view('page.my_product',compact('my_prd','notify'));
 }
 function getDetailUser($id_user){
     $user= User::find($id_user);
     $rate=Rating::where('id_user_rated',$id_user)->paginate(8);
     $new_product=product::where('id_user',$id_user)->get();

    if(Auth::check()){

        $notify=DB::table('notifies')->where('id_user_receive',Auth::user()->id)->get();
        }
        else{
            $notify=null;

        }
     return view('page.detail-user',compact('notify','user','new_product','rate'));
 }

}
