@extends('movies.home')
@section('content')

<div class="containerCaroussel mt-4">
	<div id="carousel">
        @foreach ($movies as $movie)
            <figure class="mt-5 ">
                <a href="{{ route('detailMovie', $movie->id, $movie->name) }}">
                    <img type="submit" class="imgCaroussel rounded-3" src="{{ Storage::url($movie->img) }}" style="width: :13rem; height:18rem" alt="">
                </a>
                </figure>
		
        @endforeach
	</div>
</div>


{{-- <img src="{{ Storage::url($movie->img) }}" alt="Image de film" width="200px" height="200px"> --}}

</div>
@endsection