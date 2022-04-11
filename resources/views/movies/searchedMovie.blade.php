<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Film Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous"
        />
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"
        ></script>
    </head>
    <body>
        @include('composants.navbar')
        <div class="container mt-5">
            <div class="row pt-4">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>New Movie</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('index') }}">Back</a>
                    </div>
                </div>
            </div>
            {{-- <form class="d-flex" action="/search" method="Get" role="search">
                @csrf
                <div class="input-group">
                    <input class="form-control me-2" name="inputSearchMovie" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success ms-2" type="submit">🔎</button>
                </div>
            </form> --}}
            {{-- <a class = "btn btn-outline-success ms-2" href = "{{ route('searchback') }}">go back</a> --}}
            <h1>dans test.blade</h1>
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
                        <form action="{{ route('movies.destroy',$movie->id) }}" method="Post"> 
                            <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Edit</a> 
                            @csrf 
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger">Delete</button> 
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{-- {!! $movies -> links() !!} --}}
        </div>
    </body>
</html>