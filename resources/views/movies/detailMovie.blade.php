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
                        <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('create') }}">Add new Movie</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
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
                    <th width="280px">Action</th>
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
                <td>{{ $movie ->likeplus }}</td>
                <td>{{ $movie ->likemoins }}</td>
                @auth
                   <td>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="Post"> 
                        <a class="btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger" onclick="return confirm('The Movie and all Comments will be deleted');">Delete</button> 
                    </form>
                </td> 
                @endauth
            </tr>
            @endforeach
        </table>
    </div>
    <div>
        <h3>Comments</h3>
        @auth
           <div class="form-floating">
                <form action="{{ route('add.comment', $movie->name) }}">
                    <input type="text" name="inputMovieName" class="visually-hidden" value="{{ $movie->name }}" readonly>
                    <textarea name="commentArea" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Leave a comment here</label>
                    <input type="submit" class="btn btn-info" value="Send Comment">
                </form>
            </div> 
        @endauth
        @guest
            <div class="form-floating">
                <p>To let a comment, please login!</p>
            </div>
        @endguest
        
        <div class="container-fluide">
            @foreach ($comments as $comment)
                <div class="container-fluide">
                    <p>{{ $comment->comment }}</p>
                </div>
                <div class="container-fluide">
                    <p>{{ $comment->created_at }}</p>
                </div>
                <div class="container-fluid">
                    <p>{{ $comment->pseudo }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection