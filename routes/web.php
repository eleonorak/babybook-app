<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\PageController::class, 'home']  )->name('home');
Route::get('interesting-facts', [\App\Http\Controllers\PageController::class, 'interesting_facts']  )->name('interesting-facts');





Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('child', [\App\Http\Controllers\ChildController::class, 'index'])->name('child.index');
    Route::get('children/create', [\App\Http\Controllers\ChildController::class, 'create'] )->name('child.create');
    Route::post('children/store', [\App\Http\Controllers\ChildController::class, 'store'] )->name('child.store');
    Route::get('children/{child}', [\App\Http\Controllers\ChildController::class, 'edit'] )->name('child.edit');
    Route::patch('/children/{child}', [\App\Http\Controllers\ChildController::class, 'update'])->name('child.update');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
