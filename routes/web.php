<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('parents', ParentController::class)->parameters([
    'parents' => 'studentParent'
]);