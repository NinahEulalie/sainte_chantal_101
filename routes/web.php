<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\AnneeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ParascolaireController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/ecolage', function () {
    return view('maintenance');
})->name('ecolage');

Route::get('/inscription', function () {
    return view('maintenance');
})->name('inscription');

    //AUTH
//register
Route::get('/register',[AuthController::class, 'showRegister'])->name('show.register');
Route::post('/register',[AuthController::class, 'register'])->name('register');

//login
Route::get('/',[AuthController::class, 'showLogin'])->name('login');
Route::post('/login',[AuthController::class, 'login'])->name('auth.login');
//logout
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');


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

    // AFFECTATIONS PAR CLASSE DES ELEVES
Route::prefix('affectations')->name('affectations.')->group(function () {
    Route::get('/', [AffectationController::class, 'index'])->name('index');
    Route::post('/affecter', [AffectationController::class, 'affecter'])->name('affecter');
    Route::delete('/retirer/{id_eleve}/{id_classe}', [AffectationController::class, 'retirer'])->name('retirer');
});


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

// Routes pour la saisie des notes
Route::get('/evaluations/{id_evaluation}/saisie', [EvaluationController::class, 'saisirNotes'])
    ->name('evaluations.saisie');
    
Route::post('/evaluations/{id_evaluation}/enregistrer', [EvaluationController::class, 'enregistrerNotes'])
    ->name('evaluations.enregistrer');


// PARASCOLAIRES
Route::get('/parascolaires/index', ParascolaireController::class .'@index')->name('parascolaires.index');
Route::get('/parascolaires/create', ParascolaireController::class . '@create')->name('parascolaires.create');
Route::post('/parascolaires', ParascolaireController::class .'@store')->name('parascolaires.store');
Route::get('/parascolaires/{parascolaire}', ParascolaireController::class .'@show')->name('parascolaires.show');
Route::get('/parascolaires/{parascolaire}/edit', ParascolaireController::class .'@edit')->name('parascolaires.edit');
Route::put('/parascolaires/{parascolaire}', ParascolaireController::class .'@update')->name('parascolaires.update');
Route::delete('/parascolaires/{parascolaire}', ParascolaireController::class .'@destroy')->name('parascolaires.destroy');

// PERMISSIONS 
Route::post('/permission/{id}', [PermissionController::class, 'update'])->name('permissions.update');
Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::get('/permission/list', [PermissionController::class, 'index'])->name('permissions.list');
Route::get('/permission/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permission', [PermissionController::class, 'store'])->name('permissions.store');
Route::delete('/permission', [PermissionController::class, 'destroy'])->name('permissions.destroy');

// ROLES 
Route::get('/roles/list', [RoleController::class, 'index'])->name('roles.list');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

// USERS
Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
// Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
// Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/users/{id}/edit/', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
