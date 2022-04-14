@extends('movies.home')
@section('content')
        <div class="container mt-5">
            <div class="row pt-4">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add Film</h2>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="pull-right">
                            <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                                @error('name')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="flex-fill me-2">
                            <div class="form-group">
                                <strong>Realease Date:</strong>
                                <input type="date" name="release" class="form-control" placeholder="Release">
                                    @error('release')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-fill mx-2">
                            <div class="form-group">
                                <strong>Time:</strong>
                                <input type="text" name="time" class="form-control" placeholder="Time">
                                @error('time')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-fill ms-2">
                            <div class="form-group">
                                <strong>Genre:</strong>
                                <input type="text" name="genre" class="form-control" placeholder="Genre">
                                @error('genre')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Synopsis:</strong>
                            <textarea name="synopsis" rows="10" cols="70" class="form-control" placeholder="Synopsis"></textarea>
                            @error('synopsis')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Poster:</strong>
                            <input type="img" name="img" class="form-control" placeholder="img">
                            @error('img')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="flex-fill me-2">
                            <div class="form-group ">
                                <strong>Loved:</strong>
                                <input type="text" name="likeplus" class="form-control" value = "0">
                                @error('likeplus')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-fill mx-2">
                            <div class="form-group">
                                <strong>Hated:</strong>
                                <input type="text" name="likemoins" class="form-control" value = "0">
                                @error('likemoins')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-fill mt-4 ms-2">
                            <div class="form-group">
                                <div class="">
                                    <input type="submit" class="form-control btn btn-primary" value = Submit>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection