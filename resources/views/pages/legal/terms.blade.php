@extends('layouts.app')

@section('title', 'Terms of Use - ICCR Tanzania')
@section('description', 'Terms of Use for ICCR Tanzania website - Please read our terms and conditions')

@section('content')
<!-- Hero Section - Advanced -->
<section class="relative min-h-[50vh] h-[50vh] max-h-[600px] overflow-hidden">
    <div class="relative h-full bg-gradient-to-br from-green-600 via-blue-600 to-green-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="{{ asset('images/09.jpg') }}" alt="ICCR Terms of Use" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 flex items-center justify-center py-8">
            <div class="text-center text-white px-4 sm:px-6 lg:px-8 z-10 max-w-5xl w-full">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>Legal Terms & Conditions</span>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 drop-shadow-2xl leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">Terms of Use</span>
                </h1>
                <p class="text-sm sm:text-base md:text-lg text-blue-100 mb-6 leading-relaxed max-w-3xl mx-auto drop-shadow-md">
                    Please read our terms and conditions carefully
                </p>
            </div>
        </div>
    </div>
    <!-- Decorative Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-12 text-white" fill="currentColor" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,100 350,0 600,50 C850,100 1050,0 1200,50 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 p-8 md:p-12">
            <div class="flex items-start gap-4 mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-500 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Important Information</h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        By accessing and using the ICCR Tanzania website, you accept and agree to be bound by the terms and provisions of this agreement. Please read these terms carefully before using our website.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms Sections -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-green-100 to-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="space-y-8">
            <!-- Section 1: Acceptance of Terms -->
            <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl p-8 shadow-lg border-2 border-green-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">1. Acceptance of Terms</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    By accessing and using the ICCR Tanzania website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                </p>
            </div>

            <!-- Section 2: Use License -->
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 shadow-lg border-2 border-blue-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">2. Use License</h3>
                </div>
                <p class="text-gray-700 mb-4 leading-relaxed">
                    Permission is granted to temporarily download one copy of the materials on ICCR Tanzania's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                        </svg>
                        <span class="text-gray-700">Modify or copy the materials</span>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                        </svg>
                        <span class="text-gray-700">Use the materials for any commercial purpose</span>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                        </svg>
                        <span class="text-gray-700">Attempt to decompile or reverse engineer any software</span>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                        </svg>
                        <span class="text-gray-700">Remove any copyright or proprietary notations</span>
                    </div>
                </div>
            </div>

            <!-- Section 3: Disclaimer -->
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 shadow-lg border-2 border-purple-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">3. Disclaimer</h3>
                </div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    The materials on ICCR Tanzania's website are provided on an 'as is' basis. ICCR Tanzania makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.
                </p>
                <div class="bg-yellow-50 rounded-lg p-4 border-l-4 border-yellow-500 mt-4">
                    <p class="text-sm text-gray-700">
                        <strong>Note:</strong> Further, ICCR Tanzania does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.
                    </p>
                </div>
            </div>

            <!-- Section 4: Limitations -->
            <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl p-8 shadow-lg border-2 border-indigo-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">4. Limitations</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    In no event shall ICCR Tanzania or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on ICCR Tanzania's website, even if ICCR Tanzania or an authorized representative has been notified orally or in writing of the possibility of such damage.
                </p>
            </div>

            <!-- Section 5: Accuracy of Materials -->
            <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-8 shadow-lg border-2 border-teal-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">5. Accuracy of Materials</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    The materials appearing on ICCR Tanzania's website could include technical, typographical, or photographic errors. ICCR Tanzania does not warrant that any of the materials on its website are accurate, complete, or current. ICCR Tanzania may make changes to the materials contained on its website at any time without notice. However, ICCR Tanzania does not make any commitment to update the materials.
                </p>
            </div>

            <!-- Section 6: Links -->
            <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-8 shadow-lg border-2 border-orange-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">6. Links</h3>
                </div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    ICCR Tanzania has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by ICCR Tanzania of the site. Use of any such linked website is at the user's own risk.
                </p>
                <div class="bg-orange-50 rounded-lg p-4 border-l-4 border-orange-500 mt-4">
                    <p class="text-sm text-gray-700">
                        <strong>Recommendation:</strong> We encourage users to exercise caution and review the privacy policies and terms of use of any external websites they visit.
                    </p>
                </div>
            </div>

            <!-- Section 7: Modifications -->
            <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-8 shadow-lg border-2 border-pink-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">7. Modifications</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    ICCR Tanzania may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service. We recommend that you review these terms periodically to stay informed of any updates.
                </p>
            </div>

            <!-- Section 8: Governing Law -->
            <div class="bg-gradient-to-br from-green-600 via-blue-600 to-green-700 rounded-2xl p-8 shadow-lg border-2 border-green-500">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">8. Governing Law</h3>
                </div>
                <p class="text-green-100 leading-relaxed mb-6">
                    These terms and conditions are governed by and construed in accordance with the laws of Tanzania and you irrevocably submit to the exclusive jurisdiction of the courts in that location. Any disputes arising from or relating to these terms shall be resolved in accordance with Tanzanian law.
                </p>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border-2 border-white/20">
                    <p class="text-white font-semibold mb-2">Legal Jurisdiction</p>
                    <p class="text-green-100 text-sm">
                        All legal proceedings related to these terms shall be conducted in the courts of Tanzania, and both parties consent to the jurisdiction of such courts.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact & Last Updated Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-green-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border-2 border-green-200 p-8 md:p-12">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-blue-500 rounded-xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Questions About These Terms?</h2>
                <p class="text-lg text-gray-700 mb-8">
                    If you have any questions about these Terms of Use, please contact us:
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-blue-50 rounded-xl">
                    <svg class="w-8 h-8 text-green-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-700 font-semibold mb-1">Email</p>
                    <a href="mailto:info@iccr.or.tz" class="text-green-600 hover:text-green-700 text-sm">info@iccr.or.tz</a>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-blue-50 rounded-xl">
                    <svg class="w-8 h-8 text-green-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <p class="text-gray-700 font-semibold mb-1">Phone</p>
                    <p class="text-gray-600 text-sm">+255 123 456 789</p>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-blue-50 rounded-xl">
                    <svg class="w-8 h-8 text-green-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <p class="text-gray-700 font-semibold mb-1">Address</p>
                    <p class="text-gray-600 text-sm">Dar es Salaam, Tanzania</p>
                </div>
            </div>
            <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-xl p-6 border-2 border-green-100 text-center">
                <p class="text-gray-700 font-semibold">
                    <span class="text-green-600">Last Updated:</span> {{ date('F Y') }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
