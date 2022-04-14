<?php

namespace App\Http\Controllers;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class forumMoviesCRUDController extends Controller
{
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function home()
    {
        $data['movies'] = Movies::orderBy('id','desc')->paginate(1000);
        return view('movies.mainView', $data);
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
            'img' => '',
        ]);

        $movie = new Movies;
        $movie -> name = $request -> name;
        $movie -> release = $request -> release;
        $movie -> time = $request -> time;
        $movie -> synopsis = $request -> synopsis;
        $movie -> genre = $request -> genre;
        $movie -> img = $request -> img;
        $movie -> likeplus = $request -> likeplus;
        $movie -> likemoins = $request -> likemoins;
        $movie -> save();

        $tableName = "post_".$request -> name;

        Schema::connection('mysql')->create($tableName, function ($table) {
            $table -> id('id');
            $table -> string('pseudo');
            $table -> string('comment');
            $table->rememberToken();
            $table->timestamps();
        });
        
        return redirect()->route('home')
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
        return view('movies.home', compact('movie'));
    } 

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Movies  $movie
    * @return \Illuminate\Http\Response
    */
    // public function edit(Movies $movie)
    // {
    //     return view('movies.edit', compact('movie'));
    // }

    public function edit(Movies $movie)
    {
        return view('movies.edit', compact('movie'));
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
        $oldName = DB::select("
            SELECT name FROM movies WHERE id = :id", ['id' => $id]);
        
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

        $newTableName = "post_".$request -> name;
        $oldTableName = "post_".$oldName[0] -> name;
        Schema::rename($oldTableName, $newTableName);
        
        return redirect() -> route('home')
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
        $tableName = "post_".$movie -> name;
        Schema::connection('mysql')->drop($tableName);

        $movie->delete();
        
        return redirect() -> route('home')
            -> with('success', 'Movie has been deleted successfully');
    }
}
