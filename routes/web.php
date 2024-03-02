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


Route::middleware(['auth', 'verified'])->group(function () {

    // General pages
    Route::get('/', [\App\Http\Controllers\PageController::class, 'home']  )->name('home');
    Route::get('/growth', [\App\Http\Controllers\GrowthFactController::class, 'index']  )->name('growth');

    // general routes
    Route::get('children', [\App\Http\Controllers\ChildController::class, 'index'])->name('child.index');
    Route::get('children/create', [\App\Http\Controllers\ChildController::class, 'create'] )->name('child.create');
    Route::get('children/{child}/edit', [\App\Http\Controllers\ChildController::class, 'edit'] )->name('child.edit');
    Route::post('children/store', [\App\Http\Controllers\ChildController::class, 'store'] )->name('child.store');
    Route::patch('/children/{child}', [\App\Http\Controllers\ChildController::class, 'update'])->name('child.update');
    Route::delete('children/{child}', [\App\Http\Controllers\ChildController::class, 'destroy'])->name('child.destroy');

    // details
    Route::get('children/{child}', [\App\Http\Controllers\ChildController::class, 'show'] )->name('child.show');

    // feeding
    Route::get('children/{child}/feedings', [\App\Http\Controllers\ChildFeedingController::class, 'index'] )->name('child.feedings.index');
    Route::get('children/{child}/feedings/create', [\App\Http\Controllers\ChildFeedingController::class, 'create'] )->name('child.feedings.create');
    Route::get('children/{child}/feedings/{feeding}/edit', [\App\Http\Controllers\ChildFeedingController::class, 'edit'])->name('child.feedings.edit');
    Route::post('children/{child}/feedings/store', [\App\Http\Controllers\ChildFeedingController::class, 'store'] )->name('child.feedings.store');
    Route::patch('children/{child}/feedings/{feeding}/update', [\App\Http\Controllers\ChildFeedingController::class, 'update'])->name('child.feedings.update');
    Route::delete('children/{child}/feedings/{feeding}/destroy', [\App\Http\Controllers\ChildFeedingController::class, 'destroy'])->name('child.feedings.destroy');

    // diaper change
    Route::get('children/{child}/diaper-changes', [\App\Http\Controllers\ChildDiaperChangeController::class, 'index'] )->name('child.diaper-changes.index');
    Route::get('children/{child}/diaper-changes/create', [\App\Http\Controllers\ChildDiaperChangeController::class, 'create'] )->name('child.diaper-changes.create');
    Route::get('children/{child}/diaper-changes/{diaper_change}/edit', [\App\Http\Controllers\ChildDiaperChangeController::class, 'edit'])->name('child.diaper-changes.edit');
    Route::post('children/{child}/diaper-changes/store', [\App\Http\Controllers\ChildDiaperChangeController::class, 'store'] )->name('child.diaper-changes.store');
    Route::patch('children/{child}/diaper-changes/{diaper_change}/update', [\App\Http\Controllers\ChildDiaperChangeController::class, 'update'])->name('child.diaper-changes.update');
    Route::delete('children/{child}/diaper-changes/{diaper_change}/destroy', [\App\Http\Controllers\ChildDiaperChangeController::class, 'destroy'])->name('child.diaper-changes.destroy');

    // bath
    Route::get('children/{child}/baths', [\App\Http\Controllers\ChildBathController::class, 'index'] )->name('child.baths.index');
    Route::get('children/{child}/baths/create', [\App\Http\Controllers\ChildBathController::class, 'create'] )->name('child.baths.create');
    Route::get('children/{child}/baths/{bath}/edit', [\App\Http\Controllers\ChildBathController::class, 'edit'])->name('child.baths.edit');
    Route::post('children/{child}/baths/store', [\App\Http\Controllers\ChildBathController::class, 'store'] )->name('child.baths.store');
    Route::patch('children/{child}/baths/{bath}/update', [\App\Http\Controllers\ChildBathController::class, 'update'])->name('child.baths.update');
    Route::delete('children/{child}/baths/{bath}/destroy', [\App\Http\Controllers\ChildBathController::class, 'destroy'])->name('child.baths.destroy');

    // sleep period

    Route::get('children/{child}/sleep-periods', [\App\Http\Controllers\ChildSleepPeriodController::class, 'index'] )->name('child.sleep-periods.index');
    Route::get('children/{child}/sleep-periods/create', [\App\Http\Controllers\ChildSleepPeriodController::class, 'create'] )->name('child.sleep-periods.create');
    Route::get('children/{child}/sleep-periods/{sleep_period}/edit', [\App\Http\Controllers\ChildSleepPeriodController::class, 'edit'])->name('child.sleep-periods.edit');
    Route::post('children/{child}/sleep-periods/store', [\App\Http\Controllers\ChildSleepPeriodController::class, 'store'] )->name('child.sleep-periods.store');
    Route::patch('children/{child}/sleep-periods/{sleep_period}/update', [\App\Http\Controllers\ChildSleepPeriodController::class, 'update'])->name('child.sleep-periods.update');
    Route::delete('children/{child}/sleep-periods/{sleep_period}/destroy', [\App\Http\Controllers\ChildSleepPeriodController::class, 'destroy'])->name('child.sleep-periods.destroy');

    // measurement
    Route::get('children/{child}/measurements', [\App\Http\Controllers\ChildMeasurementController::class, 'index'] )->name('child.measurements.index');
    Route::get('children/{child}/measurements/create', [\App\Http\Controllers\ChildMeasurementController::class, 'create'] )->name('child.measurements.create');
    Route::get('children/{child}/measurements/{measurement}/edit', [\App\Http\Controllers\ChildMeasurementController::class, 'edit'])->name('child.measurements.edit');
    Route::post('children/{child}/measurements/store', [\App\Http\Controllers\ChildMeasurementController::class, 'store'] )->name('child.measurements.store');
    Route::patch('children/{child}/measurements/{measurement}/update', [\App\Http\Controllers\ChildMeasurementController::class, 'update'])->name('child.measurements.update');
    Route::delete('children/{child}/measurements/{measurement}/destroy', [\App\Http\Controllers\ChildMeasurementController::class, 'destroy'])->name('child.measurements.destroy');

    // medical treatment
    Route::get('children/{child}/medical-treatments', [\App\Http\Controllers\ChildMedicalTreatmentController::class, 'index'] )->name('child.medical-treatments.index');
    Route::get('children/{child}/medical-treatments/create', [\App\Http\Controllers\ChildMedicalTreatmentController::class, 'create'] )->name('child.medical-treatments.create');
    Route::get('children/{child}/medical-treatments/{medical_treatment}/edit', [\App\Http\Controllers\ChildMedicalTreatmentController::class, 'edit'])->name('child.medical-treatments.edit');
    Route::post('children/{child}/medical-treatments/store', [\App\Http\Controllers\ChildMedicalTreatmentController::class, 'store'] )->name('child.medical-treatments.store');
    Route::patch('children/{child}/medical-treatments/{medical_treatment}/update', [\App\Http\Controllers\ChildMedicalTreatmentController::class, 'update'])->name('child.medical-treatments.update');
    Route::delete('children/{child}/medical-treatments/{medical_treatment}/destroy', [\App\Http\Controllers\ChildMedicalTreatmentController::class, 'destroy'])->name('child.medical-treatments.destroy');

    // gallery
    Route::get('children/{child}/gallery', [\App\Http\Controllers\ChildGalleryController::class, 'index'])->name('child.gallery.index');
    Route::post('children/{child}/gallery/upload', [\App\Http\Controllers\ChildGalleryController::class, 'upload'])->name('child.gallery.upload');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
