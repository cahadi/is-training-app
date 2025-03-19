
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf


        <div class="form-group mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="form-control p_input block mt-1 w-full"
                          type="username"
                          name="username" :value="old('username')"
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="form-control p_input block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

            <div>
                <!-- Remember Me -->
                <div class="form-group d-flex align-items-center justify-content-between block mt-4">
                    <div class="form-check">
                        <label for="remember_me" class="form-check-label inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="form-check-input rounded
                                   dark:bg-gray-900 border-gray-300
                                   dark:border-gray-700 text-indigo-600
                                   shadow-sm focus:ring-indigo-500
                                   dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                   name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                </div>
                <!-- Login -->
                <div class="flex items-center justify-end mt-4">
                    <div class="ms-3">
                        @if (Route::has('register'))
                            <a class="underline text-sm text-gray-600
                            dark:text-gray-400 hover:text-gray-900
                            dark:hover:text-gray-100 rounded-md
                            focus:outline-none focus:ring-2 focus:ring-offset-2
                            focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                               href="{{ route('register') }}">
                                {{ __('Do not have an Account?') }}
                            </a>
                        @endif
                    </div>
                    <div class="ms-3">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600
                            dark:text-gray-400 hover:text-gray-900
                            dark:hover:text-gray-100 rounded-md
                            focus:outline-none focus:ring-2 focus:ring-offset-2
                            focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>


                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </div>
    </form>


</x-guest-layout>
