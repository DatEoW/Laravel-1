@extends('admin.layout')
@section('page-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thùng Rác</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                                <td style="width:100px">
                                    @php
                                        $danhmuc=App\Models\loaitin::find($tin->idLT)->ten;
                                        echo $danhmuc
                                    @endphp
                                </td>
                                <td><img src="/{{ $tin->urlHinh }}"  style="width:100px;" onerror="this.src= 'https://m.baotuyenquang.com.vn/media/images/2020/02/img_20200204083359.jpg' "  alt="IMG"></td>

                                <td>{{ $tin->ngayDang }}</td>
                                <td>



                                    <p><a href="{{ url('/admin/khoiphuc/'.$tin->id) }}" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash-restore"></i>
                                        </span>
                                        <span class="text" style="width:120px">Khôi Phục</span>
                                    </a></p>
                                    <p><a href="{{ url('/admin/xoaluon/'.$tin->id) }}" onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn?')" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text" style="width:120px">Xóa</span>
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
