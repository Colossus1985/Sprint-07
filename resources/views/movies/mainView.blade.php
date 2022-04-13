@extends('movies.home')
@section('content')
    <div class="container mt-5">
        <div class="row pt-4">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Movie</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('create') }}"> New Movie</a>
                </div>
            </div>
        </div>
        <form class="d-flex mb-4" action="{{ route('search') }}" method="GET">
            @csrf
            <div class="input-group">
                <input class="form-control me-2" name="inputSearchMovie" placeholder="Search..." aria-label="Search...">
                <button class="btn btn-outline-success ms-2" type="submit">🔎</button>
            </div>
        </form>
        
        {{-- <a class = "btn btn-outline-success ms-2" href = "{{ route('search') }}">test</a> --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Release</th>
                <th>Time</th>
                <th>Synopsis</th>
                <th>Genre</th>
                <th>Poster</th>
                <th>+ likes</th>
                <th>- likes</th>
                <th width="280px">Action</th>
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
                <td>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="Post"> 
                        <a class="btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger">Delete</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection