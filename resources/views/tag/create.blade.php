@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="mx-auto bg-light shadow-lg m-20 p-5">
<h1 class="mb-3">Create Tags</h1>
<form action="/tag" method="POST">
@csrf
    <div class="mb-3 col-md-4">
        <label class="form-label">Nama Tags</label>
        <input type="text" name="tags" class="form-control">
    </div>
    <div class="mb-3 col-md-4">
        <label class="form-label">ID Artikel</label>
        <input type="text" name="artikel_id" class="form-control">
    </div>
    <a href="{{ URL::previous() }}" class="btn btn-secondary mt-4">Back</a>
    <input type="submit" name="submit" class="btn btn-info mt-4">
</form>
</body>
</html>
@endsection
</div>
</div>