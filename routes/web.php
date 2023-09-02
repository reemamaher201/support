<?php

use App\Http\Controllers\AcceptanceController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RateController;
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


Route::get('/requests', [SupportController::class, 'showSupportRequests'])->name('requests.blade.php');
Route::post('/submit', [SupportController::class, 'submitSupportRequest'])->name('submit');


Route::get('/support-requests.blade.php/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');
Route::put('/support-requests.blade.php/{id}', [SupportController::class, 'update'])->name('support.update');
Route::get('/support-requests.blade.php/{id}/delete', [SupportController::class, 'delete'])->name('support.delete');


Route::get('/support', [SupportController::class, 'showSupport'])->name('notification');
Route::get('/support/{id}', [SupportController::class, 'show'])->name('notification.show');
Route::get('/reject-support/{id}', [SupportController::class,'showRejected'])->name('reject.notification');
Route::get('/reject-support', [SupportController::class,'showRejectedPage'])->name('reject.show');
Route::get('/accept-support', [SupportController::class,'showAcceptedPage'])->name('accept.show');
Route::get('/accept-support/{id}', [SupportController::class,'showAccepted'])->name('accept.notification');



Route::get('/acceptances/notDetails', [AcceptanceController::class,'notDetails'])->name('acceptances.notDetails');
Route::post('/acceptances', [AcceptanceController::class,'store'])->name('acceptances.store');

Route::get('/procedures/{id}', [AcceptanceController::class,'procedures'])->name('procedures.show');
Route::put('/store-procedure/{id}', [AcceptanceController::class,'storeProcedures'])->name('procedures.store');

Route::get('/spare/{id}', [AcceptanceController::class, 'showSpare'])->name('spare.show');
Route::put('/spareStore/{id}', [AcceptanceController::class, 'storeSpare'])->name('spare.create');

Route::get('/submit/{id}', [DeliveryController::class, 'showSubmit'])->name('submit.show');
Route::post('/submitStore/{id}', [DeliveryController::class, 'storeSubmit'])->name('submit.create');
Route::get('/delivery/{id}', [DeliveryController::class, 'msgShow'])->name('msg.show');

Route::get('/msgShow/{id}', [DeliveryController::class, 'msgShow'])->name('msg.show');

Route::get('/showNotification', [RateController::class, 'showRating'])->name('showNotification');
Route::post('/notificationEmp',[RateController::class,'rating'])->name('notification.rate');


