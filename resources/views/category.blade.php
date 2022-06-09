@extends('layouts.main')

@section('content')
<div class="row">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Category List
                    <a href="{{ url('category/create') }}" class="btn btn-primary float-end"><i class="bi bi-plus-lg"></i> Add Category</a>
                </h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ url('category/edit/'.$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('category/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
