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
                    <a class="btn btn-primary" href="{{ route('viewCaroussel') }}" enctype="multipart/form-data">Back Caroussel</a>
                </div>
                <div class="pull-right me-2">
                    <a class="btn btn-success" href="{{ route('create') }}">Add New Movie</a>
                </div>
                <div class="me-2">
                    <a class="btn btn-primary" href="{{ route('users') }}">Users</a>
                </div>
                @endif
                @endauth
                <div class="d-flex flex-row flex-wrap">
                    <form class="me-2 mb-2" action="{{ route('filterMovie', 'name') }}" method="GET">
                        <input class="visually-hidden" name="inputDirectFilter" value="asc" readonly>
                        <input class="visually-hidden" name="inputGenre" value="{{ $genre }}" readonly>
                        <button type="submit" class="btn btn-dark">Name A-Z</button>
                    </form>
                    <form class="me-2 mb-2" action="{{ route('filterMovie', 'name') }}" method="GET">
                        <input class="visually-hidden" name="inputDirectFilter" value="desc" readonly>
                        <input class="visually-hidden" name="inputGenre" value="{{ $genre }}" readonly>
                        <button type="submit" class="btn btn-dark" value="">Name Z-A</button>
                    </form>
                    <form class="me-2 mb-2" action="{{ route('filterMovie', 'release') }}" method="GET">
                        <input class="visually-hidden" name="inputDirectFilter" value="desc" readonly>
                        <input class="visually-hidden" name="inputGenre" value="{{ $genre }}" readonly>
                        <button name="new-old" type="submit" class="btn btn-dark" value="">Release new-old</button>
                    </form>
                    <form class="me-2 mb-2" action="{{ route('filterMovie', 'release') }}" method="GET">
                        <input class="visually-hidden" name="inputDirectFilter" value="asc" readonly>
                        <input class="visually-hidden" name="inputGenre" value="{{ $genre }}" readonly>
                        <button name="old-new" type="submit" class="btn btn-dark" value="">Release old-new</button>
                    </form>
                    <form class="me-2 mb-2" action="{{ route('filterMovie', 'likeplus') }}" method="GET">
                        <input class="visually-hidden" name="inputDirectFilter" value="desc" readonly>
                        <input class="visually-hidden" name="inputGenre" value="{{ $genre }}" readonly>
                        <button name="likePlus" type="submit" class="btn btn-dark" value="">Like +</button>
                    </form>
                    <form class="me-2 mb-2" action="{{ route('filterMovie', 'likemoins') }}" method="GET">
                        <input class="visually-hidden" name="inputDirectFilter" value="desc" readonly>
                        <input class="visually-hidden" name="inputGenre" value="{{ $genre }}" readonly>
                        <button name="likeMoins" type="submit" class="btn btn-dark" value="">Like -</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- <div class="alert alert-success">
        <p>ici:[{{ $genre }}]</p>
    </div> --}}

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Release</th>
            <th>Time</th>
            <th>Synopsis</th>
            <th>Genre</th>
            <th>Poster</th>
            <th>+ likes</th>
            <th>- likes</th>
            @auth
            @if (Auth::user()->admin == true)
            <th width="280px">Action</th>
            @endauth
            @endif

        </tr>
        @if (count($movies) == 0)
        <div>
            <p class="alert alert-danger">Sorry there are no movis at this kind yet</p>
        </div>
        @endif

        {{--
        <pre>
                <?php
                    print_r($movies);
                ?>
            </pre> --}}

        @foreach ($movies as $movie)
        <tr>
            <td>
                <form action="{{ route('detailMovie') }}" method="get">
                    <input type="text" class="visually-hidden" name="inputMovieId" value="{{ $movie->id }}" readonly>
                    <input type="submit" class="form-control me-2 btn btn-info" name="inputDetailMovie"
                        value="{{ $movie->name }}" readonly>
                </form>
            </td>
            <td class="text-nowrap">{{ $movie ->release }}</td>
            <td>{{ $movie ->time }}</td>
            <td>{{ $movie ->synopsis }}</td>
            <td>{{ $movie ->genre }}</td>
            <td>
                <img src="{{ Storage::url($movie->img) }}" alt="Image de film" width="200px" height="200px"></td>
            <td class="">
                {{ $movie ->likeplus }}
                @auth
                    <form class="ms-3" action="{{ route('updateLikePlus', $movie->id) }}" method="GET">
                        <input class="visually-hidden" name="inputLikes" value="{{ Auth::user()->likes }}">
                        <input class="visually-hidden" name="likePlusOld" value="{{ $movie ->likeplus }}" readonly>
                        <button class="btn" tupe="submit" name="likePlus" readonly>👍</button>
                    </form>
                 @endauth
                @guest
                    <p>👍</p>
                @endguest
            </td>
            <td class="">
                {{ $movie ->likemoins }}
                @auth
                    <form class="ms-3" action="{{ route('updateLikeMoins', $movie->id) }}" method="GET">
                        <input class="visually-hidden" name="inputLikes" value="{{ Auth::user()->likes }}">
                        <input class="visually-hidden" name="likeMoinsOld" value="{{ $movie ->likemoins }}" readonly>
                        <button class="btn" type="submit" name="likeMoins" readonly>👎</button>
                     </form>
                @endauth
                @guest
                    <p>👎</p>
                @endguest
            </td>
            @auth
            @if (Auth::user()->admin == true)
            <td>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">Modify</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('The Movie and all Comments will be deleted');">Delete</button>
                </form>
            </td>
            @endif
            @endauth
        </tr>
        @endforeach
    </table>
</div>
@endsection