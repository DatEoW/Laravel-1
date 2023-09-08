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
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>

                            <th>Ngày Tạo</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>

                            <th>Ngày Tạo</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $tin)
                            <tr>
                                <td  style="width:150px">{{ $tin->name }}</td>
                                <td style="width:100px">{{ $tin->email }}</td>
                                <td style="width:100px;">  {{ $tin->diachi }}</td>

                                <td>{{ $tin->created_at }}</td>
                                <td>

                                    {{-- <p><a href="{{ url('/admin/xoa/'.$tin->id) }}">Xóa</a></p> --}}
                                    <p><a href="{{ url('/admin/khoiphucu/'.$tin->id) }}" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash-restore"></i>
                                        </span>
                                        <span class="text" style="width:120px">Khôi Phục</span>
                                    </a></p>
                                    <p><a href="{{ url('/admin/xoaluonu/'.$tin->id) }}" class="btn btn-danger btn-icon-split" onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn?')">
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
