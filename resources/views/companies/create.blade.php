<!-- resources/views/company/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Company Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('companies.store') }}">
                @csrf
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <!-- Company Name -->
                        <x-input-label for="name" :value="__('Company Name')" />
                        <x-text-input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-1" />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <!-- Company Description -->
                        <x-input-label for="description" :value="__('Company Description')" class="mt-4" />
                        <textarea id="description" name="description" required class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <!-- Submit Button -->
                        <x-primary-button class="mt-4">
                            {{ __('Create Company') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
