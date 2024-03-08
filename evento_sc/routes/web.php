<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');

Route::get('/adm', function () {
    return view('admin');
})->name('adm');

// Route::resource('dashboard', EventController::class);
Route::get('/dashboard', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [EventController::class, 'welcome'])->name('welcome');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('destroy');
Route::post('/events', [EventController::class, 'store'])->name('addevent');
Route::put('/events/{id}', [EventController::class, 'update'])->name('editevent');

Route::get('/allevents', [EventController::class, 'show'])->name('allevents');



Route::patch('/event/accept/{event}', [EventController::class, 'accept'])->name('accept');
Route::patch('/event/refuse/{event}', [EventController::class, 'refuse'])->name('refuse');


Route::resource('categorie', CategorieController::class);

Route::get('/buy/{id}/{autoAccept}',[ ReservationController::class,'store' ])->name('buy');


Route::get('/detail/{event}', [ReservationController::class, 'index'])->name('detail');
Route::get('/myreservation', [ReservationController::class, 'myreservation'])->name('myreservation');



Route::patch('/reservation/resaccept/{reservation}', [ReservationController::class, 'accept'])->name('resaccept');
Route::patch('/reservation/resrefuse/{reservation}', [ReservationController::class, 'refuse'])->name('resrefuse');




require __DIR__ . '/auth.php';
