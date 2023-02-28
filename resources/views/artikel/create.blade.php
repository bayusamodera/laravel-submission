@extends('layouts.app')

@section('title', 'Create New Artikel')
@section('content')

<div class="container">
<h1>Create Artikel</h1>
<form action="/artikel" method="POST" enctype="multipart/form-data">
@csrf  
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ Session::get('title')}}">
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="5"> {{ Session::get('description')}} </textarea>
    </div>
    <div class="mb-3">
        <label>Categories</label>
        <select name="id_categories" class="form-control">
            @foreach($categories as $a)
            <option>{{ $a->id }}</p></option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Image</label>
        <input class="form-control" type="file" id="foto" name="foto">
    </div>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
    <input type="submit" name="submit" class="btn btn-info">
</form>
</body>
</html>
@endsection
</div>