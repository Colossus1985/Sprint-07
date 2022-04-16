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
                <th>id</th>
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
                <td>{{ $movie ->id }}</td>
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
                    <div class="d-flex flex-row">
                    <form class="d-flex flex-fill" action="{{ route('movies.destroy', $movie->id) }}" method="Post"> 
                        <a class="btn btn-primary flex-fill me-2" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                        @csrf 
                        @method('DELETE')                                      
                        <button type="submit" class="btn btn-danger flex_fill" onclick="return confirm('The Movie and all Comments will be deleted');">Delete</button> 
                    </form>
                    </div>
                </td> 
                @endauth
            </tr>
            @endforeach
        </table>
    </div>
        <div class="container mt-5">
            <form action="{{ route('comments.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="floatingTextarea2">Modify your comment here</label>
                <textarea   name="commentArea" 
                            type="text"
                            class="form-control" 
                            id="floatingTextarea2" 
                            maxlength="1000" 
                            style="height: 100px"
                            >{{ $comment->comment }}</textarea>
                <input type="submit" class="btn btn-info" value="Send Changes">
            </form>
        </div>
@endsection