<?php

use App\Models\Listing;
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
// Show All listings page
Route::get('/', [ListingController::class, 'index']);

// Show create form page
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// Store Listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show single listing page
Route::get('/listings/{listing}', [ListingController::class, 'show']);



// Show register page
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// Create new users
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login page
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);