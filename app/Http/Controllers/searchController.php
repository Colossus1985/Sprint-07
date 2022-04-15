<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\comments;
use Illuminate\Http\Request;

class searchController extends Controller
{
       /**
    * Display a listing of one resource searched.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */          
    public function search(Request $request)
    // public function search()
    {
        $movieSearched = trim($request -> get('inputSearchMovie'));
        $data['movies'] = Movies::query()
                ->where('name', 'like', "%{$movieSearched}%")
                ->orWhere('synopsis', 'like', "%{$movieSearched}%")
                ->orderBy('created_at', 'desc')
                ->get();

        return view('movies.mainView', $data);
    }
    public function searchback()
    {
        return view('movies.home');
    }

    /**
    * Display one movie by id.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */ 
    public function detailMovie(Request $request)
    {
          
        $id_movie = trim($request -> get('inputMovieId'));
        $nameMovie = trim($request -> get('inputDetailMovie'));
        
        $dataMovie['movies'] = Movies::query()
                ->where('name', '=',  $nameMovie)
                ->get();

        $dataComments['comments'] = Comments::query()
                ->where('id_movie', '=', $id_movie)
                ->get();

        return view('movies.detailMovie', $dataMovie, $dataComments);
    }
}
