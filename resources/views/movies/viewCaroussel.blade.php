@extends('movies.home')
@section('content')
<div class="container mt-5">
    <div class="row pt-4">
        <div class="mb-3 d-flex flex-column">
            <div class="text-nowrap">
                <h2>The Movie Show</h2>
            </div>
            <div class="d-flex flex-row text-nowrap">
                @auth
                    @if (Auth::user()->admin == true)
                        <div class="pull-right me-2">
                            <a class="btn btn-primary" href="{{ route('home') }}" enctype="multipart/form-data">List Movies</a>
                        </div>
                        <div class="pull-right me-2">
                            <a class="btn btn-success" href="{{ route('create') }}">Add New Movie</a>
                        </div>
                        <div class="me-2">
                            <a class="btn btn-primary" href="{{ route('users') }}">List Users</a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <div class="">
        <span style="float:left" class="ss-icon" onclick="galleryspin('-')">&lt;</span>
        <div id="carousel" class="d-flex flex row">
            <figure id="spinner">
            @foreach ( $movies as $movie )
                <img src="{{ Storage::url($movie->img) }}" alt>
            @endforeach
            </figure>
        </div>
        <span style="float:right" class="ss-icon" onclick="galleryspin('')">&gt;</span>
           {{-- <img src="{{ Storage::url($movie->img) }}" alt="Image de film" width="200px" height="200px"> --}}
    </div>
</div>
@endsection