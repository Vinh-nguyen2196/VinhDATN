<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trang quản trị</title>
    @toastr_css
<base href="{{asset('')}}">

<link href="admin_asset/css/bootstrap.min.css" rel="stylesheet">
<link href="admin_asset/css/datepicker3.css" rel="stylesheet">
<link href="admin_asset/css/bootstrap-table.css" rel="stylesheet">
<link href="admin_asset/css/styles.css" rel="stylesheet">

<link rel="stylesheet" href="admin_asset/css/home.css">
<link rel="stylesheet" href="admin_asset/css/product.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

<script src="admin_asset/js/jquery-3.3.1.js"></script>
<script src="admin_asset/js/bootstrap.js"></script>

<!--Icons-->
<script src="admin_asset/js/lumino.glyphs.js"></script>
<script src="admin_asset/js/jquery-1.11.1.min.js"></script>
	<script src="admin_asset/js/bootstrap.min.js"></script>
	<script src="admin_asset/js/bootstrap-table.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css"/>

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					<a class="navbar-brand" href="#">{{Auth::user()->full_name}}</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Auth::user()->full_name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
									<li><a href="{{ route('logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
								</ul>
							</li>
						</ul>
					</div>

				</div><!-- /.container-fluid -->
			</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="{{ (request()->is('admin')) ? 'active-menu' : '' }}"><a href="{{ route('admin.getDashboards') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="{{ (request()->is('admin/users*')) ? 'active-menu' : '' }}"><a href="{{ route('users.index') }}" ><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li class="{{ (request()->is('admin/categories*')) ? 'active-menu' : '' }}"><a href="{{route('categories.index')}}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class="{{ (request()->is('admin/products*')) ? 'active-menu' : '' }}"><a href="{{route('products.index')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý bài viết</a></li>
			<li class="{{ (request()->is('admin/comments*')) ? 'active-menu' : '' }}"><a href="{{route('comments.index')}}"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quản lý bình luận</a></li>
			<li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý quảng cáo</a></li>
			<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li>
		</ul>

	</div><!--/.sidebar-->
		@yield('noi-dung')
</body>
@jquery
@toastr_js
@toastr_render
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
</html>
