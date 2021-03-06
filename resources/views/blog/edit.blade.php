@extends('partial.master')

@section('title','Edit Blog')

@section('judul','Form Edit Blog')

@section('content')
<form method="POST" action="{{url('/blog/update',$blog->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
    <img src="{{asset('image/'.$blog->image)}}" alt="" width="100">
    {{-- @error('gambar')
    <div class="alert alert-danger">Gambar Harus di Pilih</div>
    @enderror --}}
    </div>
    <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{$blog->judul}}">
    @error('judul')
    <div class="alert alert-danger">Judul Harus Di isi</div>
    @enderror
    </div>
    <div class="mb-3">
    <textarea id="content" name="content" class="@error('judul') is-invalid @enderror">
        {{$blog->content}}
    </textarea>
    @error('content')
    <div class="alert alert-danger">Content Harus di Isi</div>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
@endsection