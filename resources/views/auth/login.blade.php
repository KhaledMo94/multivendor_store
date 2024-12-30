<x-front.front-layout >
    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Login</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>

        <!-- Start Account Login Area -->
        <div class="account-login section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                        <form class="card login-form" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="title">
                                    <h3>Login Now</h3>
                                    <p>You can login using your social media account or email address.</p>
                                </div>
                                <div class="social-login">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn"
                                                href="javascript:void(0)"><i class="lni lni-facebook-filled"></i> Facebook
                                                login</a></div>
                                        <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn"
                                                href="javascript:void(0)"><i class="lni lni-twitter-original"></i> Twitter
                                                login</a></div>
                                        <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn"
                                                href="{{ route('socialite.redirect','google') }}"><i class="lni lni-google"></i> Google login</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alt-option">
                                    <span>Or</span>
                                </div>
                                <div class="form-group input-group">
                                    <label for="reg-fn">Email</label>
                                    <input
                                    class="form-control"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    autofocus
                                    autocomplete="username">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
                                <div class="form-group input-group">
                                    <label for="reg-fn">Password</label>
                                    <input
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="form-control"
                                    id="reg-pass"
                                    required>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                <div class="d-flex flex-wrap justify-content-between bottom-content">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                        <label class="form-check-label">Remember me</label>
                                    </div>
                                    <a class="lost-pass" href="account-password-recovery.html">Forgot password?</a>
                                </div>
                                <div class="button">
                                    <button class="btn" type="submit">Login</button>
                                </div>
                                <p class="outer-link">Don't have an account? <a href="{{ route('register') }}">Register here </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Account Login Area -->
{{--
        <x-guest-layout>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </x-guest-layout> --}}

</x-front.front-layout>

