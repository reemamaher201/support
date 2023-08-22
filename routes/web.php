<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Route::get('/technical-support', [SupportController::class, 'technicalSupport'])->name('technical_support');
//Route::get('/other-page', [EmployeeController::class, 'otherPage'])->name('other_page');

