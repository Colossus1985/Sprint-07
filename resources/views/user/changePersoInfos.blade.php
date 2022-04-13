@extends('movies.home')
@section('content')
    <div class = "row mt-5">
        <div class="col-md-6">
            @if(session('success'))
                <p class = "alert alert-success">{{ session('success') }}</p>
            @endif
            @if($errors -> any())
                @foreach ($errors -> all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ route('changePersoInfos.action') }}">
                @csrf
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="firstName" value="{{ Auth::user() ->firstName }}">
                    <label for="floatingName">First Name</label>
                </div>
        
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="lastName" value="{{ Auth::user() ->lastName }}" >
                    <label for="floatingName">Last Name</label>
                </div>
        
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="pseudo" value="{{ Auth::user() ->pseudo }}">
                    <label for="floatingName">Pseudo</label>
                </div>
                
                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" value="{{ Auth::user() ->email }}" >
                    <label for="floatingEmail">Email address</label>
                </div>
                
                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="old_password" placeholder="Password">
                    <label for="floatingPassword">actuel Password</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="new_password" placeholder="Password">
                    <label for="floatingPassword">new Password</label>
                </div>
        
                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm Password">
                    <label for="floatingConfirmPassword">Confirm new Password</label>
                </div>
        
                <button class="btn btn-primary" type="submit">Go Changes</button>
                {{-- <a class="btn btn-info" href = "#">Login</a> --}}
                <a class="btn btn-info" href = "{{ route('home') }}">Back</a>
            </form>
        </div>
    </div>
@endsection