    @extends('master')
    @section('content')
    <div class="fullwidthbanner-container">
    	<div class="fullwidthbanner">
    		<div class="bannercontainer" >
    			<div class="banner" >
    				<ul>
    					@foreach($slide as $sl)
    					<!-- THE FIRST SLIDE -->
    					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
    						<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
    							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
    							</div>
    						</div>

    					</li>
    					@endforeach

    				</ul>
    			</div>
    		</div>

    		<div class="tp-bannertimer"></div>
    	</div>
    </div>
    <!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">

				
					<div class="col-sm-2">
						<ul class="aside-menu">
							
							<li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('loaisanpham','1')}}"> sách</a></li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('loaisanpham','2')}}"> Đồ dùng học tập</a></li>
							<li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('loaisanpham','3')}}"> Đồ điện tử</a></li>
							<li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('loaisanpham','4')}}"> Phương tiện đi lại</a></li>
							<li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('loaisanpham','5')}}"> Vật nuôi- thú cưng </a></li>
							<li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('loaisanpham','6')}}"> Trang phục,phụ kiện</a></li>
							<li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="{{route('loaisanpham','7')}}"> Vật dụng trong nhà</a></li>
							
						</ul>
					</div>


						<div class="col-sm-10">
							<div class="beta-products-list">
								<h4>Bài đăng mới</h4>
								<div class="beta-products-details">
									<p class="pull-left">Tìm thấy {{count($new_product)}} bài đăng </p>
									<div class="clearfix"></div>
								</div>
							@foreach ($new_product as $new)
							
							<div class="col-sm-3">
								<article class="thumbnail h__thumbnail item">
									<div class="single-item">


									<div class="single-item-header">
											<a style="cursor: pointer; text-decoration: none;" class="image" href="{{route('chitietsanpham',$new->id)}}">
												<img src="source/image/product/{{$new->image}}" alt=""/>
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
										
											<h4 class="h__detail__gia ng-binding" ><i style="font-size: 17px !important" class="fa fa-usd" aria-hidden="true"></i>: {{number_format($new->unit_price)}}.VNĐ</h4>
									
											<h4 class="h__detail__gia ng-binding" typesell=""><i style="font-size: 17px !important; color: green;" class="fa fa-check-square" aria-hidden="true"></i> : {{$new->state}}</h4>
										</a>
									</div>
								</article>


							</div>

							@endforeach


						</div>
						<div class="row">{{$new_product->links()}}</div>

					</div>
				</div>
			

			<div class="space50">&nbsp;</div>
			<div class="col-sm-12">
			<div class="beta-products-list">
				<h4>Sản Phẩm Tặng</h4>
				<div class="beta-products-details">
					<p class="pull-left">Tìm thây {{count($sanpham_hientang)}} bài đăng</p>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					@foreach($sanpham_hientang as $new)
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
				<div class="row">{{$sanpham_hientang->links()}}</div>
			</div> <!-- .beta-products-list -->
		</div>
		</div>
	</div> <!-- end section with sidebar and main content -->


</div> <!-- .main-content -->
</div> <!-- #content -->
@endsection