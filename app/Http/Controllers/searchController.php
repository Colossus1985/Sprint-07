<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Movies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $nameMovie = trim($request -> get('inputDetailMovie'));
        
        $dataMovie['movies'] = Movies::query()
                ->where('name', '=',  $nameMovie)
                ->get();

        $commentsTableName = "post_".$nameMovie;
        
        $dataComments['comments'] = DB::select("SELECT pseudo, comment, created_at 
                                    from $commentsTableName
                                    ORDER BY `created_at` ASC");
                

        return view('movies.detailMovie', $dataMovie, $dataComments);
    }

    public function add_comment(Request $request)
    {
        $request->validate([
            'commentArea' => 'required'
        ]);

        $movieName = trim($request -> get('inputMovieName'));
        $comment = trim($request -> get('commentArea'));
        $pseudo = Auth::user()->pseudo;
        $commentsTableName = "post_".$movieName;
        DB::insert("INSERT INTO $commentsTableName (pseudo, comment) 
                                            VALUES (?, ?)",
                                            [$pseudo, $comment]);

        return redirect()->back();
    }

    
}
