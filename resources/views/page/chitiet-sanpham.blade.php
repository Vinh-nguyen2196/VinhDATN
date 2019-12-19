	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h5 class="inner-title">Sản Phẩm :{{$sanpham->name}}</h5>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>


<!-- Button trigger modal -->




	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
							<h2 class="h__detail__gia ng-binding" style="font-size:25px;color: #38393a; !important">{{$sanpham->name}}</h2>
								<p class="single-item-price">
									<h4 class="h__detail__gia ng-binding" style="padding-bottom: 20px;color: #f16257;border-bottom: 1px solid #2b0b0b" ><i style="font-size: 17px !important" class="fa fa-usd" aria-hidden="true"></i> Giá: {{number_format($sanpham->unit_price)}} VNĐ</h4>

									<h4 class="media-heading ng-binding"  ><i class="fa fa-user" style="font-size: 17px"></i><a href="detail-user/{{$sanpham->user->id}}"> Người đăng: {{$sanpham->user->full_name}}</a></h4>
									<h4 class="media-heading ng-binding"  ><i class="fa fa-home" style="font-size: 17px"></i> Địa chỉ: {{$sanpham->user->address}} </h4>
									<h4 style="padding-bottom:20px;margin-top: 15px;border-bottom: 1px solid #bdb8b8" class="h__detail__gia ng-binding" typesell=""><i style="font-size: 17px !important; color: green;" class="fa fa-check-square" aria-hidden="true"></i> :  {{$sanpham->state}}</h4>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<h5>{{$sanpham->description}}</h5>
							</div>
							<div class="space20">&nbsp;</div>

<p>Options:</p>
@if(Auth::check())


<button style="width: 30%;background-color:#3d99a3;border-color:#3d99a3;    box-shadow: 0 2px 0 #2b7b84!important; " type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	<i class="fa fa-usd"style="color: #fff"></i>
  Trả giá
</button>
<button style="width: 30%;background-color: #3d99a3;border-color:#3d99a3;    box-shadow: 0 2px 0 #2b7b84!important; " type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
	<i class="fa fa-usd" style="color: #fff"></i>
  Đổi
</button>
@if(count($my_schedule)!=0)
	@if(count($rate)==0)
		<button style="width: 30%;background-color: #3d99a3;border-color:#3d99a3;    box-shadow: 0 2px 0 #2b7b84!important; " type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal3">
				<i class="fa fa-exclamation" style="color: #fff"></i>
			đánh giá
			</button>
	@else
		@if(count($rateOfme) == 0)
			<button style="width: 30%;background-color: #3d99a3;border-color:#3d99a3;    box-shadow: 0 2px 0 #2b7b84!important; " type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal3">
				<i class="fa fa-exclamation" style="color: #fff"></i>
			đánh
			</button>
		@endif
@endif









@endif
@endif
{{-- modal rating --}}
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title price" id="myModalLabel">Đánh giá người rao tin</h4>
		</div>

	<form action="{{route('rate',['id_user_rated'=>$sanpham->user->id,'id_product'=>$sanpham->id])}}" method="get" name="form-price" role="form" accept-charset="utf-8" ">
		  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<div class="modal-body rating">
			<input type="radio" name="rate" value='1'/><span class="glyphicon glyphicon-star"></span> <br>
			<input type="radio" name="rate" value='2'/>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			  <br>

			  <input type="radio" name="rate" value='3'/>
			  <span class="glyphicon glyphicon-star"></span>
			  <span class="glyphicon glyphicon-star"></span>
			  <span class="glyphicon glyphicon-star"></span>
				<br>
				<input type="radio" name="rate" value='4'/>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				  <br>
				  <input type="radio" name="rate" value='5'/>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				  <br>
				  <h4>Viết bình luận...<span class="glyphicon glyphicon-pencil"></span></h4>
				  <textarea style="margin-bottom: 25px;" class="form-control" rows="3" name="cmt"></textarea>



		</div>
		<div class="modal-footer price">

		  <button name="sbm" style="background-color:#a08080; " type="submit" class="btn btn-primary">Gửi</button>
		</div>
		</form>
	  </div>
	</div>
  </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title price" id="myModalLabel">Trả giá sản phẩm</h4>
      </div>

	<form action="{{route('reprice',['id_product'=>$sanpham->id,'id_user_post'=>$sanpham->user->id])}}" method="get" name="form-price" role="form" accept-charset="utf-8" ">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <div class="modal-body price">
      	<span>Giá bạn đưa ra là: </span>
        <input type="text" name="re_price" /> VNĐ<br>

      </div>
      <div class="modal-footer price">

        <button name="sbm" style="background-color:#a08080; " type="submit" class="btn btn-primary">Gửi</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--  -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Vật dụng của bạn đang có</h4>
      </div>
      <form action="{{route('doi',[ 'user_id' => $sanpham->user->id, 'product_id' => $sanpham->id])}}" method="get">

      <div class="modal-body">
      	@if($my_product!=null)
      	@foreach($my_product as $my_prd)
      	        <input type="radio" name="product" value='{{$my_prd->id}}'/> {{ $my_prd->name}}<br>
      	@endforeach
      	@else
      	<label for="khong co">Bạn đang không có sản phẩm nào!<br>Vui lòng đăng kí tài khoản!!!</label>


      	@endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <input style="background-color:#a08080; " type="submit" class="btn btn-primary" value="Đổi"></input>
      </div>
      </form>
    </div>
  </div>
