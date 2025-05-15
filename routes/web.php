<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\VerificationController;

Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified']) 
    ->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('add-signup-data', [SignupController::class, 'submitSignupForm'])->name('add.signup.data');
Route::get('login-form', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::get('about',[HomeController::class, 'showAbout'])->name('about');
Route::get('profile' ,[HomeController::class , 'showprofile'])->name('profile');
Route::get('applied_jobs' ,[HomeController::class , 'showallappliedjobs'])->name('show.all.applied.jobs');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('verify/{email}' , [SignupController::class , 'verify'])->name('verify');
Route::post('verified', [SignupController::class , 'verified'])->name('verified');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forgetpassword' , [ForgetPasswordController::class , 'forgetPasswordForm'])->name('forget.password');


// job search for index page

Route::post('search' ,[HomeController::class , 'search'])->name('job.search');

//edit profile
Route::post('applicant-query' , [ApplicantController::class , 'applicantQuery'])->name('applicant.query');
Route::get('editprofile' ,[ApplicantController::class , 'editprofile'])->name('abasic.info.edit');
Route::post('updatebasicinfo',[ApplicantController::class , 'save'])->name('update.basic.info');
Route::get('job/{job_id}',[ApplicantController::class , 'jobForApply'])->name('job');

Route::get('withdraw/{job_id}',[ApplicantController::class , 'withdrawAppliedJob'])->name('withdraw');

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


// Application at hr side
Route::middleware(['auth'])->group(function () {
    Route::get('application/{job_id}', [ApplicationController::class, 'viewAllApplication'])->name('application');
    Route::get('applicant_profile/{user_id}/{job_id}', [ApplicationController::class, 'viewApplicantProfile'])->name('applicant_profile');
    Route::get('all.applied.jobs' ,[ApplicationController::class , 'viewAllJobCategory'])->name('all.applied.jobs');
    Route::get('all-jobs', [ApplicationController::class, 'viewAllJobs'])->name('all.jobs');
    Route::post('store-job', [ApplicationController::class, 'storeJob'])->name('store.job');
    Route::post('edit-job', [ApplicationController::class, 'editJob'])->name('update.job');
    Route::post('applicant-not-selected' ,[ApplicationController::class, 'applicantRejected'])->name('applicant.not.selected');
    Route::get('not-selected-application' , [ApplicationController::class, 'notSelectedApplication'])->name('not.selected.application');
    Route::post('applicant-selected-for-interview', [ApplicationController::class, 'selectedForInterview'])->name('applicant.selected.interview');
      });



