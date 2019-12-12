<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Tân Dân-Phú Xuyên-Hà Nội</a></li>
						<li><a href=""><i class="fa fa-phone"></i>0982171667</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						
						@if(Auth::check())
						<li><a href="home"><i class="fa fa-user"style="font-size: 17px"></i>{{Auth::user()->full_name}}</a></li>
						<li><a href="{{route('logout')}}"><i class="fa fa-reply"style="font-size: 17px"></i>Đăng xuất</a></li>
						@if($notify!= null)

					<li><a href="notify"><i class="fa fa-bell-o" style="font-size: 17px"></i>
							<span class="mt-3" style="display:inline-block;width:19px; height:19px;border-radius: 100%; background-color: #5d0505; text-align: center;line-height: 17px; color: #FFF;">{{ count($notify) }}
							</span>
						</a>
					</li>
					@endif
						<li><a  href="{{route('addPost')}}"><i class="fa fa-pencil"style="font-size: 17px"></i>Đăng tin miễn phí</a></li>
						@else
						<li><a href="{{route('sigin')}}">
							<i class="fa fa-users" style="font-size: 17px"></i>
							Đăng kí
						</a></li>
						<li><a href="{{route('login')}}" class="dang-nhap">
							<i class="fa fa-user" style="font-size: 17px"></i>
							Đăng nhập
						</a>
						</li>
						<li><a onclick="return cfm()" href="{{route('sigin')}}" class="post-news">
							<i class="fa fa-pencil" style="font-size: 17px"></i>
							Đăng tin miễn phí
						</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div>
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo.PNG" width="500px" style="height: auto;" alt=""></a>
				</div>   
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

				
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a href="{{route('trang-chu')}}">Loại Sản phẩm</a>
							<ul class="sub-menu">

								@foreach($loai as $l)
								<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
								@endforeach
								

							</ul>
						</li>
						<li><a href="{{route('tang')}}">Cho Tặng</a></li>
						<li><a href="{{route('thue')}}">Thuê lại</a></li>
						<li><a href="{{route('traodoi')}}">Trao đổi</a></li>
						<li><a href="{{route('muon')}}">Cho Mượn</a></li>
						<li><a href="{{route('thoathuan')}}">Thỏa Thuận</a></li>
						<li><a href="{{route('tang')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>
	<script>
		function cfm(){
		  return confirm('Bạn phải đăng kí làm thành viên');
		}
	  </script>
