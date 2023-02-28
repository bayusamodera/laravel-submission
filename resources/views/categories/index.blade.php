@extends('layouts.app')

@section('title', 'Categories')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">{{ __('Data Kategori') }}</div>
                    <div class="card-body">
                    <a href="/categories/create" class="btn btn-primary mb-3">tambah</a>
                        <table class="table table-hover">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        @foreach($categories as $k)
                        <tr>
                            <td class="text-center">{{$k->id}}</td>
                            <td class="text-center">{{$k->name}}</td>
                            <td class="text-center">
                            <div class="btn-group">
                                <a href="/categories/{{$k->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                &nbsp;&nbsp;
                                <form onsubmit="return confirm('Are you sure to delete this data?')" action="/categories/{{$k->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </div>    
                            </td>
                        </tr>
                        @endforeach
                        </table>
                        {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection