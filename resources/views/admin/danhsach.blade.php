
@extends('admin.layout')
@section('content-body')
<div>
    
    <h1>Danh sách tin</h1>
    @if(session('status'))
        <div style="background-color: aquamarine">{{ session('status') }}</div>
    @endif
    @foreach($data as $tin)
            <div>
                <div>
                    <h4>{{ $tin->tieuDe }}</h4>
                    <p>{{ $tin->tomTat }}</p>
                    
                </div>
                <div><a href="{{ url('/admin/capnhat/'.$tin->id) }}">Cập nhật</a>& <a href=" {{ url('/admin/xoa/'.$tin->id) }}">Xóa</a></div>
            </div>
            <hr>
    @endforeach
</div>
@endsection

