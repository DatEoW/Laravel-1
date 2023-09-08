
<?php
$tnl=DB::table('tin')
->join('loaitin','tin.idLT','=','loaitin.id')
->select('tin.*','loaitin.ten as tenlt')
->inRandomOrder()
->limit(3)
->get();
$pt=DB::table('tin')
->join('loaitin','tin.idLT','=','loaitin.id')
->select('tin.*','loaitin.ten as tenlt')
->where('tin.urlHinh','!=','')
->limit(6)
->get();
$tnn=DB::table('tin')
->join('loaitin','tin.idLT','=','loaitin.id')
->select('tin.*','loaitin.ten as tenlt','loaitin.lang')
->where('loaitin.lang','=','en')
->limit(5)
->get();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('tieudetrang')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>


    <!-- Topbar Start -->

    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">{{ now() }}</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="{{ url('/') }}">Trang Chủ</a>
                        </li>
                        <li class="nav-item border-right border-secondary">

                            @if (Auth::check())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{route('logout')  }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="nav-link text-body small" ">
                                    {{ __('Đăng Xuất') }}

                            </a>
                            </form>
                                @if(Auth::user()->idgroup==1)
                                    <li class="nav-item border-right border-secondary">
                                        <a class="nav-link text-body small" href="{{ url('/admin') }}">Quản trị</a>
                                    </li>
                                @endif
                            @else
                                <a class="nav-link text-body small" href="register">Đăng Ký</a>

                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Auth::check())
                            <a class="nav-link text-body small" href="/profile">Chào {{ Auth::user()->name }}</a>
                            @else
                            <a class="nav-link text-body small" href="/login">Đăng Nhập</a>
                            @endif

                        </li>

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="{{url('/')}}" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Dat<span class="text-secondary font-weight-normal">News</span></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <a href="https://htmlcodex.com"><img class="img-fluid" src="" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    {{-- <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Dat<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Trang chủ</a>
                    <a href="category.html" class="nav-item nav-link">Category</a>
                    <a href="single.html" class="nav-item nav-link">Tin trong loại</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div> --}}
   @include('menu')
    <!-- Navbar End -->
    <!-- banner start-->
    @yield('banner')
    <!-- banner end-->
    <div class="container-fluid">
        <div class="container">
            <div class="row" style="margin-top:20px">
                @yield('chitiet')
                @yield('noidunghome')
                @yield('tintrongloai')
                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Theo dõi chúng tôi</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Fans</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Connects</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Subscribers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Quảng Cáo</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href="https://www.youtube.com/@ThayLongWeb"><img class="img-fluid" src="/img/thaylongbanner.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tin Ngoài Nước</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                                @foreach($tnn as $tin)
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 150px;">
                                    <img class="img-fluid" src="/{{ $tin->urlHinh }}"  style="width:110px;height:150px" onerror="this.src= 'https://m.baotuyenquang.com.vn/media/images/2020/02/img_20200204083359.jpg' "  alt="IMG">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $tin->tenlt }}</a>
                                            <a class="text-body" href=""><small>{{ $tin->ngayDang }}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">{{ $tin->tieuDe }}</a>
                                    </div>
                                </div>
                                @endforeach


                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Góp Ý</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Luôn lắng nghe góp ý đóng góp của các bạn</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Email của bạn">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Đăng Nhập</button>
                                </div>
                            </div>
                            <small>Đóng góp ý kiến cho DatNews</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Loại Tin</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">

                                @include('tag')
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>






    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Liên lạc</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Công viên Phần Mềm Quang Trung, Lô 14 Đường Số 5, Tân Hưng Thuận, Quận 12, Thành phố Hồ Chí Minh</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+=0392751331</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>datbandat123456@gmail.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Theo dõi chúng tôi</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Tin ngoài lề</h5>
               @foreach($tnl as $tin)
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $tin->tenlt }}</a>
                        <a class="text-body" href=""><small>{{ $tin->ngayDang }}</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">{{ $tin->tieuDe }}</a>
                </div>
               @endforeach

            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Loại Tin</h5>
                <div class="m-n1">

                    @include('category')
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Ảnh nổi bật</h5>
                <div class="row">
                    @foreach($pt as $tin)
                        <div class="col-4 mb-3">
                            <a href=""><img class="w-100" src="/{{ $tin->urlHinh }}" alt="" style="width:82px;height:82px"></a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">DatNews</a>. All Rights Reserved.

		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		Design by <a href="https://htmlcodex.com">Dat09</a></p>
        <div>

        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>

</body>

</html>
