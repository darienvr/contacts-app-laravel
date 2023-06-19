<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;

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
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register-post');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts')->middleware('auth');
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts');
Route::get('/contacts/create', [ContactsController::class, 'create'])->name('contacts-create');
Route::get('/contacts/{id}', [ContactsController::class, 'edit'])->name('contacts-edit');
Route::patch('/contacts/{id}', [ContactsController::class, 'update'])->name('contacts-update');
Route::delete('/contacts/{id}', [ContactsController::class, 'destroy'])->name('contacts-destroy');



