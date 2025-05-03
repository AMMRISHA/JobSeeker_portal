<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('add-signup-data', [SignupController::class, 'submitSignupForm'])->name('add.signup.data');
Route::get('login-form', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forgetpassword' , [ForgetPasswordController::class , 'forgetPasswordForm'])->name('forget.password');
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified']) 
    ->name('home');

// job search for index page

Route::post('serach' ,[HomeController::class , 'search'])->name('job.search');


//wishlist

// Route::post('/wishlist/add/{job}', [HomeController::class, 'addwishlist'])->name('wishlist.add');


Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::post('/jobs/search', [JobController::class, 'search'])->name('jobs.search');


//email

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marks the user as verified
    return redirect('/home'); // Or wherever you want to redirect after verification
})->middleware(['auth', 'signed'])->name('verification.verify');
Auth::routes(['verify' => true]);

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

