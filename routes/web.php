<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);

Route::post('/create', [MessageController::class, 'create']);

Route::get('/message/{id}', [MessageController::class, 'view']);

Route::get('/message/delete/{id}', [MessageController::class, 'delete']);

Route::post('/user/create', [UserController::class, 'create']);

Route::post('/user/login', [UserController::class, 'login']);

Route::get('/user/logout', [UserController::class, 'logout']);

Route::get('/user/{id}', [UserController::class, 'view']);

Route::get('/user/follow/{id}', [FollowController::class, 'follow']);

Route::get('/user/unfollow/{id}', [FollowController::class, 'unfollow']);
