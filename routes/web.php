<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetPasswordController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('add-signup-data', [SignupController::class, 'submitSignupForm'])->name('add.signup.data');
Route::get('login-form', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forgetpassword' , [ForgetPasswordController::class , 'forgetPasswordForm'])->name('forget.password');





Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::post('/jobs/search', [JobController::class, 'search'])->name('jobs.search');




