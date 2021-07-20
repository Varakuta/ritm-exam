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

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard/rules/{row?}', \App\Http\Livewire\RuleComponent::class )->name('rule_edit');
    //Route::get('/dashboard/rules/edit/{row}', [\App\Http\Controllers\RuleController::class, 'edit'])->name('rule_edit');
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/rule/edit', function ($row) {
    return \App\Http\Controllers\RuleController::class;
})->name('rule_edit');*/