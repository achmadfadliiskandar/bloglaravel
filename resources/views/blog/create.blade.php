@extends('partial.master')

@section('title','Tambah Blog')

@section('judul','Form Tambah Blog')

@section('content')
<form method="POST" action="{{url('/blog/store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input type="file" class="form-control-file" id="image" name="image">
    {{-- @error('gambar')
    <div class="alert alert-danger">Gambar Harus di Pilih</div>
    @enderror --}}
    </div>
    <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{old("judul")}}">
    @error('judul')
    <div class="alert alert-danger">Judul Harus Di isi</div>
    @enderror
    </div>
    <div class="mb-3">
    <textarea id="content" name="content" class="@error('judul') is-invalid @enderror" value="{{old("content")}}"></textarea>
    @error('content')
    <div class="alert alert-danger">Content Harus di Isi</div>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
@endsection