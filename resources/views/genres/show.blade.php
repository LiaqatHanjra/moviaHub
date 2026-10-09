@extends('layouts.app')

@section('title', 'View Genre')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-25 d-flex justify-content-between">
                <h3>Genre Detail</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.genres.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i
                            class="bi bi-chevron-double-left"></i> Back</a></a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $genre->name }}</h5>
                    <p><strong>ID:</strong> {{ $genre->id }}</p>
                    <p><strong>Name:</strong> {{ $genre->name }}</p>
                    <p><strong>Slug:</strong> {{ $genre->slug ?? '-' }}</p>
                    <p><strong>Description:</strong> {{ $genre->description ?? '-' }}</p>
                    <p>
                        <div class="form-check form-switch">
                            <label for="">Status</label>
                            <input class="form-check-input" type="checkbox" {{ $genre->status ? 'checked' : '' }} disabled>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
