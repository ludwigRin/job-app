<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Company') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Fill in the details below to create a new company.') }}
        </p>
    </header>

    <form method="post" action="{{ route('companies.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="company_name" :value="__('Company Name')" />
            <x-text-input id="company_name" name="name" type="text" class="mt-1 block w-full" required autofocus placeholder="{{ __('Enter company name') }}" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="company_description" :value="__('Company Description')" />
            <textarea id="company_description" name="description" class="mt-1 block w-full" required placeholder="{{ __('Enter company description') }}"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create Company') }}</x-primary-button>
        </div>
    </form>
</section>
