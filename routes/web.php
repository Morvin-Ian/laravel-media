<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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



Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/profile/{uuid}', 'profile')->name('profile');
    Route::get('/sign-up', 'sign_up')->name('sign-up');
    Route::get('/sign-in', 'sign_in')->name('sign-in');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/profile/{uuid}/update', 'profile_update');


});

Route::controller(PostController::class)->group(function(){
    Route::get('/posts/create-post', 'create_post');

    Route::post('/post', 'post');


});