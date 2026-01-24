<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Media;
use App\Models\MenuItem;
use App\Models\Popup;
use App\Models\TeamMember;
use App\Models\Setting;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscription;
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\CarouselSlide;
use App\Models\NotificationProvider;
use App\Models\SystemSetting;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;

class AdminController extends Controller
{
    // ==================== AUTHENTICATION ====================
    
    public function login()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password) && $user->isAdmin()) {
            Auth::login($user, $request->filled('remember'));
            $request->session()->regenerate();
            
            ActivityLog::create([
                'user_id' => $user->id,
                'action' => 'login',
                'description' => 'Admin logged in',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials or you are not an admin.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'logout',
            'description' => 'Admin logged out',
            'ip_address' => $request->ip(),
        ]);
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'You have been logged out.');
    }

    // ==================== DASHBOARD ====================
    
    public function dashboard()
    {
        $stats = [
            'pages' => Page::count(),
            'published_pages' => Page::where('status', 'published')->count(),
            'draft_pages' => Page::where('status', 'draft')->count(),
            'blog_posts' => BlogPost::count(),
            'published_posts' => BlogPost::where('status', 'published')->count(),
            'events' => Event::count(),
            'upcoming_events' => Event::where('status', 'upcoming')->count(),
            'past_events' => Event::where('status', 'past')->count(),
            'featured_events' => Event::where('is_featured', true)->count(),
            'media' => Media::count(),
            'newsletter_subscriptions' => NewsletterSubscription::count(),
            'contact_messages' => ContactMessage::where('status', 'new')->count(),
            'total_messages' => ContactMessage::count(),
            'team_members' => TeamMember::where('is_active', true)->count(),
            'total_team' => TeamMember::count(),
            'carousel_slides' => \App\Models\CarouselSlide::where('is_active', true)->count(),
            'total_slides' => \App\Models\CarouselSlide::count(),
            'event_registrations' => \App\Models\EventRegistration::count(),
            'pending_registrations' => \App\Models\EventRegistration::where('status', 'pending')->count(),
            'confirmed_registrations' => \App\Models\EventRegistration::where('status', 'confirmed')->count(),
            'sms_sent' => \App\Models\EventRegistration::where('sms_sent', true)->count(),
            'activity_logs_today' => ActivityLog::whereDate('created_at', today())->count(),
            'activity_logs_week' => ActivityLog::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'notification_providers' => NotificationProvider::where('is_active', true)->count(),
        ];

        $recent_pages = Page::latest()->take(5)->get();
        $recent_posts = BlogPost::latest()->take(5)->get();
        $recent_events = Event::latest()->take(5)->get();
        $recent_messages = ContactMessage::latest()->take(5)->get();
        $recent_registrations = \App\Models\EventRegistration::with('event')->latest()->take(5)->get();
        $recent_activity = ActivityLog::with('user')->latest()->take(10)->get();
        $upcoming_events = Event::where('status', 'upcoming')->where('start_date', '>=', now())->orderBy('start_date')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_pages', 'recent_posts', 'recent_events', 'recent_messages', 'recent_registrations', 'recent_activity', 'upcoming_events'));
    }

    // ==================== PAGES MANAGEMENT ====================
    
    public function pages()
    {
        $pages = Page::orderBy('order')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.pages.index', compact('pages'));
    }

    public function createPage()
    {
        return view('admin.pages.create');
    }

    public function storePage(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'route_name' => 'nullable|string|max:255',
            'view_path' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
            'order' => 'integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $page = Page::create($validated);
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'Page',
            'model_id' => $page->id,
            'description' => "Created page: {$page->title}",
        ]);

        return redirect()->route('admin.pages')->with('success', 'Page created successfully!');
    }

    public function editPage(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function updatePage(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'route_name' => 'nullable|string|max:255',
            'view_path' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
            'order' => 'integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $page->update($validated);
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Page',
            'model_id' => $page->id,
            'description' => "Updated page: {$page->title}",
        ]);

        return redirect()->route('admin.pages')->with('success', 'Page updated successfully!');
    }

    public function deletePage(Page $page)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'Page',
            'model_id' => $page->id,
            'description' => "Deleted page: {$page->title}",
        ]);
        
        $page->delete();
        return redirect()->route('admin.pages')->with('success', 'Page deleted successfully!');
    }

    public function editPageContent($pageName)
    {
        $validPages = ['about', 'ministries', 'events', 'media', 'resources', 'get-involved', 'contact', 'faq', 'graduate', 'leadership', 'history', 'programs', 'partnerships'];
        if (!in_array($pageName, $validPages)) {
            return redirect()->route('admin.pages')->with('error', 'Invalid page');
        }
        return view('admin.pages.edit-content', compact('pageName'));
    }

    public function updatePageContent(Request $request, $pageName)
    {
        $validPages = ['about', 'ministries', 'events', 'media', 'resources', 'get-involved', 'contact', 'faq', 'graduate', 'leadership', 'history', 'programs', 'partnerships'];
        if (!in_array($pageName, $validPages)) {
            return redirect()->route('admin.pages')->with('error', 'Invalid page');
        }

        foreach ($request->except(['_token']) as $key => $value) {
            Setting::set($pageName . '_' . $key, $value, 'text', 'pages');
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'PageContent',
            'description' => "Updated {$pageName} page content",
        ]);

        return redirect()->route('admin.pages.edit-content', $pageName)->with('success', 'Page content updated successfully!');
    }

    // ==================== HOMEPAGE MANAGEMENT ====================
    
    public function homepage()
    {
        $settings = [
            'hero_title' => Setting::get('homepage_hero_title', ''),
            'hero_subtitle' => Setting::get('homepage_hero_subtitle', ''),
            'hero_image' => Setting::get('homepage_hero_image', ''),
            'about_title' => Setting::get('homepage_about_title', ''),
            'about_content' => Setting::get('homepage_about_content', ''),
            'vision_title' => Setting::get('homepage_vision_title', ''),
            'vision_content' => Setting::get('homepage_vision_content', ''),
            'mission_title' => Setting::get('homepage_mission_title', ''),
            'mission_content' => Setting::get('homepage_mission_content', ''),
            // Easter Conference
            'easter_conference_title' => Setting::get('easter_conference_title', 'International Easter Conference 2026'),
            'easter_conference_subtitle' => Setting::get('easter_conference_subtitle', 'USIFANYE MISTAKE KABISA KUKOSA KONGAMANO HILI!'),
            'easter_conference_description' => Setting::get('easter_conference_description', 'Toka nimeuzulia, nakuwa mpya kifikra, kiujuzi, kiuchumi, mtazamo na kimahusiano, kifamilia na natiwa ujasiri wa uthubutu limetumika kuwa daraja kwa ajili ya watu wengi. MAMBO NI MAZURI - TWENDE KWA PAMOJA!'),
            'easter_conference_image' => Setting::get('easter_conference_image', ''),
            'easter_conference_register_url' => Setting::get('easter_conference_register_url', '#'),
            'easter_conference_enabled' => Setting::get('easter_conference_enabled', true),
            // Prayer Service
            'prayer_service_title' => Setting::get('prayer_service_title', 'HUDUMA YA MAOMBI NA MAOMBEZI'),
            'prayer_service_days' => Setting::get('prayer_service_days', 'Jumatano na Alhamisi'),
            'prayer_service_time' => Setting::get('prayer_service_time', 'Saa 02-03 Usiku'),
            'prayer_service_meet_code' => Setting::get('prayer_service_meet_code', 'jea-zvpr-ctn'),
            'prayer_service_meet_url' => Setting::get('prayer_service_meet_url', 'https://meet.google.com/'),
            'prayer_service_enabled' => Setting::get('prayer_service_enabled', true),
            // Fundraising
            'fundraising_title' => Setting::get('fundraising_title', 'Physical Fundraising Event'),
            'fundraising_date' => Setting::get('fundraising_date', '15 Februari 2026'),
            'fundraising_location' => Setting::get('fundraising_location', 'Jijini MBEYA'),
            'fundraising_description' => Setting::get('fundraising_description', 'Tunawakaribisha sana kwenye Physical Fundraising kuwezesha Kongamano la Kimataifa la Pasaka 2026'),
            'fundraising_enabled' => Setting::get('fundraising_enabled', true),
            // Payment Info
            'payment_voda_phone' => Setting::get('payment_voda_phone', '0792 573 433'),
            'payment_voda_name' => Setting::get('payment_voda_name', 'CCR UMOJA WA VYUO TZ'),
            'payment_lipa_namba' => Setting::get('payment_lipa_namba', '58286111'),
            'payment_lipa_namba_name' => Setting::get('payment_lipa_namba_name', 'CCR UMOJA WA VYUO TZ'),
            'payment_bank_account' => Setting::get('payment_bank_account', '0150027996201'),
            'payment_bank_name' => Setting::get('payment_bank_name', 'Catholic Charismatic Renewal'),
            'payment_bank_name_full' => Setting::get('payment_bank_name_full', 'CRDB Bank'),
            'payment_info_enabled' => Setting::get('payment_info_enabled', true),
            // Lent Schedule
            'lent_schedule_title' => Setting::get('lent_schedule_title', 'RATIBA YA KWARESMA 2026'),
            'lent_schedule_items' => Setting::get('lent_schedule_items', json_encode([
                ['name' => 'Jumatano ya Majivu', 'date' => 'Februari 18, 2026'],
                ['name' => 'Dominika ya Kwanza', 'date' => 'Februari 22, 2026'],
                ['name' => 'Dominika ya Pili', 'date' => 'Machi 1, 2026'],
                ['name' => 'Dominika ya Tatu', 'date' => 'Machi 8, 2026'],
                ['name' => 'Dominika ya Nne (Laetare)', 'date' => 'Machi 15, 2026'],
                ['name' => 'Dominika ya Tano', 'date' => 'Machi 22, 2026'],
                ['name' => 'Dominika ya Matawi', 'date' => 'Machi 29, 2026'],
                ['name' => 'Alhamisi Kuu', 'date' => 'Aprili 2, 2026'],
                ['name' => 'Ijumaa Kuu', 'date' => 'Aprili 3, 2026'],
                ['name' => 'Jumamosi Kuu (Mkesha wa Pasaka)', 'date' => 'Aprili 4, 2026'],
                ['name' => 'Jumapili ya Pasaka', 'date' => 'Aprili 5, 2026'],
            ])),
            'lent_schedule_enabled' => Setting::get('lent_schedule_enabled', true),
        ];
        
        return view('admin.homepage.index', compact('settings'));
    }

    public function updateHomepage(Request $request)
    {
        $fields = [
            'homepage_hero_title', 'homepage_hero_subtitle', 'homepage_hero_image',
            'homepage_about_title', 'homepage_about_content',
            'homepage_vision_title', 'homepage_vision_content',
            'homepage_mission_title', 'homepage_mission_content',
            // Easter Conference
            'easter_conference_title', 'easter_conference_subtitle', 'easter_conference_description',
            'easter_conference_image', 'easter_conference_register_url',
            // Prayer Service
            'prayer_service_title', 'prayer_service_days', 'prayer_service_time',
            'prayer_service_meet_code', 'prayer_service_meet_url',
            // Fundraising
            'fundraising_title', 'fundraising_date', 'fundraising_location', 'fundraising_description',
            // Payment Info
            'payment_voda_phone', 'payment_voda_name', 'payment_lipa_namba', 'payment_lipa_namba_name',
            'payment_bank_account', 'payment_bank_name', 'payment_bank_name_full',
            // Lent Schedule
            'lent_schedule_title', 'lent_schedule_items',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'text', 'homepage');
            }
        }

        // Handle boolean fields
        Setting::set('easter_conference_enabled', $request->has('easter_conference_enabled') ? true : false, 'boolean', 'homepage');
        Setting::set('prayer_service_enabled', $request->has('prayer_service_enabled') ? true : false, 'boolean', 'homepage');
        Setting::set('fundraising_enabled', $request->has('fundraising_enabled') ? true : false, 'boolean', 'homepage');
        Setting::set('payment_info_enabled', $request->has('payment_info_enabled') ? true : false, 'boolean', 'homepage');
        Setting::set('lent_schedule_enabled', $request->has('lent_schedule_enabled') ? true : false, 'boolean', 'homepage');

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Homepage',
            'description' => 'Updated homepage settings',
        ]);

        return redirect()->route('admin.homepage')->with('success', 'Homepage updated successfully!');
    }

    // ==================== CAROUSEL SLIDES MANAGEMENT ====================
    
    public function carouselSlides()
    {
        $slides = CarouselSlide::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function createCarouselSlide()
    {
        return view('admin.slides.create');
    }

    public function storeCarouselSlide(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image_url' => 'required|url',
            'animation_type' => 'required|in:slide-fade,slide-left,slide-right,slide-zoom',
            'button_1_text' => 'nullable|string|max:255',
            'button_1_url' => 'nullable|url',
            'button_2_text' => 'nullable|string|max:255',
            'button_2_url' => 'nullable|url',
            'gradient_from' => 'nullable|string|max:50',
            'gradient_via' => 'nullable|string|max:50',
            'gradient_to' => 'nullable|string|max:50',
            'is_urgent' => 'boolean',
            'urgent_badge_text' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Extract Cloudinary public ID if URL is from Cloudinary
        if (str_contains($validated['image_url'], 'cloudinary.com')) {
            $urlParts = parse_url($validated['image_url']);
            $pathParts = explode('/', trim($urlParts['path'] ?? '', '/'));
            if (count($pathParts) >= 2) {
                $validated['cloudinary_public_id'] = $pathParts[count($pathParts) - 1];
                // Remove file extension
                $validated['cloudinary_public_id'] = preg_replace('/\.[^.]+$/', '', $validated['cloudinary_public_id']);
            }
        }

        $slide = CarouselSlide::create($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'CarouselSlide',
            'model_id' => $slide->id,
            'description' => "Created carousel slide: {$slide->title}",
        ]);

        return redirect()->route('admin.slides.index')->with('success', 'Carousel slide created successfully!');
    }

    public function editCarouselSlide(CarouselSlide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function updateCarouselSlide(Request $request, CarouselSlide $slide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image_url' => 'required|url',
            'animation_type' => 'required|in:slide-fade,slide-left,slide-right,slide-zoom',
            'button_1_text' => 'nullable|string|max:255',
            'button_1_url' => 'nullable|url',
            'button_2_text' => 'nullable|string|max:255',
            'button_2_url' => 'nullable|url',
            'gradient_from' => 'nullable|string|max:50',
            'gradient_via' => 'nullable|string|max:50',
            'gradient_to' => 'nullable|string|max:50',
            'is_urgent' => 'boolean',
            'urgent_badge_text' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Extract Cloudinary public ID if URL is from Cloudinary
        if (str_contains($validated['image_url'], 'cloudinary.com')) {
            $urlParts = parse_url($validated['image_url']);
            $pathParts = explode('/', trim($urlParts['path'] ?? '', '/'));
            if (count($pathParts) >= 2) {
                $validated['cloudinary_public_id'] = $pathParts[count($pathParts) - 1];
                // Remove file extension
                $validated['cloudinary_public_id'] = preg_replace('/\.[^.]+$/', '', $validated['cloudinary_public_id']);
            }
        }

        $slide->update($validated);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'CarouselSlide',
            'model_id' => $slide->id,
            'description' => "Updated carousel slide: {$slide->title}",
        ]);

        return redirect()->route('admin.slides.index')->with('success', 'Carousel slide updated successfully!');
    }

    public function deleteCarouselSlide(CarouselSlide $slide)
    {
        // Delete from Cloudinary if public_id exists
        if ($slide->cloudinary_public_id) {
            try {
                Cloudinary::destroy($slide->cloudinary_public_id);
            } catch (\Exception $e) {
                // Log error but continue
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'CarouselSlide',
            'model_id' => $slide->id,
            'description' => "Deleted carousel slide: {$slide->title}",
        ]);

        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Carousel slide deleted successfully!');
    }

    // ==================== BLOG / NEWS MANAGEMENT ====================
    
    public function blogPosts()
    {
        $posts = BlogPost::with('category')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.blog.index', compact('posts'));
    }

    public function createBlogPost()
    {
        $categories = BlogCategory::orderBy('name')->get();
        $tags = BlogTag::orderBy('name')->get();
        return view('admin.blog.create', compact('categories', 'tags'));
    }

    public function storeBlogPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|url',
            'category_id' => 'nullable|exists:blog_categories,id',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $post = BlogPost::create($validated);
        
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'BlogPost',
            'model_id' => $post->id,
            'description' => "Created blog post: {$post->title}",
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully!');
    }

    public function editBlogPost(BlogPost $blogPost)
    {
        $categories = BlogCategory::orderBy('name')->get();
        $tags = BlogTag::orderBy('name')->get();
        $selectedTags = $blogPost->tags->pluck('id')->toArray();
        return view('admin.blog.edit', compact('blogPost', 'categories', 'tags', 'selectedTags'));
    }

    public function updateBlogPost(Request $request, BlogPost $blogPost)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $blogPost->id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|url',
            'category_id' => 'nullable|exists:blog_categories,id',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $blogPost->update($validated);
        
        if ($request->has('tags')) {
            $blogPost->tags()->sync($request->tags);
        } else {
            $blogPost->tags()->detach();
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'BlogPost',
            'model_id' => $blogPost->id,
            'description' => "Updated blog post: {$blogPost->title}",
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully!');
    }

    public function deleteBlogPost(BlogPost $blogPost)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'BlogPost',
            'model_id' => $blogPost->id,
            'description' => "Deleted blog post: {$blogPost->title}",
        ]);
        
        $blogPost->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully!');
    }

    public function blogCategories()
    {
        $categories = BlogCategory::withCount('posts')->orderBy('order')->orderBy('name')->get();
        return view('admin.blog.categories', compact('categories'));
    }

    public function storeBlogCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug',
            'description' => 'nullable|string',
            'order' => 'integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        BlogCategory::create($validated);
        return redirect()->route('admin.blog.categories')->with('success', 'Category created successfully!');
    }

    public function blogTags()
    {
        $tags = BlogTag::withCount('posts')->orderBy('name')->get();
        return view('admin.blog.tags', compact('tags'));
    }

    public function storeBlogTag(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_tags,slug',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        BlogTag::create($validated);
        return redirect()->route('admin.blog.tags')->with('success', 'Tag created successfully!');
    }

    // ==================== EVENTS MANAGEMENT ====================
    
    public function events(Request $request)
    {
        $query = Event::query();
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $events = $query->orderBy('start_date', 'desc')->paginate(20);
        return view('admin.events.index', compact('events'));
    }
    
    public function eventRegistrations(Event $event)
    {
        $registrations = EventRegistration::where('event_id', $event->id)
            ->orderBy('created_at', 'desc')
            ->paginate(50);
        
        $stats = [
            'total' => EventRegistration::where('event_id', $event->id)->count(),
            'pending' => EventRegistration::where('event_id', $event->id)->where('status', 'pending')->count(),
            'confirmed' => EventRegistration::where('event_id', $event->id)->where('status', 'confirmed')->count(),
            'cancelled' => EventRegistration::where('event_id', $event->id)->where('status', 'cancelled')->count(),
            'sms_sent' => EventRegistration::where('event_id', $event->id)->where('sms_sent', true)->count(),
        ];
        
        return view('admin.events.registrations', compact('event', 'registrations', 'stats'));
    }
    
    public function updateRegistrationStatus(Request $request, EventRegistration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
            'admin_notes' => 'nullable|string|max:1000',
        ]);
        
        $registration->update($validated);
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'EventRegistration',
            'model_id' => $registration->id,
            'description' => "Updated registration status to {$validated['status']} for {$registration->full_name}",
        ]);
        
        return back()->with('success', 'Registration status updated successfully!');
    }
    
    public function exportRegistrationsPDF(Event $event)
    {
        $registrations = EventRegistration::where('event_id', $event->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Generate HTML for PDF
        $html = view('admin.events.export-pdf', compact('event', 'registrations'))->render();
        
        // Return as downloadable HTML (can be printed to PDF by browser)
        return response()->make($html, 200, [
            'Content-Type' => 'text/html',
            'Content-Disposition' => "attachment; filename=\"{$event->slug}-registrations.html\"",
        ]);
    }
    
    public function exportRegistrationsExcel(Event $event)
    {
        $registrations = EventRegistration::where('event_id', $event->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        $data = [];
        $data[] = [
            'ID', 'Full Name', 'Email', 'Phone', 'Campus', 'Institution', 
            'Year of Study', 'Course', 'Accommodation', 'Transportation',
            'Emergency Contact', 'Emergency Phone', 'Status', 'SMS Sent', 'Registered At'
        ];
        
        foreach ($registrations as $reg) {
            $data[] = [
                $reg->id,
                $reg->full_name,
                $reg->email,
                $reg->phone,
                $reg->campus ?? '-',
                $reg->institution ?? '-',
                $reg->year_of_study ?? '-',
                $reg->course ?? '-',
                $reg->accommodation_needed === 'yes' ? 'Yes' : 'No',
                $reg->transportation_needed === 'yes' ? 'Yes' : 'No',
                $reg->emergency_contact_name ?? '-',
                $reg->emergency_contact_phone ?? '-',
                ucfirst($reg->status),
                $reg->sms_sent ? 'Yes' : 'No',
                $reg->created_at->format('Y-m-d H:i:s'),
            ];
        }
        
        $filename = "{$event->slug}-registrations-" . now()->format('Y-m-d') . ".csv";
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];
        
        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
    
    public function generateTicket(Event $event, EventRegistration $registration)
    {
        try {
            // Generate PDF using DomPDF
            $html = view('admin.events.ticket', compact('event', 'registration'))->render();
            
            // Use DomPDF if available, otherwise return HTML for browser print
            if (class_exists('\Dompdf\Dompdf')) {
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                // Set paper size for receipt printer (80mm width)
                $dompdf->setPaper([0, 0, 226.77, 841.89], 'portrait'); // 80mm x auto (80mm = 226.77 points)
                $dompdf->render();
                
                $filename = "ticket-{$event->slug}-{$registration->id}.pdf";
                return $dompdf->stream($filename, ['Attachment' => true]);
            } else {
                // Fallback: Return HTML with proper headers for browser PDF generation
                return response()->make($html, 200, [
                    'Content-Type' => 'text/html; charset=utf-8',
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Ticket generation failed: ' . $e->getMessage());
            // Fallback to HTML view
            return view('admin.events.ticket', compact('event', 'registration'));
        }
    }
    
    public function generateRegistrationPDF(Event $event, EventRegistration $registration)
    {
        try {
            // Generate PDF using DomPDF
            $html = view('admin.events.registration-pdf', compact('event', 'registration'))->render();
            
            // Use DomPDF if available, otherwise return HTML for browser print
            if (class_exists('\Dompdf\Dompdf')) {
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                // Set paper size for receipt printer (80mm width)
                $dompdf->setPaper([0, 0, 226.77, 841.89], 'portrait'); // 80mm x auto (80mm = 226.77 points)
                $dompdf->render();
                
                // Include registrant name in filename
                $safeName = Str::slug($registration->full_name);
                $filename = "{$event->slug}-{$safeName}-{$registration->id}-receipt.pdf";
                return $dompdf->stream($filename, ['Attachment' => true]);
            } else {
                // Fallback: Return HTML with proper headers for browser PDF generation
                return response()->make($html, 200, [
                    'Content-Type' => 'text/html; charset=utf-8',
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Registration PDF generation failed: ' . $e->getMessage());
            // Fallback to HTML view
            return view('admin.events.registration-pdf', compact('event', 'registration'));
        }
    }

    public function createEvent()
    {
        return view('admin.events.create');
    }

    public function storeEvent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:events,slug',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'banner_image' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:upcoming,past,cancelled',
            'is_featured' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $event = Event::create($validated);
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'Event',
            'model_id' => $event->id,
            'description' => "Created event: {$event->title}",
        ]);

        return redirect()->route('admin.events')->with('success', 'Event created successfully!');
    }

    public function editEvent(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function updateEvent(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:events,slug,' . $event->id,
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'banner_image' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:upcoming,past,cancelled',
            'is_featured' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $event->update($validated);
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Event',
            'model_id' => $event->id,
            'description' => "Updated event: {$event->title}",
        ]);

        return redirect()->route('admin.events')->with('success', 'Event updated successfully!');
    }

    public function deleteEvent(Event $event)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'Event',
            'model_id' => $event->id,
            'description' => "Deleted event: {$event->title}",
        ]);
        
        $event->delete();
        return redirect()->route('admin.events')->with('success', 'Event deleted successfully!');
    }

    // ==================== MEDIA LIBRARY ====================
    
    public function media()
    {
        $media = Media::orderBy('created_at', 'desc')->paginate(24);
        return view('admin.media.index', compact('media'));
    }

    public function createMedia()
    {
        return view('admin.media.create');
    }

    public function storeMedia(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video,document',
            'url' => 'required|url',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if (str_contains($validated['url'], 'cloudinary.com')) {
            $urlParts = parse_url($validated['url']);
            $pathParts = explode('/', trim($urlParts['path'] ?? '', '/'));
            if (count($pathParts) >= 2) {
                $validated['cloudinary_public_id'] = $pathParts[count($pathParts) - 1];
            }
        }

        Media::create($validated);
        return redirect()->route('admin.media')->with('success', 'Media added successfully!');
    }

    public function uploadMedia(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi,pdf|max:10240',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        try {
            $file = $request->file('file');
            $mimeType = $file->getMimeType();
            $resourceType = 'auto';
            
            if (str_contains($mimeType, 'pdf')) {
                $resourceType = 'raw';
            } elseif (str_contains($mimeType, 'video')) {
                $resourceType = 'video';
            }

            $uploadResult = Cloudinary::upload($file->getRealPath(), [
                'folder' => 'iccr-tanzania',
                'resource_type' => $resourceType,
            ]);

            $mediaData = [
                'title' => $request->title ?? $file->getClientOriginalName(),
                'description' => $request->description,
                'type' => str_contains($mimeType, 'video') ? 'video' : (str_contains($mimeType, 'pdf') ? 'document' : 'image'),
                'url' => $uploadResult->getSecurePath(),
                'cloudinary_public_id' => $uploadResult->getPublicId(),
                'mime_type' => $mimeType,
                'file_size' => $file->getSize(),
                'width' => $uploadResult->getWidth() ?? null,
                'height' => $uploadResult->getHeight() ?? null,
                'category' => $request->category,
                'is_active' => true,
            ];

            Media::create($mediaData);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'uploaded',
                'model_type' => 'Media',
                'description' => "Uploaded media: {$mediaData['title']}",
            ]);

            return redirect()->route('admin.media')->with('success', 'Media uploaded successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['file' => 'Upload failed: ' . $e->getMessage()])->withInput();
        }
    }

    public function editMedia(Media $media)
    {
        return view('admin.media.edit', compact('media'));
    }

    public function updateMedia(Request $request, Media $media)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $media->update($validated);
        return redirect()->route('admin.media')->with('success', 'Media updated successfully!');
    }

    public function deleteMedia(Media $media)
    {
        if ($media->cloudinary_public_id) {
            try {
                Cloudinary::destroy($media->cloudinary_public_id);
            } catch (\Exception $e) {
                // Log error but continue
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'Media',
            'model_id' => $media->id,
            'description' => "Deleted media: {$media->title}",
        ]);

        $media->delete();
        return redirect()->route('admin.media')->with('success', 'Media deleted successfully!');
    }

    // ==================== MENUS & NAVIGATION ====================
    
    public function menus()
    {
        $mainMenu = MenuItem::where('menu_type', 'main')->whereNull('parent_id')->orderBy('order')->get();
        $footerMenu = MenuItem::where('menu_type', 'footer')->whereNull('parent_id')->orderBy('order')->get();
        return view('admin.menus.index', compact('mainMenu', 'footerMenu'));
    }

    public function storeMenuItem(Request $request)
    {
        $validated = $request->validate([
            'menu_type' => 'required|in:main,footer',
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'integer|min:0',
            'is_external' => 'boolean',
            'is_active' => 'boolean',
        ]);

        MenuItem::create($validated);
        return redirect()->route('admin.menus')->with('success', 'Menu item created successfully!');
    }

    public function updateMenuItem(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'integer|min:0',
            'is_external' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $menuItem->update($validated);
        return redirect()->route('admin.menus')->with('success', 'Menu item updated successfully!');
    }

    public function deleteMenuItem(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('admin.menus')->with('success', 'Menu item deleted successfully!');
    }

    // ==================== POPUPS & ANNOUNCEMENTS ====================
    
    public function popups()
    {
        $popups = Popup::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.popups.index', compact('popups'));
    }

    public function storePopup(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:popup,announcement',
            'content' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url',
            'is_active' => 'boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'display_on' => 'required|in:all,homepage,login',
            'order' => 'integer|min:0',
        ]);

        Popup::create($validated);
        return redirect()->route('admin.popups')->with('success', 'Popup created successfully!');
    }

    public function updatePopup(Request $request, Popup $popup)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:popup,announcement',
            'content' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url',
            'is_active' => 'boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'display_on' => 'required|in:all,homepage,login',
            'order' => 'integer|min:0',
        ]);

        $popup->update($validated);
        return redirect()->route('admin.popups')->with('success', 'Popup updated successfully!');
    }

    public function deletePopup(Popup $popup)
    {
        $popup->delete();
        return redirect()->route('admin.popups')->with('success', 'Popup deleted successfully!');
    }

    // ==================== TEAM & LEADERSHIP ====================
    
    public function team()
    {
        $members = TeamMember::orderBy('order')->orderBy('name')->get();
        return view('admin.team.index', compact('members'));
    }

    public function createTeamMember()
    {
        return view('admin.team.create');
    }

    public function editTeamMember(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    public function storeTeamMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|url',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'social_links' => 'nullable|array',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        TeamMember::create($validated);
        return redirect()->route('admin.team')->with('success', 'Team member added successfully!');
    }

    public function updateTeamMember(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|url',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'social_links' => 'nullable|array',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $teamMember->update($validated);
        return redirect()->route('admin.team')->with('success', 'Team member updated successfully!');
    }

    public function deleteTeamMember(TeamMember $teamMember)
    {
        $teamMember->delete();
        return redirect()->route('admin.team')->with('success', 'Team member deleted successfully!');
    }

    // ==================== FOOTER & INFO ====================
    
    public function footer()
    {
        $settings = [
            'contact_email' => Setting::get('footer_contact_email', ''),
            'contact_phone' => Setting::get('footer_contact_phone', ''),
            'contact_address' => Setting::get('footer_contact_address', ''),
            'social_facebook' => Setting::get('footer_social_facebook', ''),
            'social_youtube' => Setting::get('footer_social_youtube', ''),
            'social_instagram' => Setting::get('footer_social_instagram', ''),
            'copyright_text' => Setting::get('footer_copyright_text', '© 2026 ICCR Tanzania. All rights reserved.'),
            'made_with_text' => Setting::get('footer_made_with_text', 'Made with'),
            'community_text' => Setting::get('footer_community_text', 'for the community'),
            'show_heart' => Setting::get('footer_show_heart', true),
        ];
        
        return view('admin.footer.index', compact('settings'));
    }

    public function updateFooter(Request $request)
    {
        $fields = [
            'footer_contact_email', 'footer_contact_phone', 'footer_contact_address',
            'footer_social_facebook', 'footer_social_youtube', 'footer_social_instagram',
            'footer_copyright_text', 'footer_made_with_text', 'footer_community_text',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'text', 'footer');
            }
        }

        // Handle boolean field
        Setting::set('footer_show_heart', $request->has('footer_show_heart') ? true : false, 'boolean', 'footer');

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Footer',
            'description' => 'Updated footer settings',
        ]);

        return redirect()->route('admin.footer')->with('success', 'Footer settings updated successfully!');
    }

    // ==================== DONATE / PAYMENT DETAILS ====================
    
    public function donateSettings()
    {
        $settings = [
            'donate_title' => Setting::get('donate_title', 'Support Our Mission'),
            'donate_description' => Setting::get('donate_description', 'Your generous contributions help us organize events, provide resources, and serve our communities across Tanzania.'),
            'donate_vodacom_phone' => Setting::get('donate_vodacom_phone', ''),
            'donate_vodacom_name' => Setting::get('donate_vodacom_name', ''),
            'donate_tigopesa_phone' => Setting::get('donate_tigopesa_phone', ''),
            'donate_tigopesa_name' => Setting::get('donate_tigopesa_name', ''),
            'donate_airtelmoney_phone' => Setting::get('donate_airtelmoney_phone', ''),
            'donate_airtelmoney_name' => Setting::get('donate_airtelmoney_name', ''),
            'donate_mpesa_phone' => Setting::get('donate_mpesa_phone', ''),
            'donate_mpesa_name' => Setting::get('donate_mpesa_name', ''),
            'donate_bank_account' => Setting::get('donate_bank_account', ''),
            'donate_bank_name' => Setting::get('donate_bank_name', ''),
            'donate_bank_branch' => Setting::get('donate_bank_branch', ''),
            'donate_bank_swift' => Setting::get('donate_bank_swift', ''),
            'donate_paypal_email' => Setting::get('donate_paypal_email', ''),
            'donate_other_methods' => Setting::get('donate_other_methods', ''),
        ];
        
        return view('admin.donate.index', compact('settings'));
    }

    public function updateDonateSettings(Request $request)
    {
        $fields = [
            'donate_title', 'donate_description',
            'donate_vodacom_phone', 'donate_vodacom_name',
            'donate_tigopesa_phone', 'donate_tigopesa_name',
            'donate_airtelmoney_phone', 'donate_airtelmoney_name',
            'donate_mpesa_phone', 'donate_mpesa_name',
            'donate_bank_account', 'donate_bank_name', 'donate_bank_branch', 'donate_bank_swift',
            'donate_paypal_email', 'donate_other_methods',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'text', 'donate');
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'DonateSettings',
            'description' => 'Updated donation/payment details',
        ]);

        return redirect()->route('admin.donate')->with('success', 'Payment details updated successfully!');
    }

    // ==================== FORMS & MESSAGES ====================
    
    public function contactMessages()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function showContactMessage(ContactMessage $contactMessage)
    {
        if ($contactMessage->status === 'new') {
            $contactMessage->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }
        return view('admin.messages.show', compact('contactMessage'));
    }

    public function updateContactMessage(Request $request, ContactMessage $contactMessage)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
            'admin_notes' => 'nullable|string',
        ]);

        $contactMessage->update($validated);
        return redirect()->route('admin.messages.show', $contactMessage)->with('success', 'Message updated successfully!');
    }

    public function newsletterSubscribers()
    {
        $subscribers = NewsletterSubscription::orderBy('created_at', 'desc')->paginate(50);
        return view('admin.messages.newsletter', compact('subscribers'));
    }

    // ==================== SEO & ANALYTICS ====================
    
    public function seo()
    {
        $settings = [
            'google_analytics' => Setting::get('seo_google_analytics', ''),
            'meta_default_title' => Setting::get('seo_meta_default_title', ''),
            'meta_default_description' => Setting::get('seo_meta_default_description', ''),
            'og_image' => Setting::get('seo_og_image', ''),
        ];
        
        return view('admin.seo.index', compact('settings'));
    }

    public function updateSeo(Request $request)
    {
        $fields = [
            'seo_google_analytics',
            'seo_meta_default_title',
            'seo_meta_default_description',
            'seo_og_image',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'text', 'seo');
            }
        }

        return redirect()->route('admin.seo')->with('success', 'SEO settings updated successfully!');
    }

    // ==================== USERS ====================
    
    public function users()
    {
        $users = User::where('is_admin', true)->orWhere('is_admin', false)->orderBy('is_admin', 'desc')->orderBy('name')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('admin.users')->with('success', 'User created successfully!');
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    // ==================== SETTINGS ====================
    
    public function settings()
    {
        $settings = [
            'website_name' => Setting::get('website_name', 'ICCR Tanzania'),
            'website_logo' => Setting::get('website_logo', ''),
            'favicon' => Setting::get('favicon', ''),
            'primary_color' => Setting::get('theme_primary_color', '#16a34a'),
            'secondary_color' => Setting::get('theme_secondary_color', '#2563eb'),
            'language' => Setting::get('website_language', 'en'),
            'timezone' => Setting::get('website_timezone', 'Africa/Dar_es_Salaam'),
            'maintenance_mode' => Setting::get('maintenance_mode', '0'),
        ];
        
        return view('admin.settings.index', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $fields = [
            'website_name', 'website_logo', 'favicon',
            'theme_primary_color', 'theme_secondary_color',
            'website_language', 'website_timezone', 'maintenance_mode',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $type = in_array($field, ['website_logo', 'favicon']) ? 'image' : (in_array($field, ['theme_primary_color', 'theme_secondary_color']) ? 'color' : 'text');
                $group = in_array($field, ['theme_primary_color', 'theme_secondary_color']) ? 'theme' : 'general';
                Setting::set($field, $request->input($field), $type, $group);
            }
        }

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully!');
    }

    // ==================== SECURITY ====================
    
    public function security()
    {
        $logs = ActivityLog::with('user')->orderBy('created_at', 'desc')->take(10)->get();
        return view('admin.security.index', compact('logs'));
    }

    public function activityLogs()
    {
        $logs = ActivityLog::with('user')->orderBy('created_at', 'desc')->paginate(100);
        return view('admin.security.logs', compact('logs'));
    }

    public function showActivityLog(ActivityLog $log)
    {
        $log->load('user');
        return view('admin.security.log-detail', compact('log'));
    }

    // ==================== CLOUDINARY ASSETS MANAGEMENT ====================
    
    public function cloudinaryAssets()
    {
        return view('admin.cloudinary.index');
    }

    public function getCloudinaryAssets(Request $request)
    {
        try {
            $nextCursor = $request->get('next_cursor');
            $maxResults = $request->get('max_results', 50);
            $folder = $request->get('folder', 'iccr-tanzania');
            $resourceType = $request->get('resource_type', 'image');
            
            // Use Cloudinary Admin API
            $options = [
                'resource_type' => $resourceType,
                'max_results' => $maxResults,
            ];
            
            if ($nextCursor) {
                $options['next_cursor'] = $nextCursor;
            }
            
            if ($folder) {
                $options['prefix'] = $folder . '/';
            }
            
            // Get Admin API instance
            $adminApi = new \Cloudinary\Api\Admin\AdminApi();
            $result = $adminApi->assets($options);
            
            return response()->json([
                'success' => true,
                'assets' => $result['resources'] ?? [],
                'next_cursor' => $result['next_cursor'] ?? null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch assets: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function uploadToCloudinary(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi,pdf|max:10240',
            'folder' => 'nullable|string|max:255',
        ]);

        try {
            $file = $request->file('file');
            $mimeType = $file->getMimeType();
            $resourceType = 'auto';
            
            if (str_contains($mimeType, 'pdf')) {
                $resourceType = 'raw';
            } elseif (str_contains($mimeType, 'video')) {
                $resourceType = 'video';
            }

            $uploadOptions = [
                'folder' => $request->folder ?? 'iccr-tanzania',
                'resource_type' => $resourceType,
            ];

            $uploadResult = Cloudinary::upload($file->getRealPath(), $uploadOptions);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'uploaded',
                'model_type' => 'CloudinaryAsset',
                'description' => "Uploaded asset to Cloudinary: {$uploadResult->getPublicId()}",
            ]);

            return response()->json([
                'success' => true,
                'asset' => [
                    'public_id' => $uploadResult->getPublicId(),
                    'secure_url' => $uploadResult->getSecurePath(),
                    'url' => $uploadResult->getSecurePath(),
                    'width' => $uploadResult->getWidth(),
                    'height' => $uploadResult->getHeight(),
                    'format' => $uploadResult->getExtension(),
                    'bytes' => $uploadResult->getSize(),
                ],
                'message' => 'Asset uploaded successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteCloudinaryAsset($publicId)
    {
        try {
            // Decode the public ID if it's URL encoded
            $publicId = urldecode($publicId);
            
            $result = Cloudinary::destroy($publicId);
            
            if ($result['result'] === 'ok' || $result['result'] === 'not found') {
                ActivityLog::create([
                    'user_id' => Auth::id(),
                    'action' => 'deleted',
                    'model_type' => 'CloudinaryAsset',
                    'description' => "Deleted asset from Cloudinary: {$publicId}",
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Asset deleted successfully!',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete asset',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Delete failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    // ==================== CLOUDINARY SETTINGS ====================
    
    public function cloudinarySettings()
    {
        // Get from database, fallback to env
        $cloudName = SystemSetting::getValue('cloudinary_cloud_name') ?: env('CLOUDINARY_CLOUD_NAME', config('cloudinary.cloud_name'));
        $apiKey = SystemSetting::getValue('cloudinary_key') ?: env('CLOUDINARY_KEY', config('cloudinary.api_key'));
        $apiSecret = SystemSetting::getValue('cloudinary_secret') ?: env('CLOUDINARY_SECRET', config('cloudinary.api_secret'));
        $uploadPreset = SystemSetting::getValue('cloudinary_upload_preset') ?: env('CLOUDINARY_UPLOAD_PRESET', config('cloudinary.upload_preset'));
        
        // Test connection
        $connectionStatus = 'disconnected';
        $connectionMessage = '';
        
        try {
            if ($cloudName && $apiKey && $apiSecret) {
                // Temporarily set config for testing
                config(['cloudinary.cloud_name' => $cloudName]);
                config(['cloudinary.api_key' => $apiKey]);
                config(['cloudinary.api_secret' => $apiSecret]);
                
                $adminApi = new \Cloudinary\Api\Admin\AdminApi();
                $result = $adminApi->ping();
                $connectionStatus = 'connected';
                $connectionMessage = 'Successfully connected to Cloudinary!';
            } else {
                $connectionMessage = 'Cloudinary credentials are not configured. Please configure them below.';
            }
        } catch (\Exception $e) {
            $connectionMessage = 'Connection failed: ' . $e->getMessage();
        }
        
        return view('admin.cloudinary.settings', compact('cloudName', 'apiKey', 'apiSecret', 'uploadPreset', 'connectionStatus', 'connectionMessage'));
    }

    public function updateCloudinarySettings(Request $request)
    {
        $validated = $request->validate([
            'cloudinary_cloud_name' => 'required|string|max:255',
            'cloudinary_key' => 'required|string|max:255',
            'cloudinary_secret' => 'required|string|max:255',
            'cloudinary_upload_preset' => 'nullable|string|max:255',
        ]);

        try {
            // Save to database
            SystemSetting::setValue('cloudinary_cloud_name', $validated['cloudinary_cloud_name'], 'text', 'cloudinary', 'Cloudinary Cloud Name');
            SystemSetting::setValue('cloudinary_key', $validated['cloudinary_key'], 'text', 'cloudinary', 'Cloudinary API Key');
            SystemSetting::setValue('cloudinary_secret', $validated['cloudinary_secret'], 'text', 'cloudinary', 'Cloudinary API Secret');
            if ($request->filled('cloudinary_upload_preset')) {
                SystemSetting::setValue('cloudinary_upload_preset', $validated['cloudinary_upload_preset'], 'text', 'cloudinary', 'Cloudinary Upload Preset');
            }

            // Update config cache
            config(['cloudinary.cloud_name' => $validated['cloudinary_cloud_name']]);
            config(['cloudinary.api_key' => $validated['cloudinary_key']]);
            config(['cloudinary.api_secret' => $validated['cloudinary_secret']]);
            if ($request->filled('cloudinary_upload_preset')) {
                config(['cloudinary.upload_preset' => $validated['cloudinary_upload_preset']]);
            }

            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'updated',
                'model_type' => 'CloudinarySettings',
                'model_id' => 0,
                'description' => 'Updated Cloudinary configuration',
            ]);

            return redirect()->route('admin.cloudinary.settings')->with('success', 'Cloudinary settings updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update settings: ' . $e->getMessage())->withInput();
        }
    }

    public function testCloudinaryConnection(Request $request)
    {
        try {
            // Get from database, fallback to env
            $cloudName = SystemSetting::getValue('cloudinary_cloud_name') ?: env('CLOUDINARY_CLOUD_NAME', config('cloudinary.cloud_name'));
            $apiKey = SystemSetting::getValue('cloudinary_key') ?: env('CLOUDINARY_KEY', config('cloudinary.api_key'));
            $apiSecret = SystemSetting::getValue('cloudinary_secret') ?: env('CLOUDINARY_SECRET', config('cloudinary.api_secret'));
            
            if (!$cloudName || !$apiKey || !$apiSecret) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cloudinary credentials are not configured. Please configure them first.',
                ], 400);
            }

            // Temporarily set config for testing
            config(['cloudinary.cloud_name' => $cloudName]);
            config(['cloudinary.api_key' => $apiKey]);
            config(['cloudinary.api_secret' => $apiSecret]);
            
            $adminApi = new \Cloudinary\Api\Admin\AdminApi();
            $result = $adminApi->ping();
            
            return response()->json([
                'success' => true,
                'message' => 'Successfully connected to Cloudinary!',
                'cloud_name' => $cloudName,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Connection failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    // ==================== COMMUNICATION SETTINGS ====================
    
    public function communicationSettings()
    {
        $providers = NotificationProvider::orderBy('type')->orderBy('is_primary', 'desc')->orderBy('name')->get();
        
        return view('admin.communication.index', compact('providers'));
    }

    public function viewProvider(NotificationProvider $provider)
    {
        return view('admin.communication.view', compact('provider'));
    }

    public function editProvider(NotificationProvider $provider)
    {
        return view('admin.communication.edit', compact('provider'));
    }

    public function createProvider(Request $request)
    {
        $type = $request->get('type', 'sms');
        return view('admin.communication.create', compact('type'));
    }

    public function storeProvider(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:sms,email',
            'is_primary' => 'boolean',
            'is_active' => 'boolean',
            
            // SMS fields
            'sms_username' => 'nullable|string|max:255',
            'sms_password' => 'required_if:type,sms|nullable|string|max:255',
            'sms_from' => 'required_if:type,sms|nullable|string|max:255',
            'sms_url' => 'required_if:type,sms|nullable|url|max:500',
            
            // Email fields
            'mail_host' => 'required_if:type,email|nullable|string|max:255',
            'mail_port' => 'required_if:type,email|nullable|integer|min:1|max:65535',
            'mail_username' => 'required_if:type,email|nullable|string|max:255',
            'mail_password' => 'required_if:type,email|nullable|string|max:255',
            'mail_encryption' => 'required_if:type,email|nullable|in:tls,ssl,none',
            'mail_from_address' => 'required_if:type,email|nullable|email|max:255',
            'mail_from_name' => 'required_if:type,email|nullable|string|max:255',
            
            'notes' => 'nullable|string|max:1000',
        ]);

        // If setting as primary, unset other primary providers of same type
        if ($request->filled('is_primary') && $request->is_primary) {
            NotificationProvider::where('type', $validated['type'])
                ->where('id', '!=', $request->id ?? 0)
                ->update(['is_primary' => false]);
        }

        $provider = NotificationProvider::create($validated);
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'NotificationProvider',
            'model_id' => $provider->id,
            'description' => "Created {$validated['type']} provider: {$provider->name}",
        ]);

        return redirect()->route('admin.communication')->with('success', 'Provider created successfully!');
    }

    public function updateProvider(Request $request, NotificationProvider $provider)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:sms,email',
            'is_primary' => 'boolean',
            'is_active' => 'boolean',
            
            // SMS fields
            'sms_username' => 'nullable|string|max:255',
            'sms_password' => 'required_if:type,sms|string|max:500|min:1',
            'sms_from' => 'required_if:type,sms|nullable|string|max:255',
            'sms_url' => 'required_if:type,sms|nullable|url|max:500',
            
            // Email fields
            'mail_host' => 'required_if:type,email|nullable|string|max:255',
            'mail_port' => 'required_if:type,email|nullable|integer|min:1|max:65535',
            'mail_username' => 'required_if:type,email|nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'required_if:type,email|nullable|in:tls,ssl,none',
            'mail_from_address' => 'required_if:type,email|nullable|email|max:255',
            'mail_from_name' => 'required_if:type,email|nullable|string|max:255',
            
            'notes' => 'nullable|string|max:1000',
        ]);

        // If setting as primary, unset other primary providers of same type
        if ($request->filled('is_primary') && $request->is_primary) {
            NotificationProvider::where('type', $validated['type'])
                ->where('id', '!=', $provider->id)
                ->update(['is_primary' => false]);
        }

        // Handle password/token updates
        // For SMS: Always update the Bearer token from request
        // For Email: Only update if provided and not empty (allow blank to keep current)
        if ($provider->type === 'sms') {
            // Always update SMS password/token from request - get directly from request
            $tokenValue = $request->input('sms_password');
            if ($tokenValue !== null) {
                // Token was provided in form, update it (even if empty string)
                $validated['sms_password'] = trim($tokenValue);
            } else {
                // Token not in request, keep current value
                unset($validated['sms_password']);
            }
        }
        
        if ($provider->type === 'email') {
            // For email, only update if provided and not empty
            if (empty($validated['mail_password'])) {
                unset($validated['mail_password']);
            }
        }

        // Log the update for debugging
        \Illuminate\Support\Facades\Log::info('Updating NotificationProvider', [
            'provider_id' => $provider->id,
            'type' => $provider->type,
            'has_sms_password' => isset($validated['sms_password']),
            'sms_password_length' => isset($validated['sms_password']) ? strlen($validated['sms_password']) : 0,
            'request_has_sms_password' => $request->has('sms_password'),
            'request_sms_password_value' => $request->input('sms_password') ? substr($request->input('sms_password'), 0, 10) . '...' : 'empty',
        ]);

        // Update the provider
        $updateResult = $provider->update($validated);
        
        // Verify the update
        $provider->refresh();
        
        \Illuminate\Support\Facades\Log::info('NotificationProvider update completed', [
            'provider_id' => $provider->id,
            'update_result' => $updateResult,
            'sms_password_updated' => $provider->sms_password ? substr($provider->sms_password, 0, 10) . '...' : 'empty',
            'sms_password_length' => $provider->sms_password ? strlen($provider->sms_password) : 0,
        ]);
        
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'NotificationProvider',
            'model_id' => $provider->id,
            'description' => "Updated {$validated['type']} provider: {$provider->name}",
        ]);

        return redirect()->route('admin.communication')->with('success', 'Provider updated successfully!');
    }

    public function deleteProvider(NotificationProvider $provider)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'NotificationProvider',
            'model_id' => $provider->id,
            'description' => "Deleted {$provider->type} provider: {$provider->name}",
        ]);
        
        $provider->delete();
        return redirect()->route('admin.communication')->with('success', 'Provider deleted successfully!');
    }

    public function testProviderConnection(Request $request, NotificationProvider $provider)
    {
        $request->validate([
            'test_value' => 'required|string',
        ]);

        try {
            $notificationService = new NotificationService();
            
            if ($provider->type === 'sms') {
                $message = 'Test SMS from ICCR Tanzania. If you receive this, your SMS configuration is working correctly!';
                $result = $notificationService->sendSMS($request->test_value, $message, $provider);
            } else {
                $subject = 'Test Email from ICCR Tanzania';
                $message = 'This is a test email. If you receive this, your email configuration is working correctly!';
                $result = $notificationService->sendEmail($request->test_value, $subject, $message, [], $provider);
            }
            
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => $provider->type === 'sms' 
                        ? 'SMS sent successfully! Please check the phone number.' 
                        : 'Test email sent successfully! Please check your inbox.',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => ucfirst($provider->type) . ' sending failed. Please check your configuration and logs.',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Test failed: ' . $e->getMessage(),
            ], 500);
        }
    }

}