</div>

						</div>
					</div>


					<div class="space40">&nbsp;</div>
					@if(Auth::check())
					@if(session('thongbao'))

					@php
					echo '<div class="alert alert-success" style="text-align: center;" role="alert">';
					    echo '<i style="font-size: 17px !important; color: green;" class="fa fa-check-square" aria-hidden="true"></i><strong> Đã bình tuận</strong>';
					    echo '</div>';
					@endphp
					@endif
					<div class="well">
						<h4>Viết bình luận...<span class="glyphicon glyphicon-pencil"></span></h4>
						<form action="{{route('comment.create',['id'=>$sanpham->id])}}" method="post" role="form" accept-charset="utf-8">
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							<div class="form-group">
								<textarea style="margin-bottom: 25px;" class="form-control" rows="3" name="body"></textarea>
								<button style="background-color: #2196f3 border-radius:5px;" type="submit" class="btn btn-primary">Gửi</button>
							</div>
						</form>
					</div>

					<hr>

					@endif

		<!-- list-comment -->
					@foreach($commentsOfProduct as $cmt)
							<div class="media">
								<div class="media-body" style="display: inline;">
                                    <div class="col col-md-1">
                                        <img src="https://file.vforum.vn/hinh/2014/5/anh-dai-dien-facebook-5.jpg" style="width: 50px">
                                    </div>
                                    <div class="col-md-10">
                                        <h4 class="media-heading"><b>{{ $cmt->user_comment->full_name }}</b>
                                            <small>{{ $cmt->created_at }}</small>
                                        </h4>
                                        {{ $cmt->content_cmt }}

                                    </div>


								</div>

							</div>
					@endforeach

				{{ $commentsOfProduct->render() }}
		<!-- end list-comment -->

				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bài viết hôm nay</h3>
						@foreach($new_product as $new)
						<div class="widget-body">

							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt=""height="250px" width="250px"></a>
									<div class="single-item-body">
										<p class="single-item-title"><h8 style="font-family: Time New Roman">{{$new->name}}</h8></p>

										<p class="single-item-price">


											@if($new->state=='tặng'||$new->unit_price==null)
											<span style="color:#f16257"><font><i style="font-size: 17px !important" class="fa fa-usd" aria-hidden="true"></i> miễn phí</font></span>
											@else
											<span style="color:#f16257"><font><i style="font-size: 17px !important" class="fa fa-usd" aria-hidden="true"></i> {{number_format($new->unit_price)}} vnđ</font></span>
											@endif



										</p>

									</div>
								</div>

							</div>

						</div>
						@endforeach
					</div> <!-- best sellers widget -->

					<div class="widget">
						<h3 class="widget-title">Bài Viết Nổi Bật</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										chưa biết
										<span class="beta-sales-price">$ 1 tỉ</span>
									</div>
								</div>

							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div> <!-- .beta-products-list -->
			</div>
		</div>


			{{-- <div class="row" style="border-top: 1px solid; padding-top: 15px;"> --}}
					{{-- <div class="product-rating-overview__filters"><div class="product-rating-overview__filter product-rating-overview__filter--active product-rating-overview__filter--all"><a>tất cả</a></div>
					<div class="product-rating-overview__filter">5 Sao (455)</div>
					<div class="product-rating-overview__filter">4 Sao (19)</div>
					<div class="product-rating-overview__filter">3 Sao (4)</div>
					<div class="product-rating-overview__filter">2 Sao (2)</div>
					<div class="product-rating-overview__filter">1 Sao (3)</div>
					<div class="media"> --}}

					{{-- @foreach($rate as $ra) --}}
					{{-- <div class="row">
								<a class="pull-left href="#" ">
									<img style="padding-left: 15px;" class="media-object" src="../public/image/sao.jpg" alt="">
								</a>
								<div class="media-body" style="display: inline;">
									<h4 class="media-heading">{{$ra->user_rate->full_name}}
									<small>{{$ra->created_at}}</small>
									</h4>
									@for($star=1;$star<=$ra->rate;$star++)
									<span class="glyphicon glyphicon-star"></span>

									@endfor
									<p>{{$ra->cmt}}</p>

								</div>
					</div>
					@endforeach
							</div>



					</div> --}}

		<div class="space50">&nbsp;</div>
		<div class="beta-products-list">
			<h4>Bài Viết Mới</h4>

			<div class="row">
				@foreach($new_product as $new)
				<div class="col-sm-3">
					<article class="thumbnail h__thumbnail item">
						<div class="single-item">


							<div class="single-item-header">
								<a style="cursor: pointer; text-decoration: none;" class="image" href="{{route('chitietsanpham',$new->id)}}">
									<img src="source/image/product/{{$new->image}}" alt=""height="250px" width="250px"/>
								</a>
							</div>

							<a class="media" href="{{route('chitietsanpham',$new->id)}}" style="cursor: pointer; text-decoration: none;">
								<div class="media-left">
									<i class="fa fa-phone" style="font-size: 24px; color: lightblue"></i>
								</div>
								<div class="media-body">
									<h4 class="media-heading ng-binding" title="{{$new->full_name}}">{{$new->full_name}}</h4>
									<p title="{{$new->address}}" class="ng-binding">{{$new->address}}</p>
								</div>
							</a>

							<a class="caption" href="{{route('chitietsanpham',$new->id)}}" style="cursor: pointer; text-decoration: none;">
								<h3 title="{{$new->name}}" class="ng-binding">{{$new->name}}</h3>
								<h4 class="h__detail__gia ng-binding" ><i style="font-size: 17px !important" class="fa fa-usd" aria-hidden="true"></i>: {{number_format($new->unit_price)}} VNĐ</h4>
								<h4 class="h__detail__gia ng-binding" typesell=""><i style="font-size: 17px !important; color: green;" class="fa fa-check-square" aria-hidden="true"></i> : {{$new->state}}</h4>
							</a>
						</div>
					</article>


				</div>

				@endforeach

			</div>
			{{ $new_product->render() }}
		</div>

	</div>

	<!-- #content -->


	@endsection
