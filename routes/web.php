<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/ministries', [PageController::class, 'ministries'])->name('ministries');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/events/{slug}', [PageController::class, 'showEvent'])->name('event.show');
Route::get('/events/{slug}/register', [PageController::class, 'eventRegister'])->name('event.register');
Route::post('/events/{event}/register', [\App\Http\Controllers\EventRegistrationController::class, 'store'])->name('event.register.store');
Route::get('/media', [PageController::class, 'media'])->name('media');
// Redirect old /resources to new /resource-library to avoid server conflicts
Route::get('/resources', function () {
    return redirect('/resource-library', 301);
});

Route::get('/resource-library', [PageController::class, 'resources'])->name('resources');
Route::get('/get-involved', [PageController::class, 'getInvolved'])->name('get-involved');
Route::get('/donate', [PageController::class, 'donate'])->name('donate');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/code-of-conduct', [PageController::class, 'codeOfConduct'])->name('code-of-conduct');


Route::get('/codes', [PageController::class, 'codes'])->name('codes');
Route::get('/graduate', [PageController::class, 'graduate'])->name('graduate');
Route::get('/leadership', [PageController::class, 'leadership'])->name('leadership');
Route::get('/history', [PageController::class, 'history'])->name('history');
Route::get('/programs', [PageController::class, 'programs'])->name('programs');
Route::get('/partnerships', [PageController::class, 'partnerships'])->name('partnerships');

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
        Route::get('/pages', [AdminController::class, 'pages'])->name('pages');
        Route::get('/pages/create', [AdminController::class, 'createPage'])->name('pages.create');
        Route::post('/pages', [AdminController::class, 'storePage'])->name('pages.store');
        Route::get('/pages/{page}/edit', [AdminController::class, 'editPage'])->name('pages.edit');
        Route::put('/pages/{page}', [AdminController::class, 'updatePage'])->name('pages.update');
        Route::delete('/pages/{page}', [AdminController::class, 'deletePage'])->name('pages.delete');
        Route::get('/pages/{pageName}/edit-content', [AdminController::class, 'editPageContent'])->name('pages.edit-content');
        Route::post('/pages/{pageName}/update-content', [AdminController::class, 'updatePageContent'])->name('pages.update-content');
        
        // Homepage
        Route::get('/homepage', [AdminController::class, 'homepage'])->name('homepage');
        Route::post('/homepage', [AdminController::class, 'updateHomepage'])->name('homepage.update');
        
        // Carousel Slides
        Route::get('/slides', [AdminController::class, 'carouselSlides'])->name('slides.index');
        Route::get('/slides/create', [AdminController::class, 'createCarouselSlide'])->name('slides.create');
        Route::post('/slides', [AdminController::class, 'storeCarouselSlide'])->name('slides.store');
        Route::get('/slides/{slide}/edit', [AdminController::class, 'editCarouselSlide'])->name('slides.edit');
        Route::put('/slides/{slide}', [AdminController::class, 'updateCarouselSlide'])->name('slides.update');
        Route::delete('/slides/{slide}', [AdminController::class, 'deleteCarouselSlide'])->name('slides.delete');
        
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
        
        // Cloudinary Assets
        Route::get('/cloudinary', [AdminController::class, 'cloudinaryAssets'])->name('cloudinary.index');
        Route::get('/cloudinary/settings', [AdminController::class, 'cloudinarySettings'])->name('cloudinary.settings');
        Route::post('/cloudinary/settings', [AdminController::class, 'updateCloudinarySettings'])->name('cloudinary.settings.update');
        Route::post('/cloudinary/test-connection', [AdminController::class, 'testCloudinaryConnection'])->name('cloudinary.test');
        Route::get('/cloudinary/api/assets', [AdminController::class, 'getCloudinaryAssets'])->name('cloudinary.api.assets');
        
        // Communication Settings
        Route::get('/communication', [AdminController::class, 'communicationSettings'])->name('communication');
        Route::get('/communication/create', [AdminController::class, 'createProvider'])->name('communication.create');
        Route::post('/communication', [AdminController::class, 'storeProvider'])->name('communication.store');
        Route::get('/communication/{provider}', [AdminController::class, 'viewProvider'])->name('communication.view');
        Route::get('/communication/{provider}/edit', [AdminController::class, 'editProvider'])->name('communication.edit');
        Route::put('/communication/{provider}', [AdminController::class, 'updateProvider'])->name('communication.update');
        Route::delete('/communication/{provider}', [AdminController::class, 'deleteProvider'])->name('communication.delete');
        Route::post('/communication/{provider}/test', [AdminController::class, 'testProviderConnection'])->name('communication.test');
        Route::post('/cloudinary/upload', [AdminController::class, 'uploadToCloudinary'])->name('cloudinary.upload');
        Route::delete('/cloudinary/{publicId}', [AdminController::class, 'deleteCloudinaryAsset'])->name('cloudinary.delete');
        
        // Popups
        Route::get('/popups', [AdminController::class, 'popups'])->name('popups');
        Route::post('/popups', [AdminController::class, 'storePopup'])->name('popups.store');
        Route::put('/popups/{popup}', [AdminController::class, 'updatePopup'])->name('popups.update');
        Route::delete('/popups/{popup}', [AdminController::class, 'deletePopup'])->name('popups.delete');
        
        // Team
        Route::get('/team', [AdminController::class, 'team'])->name('team');
        Route::get('/team/create', [AdminController::class, 'createTeamMember'])->name('team.create');
        Route::post('/team', [AdminController::class, 'storeTeamMember'])->name('team.store');
        Route::get('/team/{teamMember}/edit', [AdminController::class, 'editTeamMember'])->name('team.edit');
        Route::put('/team/{teamMember}', [AdminController::class, 'updateTeamMember'])->name('team.update');
        Route::delete('/team/{teamMember}', [AdminController::class, 'deleteTeamMember'])->name('team.delete');
        
        // Footer
        Route::get('/footer', [AdminController::class, 'footer'])->name('footer');
        Route::post('/footer', [AdminController::class, 'updateFooter'])->name('footer.update');
        
        // Donate / Payment Details
        Route::get('/donate', [AdminController::class, 'donateSettings'])->name('donate');
        Route::post('/donate', [AdminController::class, 'updateDonateSettings'])->name('donate.update');
        
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
        Route::get('/security/logs/{log}', [AdminController::class, 'showActivityLog'])->name('security.logs.show');
    });
});
