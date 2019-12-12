
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<base href="{{asset('')}}">
{{-- base asset lấy đường dẫn gốc --}}
    <!-- Thư viện vedor -->

    <link rel="stylesheet" href="../public/home_asset/css/app.css">
    <link rel="stylesheet" href="../public/home_asset/css/vendor.css">
    <link rel="stylesheet" href="../public/home_asset/css/style.css">
    <link href="admin_asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_asset/css/bootstrap-table.css" rel="stylesheet">
    <!-- Theme khởi tạo -->
        <script src="..public/source/assets/dest/js/jquery.js"></script>
    <script src="..public/source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
        
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app">
            <header class="header">
                <div class="header-block header-block-collapse d-lg-none d-xl-none">
                    <button class="collapse-btn" id="sidebar-collapse-btn">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>


                <marquee>
                    <h4><b><span style="color: #FF9600"></span>Xin<span style="color: #050151"> Chào: </span></b>{{ Auth::user()->full_name }} </h4>
                </marquee>

                <div class="header-block header-block-nav">
                    <ul class="nav-profile">

                        <li class="profile dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="img" style="background-image: url('home_asset/img/boy.png')"> </div>
                                <span class="name"> Cá Nhân </span>
                            </a>
                            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user icon"></i> Hồ sơ </a>
                                <a class="dropdown-item" href="trang-chu">
                                    <i class="fa fa-gear icon"></i> Trang chủ </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    <i class="fa fa-power-off icon"></i> Đăng xuất </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <aside class="sidebar">
                <div class="sidebar-container">
                    <div class="sidebar-header">
                        <div class="brand">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> <b style="font-size: 18px;"><b><span style="color: #FF9600"></span><span
                                        style="color: #050151"></span></b> {{ Auth::user()->full_name }}</b>
                        </div>
                    </div>
                    <nav class="menu">
                        <ul class="sidebar-menu metismenu" id="sidebar-menu">
                            <li class="text-light bg-dark"  style="border-bottom: 1px solid; border-top: 1px solid; :#fff; ">
                                <a href="home">
                                    <i class="fa fa-user-o" style="font-size: 17px"></i>  Thông tin</a>
                            </li>

                            <li>
                                <a href="home/my_product">
                                    <i class="fa fa-shopping-cart" style="font-size: 17px"></i><span class="mt-3" style="display:inline-block;width:19px; height:19px;border-radius: 100%; background-color: #5d0505; text-align: center;line-height: 17px; color: #FFF;">{{ $my_prd->total()}}
                            </span> Vật dụng đã đăng</a>
                            </li>

                            <li >
                                <a href="home">
                                    <i class="fa fa-bell-o" style="font-size: 17px"></i><span class="mt-3" style="display:inline-block;width:19px; height:19px;border-radius: 100%; background-color: #5d0505; text-align: center;line-height: 17px; color: #FFF;">{{ $notify->total() }}
                            </span> Thông báo đổi</a>
                            </li>

                             <li >
                                <a href="home/reprice">
                                    <i class="fa fa-usd" style="font-size: 17px"></i><span class="mt-3" style="display:inline-block;width:19px; height:19px;border-radius: 100%; background-color: #5d0505; text-align: center;line-height: 17px; color: #FFF;">{{$reprice->total()}}
                            </span> Danh sách trả giá</a>
                            </li>

                            <li >
                                <a href="home/schedule">
                                    <i class="fa fa-clock-o" style="font-size: 17px"></i><span class="mt-3" style="display:inline-block;width:19px; height:19px;border-radius: 100%; background-color: #5d0505; text-align: center;line-height: 17px; color: #FFF;">{{ $my_schedule->total()}}
                            </span> Lịch hẹn</a>
                            </li>


                        </ul>
                    </nav>
                </div>

            </aside>
            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div>
            <!-- content -->
            @yield('content')
            <!-- end content -->
            <footer class="footer">
                <div class="footer-block buttons">
                    <a href="https://www.facebook.com/vinh.nguyenxuan.7965"><em class="fa fa-facebook"></em></a>
                </div>
                <div class="footer-block author">
                    <ul>
                        <li> Design by
                            <a href="https://github.com/PhucPro">Vinh Nguyen</a>
                        </li>

                    </ul>
                </div>
            </footer>


        </div>
    </div>
@section('script')

    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>

 @show
</body>

</html>
{{-- endsection có thể thay bằng @stop --}}