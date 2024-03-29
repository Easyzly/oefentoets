<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/base', function (){
    return view('base');
});
Route::get('/', [PagesController::class, 'home'])->name('home');

Route::post('/comments/store', [PagesController::class, 'storeComment'])->name('storeComment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/blogs/{blog}', [PagesController::class, 'blogview'])->name('blogview');
});

Route::post('/blogcreate', [PagesController::class, 'storeBlog'])->name('storeBlog');

require __DIR__.'/auth.php';
