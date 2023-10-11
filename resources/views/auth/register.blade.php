<x-guest-layout>
    <div class="container banner-overlay mt-5 register-banner">
        <div class="row justify-content-md-center ">
            <div class="grid grid-cols-6 gap-4">
                <div class="col-start-4 col-span-4 pt-6">
                    <div class="flex items-stretch">
                        <div class="py-4"></div>
                        <div class="py-12"> <img src="{{ asset('/images/logo.png') }}" class="img-fluid" width="500"></div>
                        <div class="py-8"></div>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" class="register-input-font"/>
                            <x-text-input id="name" class="block mt-1 w-full register-form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" class="register-input-font"/>
                            <x-text-input id="email" class="block mt-1 w-full register-form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" class="register-input-font"/>

                            <x-text-input id="password" class="block mt-1 w-full register-form-input"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="register-input-font"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full register-form-input"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                <b style="color:lightyellow">{{ __('Already registered?') }}</b>
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-guest-layout>
