<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('ስም')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('ኢሜል')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('የሚስጥር ቁጥር')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('የሚስጥር ቁጥሩን ይድገሙ')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

         <!-- Account Type -->
         <div class="mt-4">
            <x-input-label for="account_type" :value="__('የአገልግሎት አይነት')" />
            <select id="account_type" name="account_type" class="form-select mt-1 block w-full">
                <option value="" disabled selected>Choose...</option>
                <option value="provider">Provider</option>
                <option value="user">User</option>
            </select>
            <x-input-error :messages="$errors->get('account_type')" class="mt-2" />
        </div>

        <!-- Religion -->
        <div class="mt-4">
            <x-input-label for="religion" :value="__('ሃይማኖት')" />
            <select id="religion" name="religion" class="form-select mt-1 block w-full">
                <option value="" disabled selected>Choose...</option>
                <option value="muslim">Muslim</option>
                <option value="christian">Christian</option>
            </select>
            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="dob" :value="__('የትውልድ ቀን')" />
            <input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autocomplete="dob" />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('መጀመሪያ ተመዝግበዋልን?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('ይመዝገቡ') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
