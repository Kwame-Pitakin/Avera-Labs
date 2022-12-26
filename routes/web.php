<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\TestComboController;
use App\Http\Controllers\LaboratoriesController;
use App\Http\Controllers\Laboratory_TestController;


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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/agentdashboard', function () {
    return view('content.pages.dashboards.agentDashboard');
});

// creating users //

// show user register/create form
Route::get('/register',[UserController::class,'create'])->name('user.create');

// creating new user
Route::post('/users',[UserController::class,'store'])->name('user.store');


// show login form
Route::get('/',[UserController::class,'login'])->name('user.login');

// Logout
Route::post('/logout',[UserController::class,'logout'])->name('user.logout');



// All laboratories
Route::get('/laboratories', [LaboratoriesController::class,'index'])->name('laboratories.index');

// Show Create Laboratory form
Route::get('/laboratories/create',[LaboratoriesController::class,'create'])->name('laboratories.create');


//Store Laboratory
Route::post('/storelabs', [LaboratoriesController::class, 'store'])->name('laboratories.store');

// Edit Laboratory Data
Route::get('laboratories/edit/{id}', [LaboratoriesController::class,'edit'])->name('laboratories.edit');

//Update
Route::patch('/laboratories/{id}',[LaboratoriesController::class,'update'])->name('laboratories.update');

// single laboratory
Route::get('laboratories/{id}',[LaboratoriesController::class,'show'])->name('laboratories.show');





// TESTS

// show all tests
 Route::get('/tests',[TestsController::class,'index'])->name('tests.index');

// create test
Route::get('/tests/create', [TestsController::class,'create'])->name('tests.create');

// store created test
Route::post('/storetests', [TestsController::class,'store'])->name('tests.store');

//Edit Tests Data
Route::get('/tests/edit/{id}',[TestsController::class,'edit'])->name('tests.edit');

//update
Route::patch('/tests/{id}',[TestsController::class,'update'])->name('tests.update');

// single test show 
Route::get('tests/{id}',[TestsController::class,'show'])->name('tests.show');


// LAB TESTS
// Adding Test to a laboratory
Route::get('labtest/create/{id}',[Laboratory_TestController::class,'create'])->name('labtest.create');

// Store Test to laboratory
Route::post('/storelabtest', [Laboratory_TestController::class,'store'])->name('labtest.store');




// TEST COMBO
Route::get('testcombo/create/{id}',[TestComboController::class,'create'])->name('testcombo.create');

Route::post('/testcombo',[TestComboController::class,'store'])->name('testcombo.store');
// creating new Test combo for a lab



// FallBack routes 
Route::fallback(FallbackController::class);






// add new lab

// Route::get('/addnewlab',function(){
//     return view('content.pages.laboratories.create');
// });



// labcombos Route
Route::get('labcombos', function(){
    return view('content.pages.labs.labcombos');
});





Route::get('testshow', function(){
    return view('content.pages.testshow');
});



