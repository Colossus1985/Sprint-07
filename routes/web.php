<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\forumMoviesCRUDController;
use App\Http\Controllers\searchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [forumMoviesCRUDController::class, 'index']);
Route::resource('/movies', forumMoviesCRUDController::class);
Route::get('/index', [forumMoviesCRUDController::class, 'index']) -> name('index');

Route::get('/create', [forumMoviesCRUDController::class , 'create']) -> name('create');
Route::get('/test', [searchController::class , 'search']) -> name('search');
Route::get('/edit', [forumMoviesCRUDController::class , 'edit']) -> name('edit');







// Route::get('/', [testController::class, 'page1']);

// Route::get('/page1',[testController::class, 'page1'])->name('page1');
// Route::get('/page2',[testController::class, 'page2'])->name('page2');
