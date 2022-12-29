<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/articles', [ArticleController::class, 'show'])->middleware('auth')->name('articles');
Route::delete('/articles/{article}/destroy', [ArticleController::class, 'destroy'])->middleware('auth')->name('article.destroy');
require __DIR__.'/auth.php';
