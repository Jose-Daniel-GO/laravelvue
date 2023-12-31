<?php

use App\Http\Controllers\CategoryRestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;









// ESTA BUENO NO BORRAR !
// Route::get('/categories', [CategoryRestController::class, 'index']);
// Route::post('/categories', [CategoryRestController::class, 'store']);
// Route::put('/categories/{category}', [CategoryRestController::class, 'update']);
// Route::delete('/categories/{category}', [CategoryRestController::class, 'destroy']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/** ---------Register and Login ----------- */
Route::controller(RegisterController::class)->group(function()
{
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('users', 'login')->name('index');

});

/** -----------Users --------------------- */
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/users',[RegisterController::class,'index'])->name('index');
});

Route::middleware('auth:sanctum')->controller(RegisterController::class)->group(function() {
    Route::get('/users','index')->name('index');
});
