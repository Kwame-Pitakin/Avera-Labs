<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\TestComboController;
use App\Http\Controllers\LaboratoriesController;
use App\Http\Controllers\Laboratory_TestController;
use App\Http\Controllers\Auth\VerificationController;


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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify'=>true]);


Route::get('/agentdashboard', function () {
    return view('content.pages.dashboards.agentDashboard');
})->middleware(['auth','verified']);






// creating users //

// show user register/create form
Route::get('/register',[UserController::class,'create'])->name('user.create')->middleware('guest');
// creating new user
Route::post('/users',[UserController::class,'store'])->name('user.store');



//Edit User Data
Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('user.edit')->middleware(['auth','verified']);

// updating user profile
Route::patch('/users/{id}',[UserController::class,'updateProfile'])->name('user.updateProfile')->middleware(['auth','verified']);

// single user profile 
Route::get('users/{id}', [UserController::class,'show'])->name('user.show')->middleware(['auth','verified']);



// show login form
Route::get('/',[UserController::class,'login'])->name('user.login')->middleware('guest');
Route::get('/login',[UserController::class,'login'])->middleware('guest');
Route::post('/user/authenticate',[UserController::class,'authenticate'])->name('user.authenticate');



// Logout
Route::post('/logout',[UserController::class,'logout'])->name('user.logout')->middleware(['auth']);



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



// add new lab

// Route::get('/addnewlab',function(){
//     return view('content.pages.laboratories.create');
// });



// labcombos Route
// Route::get('labcombos', function(){
//     return view('content.pages.labs.labcombos');
// });





Route::get('testshow', function(){
    return view('content.pages.testshow');
})->middleware('auth');



