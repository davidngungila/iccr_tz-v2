@extends('layouts.app')

@section('title', 'Donate - Support ICCR Tanzania')
@section('description', 'Support our mission through your generous contributions. Help us organize events and serve communities across Tanzania.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-green-600 via-blue-600 to-green-800 py-20 md:py-28">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold text-white mb-6">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Make a Difference</span>
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 drop-shadow-2xl">
            {{ $paymentDetails['title'] }}
        </h1>
        <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed drop-shadow-md max-w-3xl mx-auto">
            {{ $paymentDetails['description'] }}
        </p>
    </div>
</section>

<!-- Payment Methods Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Payment Methods</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Choose your preferred payment method to support our mission</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <!-- Vodacom M-Pesa -->
            @if($paymentDetails['vodacom_phone'])
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-green-200 hover:border-green-400 transition-all hover:shadow-xl">
                <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Vodacom M-Pesa</h3>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Phone Number</p>
                        <p class="text-xl font-bold text-gray-900 font-mono">{{ $paymentDetails['vodacom_phone'] }}</p>
                    </div>
                    @if($paymentDetails['vodacom_name'])
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Account Name</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $paymentDetails['vodacom_name'] }}</p>
                    </div>
                    @endif
                </div>
                <button onclick="copyToClipboard('{{ $paymentDetails['vodacom_phone'] }}')" class="mt-4 w-full px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
                    Copy Number
                </button>
            </div>
            @endif

            <!-- Tigo Pesa -->
            @if($paymentDetails['tigopesa_phone'])
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-blue-200 hover:border-blue-400 transition-all hover:shadow-xl">
                <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Tigo Pesa</h3>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Phone Number</p>
                        <p class="text-xl font-bold text-gray-900 font-mono">{{ $paymentDetails['tigopesa_phone'] }}</p>
                    </div>
                    @if($paymentDetails['tigopesa_name'])
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Account Name</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $paymentDetails['tigopesa_name'] }}</p>
                    </div>
                    @endif
                </div>
                <button onclick="copyToClipboard('{{ $paymentDetails['tigopesa_phone'] }}')" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                    Copy Number
                </button>
            </div>
            @endif

            <!-- Airtel Money -->
            @if($paymentDetails['airtelmoney_phone'])
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-red-200 hover:border-red-400 transition-all hover:shadow-xl">
                <div class="flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Airtel Money</h3>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Phone Number</p>
                        <p class="text-xl font-bold text-gray-900 font-mono">{{ $paymentDetails['airtelmoney_phone'] }}</p>
                    </div>
                    @if($paymentDetails['airtelmoney_name'])
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Account Name</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $paymentDetails['airtelmoney_name'] }}</p>
                    </div>
                    @endif
                </div>
                <button onclick="copyToClipboard('{{ $paymentDetails['airtelmoney_phone'] }}')" class="mt-4 w-full px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                    Copy Number
                </button>
            </div>
            @endif

            <!-- M-Pesa (Kenya) -->
            @if($paymentDetails['mpesa_phone'])
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-yellow-200 hover:border-yellow-400 transition-all hover:shadow-xl">
                <div class="flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">M-Pesa</h3>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Phone Number</p>
                        <p class="text-xl font-bold text-gray-900 font-mono">{{ $paymentDetails['mpesa_phone'] }}</p>
                    </div>
                    @if($paymentDetails['mpesa_name'])
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Account Name</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $paymentDetails['mpesa_name'] }}</p>
                    </div>
                    @endif
                </div>
                <button onclick="copyToClipboard('{{ $paymentDetails['mpesa_phone'] }}')" class="mt-4 w-full px-4 py-2 bg-yellow-600 text-white rounded-lg font-semibold hover:bg-yellow-700 transition">
                    Copy Number
                </button>
            </div>
            @endif

            <!-- Bank Account -->
            @if($paymentDetails['bank_account'])
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-purple-200 hover:border-purple-400 transition-all hover:shadow-xl">
                <div class="flex items-center justify-center w-16 h-16 bg-purple-100 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-6 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Bank Transfer</h3>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Account Number</p>
                        <p class="text-xl font-bold text-gray-900 font-mono">{{ $paymentDetails['bank_account'] }}</p>
                    </div>
                    @if($paymentDetails['bank_name'])
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Bank Name</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $paymentDetails['bank_name'] }}</p>
                    </div>
                    @endif
                    @if($paymentDetails['bank_branch'])
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Branch</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $paymentDetails['bank_branch'] }}</p>
                    </div>
                    @endif
                    @if($paymentDetails['bank_swift'])
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">SWIFT Code</p>
                        <p class="text-lg font-semibold text-gray-900 font-mono">{{ $paymentDetails['bank_swift'] }}</p>
                    </div>
                    @endif
                </div>
                <button onclick="copyToClipboard('{{ $paymentDetails['bank_account'] }}')" class="mt-4 w-full px-4 py-2 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition">
                    Copy Account
                </button>
            </div>
            @endif

            <!-- PayPal -->
            @if($paymentDetails['paypal_email'])
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-indigo-200 hover:border-indigo-400 transition-all hover:shadow-xl">
                <div class="flex items-center justify-center w-16 h-16 bg-indigo-100 rounded-full mb-6 mx-auto">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">PayPal</h3>
                <div class="space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600 mb-1">Email Address</p>
                        <p class="text-lg font-bold text-gray-900 break-all">{{ $paymentDetails['paypal_email'] }}</p>
                    </div>
                </div>
                <a href="mailto:{{ $paymentDetails['paypal_email'] }}" class="mt-4 block w-full px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition text-center">
                    Send Email
                </a>
            </div>
            @endif
        </div>

        <!-- Other Payment Methods -->
        @if($paymentDetails['other_methods'])
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Other Payment Methods</h3>
            <div class="prose prose-lg max-w-none">
                {!! nl2br(e($paymentDetails['other_methods'])) !!}
            </div>
        </div>
        @endif

        <!-- Instructions -->
        <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl shadow-lg p-8 border-2 border-green-200">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                How to Contribute
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">1</div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Choose Payment Method</h4>
                        <p class="text-gray-600">Select your preferred payment method from the options above.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">2</div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Copy Details</h4>
                        <p class="text-gray-600">Click the "Copy" button to copy the payment details to your clipboard.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">3</div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Make Payment</h4>
                        <p class="text-gray-600">Use your mobile money app or banking app to send your contribution.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">4</div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Confirm Payment</h4>
                        <p class="text-gray-600">Keep your transaction receipt for your records. Thank you for your support!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Thank You Section -->
<section class="py-16 bg-gradient-to-br from-green-600 via-blue-600 to-green-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Thank You for Your Support!</h2>
        <p class="text-xl text-blue-100 mb-8">Your contributions make a real difference in our mission to serve communities across Tanzania.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-block bg-white text-green-600 px-8 py-3 rounded-lg font-bold hover:bg-green-50 transition shadow-lg">
                Contact Us
            </a>
            <a href="{{ route('get-involved') }}" class="inline-block bg-transparent text-white border-2 border-white px-8 py-3 rounded-lg font-bold hover:bg-white/10 transition">
                Get Involved
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const button = event.target;
        const originalText = button.textContent;
        button.textContent = 'Copied!';
        button.classList.add('bg-green-600');
        button.classList.remove('bg-green-600', 'bg-blue-600', 'bg-red-600', 'bg-yellow-600', 'bg-purple-600', 'bg-indigo-600');
        
        setTimeout(function() {
            button.textContent = originalText;
            button.classList.remove('bg-green-600');
        }, 2000);
    }).catch(function(err) {
        alert('Failed to copy: ' + err);
    });
}
</script>
@endpush
@endsection


