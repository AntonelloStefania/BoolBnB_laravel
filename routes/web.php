<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\BraintreeController;

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\MessageController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;




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
Route::get('/apartments/{apartment}', [ApartmentController::class, 'show'])->name('apartments.show');
Route::get('/apartments', [ApartmentController::class, 'index'])->name('apartments.index');
// Route::group([], function () {
//     // Inserisci qui le tue route
      Route::get('/', function () {
          return view('home');
      });
  // Route::get('/', [ApartmentController::class, 'index']);  //<------SERVE PER ATTERRARE SULL'INDEX ALL'APERTURA DEL PROGETTO
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('apartments', ApartmentController::class);
    Route::resource('types', TypeController::class);
    Route::resource('apartments.photos', PhotoController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('sponsors', SponsorController::class);
    // Route::any('/sponsor', [BraintreeController::class, 'processPayment'])->name('processPayment');
    Route::get('/apartments/{apartmentId}/payment', [ApartmentController::class, 'showPaymentForm'])->name('apartments.braintree');
    Route::post('/apartments/{apartmentId}/payment',[ApartmentController::class,'processPayment'])->name('braintree.processPayment');
    Route::get('/apartments/{apartmentId}/messages', [MessageController::class, 'showApartmentMessages'])->name('messages.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
