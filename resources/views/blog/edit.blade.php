@extends('partial.master')

@section('title','Tambah Blog')

@section('judul','Form Tambah Blog')

@section('content')
<form method="POST" action="/blog/update/{{$blog->id}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="gambar" class="form-label">Gambar</label>
    <input type="file" class="form-control-file" id="gambar" name="gambar">
    <img src="/gambarblog/{{$blog->gambar}}" alt="" width="100">
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