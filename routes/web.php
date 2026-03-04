<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\AnneeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ParascolaireController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/ecolage', function () {
    return view('maintenance');
})->name('ecolage');

Route::get('/inscription', function () {
    return view('maintenance');
})->name('inscription');


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


// ELEVES
Route::get('/eleves-recherche', [EleveController::class, 'search'])->name('eleves.search');
Route::get('/eleves/index', EleveController::class .'@index')->name('eleves.index');
Route::get('/eleves/create', EleveController::class . '@create')->name('eleves.create');
Route::post('/eleves', EleveController::class .'@store')->name('eleves.store');
Route::get('/eleves/{eleve}', EleveController::class .'@show')->name('eleves.show');
Route::get('/eleves/{eleve}/edit', EleveController::class .'@edit')->name('eleves.edit');
Route::put('/eleves/{eleve}', EleveController::class .'@update')->name('eleves.update');
Route::delete('/eleves/{eleve}', EleveController::class .'@destroy')->name('eleves.destroy');


    // ANNEESCOLAIRES
Route::get('/anneescolaires/index', AnneeController::class .'@index')->name('anneescolaires.index');
Route::get('/anneescolaires/create', AnneeController::class . '@create')->name('anneescolaires.create');
Route::post('/anneescolaires', AnneeController::class .'@store')->name('anneescolaires.store');
Route::get('/anneescolaires/{annee}', AnneeController::class .'@show')->name('anneescolaires.show');
Route::get('/anneescolaires/{annee}/edit', AnneeController::class .'@edit')->name('anneescolaires.edit');
Route::put('/anneescolaires/{annee}', AnneeController::class .'@update')->name('anneescolaires.update');
Route::delete('/anneescolaires/{annee}', AnneeController::class .'@destroy')->name('anneescolaires.destroy');


    // CLASSES
Route::get('/classes/index', ClasseController::class .'@index')->name('classes.index');
Route::get('/classes/create', ClasseController::class . '@create')->name('classes.create');
Route::post('/classes', ClasseController::class .'@store')->name('classes.store');
Route::get('/classes/{classe}', ClasseController::class .'@show')->name('classes.show');
Route::get('/classes/{classe}/edit', ClasseController::class .'@edit')->name('classes.edit');
Route::put('/classes/{classe}', ClasseController::class .'@update')->name('classes.update');
Route::delete('/classes/{classe}', ClasseController::class .'@destroy')->name('classes.destroy');


    // MATIERES
Route::get('/matieres/index', MatiereController::class .'@index')->name('matieres.index');
Route::get('/matieres/create', MatiereController::class . '@create')->name('matieres.create');
Route::post('/matieres', MatiereController::class .'@store')->name('matieres.store');
Route::get('/matieres/{matiere}', MatiereController::class .'@show')->name('matieres.show');
Route::get('/matieres/{matiere}/edit', MatiereController::class .'@edit')->name('matieres.edit');
Route::put('/matieres/{matiere}', MatiereController::class .'@update')->name('matieres.update');
Route::delete('/matieres/{matiere}', MatiereController::class .'@destroy')->name('matieres.destroy');


    // EVALUATIONS
Route::get('/evaluations/index', EvaluationController::class .'@index')->name('evaluations.index');
Route::get('/evaluations/create', EvaluationController::class . '@create')->name('evaluations.create');
Route::post('/evaluations', EvaluationController::class .'@store')->name('evaluations.store');
Route::get('/evaluations/{evaluation}', EvaluationController::class .'@show')->name('evaluations.show');
Route::get('/evaluations/{evaluation}/edit', EvaluationController::class .'@edit')->name('evaluations.edit');
Route::put('/evaluations/{evaluation}', EvaluationController::class .'@update')->name('evaluations.update');
Route::delete('/evaluations/{evaluation}', EvaluationController::class .'@destroy')->name('evaluations.destroy');


// PARASCOLAIRES
Route::get('/parascolaires/index', ParascolaireController::class .'@index')->name('parascolaires.index');
Route::get('/parascolaires/create', ParascolaireController::class . '@create')->name('parascolaires.create');
Route::post('/parascolaires', ParascolaireController::class .'@store')->name('parascolaires.store');
Route::get('/parascolaires/{parascolaire}', ParascolaireController::class .'@show')->name('parascolaires.show');
Route::get('/parascolaires/{parascolaire}/edit', ParascolaireController::class .'@edit')->name('parascolaires.edit');
Route::put('/parascolaires/{parascolaire}', ParascolaireController::class .'@update')->name('parascolaires.update');
Route::delete('/parascolaires/{parascolaire}', ParascolaireController::class .'@destroy')->name('parascolaires.destroy');