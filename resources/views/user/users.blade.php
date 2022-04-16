@extends('movies.home')
@section('content')
    <div class="container mt-5">
        <div class="row pt-4">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>User List</h2>
                </div>
                <div class="d-flex flex-row">
                    <div class="pull-right">
                        <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                </div>
            </div>
            <div>
                <form class="d-flex me-5" action="{{ route('searchUser') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input class="form-control me-2" name="inputSearchMovie" placeholder="Search..." aria-label="Search...">
                        <button class="btn btn-outline-success ms-2" type="submit">🔎</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Pseudo</th>
                <th>E-mail</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Admin</th>
                <th>Id</th>
                <th width="280px">Action</th> 
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>
                    <form action="{{ route('detailMovie') }}" method="get">
                        <input type="text" class="visually-hidden" 
                                name="inputMovieId"
                                value = "{{ $user->id }}" readonly>
                        <input type="submit" class="form-control me-2 btn btn-info"  
                                name="inputDetailMovie" 
                                value = "{{ $user->pseudo }}" readonly>
                    </form>
                </td>
                <td>{{ $user ->release }}</td>
                <td>{{ $user ->email }}</td>
                <td>{{ $user ->firstName }}</td>
                <td>{{ $user ->lastName }}</td>
                <td>{{ $user ->admin }}</td>
                <td>
                    <form action="{{ route('movies.destroy', $user->id) }}" method="Post"> 
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger" onclick="return confirm('The Movie and all Comments will be deleted');">Delete</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection