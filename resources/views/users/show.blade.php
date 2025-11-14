@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-3">User Details</h1>
        <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto"></div>
    </div>

    <!-- User Profile Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-purple-600 to-blue-600 px-6 py-8 text-white">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-24 h-24 rounded-full bg-white bg-opacity-20 flex items-center justify-center mb-4 md:mb-0 md:mr-6">
                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-2xl font-bold">{{ $user->name ?? 'N/A' }}</h2>
                    <p class="text-blue-100 mt-1">{{ $user->email ?? 'N/A' }}</p>
                    <div class="flex flex-wrap justify-center md:justify-start mt-3 gap-2">
                        <span class="bg-white bg-opacity-20 text-xs px-3 py-1 rounded-full">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            Joined {{ $user->created_at ? $user->created_at->format('M j, Y') : 'N/A' }}
                        </span>
                        @if($user->email_verified_at)
                        <span class="bg-green-500 text-xs px-3 py-1 rounded-full">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Verified
                        </span>
                        @else
                        <span class="bg-yellow-500 text-xs px-3 py-1 rounded-full">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Not Verified
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- User Information -->
        <div class="px-6 py-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                </svg>
                Account Information
            </h3>
            
            <div class="space-y-4">
                <!-- Name -->
                <div class="p-4 rounded-lg border border-gray-100 transition-all duration-200 hover:bg-gray-50 hover:translate-x-1">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Full Name</p>
                            <p class="font-medium text-gray-900">{{ $user->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="p-4 rounded-lg border border-gray-100 transition-all duration-200 hover:bg-gray-50 hover:translate-x-1">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email Address</p>
                            <p class="font-medium text-gray-900">{{ $user->email ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Email Verified -->
                <div class="p-4 rounded-lg border border-gray-100 transition-all duration-200 hover:bg-gray-50 hover:translate-x-1">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email Verified</p>
                            <p class="font-medium text-gray-900">
                                {{ $user->email_verified_at ? $user->email_verified_at->format('M j, Y g:i A') : 'Not Verified' }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Created At -->
                <div class="p-4 rounded-lg border border-gray-100 transition-all duration-200 hover:bg-gray-50 hover:translate-x-1">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Account Created</p>
                            <p class="font-medium text-gray-900">
                                {{ $user->created_at ? $user->created_at->format('M j, Y g:i A') : 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Updated At -->
                <div class="p-4 rounded-lg border border-gray-100 transition-all duration-200 hover:bg-gray-50 hover:translate-x-1">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Last Updated</p>
                            <p class="font-medium text-gray-900">
                                {{ $user->updated_at ? $user->updated_at->format('M j, Y g:i A') : 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="px-6 py-5 bg-gray-50 border-t border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition duration-150 ease-in-out shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                        Edit User
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition duration-150 ease-in-out shadow-sm hover:shadow-md" onclick="return confirm('Are you sure you want to delete this user?')">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Delete User
                        </button>
                    </form>
                </div>
                <a href="{{ route('users.index') }}" class="inline-flex items-center text-blue-500 hover:text-blue-700 font-medium transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Back to Users
                </a>
            </div>
        </div>
    </div>
</div>
@endsection