<x-front.front-layout >
    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Register</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>

        <!-- Start Account Register Area -->
        <div class="account-login section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                        <div class="register-form">
                            <div class="title">
                                <h3>No Account? Register</h3>
                                <p>Registration takes less than a minute but gives you full control over your orders.</p>
                            </div>
                            <form class="row" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="reg-fn">Name</label>
                                        <input class="form-control"
                                        name="name"
                                        :value="old('name')"
                                        autofocus
                                        autocomplete="name"
                                        type="text"
                                        id="reg-fn"
                                        required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="reg-email">E-mail Address</label>
                                        <input class="form-control"
                                        type="email"
                                        id="reg-email"
                                        name="email"
                                        :value="old('email')"
                                        autocomplete="username"
                                        required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-phone">Phone Number</label>
                                        <input class="form-control" type="text" id="reg-phone" required>
                                    </div>
                                </div> --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-pass">Password</label>
                                        <input
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        autocomplete="new-password"
                                        id="reg-pass"
                                        required>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reg-pass-confirm">Confirm Password</label>
                                        <input type="password"
                                        name="password_confirmation"
                                        autocomplete="new-password"
                                        class="form-control" id="reg-pass-confirm"
                                        required>
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <div class="button">
                                    <button class="btn" type="submit">Register</button>
                                </div>
                                <p class="outer-link">Already have an account? <a href="{{ route('login') }}">Login Now</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Account Register Area -->
            <!-- Password -->
            {{-- <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div> --}}

            <!-- Confirm Password -->
            {{-- <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form> --}}

</x-front.front-layout>

