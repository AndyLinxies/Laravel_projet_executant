<?php

use App\Http\Controllers\AllUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::resource('/dashboard/images', ImageController::class);

Route::resource('/dashboard/categories', CategorieController::class);

Route::get('/dashboard/galleries', function () {
    $images=Image::all();
    return view('pages.readGalleries',compact('images'));
});

//download
Route::get('/galleries/{id}/download', [ImageController::class, 'download']);

//All users
Route::resource('/dashboard/users', AllUserController::class);


Route::get('/dashboard', function () {
    $avatar= Auth::user()->avatars->src;
    
    return view('partials.back.userInfo',compact('avatar'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
