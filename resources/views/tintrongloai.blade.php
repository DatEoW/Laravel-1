@extends('layout')
@section('tieudetrang')
    {{$listtin[0]->tenlt}}
@endsection

@section('tintrongloai')

    <div class="col-lg-8">
        <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Chủ đề : {{ $listtin[0]->tenlt }}</h4>
            </div>
        <div class="col-lg-12" style="margin-top:50px;padding-left:0 !important;">  <!-- Row là thành 50% width-->
            @foreach ($listtin as $lt )

            <div class="col-lg-10 p-0" >
                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                    <div style="width: 150px;">
                        <img class="img-fluid" src="/{{ $lt->urlHinh }}" alt="Ảnh lỗi" style="width:150px;height:90px">
                    </div>
                    
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $lt->tenlt }}</a>
                            <a class="text-body" href=""><small>{{ $lt->ngayDang}}</small></a>
                        </div>
                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ url('/tin',[$lt->id]) }}"> {{ $lt->tieuDe }} </a>
                    </div>
                </div>
                
            </div>
        @endforeach
        </div>
       
        
    </div>


@endsection