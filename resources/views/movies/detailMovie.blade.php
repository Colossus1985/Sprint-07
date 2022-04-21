@extends('movies.home')
@section('content')
    <div class="container mt-5">
        <div class="row pt-4">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Movie</h2>
                </div>
                <div class="d-flex flex-row">
                    <div class="pull-right">
                        <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                    @auth
                        @if (Auth::user()->admin == true)
                            <div class="pull-right mb-2">
                                <a class="btn btn-success" href="{{ route('create') }}">Add New Movie</a>
                            </div>
                            <div class="ms-3">
                                <a class="btn btn-primary" href="{{ route('users') }}">Users</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message != null || $message !='')
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
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
                    @endif
                @endauth
            </tr>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie ->name }}</td>
                <td class="text-nowrap">{{ $movie ->release }}</td>
                <td>{{ $movie ->time }}</td>
                <td>{{ $movie ->synopsis }}</td>
                <td>{{ $movie ->genre }}</td>
                <td>{{ $movie ->img }}</td>
                <td class="">
                    {{ $movie ->likeplus }}
                    <form class="ms-3" action="{{ route('updateLikePlusDetailMovie', $movie->id) }}" method="GET">
                        <input class="visually-hidden" name="likePlusOld" value="{{ $movie ->likeplus }}" readonly>
                        @guest
                            <p>👍</p>
                        @endguest
                        @auth
                            <button class="btn" tupe="submit" name="likePlus" readonly>👍</button>
                        @endauth 
                    </form>
                </td>
                <td class="">
                    {{ $movie ->likemoins }}
                    <form class="ms-3" action="{{ route('updateLikeMoinsDetailMovie', $movie->id) }}" method="GET">
                        <input class="visually-hidden" name="likeMoinsOld" value="{{ $movie ->likemoins }}" readonly>
                        @guest
                            <p>👎</p>
                        @endguest
                        @auth
                           <button class="btn"  type="submit" name="likeMoins" readonly>👎</button>
                        @endauth
                    </form>
                </td>
                @auth
                    @if (Auth::user()->admin == true)
                        <td>
                            <div class="d-flex flex-row">
                            <form class="d-flex flex-fill" action="{{ route('movies.destroy', $movie->id) }}" method="Post"> 
                                <a class="btn btn-primary flex-fill me-2" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                                @csrf 
                                @method('DELETE')                                      
                                <button type="submit" class="btn btn-danger flex_fill" onclick="return confirm('The Movie and all Comments will be deleted');">Delete</button> 
                            </form>
                            </div>
                        </td> 
                    @endif
                @endauth
            </tr>
            @endforeach
        </table>
    </div>
    <div>@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <h3>Comments</h3>
        @auth
            <div class="form-floating">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="text" name="inputMovieName" class="visually-hidden" value="{{ $movie->name }}" readonly>
                    <input type="text" name="inputMovieId" class="visually-hidden" value="{{ $movie->id }}" readonly>
                    <input type="text" name="inputPseudo" class="visually-hidden" value="{{ Auth::user()->pseudo }}" readonly>
                    <div class="form-group form-floating mb-3">
                        <textarea type="text" name="commentArea" class="form-control" id="floatingName" maxlength="1000" style="height: 100px"></textarea>
                        <label for="floatingName">Leave a comment here</label>
                    </div>
                    <button type="submit" class="form-control btn btn-info">Send Comment</button>
                </form>
            </div>  
        @endauth
        @guest
            <div class="form-floating">
                <p>To let a comment, please login!</p>
            </div>
        @endguest
        @foreach ($comments as $comment)
            <div class="d-flex flex-column border border-3 rounded my-1 px-2 pb-2">
                <div class="d-flex flex-row justify-content-end">
                    <div class="flex-fill">
                        <p class="mb-0 fw-lighter ">{{ \Carbon\Carbon::parse($comment->created_at)->locale('nl')->format('d/m/Y H:i:s') }}</p>
                    </div>
                    <div class="flex-fill">
                        <p class="mb-0 fw-lighter">{{ $comment->pseudo }}</p>
                    </div>
                    <div class="flex-fill">
                        <p class="mb-0 fw-lighter">status</p>
                    </div>
                    <div class="flex-fill">
                        <p class="mb-0 fw-lighter">nb likes</p>
                    </div>
                    <div class="flex-fill">
                        <p class="mb-0 fw-lighter">nb comments</p>
                    </div>
                    
                </div>
                <div class="d-flex">
                    <p class="overflow-hidden">{{ $comment->comment }}</p>
                </div>
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row">
                        <form class="ms-3" action="{{ route('updateLikePlusComment', $comment->id) }}" method="GET">
                            <input class="visually-hidden" name="likePlusOld" value="{{ $comment ->likeplus }}" readonly>
                            <input class="visually-hidden" name="inputIdMovie" value="{{ $movie->id }}" readonly>
                            @guest
                                <p>👍</p>
                            @endguest
                            @auth
                                <button class="btn"  type="submit" name="likeMoins" readonly>👍</button>
                            @endauth
                        </form>
                        <p class="mb-0 fw-lighter">{{ $comment->likeplus }}</p>
                    </div>
                    <div class="d-flex flex-row">
                        <form class="ms-3" action="{{ route('updateLikeMoinsComment', $comment->id) }}" method="GET">
                            <input class="visually-hidden" name="likeMoinsOld" value="{{ $comment ->likemoins }}" readonly>
                            <input class="visually-hidden" name="inputIdMovie" value="{{ $movie->id }}" readonly>
                            @guest
                                <p>👎</p>
                            @endguest
                            @auth
                                <button class="btn"  type="submit" name="likeMoins" readonly>👎</button>
                            @endauth
                        </form>
                        <p class="mb-0 fw-lighter">{{ $comment->likemoins }}</p>
                    </div>
                </div>
                
                @auth
                    @if (Auth::user()->pseudo == $comment->pseudo || Auth::user()->admin == true )
                        <div class="d-flex flex-row justify-content-end">
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"> 
                                <input class="visually-hidden" name="inputNameMovie" value="{{ $movie->name }}">
                                <input class="visually-hidden" name="inputIdComment" value="{{ $comment->id }}">
                                @if (Auth::user()->pseudo == $comment->pseudo)
                                    <a class="btn btn-primary" href="{{ route('comments.edit', $comment->id, $movie->id) }}">Modify</a>
                                @endif
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('The Comment will be deleted');">Delete</button> 
                            </form>
                        </div> 
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@endsection