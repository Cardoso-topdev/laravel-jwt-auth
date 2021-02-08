<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => ['api', 'cors'],
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::get('/user-profile', [AuthController::class, 'userProfile'])->name('userProfile');    
});

Route::group([
    'middleware' => ['api', 'cors'],
    'prefix' => 'user'
], function () {
    Route::get('/list', [UserController::class, 'getUsers']);
});
