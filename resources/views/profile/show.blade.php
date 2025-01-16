<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- User Username Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Username') }}
                    </h3>

                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ $user->username }} <!-- Show the username -->
                    </p>
                </div>
            </div>

            <!-- Company Profile Section (if the user has a company) -->
            @if ($user->company)
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Company Profile') }}
                        </h3>

                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            <p><strong>{{ __('Company Name:') }}</strong> {{ $user->company->name }}</p>
                            <p><strong>{{ __('Description:') }}</strong> {{ $user->company->description }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('No Company Profile') }}
                        </h3>

                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('This user does not have a company profile.') }}
                        </p>
                    </div>
                </div>
            @endif

            <!-- Buttons for Create Company and Edit Profile -->
            <div class="flex justify-between">
                <!-- Create Company Button -->
                @if (!$user->company)
                    <a href="{{ route('companies.create', $user) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                        {{ __('Create Company') }}
                    </a>
                @endif

                <!-- Edit Profile Button -->
                <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">
                    {{ __('Edit Profile') }}
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
