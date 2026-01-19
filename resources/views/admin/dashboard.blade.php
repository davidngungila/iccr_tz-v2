@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat Card 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-32 relative overflow-hidden group hover:border-indigo-200 transition-colors">
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Visitors</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1Group">12,543</h3>
                    <p class="text-xs text-green-600 mt-2 flex items-center font-medium">
                        <i class="ph ph-trend-up mr-1 stroke-2"></i> +12% from last month
                    </p>
                </div>
                <div class="absolute -right-4 -bottom-4 bg-indigo-50 rounded-full p-6 opacity-50 group-hover:scale-110 transition-transform">
                    <i class="ph ph-users text-4xl text-indigo-400"></i>
                </div>
            </div>

            <!-- Stat Card 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-32 relative overflow-hidden group hover:border-purple-200 transition-colors">
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Active Events</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1Group">8</h3>
                    <p class="text-xs text-gray-500 mt-2 flex items-center">
                        2 upcoming this week
                    </p>
                </div>
                <div class="absolute -right-4 -bottom-4 bg-purple-50 rounded-full p-6 opacity-50 group-hover:scale-110 transition-transform">
                    <i class="ph ph-calendar-check text-4xl text-purple-400"></i>
                </div>
            </div>

            <!-- Stat Card 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-32 relative overflow-hidden group hover:border-green-200 transition-colors">
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Graduates</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1Group">1,240</h3>
                    <p class="text-xs text-green-600 mt-2 flex items-center font-medium">
                        <i class="ph ph-trend-up mr-1 stroke-2"></i> +45 new registrations
                    </p>
                </div>
                <div class="absolute -right-4 -bottom-4 bg-green-50 rounded-full p-6 opacity-50 group-hover:scale-110 transition-transform">
                    <i class="ph ph-graduation-cap text-4xl text-green-400"></i>
                </div>
            </div>

            <!-- Stat Card 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between h-32 relative overflow-hidden group hover:border-orange-200 transition-colors">
                <div class="relative z-10">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Resources</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1Group">89</h3>
                    <p class="text-xs text-orange-600 mt-2 flex items-center font-medium">
                        <i class="ph ph-warning mr-1"></i> 3 needing review
                    </p>
                </div>
                <div class="absolute -right-4 -bottom-4 bg-orange-50 rounded-full p-6 opacity-50 group-hover:scale-110 transition-transform">
                    <i class="ph ph-files text-4xl text-orange-400"></i>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Chart -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">Traffic Overview</h4>
                        <p class="text-sm text-gray-500">Monthly visitor statistics</p>
                    </div>
                    <select class="text-sm border-gray-200 rounded-lg text-gray-600 focus:ring-indigo-500">
                        <option>Last 30 Days</option>
                        <option>This Year</option>
                    </select>
                </div>
                <!-- Chart Canvas -->
                <div class="h-64 w-full">
                    <canvas id="trafficChart"></canvas>
                </div>
            </div>

            <!-- Side List -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h4 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h4>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0 text-blue-600">
                            <i class="ph ph-user-plus"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-800 font-medium">New Graduate Registered</p>
                            <p class="text-xs text-gray-500">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0 text-purple-600">
                            <i class="ph ph-calendar"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-800 font-medium">Event "Karisma 2025" Updated</p>
                            <p class="text-xs text-gray-500">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0 text-green-600">
                            <i class="ph ph-check"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-800 font-medium">Resource Approved</p>
                            <p class="text-xs text-gray-500">3 hours ago</p>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-6 py-2 text-sm text-indigo-600 font-medium hover:bg-indigo-50 rounded-lg transition-colors">
                    View All Activity
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Placeholder Chart Initialization
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('trafficChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Visitors',
                        data: [1200, 1900, 3000, 5000, 2000, 3000],
                        borderColor: '#6366f1',
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                borderDash: [2, 4],
                                color: '#f3f4f6'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
@endsection
