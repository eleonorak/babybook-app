<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Корисничка сметка') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Тука може да ги ажурирате податоците за вашата корисничка сметка и е-поштата.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Вашата е-пошта е потврдена.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Клинете тука за повторно да испратите порака за потврда.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Нова врска за потврда е испратена до вашата е-пошта.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="temperature_unit_id" :value="__('Мерка за температура')" />
            <x-dropdown-input id="temperature_unit_id" name="temperature_unit_id" class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'temperature') as $unit)
                    <option value="{{ $unit->id }}" {{ old('temperature_unit_id', $user->temperature_unit_id) == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('temperature_unit_id')" />
        </div>

        <div>
            <x-input-label for="volume_unit_id" :value="__('Мерка за волумен')" />
            <x-dropdown-input id="volume_unit_id" name="volume_unit_id " class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'volume') as $unit)
                    <option value="{{ $unit->id }}" {{ old('volume_unit_id', $user->volume_unit_id ) == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('volume_unit_id')" />
        </div>

        <div>
            <x-input-label for="length_unit_id" :value="__('Мерка за должина')" />
            <x-dropdown-input id="length_unit_id" name="length_unit_id" class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'length') as $unit)
                    <option value="{{ $unit->id }}" {{ old('length_unit_id', $user->length_unit_id) == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('length_unit_id')" />
        </div>

        <div>
            <x-input-label for="weight_unit_id" :value="__('Мерка за тежина')" />
            <x-dropdown-input id="weight_unit_id" name="weight_unit_id" class="mt-1 block w-full" required>
                @foreach($units->where('type', '=', 'weight') as $unit)
                    <option value="{{ $unit->id }}" {{ old('weight_unit_id', $user->weight_unit_id) == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                @endforeach
            </x-dropdown-input>
            <x-input-error class="mt-2" :messages="$errors->get('weight_unit_id')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
