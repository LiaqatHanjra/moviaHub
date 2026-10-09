<!-- resources/views/admin/cast-crews/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="position-relative z-3 w-50 d-flex justify-content-between">
                <h3>Cast Detail</h3>
                <div class="create_movie_button_container">
                    <a href="{{ route('admin.cast-crews.index') }}"
                        class="btn btn-primary rounded-1 create_movie_button z-3 opacity-100"><i
                            class="bi bi-chevron-double-left"></i> Back</a>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="row">
                    <div class="col-md-4">
                        @if($castCrew->file_url)
                            <img src="{{ getImageUrl($castCrew->file_url) }}" alt="{{ $castCrew->name }}" class="img-fluid mb-3">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h5>{{ $castCrew->name }}</h5>
                        <p><strong>Type:</strong> {{ ucfirst($castCrew->type) }}</p>
                        <p><strong>Designation:</strong> {{ $castCrew->designation ?? 'N/A' }}</p>
                        <p><strong>TMDB ID:</strong> {{ $castCrew->tmdb_id ?? 'N/A' }}</p>
                        <p><strong>Place of Birth:</strong> {{ $castCrew->place_of_birth ?? 'N/A' }}</p>
                        <p><strong>Date of Birth:</strong> {{ $castCrew->dob ? $castCrew->dob->format('d M Y') : 'N/A' }}</p>
                        <p><strong>Biography:</strong> {{ $castCrew->bio ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
