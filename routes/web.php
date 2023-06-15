<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\CrudCategory;
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
Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('post/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('category/{category}',[PostController::class,'search'])->name('posts.search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/categories', CrudCategory::class)->name('categories');
});
