<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adding new Movies</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>New Movie</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('movies.create') }}"> New Movie</a>
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
                    <th width="280px">Action</th>
                </tr>
                @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie ->name }}</td>
                    <td>{{ $movie ->release }}</td>
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
            {!! $movies -> links() !!}
        </div>
    </body>
</html>