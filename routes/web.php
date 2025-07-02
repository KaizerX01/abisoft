<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('login', [UserController::class, 'login']);


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');


require __DIR__.'/auth.php';


Route::get('/products',[ProductController::class,'index'])->name('products.index');

Route::get('/services',[ServiceController::class,'index'])->name('services.index');

Route::get('/formations',[FormationController::class,'index'])->name('formations.index');

Route::get('/blog',[BlogController::class,'index'])->name('blog.index');