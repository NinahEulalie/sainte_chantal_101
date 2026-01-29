<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('parents', ParentController::class)->parameters([
//     'parents' => 'studentParent'
// ]);

// returns the home page with all parents
Route::get('/', ParentController::class .'@index')->name('parents.index');

// returns the form for adding a post
Route::get('/parents/create', ParentController::class . '@create')->name('parents.create');

// adds a post to the database
Route::post('/parents', ParentController::class .'@store')->name('parents.store');

// returns a page that shows a full post
Route::get('/parents/{parent}', ParentController::class .'@show')->name('parents.show');

// returns the form for editing a post
Route::get('/parents/{parent}/edit', ParentController::class .'@edit')->name('parents.edit');

// updates a post
Route::put('/parents/{parent}', ParentController::class .'@update')->name('parents.update');

// deletes a post
Route::delete('/parents/{parent}', ParentController::class .'@destroy')->name('parents.destroy');
