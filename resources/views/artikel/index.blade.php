@extends('layouts.app')

@section('title', 'Artikel')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Data Artikel') }}</div>
                    <div class="card-body">
                    <a href="/artikel/create" class="btn btn-primary mb-3">tambah</a>
                        <table class="table table-hover">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Categori</th>
                            <th class="text-center">Tags</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        @foreach($artikel as $a)
                        <tr>
                            <td class="text-center">{{$a->id}}</td>
                            <td>{{$a->title}}</td>
                            <td>{{$a->description}}</td>
                            <td class="text-center">{{$a->categories->name}}</td>
                            <td>
                            @foreach($a->tags as $t)
									{{$t->tags}},
								@endforeach
                            </td>
                            <td class="align-middle">
                                @if ($a->foto)
                                    <img class="mx-3" style="max-width:50px; max-height:50px" src="{{url('foto').'/'.$a->foto }}"/>
                                @endif
                            </td>
                            <td class="align-middle">
                            <div class="btn-group">
                                <a href="/artikel/{{$a->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                &nbsp;&nbsp;
                                <form onsubmit="return confirm('Are you sure to delete this data?')" action="/artikel/{{$a->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                                &nbsp;&nbsp;
                                <a class='btn btn-secondary btn-sm' href="/artikel/{{$a->id}}">detail</a>
                            </div>    
                            </td>
                        </tr>
                        @endforeach
                        </table>
                        {{ $artikel->links() }}
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection