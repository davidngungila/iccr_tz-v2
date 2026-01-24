@extends('admin.layout')

@section('title', 'Payment Details')
@section('subtitle', 'Manage Donation & Payment Information')

@section('content')
<div class="bg-white rounded-xl shadow-lg p-8">
    <form method="POST" action="{{ route('admin.donate.update') }}">
        @csrf
        
        <!-- Page Title & Description -->
        <div class="mb-8 pb-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Page Content</h2>
            
            <div class="space-y-6">
                <div>
                    <label for="donate_title" class="block text-sm font-semibold text-gray-700 mb-2">Page Title *</label>
                    <input type="text" id="donate_title" name="donate_title" value="{{ old('donate_title', $settings['donate_title']) }}" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                
                <div>
                    <label for="donate_description" class="block text-sm font-semibold text-gray-700 mb-2">Page Description *</label>
                    <textarea id="donate_description" name="donate_description" rows="3" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">{{ old('donate_description', $settings['donate_description']) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Mobile Money Payments -->
        <div class="mb-8 pb-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Mobile Money Payments</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Vodacom M-Pesa -->
                <div class="bg-green-50 rounded-lg p-6 border-2 border-green-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="text-green-600">📱</span>
                        Vodacom M-Pesa
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label for="donate_vodacom_phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="text" id="donate_vodacom_phone" name="donate_vodacom_phone" value="{{ old('donate_vodacom_phone', $settings['donate_vodacom_phone']) }}" placeholder="e.g., 255622239304" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        </div>
                        <div>
                            <label for="donate_vodacom_name" class="block text-sm font-semibold text-gray-700 mb-2">Account Name</label>
                            <input type="text" id="donate_vodacom_name" name="donate_vodacom_name" value="{{ old('donate_vodacom_name', $settings['donate_vodacom_name']) }}" placeholder="e.g., ICCR TANZANIA" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                        </div>
                    </div>
                </div>

                <!-- Tigo Pesa -->
                <div class="bg-blue-50 rounded-lg p-6 border-2 border-blue-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="text-blue-600">📱</span>
                        Tigo Pesa
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label for="donate_tigopesa_phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="text" id="donate_tigopesa_phone" name="donate_tigopesa_phone" value="{{ old('donate_tigopesa_phone', $settings['donate_tigopesa_phone']) }}" placeholder="e.g., 255622239304" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                        </div>
                        <div>
                            <label for="donate_tigopesa_name" class="block text-sm font-semibold text-gray-700 mb-2">Account Name</label>
                            <input type="text" id="donate_tigopesa_name" name="donate_tigopesa_name" value="{{ old('donate_tigopesa_name', $settings['donate_tigopesa_name']) }}" placeholder="e.g., ICCR TANZANIA" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                        </div>
                    </div>
                </div>

                <!-- Airtel Money -->
                <div class="bg-red-50 rounded-lg p-6 border-2 border-red-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="text-red-600">📱</span>
                        Airtel Money
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label for="donate_airtelmoney_phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="text" id="donate_airtelmoney_phone" name="donate_airtelmoney_phone" value="{{ old('donate_airtelmoney_phone', $settings['donate_airtelmoney_phone']) }}" placeholder="e.g., 255622239304" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
                        </div>
                        <div>
                            <label for="donate_airtelmoney_name" class="block text-sm font-semibold text-gray-700 mb-2">Account Name</label>
                            <input type="text" id="donate_airtelmoney_name" name="donate_airtelmoney_name" value="{{ old('donate_airtelmoney_name', $settings['donate_airtelmoney_name']) }}" placeholder="e.g., ICCR TANZANIA" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
                        </div>
                    </div>
                </div>

                <!-- M-Pesa (Kenya) -->
                <div class="bg-yellow-50 rounded-lg p-6 border-2 border-yellow-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span class="text-yellow-600">📱</span>
                        M-Pesa (Kenya)
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label for="donate_mpesa_phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="text" id="donate_mpesa_phone" name="donate_mpesa_phone" value="{{ old('donate_mpesa_phone', $settings['donate_mpesa_phone']) }}" placeholder="e.g., 254712345678" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent transition">
                        </div>
                        <div>
                            <label for="donate_mpesa_name" class="block text-sm font-semibold text-gray-700 mb-2">Account Name</label>
                            <input type="text" id="donate_mpesa_name" name="donate_mpesa_name" value="{{ old('donate_mpesa_name', $settings['donate_mpesa_name']) }}" placeholder="e.g., ICCR TANZANIA" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent transition">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bank Transfer -->
        <div class="mb-8 pb-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Bank Transfer</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="donate_bank_account" class="block text-sm font-semibold text-gray-700 mb-2">Account Number</label>
                    <input type="text" id="donate_bank_account" name="donate_bank_account" value="{{ old('donate_bank_account', $settings['donate_bank_account']) }}" placeholder="e.g., 0150027996201" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                <div>
                    <label for="donate_bank_name" class="block text-sm font-semibold text-gray-700 mb-2">Bank Name</label>
                    <input type="text" id="donate_bank_name" name="donate_bank_name" value="{{ old('donate_bank_name', $settings['donate_bank_name']) }}" placeholder="e.g., CRDB Bank" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                <div>
                    <label for="donate_bank_branch" class="block text-sm font-semibold text-gray-700 mb-2">Branch</label>
                    <input type="text" id="donate_bank_branch" name="donate_bank_branch" value="{{ old('donate_bank_branch', $settings['donate_bank_branch']) }}" placeholder="e.g., Dar es Salaam" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
                <div>
                    <label for="donate_bank_swift" class="block text-sm font-semibold text-gray-700 mb-2">SWIFT Code</label>
                    <input type="text" id="donate_bank_swift" name="donate_bank_swift" value="{{ old('donate_bank_swift', $settings['donate_bank_swift']) }}" placeholder="e.g., CORUTZTZ" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
                </div>
            </div>
        </div>

        <!-- PayPal -->
        <div class="mb-8 pb-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">PayPal</h2>
            
            <div>
                <label for="donate_paypal_email" class="block text-sm font-semibold text-gray-700 mb-2">PayPal Email</label>
                <input type="email" id="donate_paypal_email" name="donate_paypal_email" value="{{ old('donate_paypal_email', $settings['donate_paypal_email']) }}" placeholder="e.g., donate@iccrtz.org" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">
            </div>
        </div>

        <!-- Other Payment Methods -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Other Payment Methods</h2>
            
            <div>
                <label for="donate_other_methods" class="block text-sm font-semibold text-gray-700 mb-2">Additional Payment Information</label>
                <textarea id="donate_other_methods" name="donate_other_methods" rows="5" placeholder="Enter any additional payment methods or instructions here..." class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition">{{ old('donate_other_methods', $settings['donate_other_methods']) }}</textarea>
                <p class="text-xs text-gray-500 mt-2">This will be displayed on the donation page for any additional payment methods or special instructions.</p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 transition">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition shadow-lg hover:shadow-xl">
                Save Payment Details
            </button>
        </div>
    </form>
</div>
@endsection

