<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Authenticate;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware' => 'guest'], function () {
    // Rutas accesibles solo para usuarios no autenticados
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login-post');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register-post');
});


Route::group(['middleware' => 'auth'], function () {
    // Rutas accesibles solo para usuarios autenticados
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
    Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts');
    Route::get('/contacts/create', [ContactsController::class, 'create'])->name('contacts-create');
    Route::get('/contacts/{id}', [ContactsController::class, 'edit'])->name('contacts-edit');
    Route::patch('/contacts/{id}', [ContactsController::class, 'update'])->name('contacts-update');
    Route::delete('/contacts/{id}', [ContactsController::class, 'destroy'])->name('contacts-destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



