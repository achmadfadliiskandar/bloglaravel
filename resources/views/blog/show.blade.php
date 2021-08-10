@extends('partial.master')

@section('title','data blog')

@section('judul','Data blog')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <img src="{{asset('/storage/images/'.$blog->image)}}" alt="" style="width: 100%;">
        <a href="/blog" class="btn btn-warning my-3">Keluar</a>
    </div>
    <div class="col-sm-6">
        <h2>{{$blog->judul}}</h2>
        <p>{!!$blog->content!!}</p>
    </div>
</div>
@endsection