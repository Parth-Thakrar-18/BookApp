<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductBookController;
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
//Homepage
Route::get('/', [UserController:: class, 'home'])->name('home');

  //registration page
Route::get('/registration', [UserController::class, 'signup'])->name('register');



//login page
Route::get('/login', [UserController::class, 'login'])->name('login');

//after login page (user home)
Route::get('/entry', [UserController::class, 'entry'])->name('entry');

// user profile and update profile
Route::get('/profile', [UserController::class, 'UserProfile'])->name('profile');
Route::post('/profile-image', [UserController::class, 'profileImage'])->name('profile.image');
Route::post('/profile-update', [UserController::class, 'profileUpdate'])->name('profile.update');

//logout function route 
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//for ajax request sending to server for fetching the user data in json format
//----------------------------------------------------------------------------------
Route::post('/registration/store', [UserController::class, 'saveUser'])->name('auth.register');
Route::post('/login', [UserController::class, 'loginUser'])->name('auth.login');
//------------------------------------------------------------------------

//About us  page
Route::get('/about', [UserController:: class, 'aboutUs'])->name('aboutus');

Route::get('/orders', [UserController:: class, 'order'])->name('finalorder');

//author page
Route::get('/authors', [UserController:: class, 'author'])->name('writer');

//forgot password page
Route::get('/forgot', [UserController:: class, 'forgot']);
Route::post('/forgot', [UserController:: class, 'forgotPassword'])->name('auth.forgot');

//enter new password page
Route::get('/reset/{email}/{token}', [UserController:: class, 'reset'])->name('reset');
Route::post('/reset', [UserController:: class, 'resetPassword'])->name('auth.reset');

//productBookController
Route::get('/fiction', [ProductBookController::class, 'fiction'])->name('fiction');
Route::get('/non_fiction', [ProductBookController::class, 'non_fiction'])->name('non_fiction');
Route::get('/humor', [ProductBookController::class, 'humor'])->name('humor');
Route::get('/product/{id}', [ProductBookController::class,'show'])->name('show');
//cart  page
Route::get('/cart', [UserController:: class, 'cart'])->name('cart');
