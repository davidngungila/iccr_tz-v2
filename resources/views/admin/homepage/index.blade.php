@extends('admin.layout')

@section('title', 'Homepage Management')
@section('subtitle', 'Manage homepage sections and content')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Homepage Management</h1>
    <p class="text-gray-600 mt-2">Edit hero section, about, vision, mission, and more</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.homepage.update') }}" method="POST">
        @csrf
        
        <!-- Hero Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                Hero Section
            </h2>
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" id="hero_title" name="homepage_hero_title" value="{{ old('homepage_hero_title', $settings['hero_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Welcome to ICCR Tanzania">
                </div>
                
                <div>
                    <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <textarea id="hero_subtitle" name="homepage_hero_subtitle" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Your subtitle text here">{{ old('homepage_hero_subtitle', $settings['hero_subtitle']) }}</textarea>
                </div>
                
                <div>
                    <label for="hero_image" class="block text-sm font-medium text-gray-700 mb-2">Hero Image URL</label>
                    <input type="url" id="hero_image" name="homepage_hero_image" value="{{ old('homepage_hero_image', $settings['hero_image']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="https://example.com/image.jpg">
                    <p class="mt-1 text-sm text-gray-500">Enter Cloudinary URL or external image link</p>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                About Section
            </h2>
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="about_title" class="block text-sm font-medium text-gray-700 mb-2">About Title</label>
                    <input type="text" id="about_title" name="homepage_about_title" value="{{ old('homepage_about_title', $settings['about_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="about_content" class="block text-sm font-medium text-gray-700 mb-2">About Content</label>
                    <div id="about_editor" style="height: 300px;"></div>
                    <textarea name="homepage_about_content" id="about_content" class="hidden">{{ old('homepage_about_content', $settings['about_content']) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Vision
                </h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="vision_title" class="block text-sm font-medium text-gray-700 mb-2">Vision Title</label>
                        <input type="text" id="vision_title" name="homepage_vision_title" value="{{ old('homepage_vision_title', $settings['vision_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="vision_content" class="block text-sm font-medium text-gray-700 mb-2">Vision Content</label>
                        <textarea id="vision_content" name="homepage_vision_content" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('homepage_vision_content', $settings['vision_content']) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Mission
                </h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="mission_title" class="block text-sm font-medium text-gray-700 mb-2">Mission Title</label>
                        <input type="text" id="mission_title" name="homepage_mission_title" value="{{ old('homepage_mission_title', $settings['mission_title']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="mission_content" class="block text-sm font-medium text-gray-700 mb-2">Mission Content</label>
                        <textarea id="mission_content" name="homepage_mission_content" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('homepage_mission_content', $settings['mission_content']) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Easter Conference Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="text-2xl">🔥</span>
                Easter Conference 2026
            </h2>
            
            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="easter_conference_enabled" value="1" {{ old('easter_conference_enabled', $settings['easter_conference_enabled']) ? 'checked' : '' }}
                           class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="text-sm font-medium text-gray-700">Enable Easter Conference Slide</span>
                </label>
            </div>
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Conference Title</label>
                    <input type="text" name="easter_conference_title" value="{{ old('easter_conference_title', $settings['easter_conference_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle (Urgent Message)</label>
                    <input type="text" name="easter_conference_subtitle" value="{{ old('easter_conference_subtitle', $settings['easter_conference_subtitle']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="easter_conference_description" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('easter_conference_description', $settings['easter_conference_description']) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                    <input type="url" name="easter_conference_image" value="{{ old('easter_conference_image', $settings['easter_conference_image']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="https://example.com/image.jpg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Register URL</label>
                    <input type="url" name="easter_conference_register_url" value="{{ old('easter_conference_register_url', $settings['easter_conference_register_url']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="https://example.com/register">
                </div>
            </div>
        </div>

        <!-- Prayer Service Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="text-2xl">🙏</span>
                Prayer Service (HUDUMA YA MAOMBI NA MAOMBEZI)
            </h2>
            
            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="prayer_service_enabled" value="1" {{ old('prayer_service_enabled', $settings['prayer_service_enabled']) ? 'checked' : '' }}
                           class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="text-sm font-medium text-gray-700">Enable Prayer Service Section</span>
                </label>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="prayer_service_title" value="{{ old('prayer_service_title', $settings['prayer_service_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Days</label>
                    <input type="text" name="prayer_service_days" value="{{ old('prayer_service_days', $settings['prayer_service_days']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                    <input type="text" name="prayer_service_time" value="{{ old('prayer_service_time', $settings['prayer_service_time']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Meet Code</label>
                    <input type="text" name="prayer_service_meet_code" value="{{ old('prayer_service_meet_code', $settings['prayer_service_meet_code']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Meet URL</label>
                    <input type="url" name="prayer_service_meet_url" value="{{ old('prayer_service_meet_url', $settings['prayer_service_meet_url']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="https://meet.google.com/">
                </div>
            </div>
        </div>

        <!-- Fundraising Event Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="text-2xl">💰</span>
                Physical Fundraising Event
            </h2>
            
            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="fundraising_enabled" value="1" {{ old('fundraising_enabled', $settings['fundraising_enabled']) ? 'checked' : '' }}
                           class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="text-sm font-medium text-gray-700">Enable Fundraising Section</span>
                </label>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="fundraising_title" value="{{ old('fundraising_title', $settings['fundraising_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                    <input type="text" name="fundraising_date" value="{{ old('fundraising_date', $settings['fundraising_date']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <input type="text" name="fundraising_location" value="{{ old('fundraising_location', $settings['fundraising_location']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="fundraising_description" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('fundraising_description', $settings['fundraising_description']) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Payment Information Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="text-2xl">💳</span>
                Payment Information
            </h2>
            
            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="payment_info_enabled" value="1" {{ old('payment_info_enabled', $settings['payment_info_enabled']) ? 'checked' : '' }}
                           class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="text-sm font-medium text-gray-700">Enable Payment Information Section</span>
                </label>
            </div>
            
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">VODA</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="text" name="payment_voda_phone" value="{{ old('payment_voda_phone', $settings['payment_voda_phone']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Account Name</label>
                            <input type="text" name="payment_voda_name" value="{{ old('payment_voda_name', $settings['payment_voda_name']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Lipa Namba</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lipa Namba</label>
                            <input type="text" name="payment_lipa_namba" value="{{ old('payment_lipa_namba', $settings['payment_lipa_namba']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Account Name</label>
                            <input type="text" name="payment_lipa_namba_name" value="{{ old('payment_lipa_namba_name', $settings['payment_lipa_namba_name']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Bank Account</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bank Name</label>
                            <input type="text" name="payment_bank_name_full" value="{{ old('payment_bank_name_full', $settings['payment_bank_name_full']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Account Number</label>
                            <input type="text" name="payment_bank_account" value="{{ old('payment_bank_account', $settings['payment_bank_account']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Account Name</label>
                            <input type="text" name="payment_bank_name" value="{{ old('payment_bank_name', $settings['payment_bank_name']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lent Schedule Section -->
        <div class="mb-12 pb-8 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="text-2xl">📅</span>
                Lent Schedule (RATIBA YA KWARESMA)
            </h2>
            
            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="lent_schedule_enabled" value="1" {{ old('lent_schedule_enabled', $settings['lent_schedule_enabled']) ? 'checked' : '' }}
                           class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="text-sm font-medium text-gray-700">Enable Lent Schedule Section</span>
                </label>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="lent_schedule_title" value="{{ old('lent_schedule_title', $settings['lent_schedule_title']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Schedule Items (JSON Format)</label>
                    <textarea name="lent_schedule_items" rows="15" id="lent_schedule_items"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-mono text-sm">{{ old('lent_schedule_items', $settings['lent_schedule_items']) }}</textarea>
                    <p class="mt-2 text-xs text-gray-500">Format: [{"name": "Event Name", "date": "Date"}, ...]</p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition font-semibold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Homepage Settings
            </button>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    var aboutQuill = new Quill('#about_editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    // Set initial content
    @if(old('homepage_about_content', $settings['about_content']))
        aboutQuill.root.innerHTML = {!! json_encode(old('homepage_about_content', $settings['about_content'])) !!};
    @endif

    aboutQuill.on('text-change', function() {
        document.getElementById('about_content').value = aboutQuill.root.innerHTML;
    });

    // Update hidden field before form submit
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('about_content').value = aboutQuill.root.innerHTML;
    });
</script>
@endpush
@endsection


