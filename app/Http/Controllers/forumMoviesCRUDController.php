<?php

namespace App\Http\Controllers;
use App\Models\Movies;
use Illuminate\Http\Request;

class forumMoviesCRUDController extends Controller
{
        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['movies'] = Movies::orderBy('id','desc')->paginate(5);
        return view('movies.index', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {                       
        return view('movies.create');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'release' => 'required',
            'time' => 'required',
            'synopsis' => 'required',
            'genre' => 'required',
            'img' => ''
        ]);

        $movie = new Movies;
        $movie -> name = $request -> name;
        $movie -> release = $request -> release;
        $movie -> time = $request -> time;
        $movie -> synopsis = $request -> synopsis;
        $movie -> genre = $request -> genre;
        $movie -> img = $request -> img;
        $movie -> save();
        
        return redirect() -> route('movies.index')
            -> with('success','Movie has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\Movies  $movie
    * @return \Illuminate\Http\Response
    */
    public function show(Movies $movie)
    {
        return view('movies.index', compact('movie'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Movies  $movie
    * @return \Illuminate\Http\Response
    */
    public function edit(Movies $movie)
    {
        return view('movie.edit', compact('movie'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Movies  $movie
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'release' => 'required',
            'time' => 'required',
            'synopsis' => 'required',
            'genre' => 'required',
            'img' => '',
            'likeplus' => '',
            'likemoins' => '',
        ]);

        $movie = Movies::find($id);
        $movie -> name = $request -> name;
        $movie -> release = $request -> release;
        $movie -> time = $request -> time;
        $movie -> synopsis = $request -> synopsis;
        $movie -> genre = $request -> genre;
        $movie -> img = $request -> img;
        $movie -> likeplus = $request -> likeplus;
        $movie -> likemoins = $request -> likemoins;
        $movie -> save();
        
        return redirect() -> route('movies.index')
            -> with('success', 'Movie Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Movies  $movie
    * @return \Illuminate\Http\Response
    */
    public function destroy(Movies $movie)
    {
        $movie->delete();
        return redirect() -> route('movies.index')
            -> with('success', 'Movie has been deleted successfully');
    }
}
