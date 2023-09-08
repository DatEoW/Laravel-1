<?php
    $loaitin_arr=DB::table('loaitin')
    ->select('id','ten')
    ->where('AnHien','=','1')
    ->limit(5)
    ->get();
?>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Trang chủ</a>
                {{-- <a href="category.html" class="nav-item nav-link">Category</a>
                <a href="single.html" class="nav-item nav-link">Single News</a> --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh Mục</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        
                        @foreach ( $loaitin_arr as $lt )
                        <a href="{{url('/cat',[$lt->id])}}" class="dropdown-item">{{$lt->ten}}</a>
                     @endforeach
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Liên Hệ</a>
                <a href="contact.html" class="nav-item nav-link">Blog</a>
            </div>
            <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control border-0" placeholder="Nhập Từ Khóa">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>
</div>