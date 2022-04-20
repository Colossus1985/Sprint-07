<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Comments;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class likeController extends Controller
{
    public function updateLikePlusComment(Request $request, $id_comment)
    {
    $id_movie = trim($request->get('inputIdMovie'));
    $dataMovie['movies'] = Movies::query()
                ->where('id', '=', $id_movie)
                ->get();
        
    $dataComments['comments'] = Comments::query()
                ->where('id_movie', '=', $id_movie)
                ->get();

    $checkLike = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_comment', '=', $id_comment)
        ->where('likeplus', '=', true)
        ->get();
        
    if (count($checkLike) > 0) {
        $message = 'You\'ve already liked this movie.';
        return view('movies.detailMovie', $dataMovie, $dataComments)
            ->with('success', 'You\'ve already liked this movie.');
    }

    $likesPlusOld = trim($request->get('likePlusOld'));
    $likesPlusNew = $likesPlusOld + 1;

    DB::table('comments')
        ->where('id', '=', $id_comment)
        ->update(['likeplus' => $likesPlusNew]);
    
    DB::table('likes')->insert([
            'id_comment' => $id_comment,
            'pseudo' => Auth::user()->pseudo,
            'likeplus' => true,
        ]);

    return view('movies.detailMovie', $dataMovie, $dataComments);
}

public function updateLikeMoinsComment(Request $request, $id_comment)
{   
    $id_movie = trim($request->get('inputIdMovie'));
    $dataMovie['movies'] = Movies::query()
        ->where('id', '=', $id_movie)
        ->get();

    $dataComments['comments'] = Comments::query()
        ->where('id_movie', '=', $id_movie)
        ->get();

    $checkLike = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_comment', '=', $id_comment)
        ->where('likemoins', '=', true)
        ->get();
        
    if (count($checkLike) > 0) {
        $message = 'You\'ve already disliked this movie.';
        return view('movies.detailMovie', $dataMovie, $dataComments, compact('message'));
    }

    $likeMoinsOld = trim($request->get('likeMoinsOld'));
    $likeMoinsNew = $likeMoinsOld + 1;
    
    DB::table('comments')
        ->where('id', '=', $id_comment)
        ->update(['likemoins' => $likeMoinsNew]);

    DB::table('likes')->insert([
            'id_comment' => $id_comment,
            'pseudo' => Auth::user()->pseudo,
            'likemoins' => true,
        ]);

    return view('movies.detailMovie', $dataMovie, $dataComments);
}



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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
