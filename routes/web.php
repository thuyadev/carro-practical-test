<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Web\ContactFormController::class, 'index'])->name('dashboard');

    Route::resource('contact-forms', \App\Http\Controllers\Web\ContactFormController::class);

    Route::resource('contact-users', \App\Http\Controllers\Web\ContactUserController::class)->except([
        'create'
    ]);

    Route::get('contact-users/{contact_form}/create', [\App\Http\Controllers\Web\ContactUserController::class, 'create'])->name('contact-users.create');
});

require __DIR__.'/auth.php';
