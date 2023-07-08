<?php

use App\Http\Livewire\EditBuilding;
use App\Http\Livewire\BuildingImage;
use Illuminate\Support\Facades\Route;
use Database\Seeders\BildingImagesSeeder;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\BildingImagesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomImageController;
use App\Http\Livewire\EditRoom;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [LayoutController::class, 'index'])->name('home.page');

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
    Route::get('/building/show/{building}', [BuildingController::class, 'show'])->name('view.building');
    Route::delete('/building/delete/{building}', [BuildingController::class, 'destroy'])->name('delete.building');
    Route::get('/building/edit/{building}', EditBuilding::class)->name('edit.building');

    Route::get('/building/image/{building}',[BildingImagesController::class,'create'])->name('create.buildingimage');
    Route::post('/building/image/store/{building}', [BildingImagesController::class,'store'])->name('store.buildingimage');
    Route::delete('building/image/delete/{bildingImages}', [BildingImagesController::class, 'destroy'])->name('delete.buildingimage');

    Route::get('/room/create', [RoomController::class, 'create'])->name('create.room');
    Route::post('/room/store/',[RoomController::class,'store'])->name('store.room');
    Route::get('/room/image/{room}',[RoomImageController::class,'create'])->name('create.roomimage');
    Route::post('/room/image/store/{room}', [RoomImageController::class,'store'])->name('store.roomimage');
    Route::delete('room/image/delete/{roomImage}', [RoomImageController::class, 'destroy'])->name('delete.roomimage');

    Route::delete('/room/delete/{room}', [RoomController::class, 'destroy'])->name('delete.room');
    Route::get('/room/edit/{room}', EditRoom::class)->name('edit.room');
    Route::get('/room/book/{room}', [BookingController::class, 'bookRoom'])->name('book.room');
    Route::post('/room/booking/store/{room}', [BookingController::class, 'store'])->name('store.room.booking');
    Route::get('/mybookings', [BookingController::class, 'userBookings'])->name('user.bookings');

    Route::delete('/booking/delete/{pivot_id}', [BookingController::class, 'destroyBooking'])->name('delete.booking');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('index.rooms');
Route::get('/room/show/{room}', [RoomController::class, 'show'])->name('view.room');

require __DIR__.'/auth.php';
