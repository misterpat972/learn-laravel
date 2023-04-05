<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculumController;

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

// route pour l'affichage de la page d'accueil
Route::get('/', [App\Http\Controllers\MainController::class, 'home'])->name('home');


Auth::routes();
// route pour la deconnexion de l'utilisateur
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// route pour l'affichage de la page d'accueil de l'etudiant 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route pour l'affichage de la page d'accueil de l'instructeur
Route::get('/instructor/overview', [App\Http\Controllers\InstructorController::class, 'index'])->name('instructor');
// route pour l'affichage du formulaire de creation d'un cours par l'instructeur
Route::get('/instructor/new', [App\Http\Controllers\InstructorController::class, 'create'])->name('instructor.create');
// route pour la creation d'un cours par l'instructeur
Route::post('/instructor/store', [App\Http\Controllers\InstructorController::class, 'store'])->name('instructor.store');
// route pour l'affichage du formulaire d'edition d'un cours par l'instructeur
Route::get('/instructor/courses/edit/{id}', [App\Http\Controllers\InstructorController::class, 'edit'])->name('instructor.edit');
// route pour la mise a jour d'un cours par l'instructeur
Route::put('/instructor/courses/update/{id}', [App\Http\Controllers\InstructorController::class, 'update'])->name('instructor.update');
// route pour la suppression d'un cours par l'instructeur
Route::get('/instructor/courses/delete/{id}', [App\Http\Controllers\InstructorController::class, 'destroy'])->name('instructor.destroy');
// route pour le prix d'un cours par l'instructeur 
Route::get('/instructor/courses/pricing/{id}', [App\Http\Controllers\pricingController::class, 'pricing'])->name('instructor.pricing');
// route pour la mise a jour du prix d'un cours par l'instructeur
Route::post('/instructor/courses/pricing/store/{id}', [App\Http\Controllers\pricingController::class, 'pricingStore'])->name('instructor.pricing.store');
// route pour l'affichage du curriculum d'un cours par l'instructeur
Route::get('/instructor/courses/curriculum/{id}', [CurriculumController::class, 'index'])->name('instructor.curriculum');
// route pour l'affichage du formulaire de creation d'une section dans le curriculum d'un cours par l'instructeur
Route::get('/instructor/courses/curriculum/section/create/{id}', [CurriculumController::class, 'create'])->name('instructor.curriculum.create');
// route pour la creation d'une section dans le curriculum d'un cours par l'instructeur
Route::post('/instructor/courses/curriculum/section/store/{id}', [CurriculumController::class, 'store'])->name('instructor.curriculum.store');
// route pour l'affichage du formulaire d'edition d'une section dans le curriculum d'un cours par l'instructeur
Route::get('/instructor/courses/curriculum/{section}/edit/{id}', [CurriculumController::class, 'edit'])->name('instructor.curriculum.edit');
// route pour la mise a jour d'une section dans le curriculum d'un cours par l'instructeur
Route::put('/instructor/courses/curriculum/{section}/update/{id}', [CurriculumController::class, 'update'])->name('instructor.curriculum.update');
// route pour la suppression d'une section dans le curriculum d'un cours par l'instructeur
Route::get('/instructor/courses/curriculum/{section}/delete/{id}', [CurriculumController::class, 'destroy'])->name('instructor.curriculum.destroy');