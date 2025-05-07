<?php
use app\Http\Controllers\UserController;

Route::post('/addUser', [UserController::class, 'addUser']);
Route::get('/getUsers', [UserController::class, 'getUsers']);


