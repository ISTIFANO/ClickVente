
<x-guest-layout>
    <x-auth-card class="bg-white shadow-lg rounded-lg p-8 max-w-lg mx-auto mt-16">
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-indigo-600" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-6 text-red-500" :errors="$errors" />

        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-label for="name" :value="__('Name')" class="text-lg font-medium text-gray-700" />
                <x-input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-label for="email" :value="__('Email')" class="text-lg font-medium text-gray-700" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-label for="password" :value="__('Password')" class="text-lg font-medium text-gray-700" />
                <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="text-lg font-medium text-gray-700">Image:</label>
                <input type="file" name="img" id="image" class="block mt-1 w-full text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg font-medium text-gray-700" />
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-between">
                <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
