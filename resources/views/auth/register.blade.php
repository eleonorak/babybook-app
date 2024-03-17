<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Units -->
        @php
        $units = \App\Models\Unit::all();
        @endphp
        <div class="mt-4">
            <x-input-label for="temperature_unit_id" :value="__('Мерка за температура')" />
            <x-dropdown-input id="temperature_unit_id" name="temperature_unit_id" class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'temperature') as $unit)
                    <option value="{{ $unit->id }}" {{ old('temperature_unit_id')}}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('temperature_unit_id')" />
        </div>

        <div class="mt-4">
            <x-input-label for="volume_unit_id" :value="__('Мерка за волумен')" />
            <x-dropdown-input id="volume_unit_id" name="volume_unit_id " class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'volume') as $unit)
                    <option value="{{ $unit->id }}" {{ old('volume_unit_id')}}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('volume_unit_id')" />
        </div>

        <div class="mt-4">
            <x-input-label for="length_unit_id" :value="__('Мерка за должина')" />
            <x-dropdown-input id="length_unit_id" name="length_unit_id" class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'length') as $unit)
                    <option value="{{ $unit->id }}" {{ old('length_unit_id')}}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('length_unit_id')" />
        </div>

        <div class="mt-4">
            <x-input-label for="weight_unit_id" :value="__('Мерка за тежина')" />
            <x-dropdown-input id="weight_unit_id" name="weight_unit_id" class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'weight') as $unit)
                    <option value="{{ $unit->id }}" {{ old('weight_unit_id')}}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('weight_unit_id')" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
