<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(Auth::user()->role === 'admin')
    <div class="flex min-h-screen bg-white">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-100 shadow-lg border-r border-gray-200">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800">Admin Panel</h3>
            </div>
            <nav class="mt-6 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 bg-blue-100 hover:bg-blue-200 hover:text-blue-800 rounded-lg mx-4 mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('users.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-green-100 hover:text-green-700 rounded-lg mx-4 mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    Users
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-700 rounded-lg mx-4 mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profiles
                </a>
                <a href="{{ route('buses.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-purple-100 hover:text-purple-700 rounded-lg mx-4 mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Manage Buses
                </a>
                <a href="{{ route('bookings.my') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-pink-100 hover:text-pink-700 rounded-lg mx-4 mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"></path>
                    </svg>
                    Bookings
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-red-100 hover:text-red-700 rounded-lg mx-4 mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066"></path>
                    </svg>
                    Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-blue-50 p-6 rounded-lg shadow-lg border-l-4 border-blue-500 transition transform hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 p-6 rounded-lg shadow-lg border-l-4 border-green-500 transition transform hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Bookings</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalBookings }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 p-6 rounded-lg shadow-lg border-l-4 border-yellow-500 transition transform hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0V9a2 2 0 00-2-2"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Buses</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalBuses }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-50 p-6 rounded-lg shadow-lg border-l-4 border-purple-500 transition transform hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Recent Activity</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $recentBookings->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h3>
                    <div class="space-y-2">
                        <a href="{{ route('booking') }}" class="block p-3 bg-blue-500 rounded text-white hover:bg-blue-600 transition">New Booking</a>
                        <a href="{{ route('bookings.my') }}" class="block p-3 bg-green-500 rounded text-white hover:bg-green-600 transition">My Bookings</a>
                        <a href="{{ route('profile.edit') }}" class="block p-3 bg-yellow-500 rounded text-white hover:bg-yellow-600 transition">Profile</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Bus Management</h3>
                    <div class="space-y-2">
                        <a href="{{ route('buses.index') }}" class="block p-3 bg-purple-500 rounded text-white hover:bg-purple-600 transition">View Buses</a>
                        <a href="{{ route('buses.create') }}" class="block p-3 bg-indigo-500 rounded text-white hover:bg-indigo-600 transition">Add Bus</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Reports</h3>
                    <div class="space-y-2">
                        <a href="{{ route('bookings.my') }}" class="block p-3 bg-pink-500 rounded text-white hover:bg-pink-600 transition">Booking Report</a>
                        <a href="#" class="block p-3 bg-orange-500 rounded text-white hover:bg-orange-600 transition">Revenue Report</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Settings</h3>
                    <div class="space-y-2">
                        <a href="{{ route('profile.edit') }}" class="block p-3 bg-red-500 rounded text-white hover:bg-red-600 transition">User Settings</a>
                        <a href="#" class="block p-3 bg-gray-500 rounded text-white hover:bg-gray-600 transition">System Settings</a>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings -->
            @if($recentBookings->count() > 0)
            <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Recent Bookings</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bus</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($recentBookings as $booking)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->user->name ?? 'Guest' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->bus->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->created_at->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </main>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as a user! Admin dashboard requires admin role.") }}
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
