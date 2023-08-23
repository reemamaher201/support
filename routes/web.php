<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SupportController;
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




Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/showForm', [SupportController::class, 'showFormRequest'])->name('showForm');


Route::get('/requests', [SupportController::class, 'showSupportRequests'])->name('requests');
Route::post('/submit', [SupportController::class, 'submitSupportRequest'])->name('submit');

// صفحة تعديل الطلب
Route::get('/support-requests/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');
Route::put('/support-requests/{id}', [SupportController::class, 'update'])->name('support.update');

Route::get('/support-requests/{id}/delete', [SupportController::class, 'delete'])->name('support.delete');

Route::get('/notification', [NotificationController::class, 'notification'])->name('notification');

Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('notification.show');



