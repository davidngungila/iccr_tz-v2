<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Event;
use App\Models\Media;
use App\Models\MenuItem;
use App\Models\Popup;
use App\Models\TeamMember;
use App\Models\Setting;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscription;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            'media' => Media::count(),
            'newsletter_subscriptions' => NewsletterSubscription::count(),
            'contact_messages' => ContactMessage::where('status', 'new')->count(),
            'team_members' => TeamMember::where('is_active', true)->count(),
        ];

        $recent_pages = Page::latest()->take(5)->get();
        $recent_posts = BlogPost::latest()->take(5)->get();
        $recent_events = Event::latest()->take(5)->get();
        $recent_messages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_pages', 'recent_posts', 'recent_events', 'recent_messages'));
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
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'text', 'homepage');
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Homepage',
            'description' => 'Updated homepage settings',
        ]);

        return redirect()->route('admin.homepage')->with('success', 'Homepage updated successfully!');
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
    
    public function events()
    {
        $events = Event::orderBy('start_date', 'desc')->paginate(20);
        return view('admin.events.index', compact('events'));
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
            'contact_email' => Setting::get('footer_contact_email', 'info@iccr.or.tz'),
            'contact_phone' => Setting::get('footer_contact_phone', '+255 123 456 789'),
            'contact_address' => Setting::get('footer_contact_address', ''),
            'contact_whatsapp' => Setting::get('footer_contact_whatsapp', ''),
            'social_facebook' => Setting::get('footer_social_facebook', ''),
            'social_youtube' => Setting::get('footer_social_youtube', ''),
            'social_instagram' => Setting::get('footer_social_instagram', ''),
            'social_twitter' => Setting::get('footer_social_twitter', ''),
            'social_linkedin' => Setting::get('footer_social_linkedin', ''),
            'social_tiktok' => Setting::get('footer_social_tiktok', ''),
            'copyright_text' => Setting::get('footer_copyright_text', '© 2026 ICCR Tanzania. All rights reserved.'),
            'made_with_text' => Setting::get('footer_made_with_text', 'Made with'),
            'community_text' => Setting::get('footer_community_text', 'for the community'),
            'show_heart' => Setting::get('footer_show_heart', true),
            'about_text' => Setting::get('footer_about_text', 'Inter-Colleges Catholic Charismatic Renewal Tanzania. Uniting Catholic students in colleges and higher education institutions through the Holy Spirit – Unity, Love, Evangelization.'),
            'quick_links_title' => Setting::get('footer_quick_links_title', 'Quick Links'),
            'resources_title' => Setting::get('footer_resources_title', 'Resources'),
            'legal_title' => Setting::get('footer_legal_title', 'Legal'),
        ];
        
        return view('admin.footer.index', compact('settings'));
    }

    public function updateFooter(Request $request)
    {
        $fields = [
            'footer_contact_email', 'footer_contact_phone', 'footer_contact_address', 'footer_contact_whatsapp',
            'footer_social_facebook', 'footer_social_youtube', 'footer_social_instagram', 
            'footer_social_twitter', 'footer_social_linkedin', 'footer_social_tiktok',
            'footer_copyright_text', 'footer_made_with_text', 'footer_community_text',
            'footer_about_text', 'footer_quick_links_title', 'footer_resources_title', 'footer_legal_title',
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
}
