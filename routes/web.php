<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryTagController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ChatbotDataController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ServiceController;



// Fallback route for undefined routes (triggers 404)
Route::fallback(function () {
    abort(404, 'Page Not Found');
});

// Test routes for error scenarios (optional, for debugging)
Route::get('/test-404', function () {
    abort(404, 'Test 404 Error');
})->name('test.404');

Route::get('/test-500', function () {
    throw new \Exception('Test 500 Server Error');
})->name('test.500');

Route::get('/test-403', function () {
    abort(403, 'Access Forbidden');
})->name('test.403');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('login', [UserController::class, 'login']);





require __DIR__.'/auth.php';






Route::middleware(['admin'])->group(function () {
        Route::get('/admin/manage', [DashboardController::class, 'manage'])->name('admin.manage');

        //
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Services
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Formations
    Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
    Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
    Route::get('/formations/{formation}/edit', [FormationController::class, 'edit'])->name('formations.edit');
    Route::put('/formations/{formation}', [FormationController::class, 'update'])->name('formations.update');
    Route::delete('/formations/{formation}', [FormationController::class, 'destroy'])->name('formations.destroy');

    //blog
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

    //dashboard 
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/categories-tags', [CategoryTagController::class, 'index'])->name('categories.tags.index');
    Route::prefix('admin/categories')->name('admin.categories.')->group(function () {
    Route::get('/', [CategoryTagController::class, 'index'])->name('index');
    Route::post('/store', [CategoryTagController::class, 'store'])->name('store');
    Route::get('/{type}/{id}/edit', [CategoryTagController::class, 'edit'])->name('edit');
    Route::put('/{type}/{id}', [CategoryTagController::class, 'update'])->name('update');
    Route::delete('/{type}/{id}', [CategoryTagController::class, 'destroy'])->name('destroy');

    
});
    //Settings
    Route::get('/admin/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('settings/{setting}/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings/{setting}', [SettingController::class, 'update'])->name('settings.update');

    //Partners
    Route::resource('/admin/partners', PartnerController::class);

    //users
    Route::resource('/admin/users', UserController::class)->names('admin.users')->except(['create', 'store', 'show']);

    //logs
    Route::get('/admin/activity-logs', [ActivityLogController::class, 'index'])->name('admin.activity-logs.index');
        
    });

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products',[ProductController::class,'index'])->name('products.index');

Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/services',[ServiceController::class,'index'])->name('services.index');

Route::get('/formations/{formation}', [FormationController::class, 'show'])->name('formations.show');
Route::get('/formations',[FormationController::class,'index'])->name('formations.index');

Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');

//chatbot

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
Route::post('/bot/retrain', [ChatController::class, 'retrain'])->name('bot.retrain');

