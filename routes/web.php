<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AvatarController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard/userInfo/{id}/edit',[RegisteredUserController::class, 'edit']);

Route::put('/dashboard/userInfo/{id}/update',[RegisteredUserController::class, 'update']);

Route::resource('/dashboard/avatars', AvatarController::class);


Route::get('/dashboard', function () {
    $avatar= Auth::user()->avatars->src;
    
    return view('partials.back.userInfo',compact('avatar'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
