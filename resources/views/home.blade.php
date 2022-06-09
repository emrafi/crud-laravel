@extends('layouts.main')

@section('content')
<h1>Home</h1>
<p>Read books for better knowledge</p>

<div class="row">

    @foreach($book as $item)
    <div class="col-md-3">
        <div class="card border-info mb-3" style="max-width: 18rem;">
            <div class="card-header">{{ $item->category->name }}</div>
            <div class="card-body text-info">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{ $item->summary }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
