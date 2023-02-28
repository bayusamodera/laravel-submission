@if ($errors->any())
<div class="container">
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
        <li>{{$item}}</li>
        @endforeach
    </div>
</div>
@endif

@if (Session::get('success'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
</div>
@endif