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
    //######---home.php---#################################################   
    public function updateLikePlus(Request $request, $id)
    {
        $checkLikePlus = DB::table('likes')
            ->where('pseudo', '=', Auth::user()->pseudo)
            ->where('id_movie', '=', $id)
            ->where('likeplus', '=', true)
            ->get();
            
        $checkLikeMoins = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_movie', '=', $id)
        ->where('likemoins', '=', true)
        ->get();
            
        if (count($checkLikePlus) > 0 || count($checkLikeMoins) > 0){
            return redirect() -> back()
                ->with('success', 'You\'ve already liked this movie.');
        }

        $likesPlusOld = trim($request->get('likePlusOld'));
        $likesPlusNew = $likesPlusOld + 1;

        DB::table('movies')
            ->where('id', '=', $id)
            ->update(['likeplus' => $likesPlusNew]);
        
        DB::table('likes')->insert([
                'id_movie' => $id,
                'pseudo' => Auth::user()->pseudo,
                'likeplus' => true,
                
            ]);

        return redirect() -> back();
    }
    public function updateLikeMoins(Request $request, $id)
    {
        $checkLikePlus = DB::table('likes')
            ->where('pseudo', '=', Auth::user()->pseudo)
            ->where('id_movie', '=', $id)
            ->where('likeplus', '=', true)
            
            ->get();

            $checkLikeMoins = DB::table('likes')
            ->where('pseudo', '=', Auth::user()->pseudo)
            ->where('id_movie', '=', $id)
            ->where('likemoins', '=', true)
            
            ->get();
            
        if (count($checkLikePlus) > 0 || count($checkLikeMoins) > 0) {
            return redirect() -> back()
                ->with('success', 'You\'ve already disliked this movie.');
        }

        $likeMoinsOld = trim($request->get('likeMoinsOld'));
        $likeMoinsNew = $likeMoinsOld + 1;

        DB::table('movies')
            ->where('id', '=', $id)
            ->update(['likemoins' => $likeMoinsNew]);
        
        DB::table('likes')->insert([
                'id_movie' => $id,
                'pseudo' => Auth::user()->pseudo,
                'likemoins' => true,
            ]);

        return redirect() -> back();
    }
//######---detailMovie.php---#################################################   
public function updateLikePlusDetailMovie(Request $request, $id)
{
    $dataMovie['movies'] = Movies::query()
                ->where('id', '=', $id)
                ->get();
        
    $dataComments['comments'] = Comments::query()
                ->where('id_movie', '=', $id)
                ->get();

    $checkLikePlus = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_movie', '=', $id)
        ->where('likeplus', '=', true)
        ->get();
                
    $checkLikeMoins = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_movie', '=', $id)
        ->where('likemoins', '=', true)
        ->get();
                
    if (count($checkLikePlus) > 0 || count($checkLikeMoins) > 0){
        return view('movies.detailMovie', $dataMovie, $dataComments)
        ->with('success', 'You\'ve already liked this movie.');
    }
        

    $likesPlusOld = trim($request->get('likePlusOld'));
    $likesPlusNew = $likesPlusOld + 1;

    DB::table('movies')
        ->where('id', '=', $id)
        ->update(['likeplus' => $likesPlusNew]);
    
    DB::table('likes')->insert([
            'id_movie' => $id,
            'pseudo' => Auth::user()->pseudo,
            'likeplus' => true,
        ]);

    return view('movies.detailMovie', $dataMovie, $dataComments);
}


public function updateLikeMoinsDetailMovie(Request $request, $id)
{   
    $dataMovie['movies'] = Movies::query()
        ->where('id', '=', $id)
        ->get();

    $dataComments['comments'] = Comments::query()
        ->where('id_movie', '=', $id)
        ->get();

    $checkLikePlus = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_movie', '=', $id)
        ->where('likeplus', '=', true)
        ->get();
                
    $checkLikeMoins = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_movie', '=', $id)
        ->where('likemoins', '=', true)
        ->get();
                
    if (count($checkLikePlus) > 0 || count($checkLikeMoins) > 0){
        $message = 'You\'ve already disliked this movie.';
        return view('movies.detailMovie', $dataMovie, $dataComments, compact('message'));
    }
        
    

    $likeMoinsOld = trim($request->get('likeMoinsOld'));
    $likeMoinsNew = $likeMoinsOld + 1;

    DB::table('movies')
        ->where('id', '=', $id)
        ->update(['likemoins' => $likeMoinsNew]);
    
    DB::table('likes')->insert([
            'id_movie' => $id,
            'pseudo' => Auth::user()->pseudo,
            'likemoins' => true,
        ]);

    return view('movies.detailMovie', $dataMovie, $dataComments);
}
//comment like
    public function updateLikePlusComment(Request $request, $id_comment)
    {
    $id_movie = trim($request->get('inputIdMovie'));

    $dataMovie['movies'] = Movies::query()
                ->where('id', '=', $id_movie)
                ->get();
        
    $dataComments['comments'] = Comments::query()
                ->where('id_movie', '=', $id_movie)
                ->get();

    $checkLikeCommentPlus = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_comment', '=', $id_comment)
        ->where('likeplus', '=', true)
        ->get();

    $checkLikeCommentMoins = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_comment', '=', $id_comment)
        ->where('likemoins', '=', true)
        ->get();
        
    if (count($checkLikeCommentPlus) > 0 || count($checkLikeCommentMoins) > 0) {
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

// dislike comment function

public function updateLikeMoinsComment(Request $request, $id_comment)
{   
    $id_movie = trim($request->get('inputIdMovie'));

    $dataMovie['movies'] = Movies::query()
        ->where('id', '=', $id_movie)
        ->get();

    $dataComments['comments'] = Comments::query()
        ->where('id_movie', '=', $id_movie)
        ->get();

    $checkLikeCommentPlus = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_comment', '=', $id_comment)
        ->where('likemoins', '=', true)
        ->get();

    $checkLikeCommentMoins = DB::table('likes')
        ->where('pseudo', '=', Auth::user()->pseudo)
        ->where('id_comment', '=', $id_comment)
        ->where('likeplus', '=', true)
        ->get();
        
        
    if (count($checkLikeCommentPlus) > 0 || count($checkLikeCommentMoins) > 0) {
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
}
