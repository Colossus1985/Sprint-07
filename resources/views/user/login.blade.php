@extends('movies.home')
@section('content')
    <div class = "row mt-5">
        <div class="col-md-6">
            @if(session('success'))
                <p class="alert alert-danger">{{ session('success') }}</p>
            @endif
            @if($errors -> any())
                @foreach ($errors -> all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            @if(session('error'))
                <p class="alert alert-danger">{{ session('error') }}</p>
            @endif
            <form method="POST" action="{{ route('login.action') }}">
                @csrf
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="inputRegister" value="{{ old('inputRegister') }}" 
                    placeholder="Pseudo or E-mail">
                    <label for="floatingName">Pseudo or E-mail</label>
                </div>
                
                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
        
                <button class="btn btn-primary" type="submit">GoGo</button>
                <a class="btn btn-info" href = "{{ route('register') }}">Register</a>
                <a class="btn btn-info" href = "{{ route('home') }}">Back</a>
            </form>
        </div>
    </div>
@endsection