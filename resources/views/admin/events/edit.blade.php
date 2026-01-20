@extends('admin.layout')

@section('title', 'Edit Event')
@section('subtitle', 'Update event details')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Edit Event</h1>
    <p class="text-gray-600 mt-2">Update event information</p>
</div>

<div class="bg-white rounded-xl shadow-lg p-8">
    <form action="{{ route('admin.events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Event Title (English) *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label for="title_sw" class="block text-sm font-medium text-gray-700 mb-2">Event Title (Swahili)</label>
                <input type="text" id="title_sw" name="title_sw" value="{{ old('title_sw', $event->title_sw) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="mb-6">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $event->slug) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Short Description (English)</label>
            <textarea id="description" name="description" rows="3"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="description_sw" class="block text-sm font-medium text-gray-700 mb-2">Short Description (Swahili)</label>
            <textarea id="description_sw" name="description_sw" rows="3"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description_sw', $event->description_sw) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content (English)</label>
            <div id="editor" style="height: 300px;"></div>
            <textarea name="content" id="content" class="hidden">{{ old('content', $event->content) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="content_sw" class="block text-sm font-medium text-gray-700 mb-2">Content (Swahili)</label>
            <div id="editor_sw" style="height: 300px;"></div>
            <textarea name="content_sw" id="content_sw" class="hidden">{{ old('content_sw', $event->content_sw) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="full_details" class="block text-sm font-medium text-gray-700 mb-2">Full Details (English)</label>
            <textarea id="full_details" name="full_details" rows="6"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('full_details', $event->full_details) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="full_details_sw" class="block text-sm font-medium text-gray-700 mb-2">Full Details (Swahili)</label>
            <textarea id="full_details_sw" name="full_details_sw" rows="6"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('full_details_sw', $event->full_details_sw) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="banner_image" class="block text-sm font-medium text-gray-700 mb-2">Banner Image URL</label>
                <input type="url" id="banner_image" name="banner_image" value="{{ old('banner_image', $event->banner_image) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <input type="text" id="location" name="location" value="{{ old('location', $event->location) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date & Time *</label>
                <input type="datetime-local" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date ? $event->start_date->format('Y-m-d\TH:i') : '') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date & Time</label>
                <input type="datetime-local" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date ? $event->end_date->format('Y-m-d\TH:i') : '') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <!-- Prayer Meeting Section -->
        <div class="mb-8 p-6 bg-purple-50 rounded-lg border-2 border-purple-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Prayer Meeting Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="prayer_meeting_link" class="block text-sm font-medium text-gray-700 mb-2">Prayer Meeting Link (Google Meet)</label>
                    <input type="url" id="prayer_meeting_link" name="prayer_meeting_link" value="{{ old('prayer_meeting_link', $event->prayer_meeting_link) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           placeholder="https://meet.google.com/...">
                </div>
                <div>
                    <label for="prayer_meeting_code" class="block text-sm font-medium text-gray-700 mb-2">Meeting Code</label>
                    <input type="text" id="prayer_meeting_code" name="prayer_meeting_code" value="{{ old('prayer_meeting_code', $event->prayer_meeting_code) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
            </div>
            <div class="mb-4">
                <label for="prayer_schedule" class="block text-sm font-medium text-gray-700 mb-2">Prayer Schedule (English)</label>
                <textarea id="prayer_schedule" name="prayer_schedule" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ old('prayer_schedule', $event->prayer_schedule) }}</textarea>
            </div>
            <div>
                <label for="prayer_schedule_sw" class="block text-sm font-medium text-gray-700 mb-2">Prayer Schedule (Swahili)</label>
                <textarea id="prayer_schedule_sw" name="prayer_schedule_sw" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ old('prayer_schedule_sw', $event->prayer_schedule_sw) }}</textarea>
            </div>
        </div>

        <!-- Payment Information Section -->
        <div class="mb-8 p-6 bg-green-50 rounded-lg border-2 border-green-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Payment Information</h3>
            <div class="mb-4">
                <label for="payment_info" class="block text-sm font-medium text-gray-700 mb-2">Payment Info (English)</label>
                <textarea id="payment_info" name="payment_info" rows="5"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('payment_info', $event->payment_info) }}</textarea>
            </div>
            <div>
                <label for="payment_info_sw" class="block text-sm font-medium text-gray-700 mb-2">Payment Info (Swahili)</label>
                <textarea id="payment_info_sw" name="payment_info_sw" rows="5"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('payment_info_sw', $event->payment_info_sw) }}</textarea>
            </div>
        </div>

        <!-- Registration & Contact Section -->
        <div class="mb-8 p-6 bg-blue-50 rounded-lg border-2 border-blue-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Registration & Contact</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">Contact Phone</label>
                    <input type="text" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $event->contact_phone) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                    <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $event->contact_email) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div class="mb-4">
                <label for="registration_info" class="block text-sm font-medium text-gray-700 mb-2">Registration Info (English)</label>
                <textarea id="registration_info" name="registration_info" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('registration_info', $event->registration_info) }}</textarea>
            </div>
            <div>
                <label for="registration_info_sw" class="block text-sm font-medium text-gray-700 mb-2">Registration Info (Swahili)</label>
                <textarea id="registration_info_sw" name="registration_info_sw" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('registration_info_sw', $event->registration_info_sw) }}</textarea>
            </div>
        </div>

        <!-- Schedule Section -->
        <div class="mb-8 p-6 bg-yellow-50 rounded-lg border-2 border-yellow-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Event Schedule</h3>
            <div class="mb-4">
                <label for="schedule" class="block text-sm font-medium text-gray-700 mb-2">Schedule (English)</label>
                <textarea id="schedule" name="schedule" rows="6"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">{{ old('schedule', $event->schedule) }}</textarea>
            </div>
            <div>
                <label for="schedule_sw" class="block text-sm font-medium text-gray-700 mb-2">Schedule (Swahili)</label>
                <textarea id="schedule_sw" name="schedule_sw" rows="6"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">{{ old('schedule_sw', $event->schedule_sw) }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select id="status" name="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="upcoming" {{ old('status', $event->status) === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="past" {{ old('status', $event->status) === 'past' ? 'selected' : '' }}>Past</option>
                    <option value="cancelled" {{ old('status', $event->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="flex items-center pt-8">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Featured Event</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                Update Event
            </button>
            <a href="{{ route('admin.events') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    var quill = new Quill('#editor', {
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

    quill.root.innerHTML = {!! json_encode(old('content', $event->content ?? '')) !!};

    quill.on('text-change', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });

    // Swahili content editor
    var quillSw = new Quill('#editor_sw', {
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

    quillSw.root.innerHTML = {!! json_encode(old('content_sw', $event->content_sw ?? '')) !!};

    quillSw.on('text-change', function() {
        document.getElementById('content_sw').value = quillSw.root.innerHTML;
    });

    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('content').value = quill.root.innerHTML;
        document.getElementById('content_sw').value = quillSw.root.innerHTML;
    });
</script>
@endpush
@endsection

