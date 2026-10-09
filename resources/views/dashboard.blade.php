@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <div class="row g-4 li_animate">
            <div class="col-xl-4 col-lg-4">
                <span class="small">Welcome back!</span>
                <h2 class="fw-bold mb-xl-5 mb-4">Admin Dashboard</h2>
                <div class="d-flex align-items-start">
                    <img class="avatar lg rounded-circle border border-3" src="{{auth()->user()->profile && auth()->user()->profile->image ? auth()->user()->profile->image : asset('backend/assets/images/profile_av.png')}}" alt="avatar">
                    <div class="ms-3">
                        <h4 class="mb-0 text-gradient title-font">Hello, {{auth()->user()->name}}</h4>
                        <span class="text-muted small">{{auth()->user()->email}}</span>
                        {{-- <p class="mb-0 mt-xl-4 mt-3 text-muted small">"Power up your web app with our sleek (Bvite) Bootstrap admin dashboard template.</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8">
                <div id="apex-MyAnalytics" class="apex-extra-none"></div>
            </div>
        </div>
    </div>
</div>
<div class="row g-3">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card p-3 px-4">
            <div>Total Movies</div>
            <div class="py-4 m-0 text-center h2"><span data-purecounter-start="0" data-purecounter-separator="," data-purecounter-end="{{$movies}}" class="purecounter">{{$movies}}</span></div>
            <div class="d-flex">
                <small class="text-muted">This year</small>
                <div class="ms-auto">
                    @if($moviesPercent > 0)
                        <span class="text-success"> {{$moviesPercent}}%</span>
                    @elseif($moviesPercent < 0)
                        <span class="text-danger"> {{$moviesPercent}}%</span>
                    @else
                        <span class="text-muted">0%</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card p-3 px-4">
            <div>Total Tv Shows</div>
                <div class="py-4 m-0 text-center h2"><span data-purecounter-start="0" data-purecounter-separator="," data-purecounter-end="{{$tvShows}}" class="purecounter">{{$tvShows}}</span></div>
            <div class="d-flex">
                <small class="text-muted">This year</small>
                <div class="ms-auto">
                    @if($tvShowsPercent > 0)
                        <span class="text-success"> {{$tvShowsPercent}}%</span>
                    @elseif($tvShowsPercent < 0)
                        <span class="text-danger"> {{$tvShowsPercent}}%</span>
                    @else
                        <span class="text-muted">0%</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card p-3 px-4">
            <div>Total Episodes</div>
            <div class="py-4 m-0 text-center h2"><span data-purecounter-start="0" data-purecounter-separator="," data-purecounter-end="{{$episodes}}" class="purecounter">{{$episodes}}</span>
            </div>
            <div class="d-flex">
                <small class="text-muted">This year</small>
                <div class="ms-auto">
                    @if($episodesPercent > 0)
                        <span class="text-success"> {{$episodesPercent}}%</span>
                    @elseif($episodesPercent < 0)
                        <span class="text-danger"> {{$episodesPercent}}%</span>
                    @else
                        <span class="text-muted">0%</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card p-3 px-4">
            <div>Total Seasons</div>
            <div class="py-4 m-0 text-center h2"><span data-purecounter-start="0" data-purecounter-separator="," data-purecounter-end="{{$seasons}}" class="purecounter">{{$seasons}}</span>
            </div>
            <div class="d-flex">
                <small class="text-muted">This year</small>
                <div class="ms-auto">
                    @if($seasonsPercent > 0)
                        <span class="text-success"> {{$seasonsPercent}}%</span>
                    @elseif($seasonsPercent < 0)
                        <span class="text-danger"> {{$seasonsPercent}}%</span>
                    @else
                        <span class="text-muted">0%</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-8 col-xl-7 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Sales Analytics</h6>
                <div class="dropdown card-action">
                    <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full Screen">
                        <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 16m0 1a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1z"></path>
                            <path d="M4 12v-6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-6"></path>
                            <path d="M12 8h4v4"></path>
                            <path d="M16 8l-5 5"></path>
                        </svg>
                    </a>
                    <a href="#" class="dropdown-toggle after-none" data-bs-toggle="dropdown" aria-expanded="false" title="More Action">
                        <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"> </path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M8 12l0 .01"></path>
                            <path d="M12 12l0 .01"></path>
                            <path d="M16 12l0 .01"></path>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow rounded-4 p-2">
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-share"></i>Share</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-pencil"></i>Rename</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-link"></i>Copy Link Address</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-folder"></i>Move to</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-copy"></i>Copy to</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-edit"></i>Make Private</a>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill"><i class="me-2 fa fa-download"></i>Download</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item rounded-pill card-options-remove" data-toggle="card-remove"><i class="me-2 fa fa-trash"></i>Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="apex-SalesAnalytics"></div>
            </div>
        </div>
    </div>
</div>
@endsection
