<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


Route::get('/search', function (Request $request) {
});
Route::get('/', [ListingController::class, 'index']);
Route::get(
    '/listings/{id}',
    [ListingController::class, 'show']
);
Route::post('/listings', [ListingController::class, 'store']);
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Users
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/sign-up', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate']);
