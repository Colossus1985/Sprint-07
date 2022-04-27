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


    {{-- @foreach ($movies as $movie) --}}

    <div class="container">
        <input type="radio" name="slider" id="item-1" checked>
        {{ $index=2 }}
        @foreach ($movies as $movie )
        <input type="radio" name="slider" id="item-{{ $index }}">
        {{ $index=$index+1 }}
        @endforeach
        {{-- <input type="radio" name="slider" id="item-2">
        <input type="radio" name="slider" id="item-3"> --}}
        <div class="cards">

            {{ $index=1 }}
            @foreach ($movies as $movie)
            <label class="card" for="item-{{ $index }}" id="song-{{ $index }}">

                <img src="{{ Storage::url($movie->img) }}" alt="song">

            </label>
            {{ $index=$index+1 }}
            @endforeach






        </div>
        {{-- <div class="player">
            <div class="upper-part">
                <div class="play-icon">
                    <svg width="20" height="20" fill="#2992dc" stroke="#2992dc" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" class="feather feather-play" viewBox="0 0 24 24">
                        <defs /> --}}
                        {{--
                        <path d="M5 3l14 9-14 9V3z" /> --}}
                        {{--
                    </svg>
                </div>

                <div class="info-area" id="test">
                    <label class="song-info" id="song-info-1">

                        <div class="title">{{ $movie->name }}</div>
                        <div class="sub-line">
                            <div class="time">{{ $movie->time }}</div>

                        </div>
                    </label>

                </div>

            </div>

        </div> --}}
    </div>
    <<<<<<< HEAD======={{-- <img src="{{ Storage::url($movie->img) }}" alt="Image de film" width="200px" height="200px">
        --}}

        >>>>>>> 71bfe90 (mise a jour carousel)
</div>
@endsection