<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Ја заборави лозинката? Нема проблем. Само кажете ни ја вашата е-пошта и ние ќе ви испратиме порака за ресетирање на лозинката што ќе ви овозможи да изберете нова.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Е-пошта')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Линк за ресетирање на лозинка за е-пошта') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
