@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
   <div class="row">
    <h1 class="text-center mb-3">Artikel Terbaru</h1>
        @foreach($artikel as $a)
        <div class="col-sm-6 col-lg-4 mb-4 shadow">
            <div class="mx-2">
                <a href="/artikel/{{$a->id}}">
                    <img src="{{url('foto').'/'.$a->foto }}" alt="Image placeholder" class="img-fluid mt-2 rounded" width="100%" style="height:200px">
                </a>
                <div class="block-4-text p-4">
                	<h3><a href="{{ url('foto').'/'.$a->foto }}" class="text-decoration-none text-dark">{{ $a->title }}</a></h3>
					<div class="mb-2">
                        <li>
                        <span>{{$a->categories->name}}</span><br>
                        </li>
						<span>{{Carbon\Carbon::parse($a->created_at)->format('d F Y')}}</span>
					</div>
                	<a href="/artikel/{{$a->id}}" class="btn btn-info mt-2">Detail</a>
                </div>
            </div>
        </div>
    	@endforeach
@endsection
