<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AnneeController;


Route::get('/', function () {
    return view('home');
})->name('home');

    // PARENTS
// returns the home page with all parents - READ
Route::get('/parents/index', ParentController::class .'@index')->name('parents.index');

// returns the form for adding a parent
Route::get('/parents/create', ParentController::class . '@create')->name('parents.create');

// adds a parent to the database - CREATE
Route::post('/parents', ParentController::class .'@store')->name('parents.store');

// returns a page that shows full details about a parent
Route::get('/parents/{parent}', ParentController::class .'@show')->name('parents.show');

// returns the form for editing a parent
Route::get('/parents/{parent}/edit', ParentController::class .'@edit')->name('parents.edit');

// updates a parent
Route::put('/parents/{parent}', ParentController::class .'@update')->name('parents.update');

// deletes a parent
Route::delete('/parents/{parent}', ParentController::class .'@destroy')->name('parents.destroy');


    // ANNEESCOLAIRES
Route::get('/anneescolaires/index', AnneeController::class .'@index')->name('anneescolaires.index');
Route::get('/anneescolaires/create', AnneeController::class . '@create')->name('anneescolaires.create');
Route::post('/anneescolaires', AnneeController::class .'@store')->name('anneescolaires.store');
Route::get('/anneescolaires/{annee}', AnneeController::class .'@show')->name('anneescolaires.show');
Route::get('/anneescolaires/{annee}/edit', AnneeController::class .'@edit')->name('anneescolaires.edit');
Route::put('/anneescolaires/{annee}', AnneeController::class .'@update')->name('anneescolaires.update');
Route::delete('/anneescolaires/{annee}', AnneeController::class .'@destroy')->name('anneescolaires.destroy');