<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\likes;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class forumMoviesCRUDController extends Controller
{
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    // public function home()
    // {
    //     $data['movies'] = Movies::orderBy('id','desc')->paginate(1000);
    //     return view('movies.mainView', $data);
    // }
    public function home($genre = 'all')
    {
        if ($genre == 'all') 
        {
            $data['movies'] = Movies::orderBy('id','desc')->paginate(1000);
            return view('movies.mainView', $data);
        } else {
            $data['movies'] = Movies::query()
                ->where('genre', '=', $genre)
                ->orderBy('id','desc')
                ->get();
            return view('movies.mainView', $data);
        }
        
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
        
        return redirect() -> route('home')
            -> with('success', 'Movie Has Been updated successfully');
    }
    public function updateLikePlus(Request $request, $id)
    {
        $checkLike = DB::table('likes')
            ->where('pseudo', '=', Auth::user()->pseudo)
            ->where('id_movie', '=', $id)
            ->where('likeplus', '=', 1)
            ->get();
            
        if (count($checkLike) > 0) {
            return redirect() -> back()
                ->with('success', 'You\'ve already liked this movie.');
        }

        $likesPlusOld = trim($request->get('likePlusOld'));
        $likesPlusNew = $likesPlusOld + 1;

        DB::table('movies')
            ->where('id', '=', $id)
            ->update(['likeplus' => $likesPlusNew]);

        return redirect() -> back();
    }
    public function updateLikeMoins(Request $request, $id)
    {
        $likesMoinsOld = trim($request->get('likeMoinsOld'));
        $likesMoinsNew = $likesMoinsOld + 1;

        DB::table('movies')
            ->where('id', '=', $id)
            ->update(['likemoins' => $likesMoinsNew]);

        return redirect() -> back();
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

        DB::table('comments')->where('id_movie', '=', $movie->id)->delete();
    
        return redirect() -> route('home')
            -> with('success', 'Movie has been deleted successfully');
    }
}
