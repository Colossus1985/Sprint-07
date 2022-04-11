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
                        <h2>Edit Film</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('index', $movie) }}" enctype="multipart/form-data"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Movie Name:</strong>
                            <input type="text" name="name" value="{{ $movie->name }}" class="form-control" placeholder="Movie name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Release:</strong>
                            <input type="date" name="release" class="form-control" placeholder="Release" value="{{ $movie->release }}">
                            @error('release')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>time:</strong>
                            <input type="text" name="time" value="{{ $movie->time }}" class="form-control" placeholder="time">
                            @error('time')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Synopsis:</strong>
                            <textarea name="synopsis" rows="10" cols="70" value="{{ $movie->synopsis }}" class="form-control" placeholder="Synopsis"></textarea>
                            @error('synopsis')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Genre:</strong>
                            <input type="text" name="genre" value="{{ $movie->genre }}" class="form-control" placeholder="Genre">
                            @error('genre')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Poster:</strong>
                            <input type="img" name="img" value="{{ $movie->img }}" class="form-control" placeholder="Image">
                            @error('img')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Loved:</strong>
                            <input type="number" name="likeplus" value="{{ $movie->likeplus }}" class="form-control" placeholder="0">
                            @error('likeplus')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Hated:</strong>
                            <input type="text" name="likemoins" value="{{ $movie->likemoins }}" class="form-control" placeholder="0">
                            @error('likemoins')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </form>
        </div>
    </body>
</html>