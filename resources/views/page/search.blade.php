@extends('master');
@section('content')
	
</section>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm Kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} bài đăng </p>
								<div class="clearfix"></div>
							</div>

						<div class="row">
							@foreach ($product as $new)
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

						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	<div>
		@endsection