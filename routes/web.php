<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/ministries', [PageController::class, 'ministries'])->name('ministries');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/media', [PageController::class, 'media'])->name('media');
// Redirect old /resources to new /resource-library to avoid server conflicts
Route::get('/resources', function () {
    return redirect('/resource-library', 301);
});

Route::get('/resource-library', [PageController::class, 'resources'])->name('resources');
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
        
        // Pages
        Route::resource('pages', AdminController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names(['index' => 'pages', 'create' => 'pages.create', 'store' => 'pages.store', 'edit' => 'pages.edit', 'update' => 'pages.update', 'destroy' => 'pages.delete']);
        Route::get('/pages/{pageName}/edit-content', [AdminController::class, 'editPageContent'])->name('pages.edit-content');
        Route::post('/pages/{pageName}/update-content', [AdminController::class, 'updatePageContent'])->name('pages.update-content');
        
        // Homepage
        Route::get('/homepage', [AdminController::class, 'homepage'])->name('homepage');
        Route::post('/homepage', [AdminController::class, 'updateHomepage'])->name('homepage.update');
        
        // Blog
        Route::get('/blog', [AdminController::class, 'blogPosts'])->name('blog.index');
        Route::get('/blog/create', [AdminController::class, 'createBlogPost'])->name('blog.create');
        Route::post('/blog', [AdminController::class, 'storeBlogPost'])->name('blog.store');
        Route::get('/blog/{blogPost}/edit', [AdminController::class, 'editBlogPost'])->name('blog.edit');
        Route::put('/blog/{blogPost}', [AdminController::class, 'updateBlogPost'])->name('blog.update');
        Route::delete('/blog/{blogPost}', [AdminController::class, 'deleteBlogPost'])->name('blog.delete');
        Route::get('/blog/categories', [AdminController::class, 'blogCategories'])->name('blog.categories');
        Route::post('/blog/categories', [AdminController::class, 'storeBlogCategory'])->name('blog.categories.store');
        Route::get('/blog/tags', [AdminController::class, 'blogTags'])->name('blog.tags');
        Route::post('/blog/tags', [AdminController::class, 'storeBlogTag'])->name('blog.tags.store');
        
        // Events
        Route::get('/events', [AdminController::class, 'events'])->name('events');
        Route::get('/events/create', [AdminController::class, 'createEvent'])->name('events.create');
        Route::post('/events', [AdminController::class, 'storeEvent'])->name('events.store');
        Route::get('/events/{event}/edit', [AdminController::class, 'editEvent'])->name('events.edit');
        Route::put('/events/{event}', [AdminController::class, 'updateEvent'])->name('events.update');
        Route::delete('/events/{event}', [AdminController::class, 'deleteEvent'])->name('events.delete');
        
        // Media
        Route::get('/media', [AdminController::class, 'media'])->name('media');
        Route::get('/media/create', [AdminController::class, 'createMedia'])->name('media.create');
        Route::post('/media', [AdminController::class, 'storeMedia'])->name('media.store');
        Route::post('/media/upload', [AdminController::class, 'uploadMedia'])->name('media.upload');
        Route::get('/media/{media}/edit', [AdminController::class, 'editMedia'])->name('media.edit');
        Route::put('/media/{media}', [AdminController::class, 'updateMedia'])->name('media.update');
        Route::delete('/media/{media}', [AdminController::class, 'deleteMedia'])->name('media.delete');
        
        // Menus
        Route::get('/menus', [AdminController::class, 'menus'])->name('menus');
        Route::post('/menus', [AdminController::class, 'storeMenuItem'])->name('menus.store');
        Route::put('/menus/{menuItem}', [AdminController::class, 'updateMenuItem'])->name('menus.update');
        Route::delete('/menus/{menuItem}', [AdminController::class, 'deleteMenuItem'])->name('menus.delete');
        
        // Popups
        Route::get('/popups', [AdminController::class, 'popups'])->name('popups');
        Route::post('/popups', [AdminController::class, 'storePopup'])->name('popups.store');
        Route::put('/popups/{popup}', [AdminController::class, 'updatePopup'])->name('popups.update');
        Route::delete('/popups/{popup}', [AdminController::class, 'deletePopup'])->name('popups.delete');
        
        // Team
        Route::get('/team', [AdminController::class, 'team'])->name('team');
        Route::post('/team', [AdminController::class, 'storeTeamMember'])->name('team.store');
        Route::put('/team/{teamMember}', [AdminController::class, 'updateTeamMember'])->name('team.update');
        Route::delete('/team/{teamMember}', [AdminController::class, 'deleteTeamMember'])->name('team.delete');
        
        // Footer
        Route::get('/footer', [AdminController::class, 'footer'])->name('footer');
        Route::post('/footer', [AdminController::class, 'updateFooter'])->name('footer.update');
        
        // Messages
        Route::get('/messages', [AdminController::class, 'contactMessages'])->name('messages.index');
        Route::get('/messages/{contactMessage}', [AdminController::class, 'showContactMessage'])->name('messages.show');
        Route::put('/messages/{contactMessage}', [AdminController::class, 'updateContactMessage'])->name('messages.update');
        Route::get('/messages/newsletter', [AdminController::class, 'newsletterSubscribers'])->name('messages.newsletter');
        
        // SEO
        Route::get('/seo', [AdminController::class, 'seo'])->name('seo');
        Route::post('/seo', [AdminController::class, 'updateSeo'])->name('seo.update');
        
        // Users
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
        Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
        
        // Settings
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
        
        // Security
        Route::get('/security', [AdminController::class, 'security'])->name('security');
        Route::get('/security/logs', [AdminController::class, 'activityLogs'])->name('security.logs');
    });
});
