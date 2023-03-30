<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\MainController::class, 'home'])->name('home');


Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/instructor/overview', [App\Http\Controllers\InstructorController::class, 'index'])->name('instructor');

Route::get('/instructor/new', [App\Http\Controllers\InstructorController::class, 'create'])->name('instructor.create');

Route::post('/instructor/store', [App\Http\Controllers\InstructorController::class, 'store'])->name('instructor.store');

Route::get('/instructor/edit/{id}', [App\Http\Controllers\InstructorController::class, 'edit'])->name('instructor.edit');

Route::put('/instructor/update/{id}', [App\Http\Controllers\InstructorController::class, 'update'])->name('instructor.update');