@extends('partial.master')

@section('title','Blog Laravel 8')

@section('judul','Blog Laravel 8')

@section('content')
@if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
@endif
<a href="/blog/create" class="btn btn-primary my-3">Tambah Blog</a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Gambar</th>
        <th scope="col">Judul</th>
        {{-- <th scope="col">Content</th> --}}
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @forelse($blogs as $key => $blog)
    <tr>
        <td>{{$key+1}}</td>
        <td><img src="{{asset('/storage/images/'.$blog->image)}}" alt="" width="100"></td>
        <td>{{$blog->judul}}</td>
        {{-- <td>{!! $blog->content !!}</td> --}}
        <td>
            <a href="/blog/show/{{$blog->id}}" class="btn btn-info">Show</a>
            <a href="/blog/edit/{{$blog->id}}" class="btn btn-success">Edit</a>
            <form action="/blog/destroy/{{$blog->id}}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
        @empty
        <div class="alert alert-danger w-100">Tidak ada isi blog</div>
        @endforelse
        </tr>
    </tbody>
</table>
@endsection