@extends('layouts.app')

@section('title')
{{ $artikel->title }}
@endsection
 
<!-- menampilkan gambar, judul, dan isi artikel -->
@section('content')
<div class="container">
<div class="col-sm-12 mb-5 bg-white p-0 mx-4">
    <div class="p-5">
        <a href="{{ URL::previous() }}" class="btn btn-secondary mb-3">Kembali</a><br>
        <img class="mb-4 w-75 rounded mx-auto d-block" src="{{ url('foto') . '/' . $artikel->foto }}"/>
        <h2 class="mb-3"><b>{{ $artikel->title }}</b></h2>
        <small> Published on <br>{{ Carbon\Carbon::parse($artikel->created_at)->format("d-m-Y") }}
        <br> Kategori : {{$artikel->categories->name}}
        <br> Tags : @foreach($artikel->tags as $t)
				{{$t->tags}},
			 @endforeach
        </small>
        <p class="mt-3">{{ $artikel->description }}</p>
    </div>
</div>
</div>
@endsection
 