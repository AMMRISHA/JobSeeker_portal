<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\VerificationController;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('add-signup-data', [SignupController::class, 'submitSignupForm'])->name('add.signup.data');
Route::get('login-form', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::get('about',[HomeController::class, 'showAbout'])->name('about');
Route::get('profile' ,[HomeController::class , 'showprofile'])->name('profile');
Route::post('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('verify/{email}' , [SignupController::class , 'verify'])->name('verify');
Route::post('verified', [SignupController::class , 'verified'])->name('verified');
Route::post('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('forgetpassword' , [ForgetPasswordController::class , 'forgetPasswordForm'])->name('forget.password');
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified']) 
    ->name('home');

// job search for index page

Route::post('search' ,[HomeController::class , 'search'])->name('job.search');

//edit profile

Route::get('editprofile' ,[ApplicantController::class , 'editprofile'])->name('abasic.info.edit');
Route::post('updatebasicinfo',[ApplicantController::class , 'save'])->name('update.basic.info');
Route::get('job/{job_id}',[ApplicantController::class , 'jobForApply'])->name('job');

Route::get('apply/{job_id}',[ApplicantController::class , 'apply'])->name('apply');
Route::post('applicaion_save',[ApplicantController::class , 'applicationSave'])->name('application.save');

Route::post('/file-upload/{id}/{document_column_name}', [ApplicantController::class, 'ApplicantFileUpload'])->name('file-upload');
 Route::get('/download/{filename}', [ApplicantController::class, 'downloadFile'])
       ->where('filename', '.*')
       ->name('file.download');



Route::delete('/delete-all-doc/{id}/{filename}', [ApplicantController::class, 'deleteAlldocument'])->name('delete-all-doc');


//wishlist

// Route::post('/wishlist/add/{job}', [HomeController::class, 'addwishlist'])->name('wishlist.add');


Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/live-search', [HomeController::class, 'liveSearch'])->name('job.livesearch');


//email
// Email verification
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// Default Auth routes with email verification support

