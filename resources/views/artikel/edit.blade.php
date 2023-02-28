@extends('layouts.app')

@section('title', 'Edit Artikel')
@section('content')

<div class="container">
<h1><b>Edit Artikel</b></h1>
<form action="/artikel/{{$artikel->id}}" method="POST" enctype="multipart/form-data">
@method('PUT')
@csrf  
    <div class="mb-3">
        <h3>ID : {{ $artikel->id }}</h3>
    </div>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $artikel->title }}">
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="5"> {{ $artikel->description }} </textarea>
    </div>
    @if ($artikel->foto)
        <div class="mb-3">
            <img style="max-width:100px; max-height:100px" src="{{ url('foto') . '/' . $artikel->foto }}"/>
        </div>
    @endif
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="foto">
    </div>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
    <input type="submit" name="submit" class="btn btn-info">
</form>
</body>
</html>
@endsection
</div>