<?php
    $loaitin_arr=DB::table('loaitin')
    ->select('id','ten')
    ->where('AnHien','=','1')
    ->limit(5)
    ->get();
?>
@extends('layout')
@section('tieudetrang')
    Trang chủ
@endsection



@section('noidunghome')
   
    
    <div class="container-fluid pt-5 mb-3" style="padding-top:1rem !important;">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Tin Hot</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                 @foreach ($tin as $tin)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid h-100" src="{{ $tin->urlHinh }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">{{ $tin->tenlt }}</a>
                                <a class="text-white" href=""><small>{{ $tin->ngayDang }}</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{url('/tin',[$tin->id])}}">{{ $tin->tieuDe }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Tin Mới</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="{{url('/cat',[$loaitin_arr[1]->id])}}">Xem Thêm</a>
                            </div>
                        </div>
                        @foreach($lt_new as $tin)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="/{{ $tin->urlHinh }}" style="object-fit: cover;height:250px">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{ $tin->tenlt }}</a>
                                        <a class="text-body" href=""><small>{{ $tin->ngayDang }}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" style="height:100px" href="">{{ $tin->tieuDe }}</a>
                                    <p class="m-0" style="height:150px">{{ $tin->tomTat }}</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="/img/user.jpg" width="25" height="25" alt="">
                                        <small>John Doe</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $tin->xem }}</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        {{-- <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="/img/news-700x435-2.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">12321</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                                    <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                        rebum clita rebum dolor stet amet justo</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="/img/user.jpg" width="25" height="25" alt="">
                                        <small>John Doe</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="" alt=""></a>
                            <div class="section-title" style="margin-bottom: 0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Bạn xem chưa?</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="{{url('/cat',[$loaitin_arr[1]->id])}}">Xem Thêm</a>
                            </div>
                        </div>
                        @foreach ( $rd_new as $tin )
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="/{{ $tin->urlHinh }}" style="object-fit: cover;height:250px" onerror="this.src= 'https://m.baotuyenquang.com.vn/media/images/2020/02/img_20200204083359.jpg' "  alt="IMG">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{ $tin->tenlt }}</a>
                                        <a class="text-body" href=""><small>{{ $tin->ngayDang }}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-0 text-secondary text-uppercase font-weight-bold"  style="height:100px" href="">{{ $tin->tieuDe }}</a>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="/img/user.jpg" width="25" height="25" alt="">
                                        <small>John Doe</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $tin->xem }}</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                        
                        <div class="col-lg-6">
                            @foreach ( $rd_new1 as $tin )
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="/{{ $tin->urlHinh }}" alt="" style="height: 109px;width:110px" onerror="this.src= 'https://m.baotuyenquang.com.vn/media/images/2020/02/img_20200204083359.jpg' "  alt="IMG">
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
                        <div class="col-lg-6">
                            @foreach ( $rd_new2 as $tin )
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="/{{ $tin->urlHinh }}"  style="height: 109px;width:110px;" onerror="this.src= 'https://m.baotuyenquang.com.vn/media/images/2020/02/img_20200204083359.jpg' "  alt="IMG">
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
                        <div class="col-lg-12 mb-3" >
                            <a href=""><img class="img-fluid w-100" src="" alt=""></a>
                            <div class="section-title" style="margin-bottom: 0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Tin Xem nhiều</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="{{url('/cat',[$loaitin_arr[1]->id])}}">Xem Thêm</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            
                            <div class="row news-lg mx-0 mb-3">
                                <div class="col-md-6 h-100 px-0">
                                    <img class="img-fluid h-100" src="/{{ $tin_xnn->urlHinh }}" style="object-fit: cover;" >
                                </div>
                                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="">{{ $tin_xnn->tenlt }}</a>
                                            <a class="text-body" href=""><small>{{ $tin_xnn->ngayDang }}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="">{{ $tin_xnn->tieuDe }}</a>
                                        <p class="m-0" style="height:100px;overflow:hidden">{{ $tin_xnn->tomTat }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="/img/user.jpg" width="25" height="25" alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $tin_xnn->xem }}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            @foreach ( $tin_xn as $tin )
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img id="img{{ $tin->id }}"class="img-fluid" src="/{{ $tin->urlHinh }}" style="height: 109px;width:110px;" onerror="this.src= 'https://m.baotuyenquang.com.vn/media/images/2020/02/img_20200204083359.jpg' "  alt="IMG">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $tin->tenlt }}</a>
                                        <a class="text-body" href=""><small></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">{{ $tin->tieuDe }}</a>
                                </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="col-lg-6">
                            @foreach ( $tin_xn1 as $tin )
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img  class="img-fluid" src="/{{ $tin->urlHinh }}" style="height: 109px;width:110px;" onerror="this.src= 'https://m.baotuyenquang.com.vn/media/images/2020/02/img_20200204083359.jpg' "  alt="IMG">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $tin->tenlt }}</a>
                                    <a class="text-body" href=""><small></small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">{{ $tin->tieuDe }}</a>
                            </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                
                
            
@endsection

<?php
     $tin_arr=DB::table('tin')
    ->join('loaitin','tin.idLT','=','loaitin.id')
    ->select('tin.*','loaitin.ten as tenlt')
    ->orderBy('xem','desc')
    ->limit(4)
    ->get();
    $tin_arr1=DB::table('tin')
    ->join('loaitin','tin.idLT','=','loaitin.id')
    ->select('tin.*','loaitin.ten as tenlt')
    ->orderBy('ngayDang','desc')
    ->limit(4)
    ->get();
    $tin_arr2=DB::table('tin')
    ->join('loaitin','tin.idLT','=','loaitin.id')
    ->select('tin.*','loaitin.ten as tenlt')
    ->orderBy('ngayDang','asc')
    ->limit(4)
    ->get();
?>
@section('banner')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                @foreach($tin_arr as $tin)
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="/{{ $tin->urlHinh }}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="">{{ $tin->tenlt }}</a>
                            <a class="text-white" href="">{{ $tin->ngayDang }}</a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">{{ $tin->tieuDe }}</a>
                    </div>
                </div>
                @endforeach
                

                
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                @foreach($tin_arr1 as $tin)
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/{{ $tin->urlHinh }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">{{ $tin->tenlt }}</a>
                                <a class="text-white" href=""><small>{{ $tin->ngayDang }}</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">{{ $tin->tieuDe }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
        <div class="row align-items-center bg-dark">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                   
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">{{ $tin_arr2[0]->tenlt }}</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 190px); padding-right: 90px;">
                            @foreach($tin_arr2 as $tin)
                            <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">{{ $tin->tieuDe }}</a></div>
                     
                            @endforeach
                        </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



