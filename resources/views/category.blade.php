<?php
    $cat=DB::table('loaitin')
    ->orderBy('ten','desc')
    ->get();

?>

@foreach ($cat as $ten )
    <a href="{{url('/cat',[$ten->id])}}" class="btn btn-sm btn-secondary m-1">{{ $ten->ten }}</a>
@endforeach