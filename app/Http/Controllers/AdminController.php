<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['login', 'authenticate']);
    }

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
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records or you are not an admin.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'You have been logged out.');
    }

    public function dashboard()
    {
        $stats = [
            'pages' => Page::count(),
            'active_pages' => Page::where('is_active', true)->count(),
            'media' => Media::count(),
            'images' => Media::where('type', 'image')->count(),
            'videos' => Media::where('type', 'video')->count(),
            'newsletter_subscriptions' => \App\Models\NewsletterSubscription::count(),
        ];

        $recent_pages = Page::latest()->take(5)->get();
        $recent_media = Media::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_pages', 'recent_media'));
    }

    // Pages Management
    public function pages()
    {
        $pages = Page::orderBy('order')->orderBy('created_at', 'desc')->paginate(15);
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
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        Page::create($validated);

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
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $page->update($validated);

        return redirect()->route('admin.pages')->with('success', 'Page updated successfully!');
    }

    public function deletePage(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages')->with('success', 'Page deleted successfully!');
    }

    // Media Management
    public function media()
    {
        $media = Media::orderBy('created_at', 'desc')->paginate(20);
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
            'type' => 'required|in:image,video',
            'url' => 'required|url',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        // If it's a Cloudinary URL, try to extract public_id
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
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi|max:10240',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        try {
            $file = $request->file('file');
            $uploadResult = Cloudinary::upload($file->getRealPath(), [
                'folder' => 'iccr-tanzania',
                'resource_type' => $file->getMimeType() === 'video/mp4' || str_contains($file->getMimeType(), 'video') ? 'video' : 'image',
            ]);

            $mediaData = [
                'title' => $request->title ?? $file->getClientOriginalName(),
                'description' => $request->description,
                'type' => str_contains($file->getMimeType(), 'video') ? 'video' : 'image',
                'url' => $uploadResult->getSecurePath(),
                'cloudinary_public_id' => $uploadResult->getPublicId(),
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'width' => $uploadResult->getWidth() ?? null,
                'height' => $uploadResult->getHeight() ?? null,
                'category' => $request->category,
                'is_active' => true,
            ];

            Media::create($mediaData);

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
        // Delete from Cloudinary if it has a public_id
        if ($media->cloudinary_public_id) {
            try {
                Cloudinary::destroy($media->cloudinary_public_id);
            } catch (\Exception $e) {
                // Log error but continue with database deletion
            }
        }

        $media->delete();
        return redirect()->route('admin.media')->with('success', 'Media deleted successfully!');
    }

    // Settings
    public function settings()
    {
        return view('admin.settings');
    }

    // Editor (for editing page content)
    public function editor()
    {
        return view('admin.editor');
    }
}
