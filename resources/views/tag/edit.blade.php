@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="mx-auto bg-light shadow-lg m-20 p-5">
<h1 class="mb-3">Edit Tags</h1>
<form action="/tag/{{$tags->id}}" method="POST">
@method('PUT')
@csrf
    <div class="mb-3 col-md-4">
        <label class="form-label">Tags</label>
        <input type="text" name="tags" class="form-control" value="{{ $tags->tags }}">
    </div>
    <a href="{{ URL::previous() }}" class="btn btn-secondary mt-4">Back</a>
    <input type="submit" name="submit" class="btn btn-info mt-4">
</form>
</body>
</html>
@endsection
</div>
</div>