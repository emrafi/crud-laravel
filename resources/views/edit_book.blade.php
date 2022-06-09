@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Edit Book
                    <a href="{{ url('book') }}" class="btn btn-secondary float-end"><i class="bi bi-arrow-left"></i> Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('book/'.$book->slug) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $book->title)  }}" autofocus>

                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Summary</label>
                        <textarea name="summary" class="form-control @error('summary') is-invalid @enderror" rows="3">{{ old('summary', $book->summary) }}</textarea>

                        @error('summary')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" name="category">
                            <option value="" disabled selected>Select category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ old('category', $book->category_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
