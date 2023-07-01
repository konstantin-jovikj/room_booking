<?php

use App\Http\Controllers\BildingImagesController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\BuildingImage;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/admin', function () {
    return view('admin-dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/buildings', [BuildingController::class, 'index'])->name('index.buildings');
    Route::get('/building/create', [BuildingController::class, 'create'])->name('create.building');

    Route::get('/building/image/{building}',[BildingImagesController::class,'create'])->name('create.buildingimage');
    Route::post('/building/image/store/{building}', [BildingImagesController::class,'store'])->name('store.buildingimage');
});

require __DIR__.'/auth.php';
