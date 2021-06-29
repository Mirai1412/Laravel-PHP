<?php

use App\Http\Controllers\PostsControlles;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');

});

Route::get('/test', function () {
    return 'welcome !!!!';

}); //8000/test

Route::get('/test2', function () {
    return view('test.index');

});

Route::get('/test3', function () {
    //비지니스 로직 처리
    $name = 'mirai';
    return view('test.show',['name' => $name , 'age'=>10]);

});

Route::get('/test4', [TestController::class,'index']);

//Route::get('/posts/create', 'PostsControlles@create');

Route::get('/posts/create', [PostsControlles::class,'create']);
