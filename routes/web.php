<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('blogs.index');
});

Route::resource('/tasks', TaskController::class);

// Route::get('{any}', function () {
//     return view('layouts/app');
// })->where('any','.*');
