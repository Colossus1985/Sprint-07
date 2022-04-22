<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Movies;
use Illuminate\Support\Facades\DB;


class commentsCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'commentArea' => 'required',
            'inputMovieId' => 'required',
            'inputMovieName' => 'required',
            'inputPseudo' => 'required',
        ]);

        $pseudo = $request->inputPseudo; 

        $comment = new Comments;
        $comment -> id_movie = $request -> inputMovieId;
        $comment -> name_movie = $request -> inputMovieName;
        $comment -> pseudo = $pseudo;
        $comment -> comment = $request -> commentArea;
        $comment -> likeplus = 0;
        $comment -> likemoins = 0;
        $comment -> save();

        $nb_commentsOld = trim($request->get('inputNbComments'));
        $nb_commentsNew = (int)$nb_commentsOld + 1;
        
        DB::table('users')
            ->where('pseudo', '=', $pseudo)
            ->update(['comments' => $nb_commentsNew]);

        $dataMovie['movies'] = Movies::query()
                ->where('id', '=', $request->inputMovieId)
                ->get();
        
        // $dataComments['comments'] = Comments::query()
        //         ->where('id_movie', '=', $request->inputMovieId)
        //         ->get();
        $dataComments['comments'] = Comments::rightJoin('users', 'comments.pseudo', '=', 'users.pseudo')
                ->select('comments.*', 'users.likes', 'users.admin', 'users.comments')
                ->where('comments.id_movie', '=', $comment->id_movie)
                ->get();
                
        return view('movies.detailMovie', $dataMovie, $dataComments);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comment)
    {
        $dataMovie['movies'] = Movies::query()
                ->where('id', '=', $comment->id_movie)
                ->get();
        
        return view('movies.editComment', compact('comment'), $dataMovie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'commentArea' => 'required'
        ]);

        $comment = Comments::find($id);
        $comment -> comment = $request -> commentArea;
        $comment -> save();

        $dataMovie['movies'] = Movies::query()
                ->where('id', '=', $comment->id_movie)
                ->get();
        
        // $dataComments['comments'] = Comments::query()
        //         ->where('id_movie', '=', $comment->id_movie)
        //         ->get();
                
        $dataComments['comments'] = Comments::rightJoin('users', 'comments.pseudo', '=', 'users.pseudo')
                ->select('comments.*', 'users.likes', 'users.admin', 'users.comments')
                ->where('comments.id_movie', '=', $comment->id_movie)
                ->get();
                
        return view('movies.detailMovie', $dataMovie, $dataComments);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Comments  $comment
    * @return \Illuminate\Http\Response
    */
    public function destroy(Comments $comment)
    {
        $comment->delete();
        
        $dataMovie['movies'] = Movies::query()
                ->where('id', '=', $comment->id_movie)
                ->get();
        
        // $dataComments['comments'] = Comments::query()
        //         ->where('id_movie', '=', $comment->id_movie)
        //         ->get();
        $dataComments['comments'] = Comments::rightJoin('users', 'comments.pseudo', '=', 'users.pseudo')
                ->select('comments.*', 'users.likes', 'users.admin', 'users.comments')
                ->where('comments.id_movie', '=', $comment->id_movie)
                ->get();
                
        return view('movies.detailMovie', $dataMovie, $dataComments);
        // return redirect()->back();
    }
}
