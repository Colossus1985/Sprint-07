@extends('movies.detailMovie')
@section('content')
        <div class="container mt-5">
            <form action="{{ route('comments.update', $comment->id) }}">
                @csrf
                <textarea   name="commentArea" 
                            class="form-control" 
                            id="floatingTextarea2" 
                            maxlength="1000" 
                            style="height: 100px"
                            value="{{ $comment->comment }}"></textarea>
                <label for="floatingTextarea2">Modify your comment here</label>
                <input type="submit" class="btn btn-info" value="Send Changes">
            </form>
        </div>
@endsection