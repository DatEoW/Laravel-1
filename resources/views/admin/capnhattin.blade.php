<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
<form action="/admin/capnhat/{{ $t->id }}" method="post" class="col-7 m-auto" entype="multipart/form-data">

<p> Tiêu đề: <input name="tieuDe" class="form-control" value="{{ $t->tieuDe }}"></p>
<p> Tóm tắt: <textarea name="tomTat" class="form-control" value="{{ $t->tomTat }}"></textarea></p>
<p> urlHinh: <input name="urlHinh" type="file"class="form-control" ></p>
<p> noiDung: <input name="noiDung" class="form-control" value="{{ $t->noiDung }}"></p>
<p> Ẩn Hiện: <select name="anHien" class="form-control">
    <option value="1">Hiện</option>
    <option value="0">Ẩn</option>
    </select>
<p> idLT: <select name="idLT" class="form-control">




@foreach($loaitin as $loai)
<option value="{{ $loai->id }}"@if($loai->id==$t->idLT) selected @endif>{{ $loai->ten }}</option>
@endforeach
</select>
</p>
<p><button type="submit" class="bg-warning p-2">Lưu</button></p>
@csrf
</form>
