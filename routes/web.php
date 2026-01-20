<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/ministries', [PageController::class, 'ministries'])->name('ministries');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/media', [PageController::class, 'media'])->name('media');
Route::get('/resources', [PageController::class, 'resources'])->name('resources');
Route::get('/get-involved', [PageController::class, 'getInvolved'])->name('get-involved');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/code-of-conduct', [PageController::class, 'codeOfConduct'])->name('code-of-conduct');


Route::get('/codes', [PageController::class, 'codes'])->name('codes');
Route::get('/graduate', [PageController::class, 'graduate'])->name('graduate');

// Newsletter subscription
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin Routes
use App\Http\Controllers\AdminController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Pages Management
        Route::get('/pages', [AdminController::class, 'pages'])->name('pages');
        Route::get('/pages/create', [AdminController::class, 'createPage'])->name('pages.create');
        Route::post('/pages', [AdminController::class, 'storePage'])->name('pages.store');
        Route::get('/pages/{page}/edit', [AdminController::class, 'editPage'])->name('pages.edit');
        Route::put('/pages/{page}', [AdminController::class, 'updatePage'])->name('pages.update');
        Route::delete('/pages/{page}', [AdminController::class, 'deletePage'])->name('pages.delete');
        
        // Media Management
        Route::get('/media', [AdminController::class, 'media'])->name('media');
        Route::get('/media/create', [AdminController::class, 'createMedia'])->name('media.create');
        Route::post('/media', [AdminController::class, 'storeMedia'])->name('media.store');
        Route::post('/media/upload', [AdminController::class, 'uploadMedia'])->name('media.upload');
        Route::get('/media/{media}/edit', [AdminController::class, 'editMedia'])->name('media.edit');
        Route::put('/media/{media}', [AdminController::class, 'updateMedia'])->name('media.update');
        Route::delete('/media/{media}', [AdminController::class, 'deleteMedia'])->name('media.delete');
        
        // Settings & Editor
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('/editor', [AdminController::class, 'editor'])->name('editor');
    });
});
