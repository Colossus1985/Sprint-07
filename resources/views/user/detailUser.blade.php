@extends('movies.home')
@section('content')
        <div class="container mt-5">
            <div class="row pt-4">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit User Status</h2>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="pull-right">
                            <a class="btn btn-primary me-3" href="{{ route('users') }}" enctype="multipart/form-data"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Pseudo:</strong>
                            <p>{{ $user->pseudo }}</p>
                        </div>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Registered:</strong>
                            <p>{{ \Carbon\Carbon::parse($user->created_at)->locale('nl')->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>E-mail:</strong>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <p>{{ $user->firstName }}</p>
                         </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <p>{{ $user->lastName }}</p>
                         </div>
                    </div>
                    <div class = "d-flex flex-row flex-wrap">
                        <div class = "px-5 py-1 my-1">
                               <p class = "fs-2">♟️<input name = "admin" type = "radio" value = 0 
                                @if ($user->admin == 0) checked @endif></p>
                        </div> 
                        <div class = "px-5 py-1 my-1"> 
                               <p class = "fs-2">👑<input name = "admin" type = "radio" value = 1
                                @if ($user->admin == 1) checked @endif></p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </form>
        </div>
@endsection