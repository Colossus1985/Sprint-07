@extends('movies.home')
@section('content')
        <div class="container">
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
                    </div>
                    <div class = "form-group d-flex flex-column flex-wrap">
                        <strong>Genre:</strong>
                        <div class="d-flex flex-row flex-wrap flex-fill">
                            <div class = "flex-fill">
                                <input type="radio" name = "genre" value="Action" class="btn-check" id="btn-check-outlined-Action" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined-Action">Action</label><br>
                            </div> 
                            <div class = "flex-fill">
                                <input type="radio" name = "genre" value="Scienc-Fiction" class="btn-check" id="btn-check-outlined-Scienc-Fiction" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined-Scienc-Fiction">Scienc-Fiction</label><br>
                            </div> 
                            <div class = "flex-fill">
                                <input type="radio" name = "genre" value="Fantasy" class="btn-check" id="btn-check-outlined-Fantasy" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined-Fantasy">Fantasy</label><br>
                            </div> 
                            <div class = "flex-fill">
                                <input type="radio" name = "genre" value="Romance" class="btn-check" id="btn-check-outlined-Romance" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined-Romance">Romance</label><br>
                            </div> 
                            <div class = "flex-fill">
                                <input type="radio" name = "genre" value="Comedy" class="btn-check" id="btn-check-outlined-Comedy" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined-Comedy">Comedy</label><br>
                            </div> 
                             <div class = "flex-fill">
                                <input type="radio" name = "genre" value="Docu" class="btn-check" id="btn-check-outlined-Docu" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined-Docu">Docu</label><br>
                            </div> 
                            @error('genre')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Synopsis:</strong>
                            <textarea name="synopsis" rows="7" cols="20" class="form-control" placeholder="Synopsis"></textarea>
                            @error('synopsis')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group">
                            <strong>Poster:</strong>
                            <input type="file" name="img" class="" id="images" multiple="multiple">
                            @error('img')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                    </div> --}}
                    <div class="d-flex flex-row justify-content-between">
                        <div class="flex-fill me-2">
                            <div class="form-group ">
                                <strong>Loved:</strong>
                                <input type="text" name="likeplus" class="form-control" value = "0" readonly>
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
                                <input type="text" name="likemoins" class="form-control" value = "0" readonly>
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