<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/indx', function () {
    return view('main');
});
Route::view('/add','add');
Route::post('/add',[TestController::class, 'store']);
 */
Route::get('/', TestController::class .'@index')->name('test.index');

Route::get('/', TestController::class .'@index')->name('test.index');
// returns the form for adding a post
Route::get('/posts/create', TestController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', TestController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', TestController::class .'@show')->name('posts.show');