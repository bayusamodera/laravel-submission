@extends('layouts.app')

@section('title', 'Tags')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">{{ __('Data Tags') }}</div>
                    <div class="card-body">
                    <a href="/tag/create" class="btn btn-primary mb-3">tambah</a>
                        <table class="table table-hover">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tags</th>
                            <th class="text-center">ID Artikel</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        @foreach($tags as $t)
                        <tr>
                            <td class="text-center">{{$t->id}}</td>
                            <td class="text-center">{{$t->tags}}</td>
                            <td class="text-center">{{$t->artikel_id}}</td>
                            <td class="text-center">
                            <div class="btn-group">
                                <a href="/tag/{{$t->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                &nbsp;&nbsp;
                                <form onsubmit="return confirm('Are you sure to delete this data?')" action="/tag/{{$t->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </div>    
                            </td>
                        </tr>
                        @endforeach
                        </table>
                        {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection