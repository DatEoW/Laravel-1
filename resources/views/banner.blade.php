
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
                

                {{-- <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="/img/news-800x500-2.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="">Business</a>
                            <a class="text-white" href="">Jan 01, 2045</a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="/img/news-800x500-3.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="">Business</a>
                            <a class="text-white" href="">Jan 01, 2045</a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                    </div>
                </div> --}}
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
                
                {{-- <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/img/news-700x435-2.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">Business</a>
                                <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/img/news-700x435-3.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">Business</a>
                                <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="/img/news-700x435-4.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">Business</a>
                                <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>
                        </div>
                    </div>
                </div> --}}
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