<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/sign-up', 'sign_up');
    Route::get('/sign-in', 'sign_in');
    Route::get('/logout', 'logout');


    Route::post('/login', 'login');
    Route::post('/register', 'register');


});