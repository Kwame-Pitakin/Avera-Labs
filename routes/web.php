<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\TestComboController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LaboratoriesController;
use App\Http\Controllers\Users\LabAgentController;
use App\Http\Controllers\Laboratory_TestController;
use App\Http\Controllers\Users\LabPatientController;
use App\Http\Controllers\Users\SuperAdminController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Users\LabFrontDeskController;
use App\Http\Controllers\Users\LabTechnicianController;

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

// Route::get('/',[UserController::class,'login'])->name('user.login');

Auth::routes(['verify'=>true]);

Route::get('/notAuthorized', [HomeController::class, 'notAuthorized'])->name('notAuthorized');

// Dashboards View
Route::get('/superadmindasboard', [SuperAdminController::class, 'index'])->name('superadmin')->middleware(['auth','verified','superAdmin']);
Route::get('/agentdashboard', [LabAgentController::class, 'index'])->name('labagent')->middleware(['auth','verified','labAgent']);
Route::get('/frontdeskdasboard', [LabFrontDeskController::class, 'index'])->name('frontDesk')->middleware(['auth','verified','labFrontDesk']);
Route::get('/labtechniciandashboard',[LabTechnicianController::class, 'index'])->name('labTechnician')->middleware(['auth','verified','LabTechnician']);
Route::get('/patientdashboard', [LabPatientController::class, 'index'])->name('patient')->middleware(['auth','verified','LabPatient']);






// creating users //

// show user register/create form
Route::get('/register',[UserController::class,'create'])->name('user.register')->middleware('guest');
// creating new user
Route::post('/users',[UserController::class,'store'])->name('user.store');


// / admin and lab agent creating users Routes
Route::get('/users/create',[UserController::class,'createUsers'])->name('user.create')->middleware(['auth','verified']);

Route::post('/created-users',[UserController::class,'storeUsers'])->name('storeUsers');



//Edit User Data
Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('user.edit')->middleware(['auth','verified']);

// updating user profile
Route::patch('/users/{id}',[UserController::class,'updateProfile'])->name('user.updateProfile')->middleware(['auth','verified']);

// single user profile 
Route::get('users/{id}', [UserController::class,'show'])->name('user.show')->middleware(['auth','verified']);



// show login form
Route::view('/','auth.login')->name('user.login')->middleware('guest');
// Route::get('/login',[UserController::class,'login'])->middleware('guest');
// Route::post('/user/authenticate',[UserController::class,'authenticate'])->name('user.authenticate');

// using login controller to authenticate login instead of what is in the user controller
Route::post('/user/authenticate',[LoginController::class,'authenticate'])->name('user.authenticate');


// Logout
Route::post('/logout',[UserController::class,'logout'])->name('user.logout')->middleware(['auth']);

// Password space
Route::get('/reset-password', [ResetPasswordController::class, 'changePassword'])->name('change.password');
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('update.password');


// All laboratories
Route::get('/laboratories', [LaboratoriesController::class,'index'])->name('laboratories.index')->middleware(['auth','verified']);

// Show Create Laboratory form
Route::get('/laboratories/create',[LaboratoriesController::class,'create'])->name('laboratories.create')->middleware(['auth','verified']);


//Store Laboratory
Route::post('/storelabs', [LaboratoriesController::class, 'store'])->name('laboratories.store')->middleware(['auth','verified']);

// Edit Laboratory Data
Route::get('laboratories/edit/{id}', [LaboratoriesController::class,'edit'])->name('laboratories.edit')->middleware(['auth','verified']);

//Update
Route::patch('/laboratories/{id}',[LaboratoriesController::class,'update'])->name('laboratories.update')->middleware(['auth','verified']);

// single laboratory
Route::get('laboratories/{id}',[LaboratoriesController::class,'show'])->name('laboratories.show')->middleware(['auth','verified']);





// TESTS

// show all tests
 Route::get('/tests',[TestsController::class,'index'])->name('tests.index')->middleware(['auth','verified']);

// create test
Route::get('/tests/create', [TestsController::class,'create'])->name('tests.create')->middleware(['auth','verified']);

// store created test
Route::post('/storetests', [TestsController::class,'store'])->name('tests.store')->middleware(['auth','verified']);

//Edit Tests Data
Route::get('/tests/edit/{id}',[TestsController::class,'edit'])->name('tests.edit')->middleware(['auth','verified']);

//update
Route::patch('/tests/{id}',[TestsController::class,'update'])->name('tests.update')->middleware(['auth','verified']);

// single test show 
Route::get('tests/{id}',[TestsController::class,'show'])->name('tests.show')->middleware(['auth','verified']);


// LAB TESTS
// Adding Test to a laboratory
Route::get('labtest/create/{id}',[Laboratory_TestController::class,'create'])->name('labtest.create')->middleware(['auth','verified']);

// Store Test to laboratory
Route::post('/storelabtest', [Laboratory_TestController::class,'store'])->name('labtest.store')->middleware(['auth','verified']);


// TEST COMBO
Route::get('testcombo/create/{id}',[TestComboController::class,'create'])->name('testcombo.create')->middleware(['auth','verified']);

Route::post('/testcombo',[TestComboController::class,'store'])->name('testcombo.store')->middleware(['auth','verified']);
// creating new Test combo for a lab



// FallBack routes 
Route::fallback(FallbackController::class)->middleware(['auth','verified']);



/**
* Verification Routes
*/
Route::get('/email/verify', [VerificationController::class,'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');






Route::get('testshow', function(){
    return view('content.pages.testshow');
})->middleware('auth');



