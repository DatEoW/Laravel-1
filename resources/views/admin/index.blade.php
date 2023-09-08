@extends('admin.layout')
@section('page-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Tin</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (session('status'))
                <a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">{{ session('status') }} {{ session('tieuDe') }}</span>
                </a>
            @endif

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tiêu Đề</th>
                            <th>Loại Tin</th>
                            <th>Hình Ảnh</th>

                            <th>Ngày Đăng</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tiêu Đề</th>
                            <th>Loại Tin</th>
                            <th>Hình Ảnh</th>

                            <th>Ngày Đăng</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $tin)
                            <tr>
                                <td  style="width:150px">{{ $tin->tieuDe }}</td>
                                <td style="width:100px">{{ $tin->tenlt }}</td>
                                <td><img src="{{ $tin->urlHinh }}"  style="width:100px;"></td>

                                <td>{{ $tin->ngayDang }}</td>
                                <td>
                                    @if ($tin->anHien==1)

                                        <p><a href="{{ url('/admin/an/'.$tin->id) }}" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text" style="width:120px">Đang Hiện</span>
                                        </a></p>
                                    @else

                                        <p><a href="{{ url('/admin/hien/'.$tin->id) }}" class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                            <span class="text" style="width:120px">Đang Ẩn</span>
                                        </a></p>
                                    @endif
                                    {{-- <p><a href="{{ url('/admin/xoa/'.$tin->id) }}">Xóa</a></p> --}}
                                    <p><a href="{{ url('/admin/xoa/'.$tin->id) }}" class="btn btn-warning btn-icon-split" onclick="return confirm('Bạn có chắc muốn bỏ vào thùng rác?')">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text" style="width:120px">Thùng Rác</span>
                                    </a></p>
                                    <p><a href="{{ url('/admin/capnhat/'.$tin->id) }}" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text" style="width:120px">Cập nhật</span>
                                    </a></p>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
