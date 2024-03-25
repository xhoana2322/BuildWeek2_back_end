<x-guest-layout>
<form method="POST" action="{{ route('admin.update', ['admin' => $user->id]) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            value="old('password', $user->password)" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Check if the user is an admin -->
<div class="mt-4">
    <x-input-label for="is_admin" :value="__('Admin')" />
    <select id="is_admin" class="block mt-1 w-full border-gray-300 rounded-md" name="is_admin" required autofocus autocomplete="is_admin">
    <option value="1" {{ ($user->is_admin == 1) ? 'selected' : '' }}>Yes</option>
    <option value="0" {{ ($user->is_admin == 0) ? 'selected' : '' }}>No</option>
</select>

    <x-input-error :messages="$errors->get('is_admin')" class="mt-2"/>
</div>

        <div class="flex items-center justify-center mt-4">

            <x-primary-button class="ms-4">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
