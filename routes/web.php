<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InquiryController;

use App\Http\Controllers\AdminInquiryController;
use App\Http\Controllers\AdminReserveCreateController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/top', function () {
    return view('guest.top');
})->name('top');

Route::get('/access', function () {
    return view('guest.access');
})->name('access');

Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry');
Route::post('/inquiry/confirm', [InquiryController::class, 'confirm'])->name('confirm');
Route::post('/inquiry/store', [InquiryController::class, 'store'])->name('store');
Route::get('/thanks', [InquiryController::class, 'store']);

Route::get('/admin_inquiry', [AdminInquiryController::class, 'admin_inquiry'])->middleware(['auth'])->name('admin_inquiry');
Route::post('/admin_inquiry_update/{id}', [AdminInquiryController::class, 'admin_inquiry_update'])->middleware(['auth'])->name('admin_inquiry_update');
Route::get('/admin_inquiry_detail/{id}', [AdminInquiryController::class, 'admin_inquiry_detail'])->middleware(['auth'])->name('admin_inquiry_detail');
Route::get('/admin_reserve_create', [AdminReserveCreateController::class, 'admin_reserve_create'])->middleware(['auth'])->name('admin_reserve_create');
Route::post('/admin_reserve_store', [AdminReserveCreateController::class, 'admin_reserve_store'])->middleware(['auth'])->name('admin_reserve_store');
Route::get('/admin_reserve_bulk_create', [AdminReserveCreateController::class, 'admin_reserve_bulk_create'])->middleware(['auth'])->name('admin_reserve_bulk_create');
Route::post('/admin_reserve_bulk_store', [AdminReserveCreateController::class, 'admin_reserve_bulk_store'])->middleware(['auth'])->name('admin_reserve_bulk_store');

require __DIR__.'/auth.php';
