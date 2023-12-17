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

    //general routes
    Route::get('child', [\App\Http\Controllers\ChildController::class, 'index'])->name('child.index');
    Route::get('children/create', [\App\Http\Controllers\ChildController::class, 'create'] )->name('child.create');
    Route::get('children/{child}/edit', [\App\Http\Controllers\ChildController::class, 'edit'] )->name('child.edit');
    Route::post('children/store', [\App\Http\Controllers\ChildController::class, 'store'] )->name('child.store');
    Route::patch('/children/{child}', [\App\Http\Controllers\ChildController::class, 'update'])->name('child.update');
    Route::delete('children/{child}', [\App\Http\Controllers\ChildController::class, 'destroy'])->name('child.destroy');

    //details
    Route::get('children/{child}', [\App\Http\Controllers\ChildController::class, 'show'] )->name('child.show');

    //feedings
    Route::get('children/{child}/feedings', [\App\Http\Controllers\ChildFeedingController::class, 'index'] )->name('child.feedings.index');
    Route::get('children/{child}/feedings/create', [\App\Http\Controllers\ChildFeedingController::class, 'create'] )->name('child.feedings.create');
    Route::get('children/{child}/feedings/{feeding}/edit', [\App\Http\Controllers\ChildFeedingController::class, 'edit'])->name('child.feedings.edit');
    Route::post('children/{child}/feedings/store', [\App\Http\Controllers\ChildFeedingController::class, 'store'] )->name('child.feedings.store');
    Route::patch('children/{child}/feedings/{feeding}/update', [\App\Http\Controllers\ChildFeedingController::class, 'update'])->name('child.feedings.update');
    Route::delete('children/{child}/feedings/{feeding}/destroy', [\App\Http\Controllers\ChildFeedingController::class, 'destroy'])->name('child.feedings.destroy');

    //diaper changes
    Route::get('children/{child}/diaper-changes', [\App\Http\Controllers\ChildDiaperChangeController::class, 'index'] )->name('child.diaper-changes.index');
    Route::get('children/{child}/diaper-changes/create', [\App\Http\Controllers\ChildDiaperChangeController::class, 'create'] )->name('child.diaper-changes.create');
    Route::get('children/{child}/diaper-changes/{diaper_change}/edit', [\App\Http\Controllers\ChildDiaperChangeController::class, 'edit'])->name('child.diaper-changes.edit');
    Route::post('children/{child}/diaper-changes/store', [\App\Http\Controllers\ChildDiaperChangeController::class, 'store'] )->name('child.diaper-changes.store');
    Route::patch('children/{child}/diaper-changes/{diaper_change}/update', [\App\Http\Controllers\ChildDiaperChangeController::class, 'update'])->name('child.diaper-changes.update');
    Route::delete('children/{child}/diaper-changes/{diaper_change}/destroy', [\App\Http\Controllers\ChildDiaperChangeController::class, 'destroy'])->name('child.diaper-changes.destroy');

    //baths



});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
