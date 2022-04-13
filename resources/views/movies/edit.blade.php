@extends('movies.home')
@section('content')
        <div class="container mt-5">
            <div class="row pt-4">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Film</h2>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="pull-right">
                            <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a>
                        </div>
                        @auth
                            <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('create') }}">New Movie in detail</a>
                        </div>
                        @endauth
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
@endsection