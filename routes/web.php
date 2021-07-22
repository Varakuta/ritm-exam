<?php

use Illuminate\Support\Facades\Route;
use App\Models\Server;
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

    #TODO: refactor with resource route
    #Route::resource('servers', \App\Http\Controllers\ServerController::class);
    Route::group(['prefix' => 'dashboard'] , function(){
        Route::get('/servers', [\App\Http\Controllers\ServerController::class, 'index'])->name('servers.index');
        Route::get('/servers/show/{server}', [\App\Http\Controllers\ServerController::class, 'show'])->name('servers.show');
        Route::get('/servers/edit/{server}', [\App\Http\Controllers\ServerController::class, 'edit'])->name('servers.edit');
        Route::put('/servers/update/{server}', [\App\Http\Controllers\ServerController::class, 'update'])->name('servers.update');
        Route::get('/servers/create', [\App\Http\Controllers\ServerController::class, 'create'])->name('servers.create');
        Route::post('/servers/store/', [\App\Http\Controllers\ServerController::class, 'store'])->name('servers.store');
        Route::get('/servers/delete/{id}', [\App\Http\Controllers\ServerController::class, 'delete'])->name('servers.delete');
    });
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/rule/edit', function ($row) {
    return \App\Http\Controllers\RuleController::class;
})->name('rule_edit');*/