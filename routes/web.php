<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/redirect/{id}', [App\Http\Controllers\RedirectController::class, 'redirect'])->name('redirect');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware(['role:root|admin|manager'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
	Route::resource('category', App\Http\Controllers\Admin\CategoriesController::class);
	Route::resource('product', App\Http\Controllers\Admin\ProductsController::class);
	Route::resource('qrcodes', App\Http\Controllers\Admin\QRCodesController::class);
});

Route::middleware(['role:root'])->prefix('admin_panel')->group(function () {
    Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);
    Route::get('company/block/{id}/{sts}', [App\Http\Controllers\Admin\CompanyController::class,'block'])->name('company.block');
	Route::resource('city', App\Http\Controllers\Admin\CitiesController::class);
});




