<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\PostsController;
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
//라우터 파라미터까지만 기술
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/posts/create',
    [PostsController::class, 'create'])->name('posts.create')->middleware(['auth']);//로그인을 하지않으면 로그인화면으로가게한다*/
Route::post('/posts/store',
    [PostsController::class, 'store'])->name('posts.store');/*->middleware(['auth']);*/
Route::get('/posts/index',
    [PostsController::class, 'index'])->name('posts.index');//라우터에 이름을 준다


Route::get('/posts/show/{id}',[PostsController::class, 'show'])->name('post.show');
Route::get('/posts/mypost',[PostsController::class, 'myposts'])->name('posts.myposts');
Route::get('/posts/{id}',[PostsController::class, 'edit'])->name('post.edit');
Route::put('/posts/{id}',[PostsController::class, 'update'])->name('post.update');
Route::delete('/posts/{id}',[PostsController::class, 'destroy'])->name('post.delete');
Route::get('/chart/index',[ChartController::class, 'index'])->name('post.chart');
Route::get('/posts/scpost',[PostsController::class, 'scposts'])->name('posts.scposts');
