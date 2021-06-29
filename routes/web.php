<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/signin', [HomeController::class, 'signIn']);

Route::get('/register', [HomeController::class, 'register']);

Route::post('/create', [MessageController::class, 'create']);

Route::get('/message/{id}', [MessageController::class, 'view']);

Route::get('/message/delete/{id}', [MessageController::class, 'delete']);

Route::post('/user/create', [UserController::class, 'create']);

Route::post('/user/login', [UserController::class, 'login']);

Route::get('/user/logout', [UserController::class, 'logout']);

Route::get('/user/{id}', [UserController::class, 'view']);

Route::get('/user/{id}/followers', [UserController::class, 'followers'])->name('followers');

Route::get('/user/{id}/following', [UserController::class, 'following'])->name('following');

Route::get('/user/follow/{id}', [FollowController::class, 'follow']);

Route::get('/user/unfollow/{id}', [FollowController::class, 'unfollow']);

