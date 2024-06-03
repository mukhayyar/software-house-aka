<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyorderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ServiceIncludedController;
use App\Http\Controllers\Auth\PhotoProfileController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/details/{id}', [ServiceController::class, 'show'])->name('services.details');



Route::middleware('auth')->group(function () {
});

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/{id}/process', [CheckoutController::class, 'store'])->name('payment.store');
    Route::get('/myorders', [MyorderController::class, 'index'])->name('myorders');
    Route::get('/myorders/onprocess', [MyorderController::class, 'projectProgress'])->name('myorders.project.progress');
    Route::get('/myorders/payment-verification', [MyorderController::class, 'projectPayment'])->name('myorders.project.payment');
    Route::get('/myorders/payment-verification/{id}', [MyorderController::class, 'paymentDetails'])->name('myorders.details');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/photo', [PhotoProfileController::class, 'update'])->name('profile.photo.update');
    Route::get('/gigs', [GigController::class, 'index'])->name('gigs.index');
    Route::get('/gigs/{id}', [GigController::class, 'edit'])->name('gigs.edit');
    Route::put('/gigs/{id}', [GigController::class, 'update'])->name('gigs.update');
    Route::delete('/gigs/{id}', [GigController::class, 'destroy'])->name('gigs.destroy');
    Route::post('/gigs', [GigController::class, 'store'])->name('gigs.store');
    Route::resource('faqs', FaqController::class)->only(['store', 'destroy']);
    Route::resource('services-included', ServiceIncludedController::class)->only(['store', 'destroy']);
});


require __DIR__.'/auth.php';
