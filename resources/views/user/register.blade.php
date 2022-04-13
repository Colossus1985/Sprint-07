@extends('movies.home')
@section('content')
    <div class = "row mt-5">
        <div class="col-md-6">
            @if($errors -> any())
                @foreach ($errors -> all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ route('register.action') }}">
                @csrf
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    <label for="floatingName">First Name</label>
                </div>
        
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" placeholder="Last name">
                    <label for="floatingName">Last Name</label>
                </div>
        
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" placeholder="Pseudo">
                    <label for="floatingName">Pseudo</label>
                </div>
                
                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                    <label for="floatingEmail">Email address</label>
                </div>
                
                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
        
                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    <label for="floatingConfirmPassword">Confirm Password</label>
                </div>
        
                <button class="btn btn-primary" type="submit">GoGo</button>
                <a class="btn btn-info" href = "#">Login</a>
                <a class="btn btn-info" href = "{{ route('home') }}">Back</a>
            </form>
        </div>
    </div>
@endsection