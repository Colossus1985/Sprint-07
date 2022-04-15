@extends('movies.home')
@section('content')
    <div class="container mt-5">
        <div class="row pt-4">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>The Movie Show</h2>
                </div>
                <div class="d-flex flex-row">
                    <div class="pull-right">
                        <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                    @auth
                        <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('create') }}">Add New Movie</a>
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
                <td>
                    <form action="{{ route('detailMovie') }}" method="get">
                        <input type="text" class="visually-hidden" 
                                name="inputMovieId"
                                value = "{{ $movie->id }}" readonly>
                        <input type="submit" class="form-control me-2 btn btn-info"  
                                name="inputDetailMovie" 
                                value = "{{ $movie->name }}" readonly>
                    </form>
                </td>
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
                        <a class="btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">Modify</a>
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
@endsection