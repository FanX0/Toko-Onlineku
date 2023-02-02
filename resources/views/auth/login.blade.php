@extends('layouts.auth')

@section('content')

<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-6 text-center">
                    <img src="/images/login-placeholder.png" alt="" class="w-50 mb-4 mb-lg-none" />
                </div>
                <div class="col-lg-5">
                    <h2>
                        Belanja kebutuhan utama,<br />
                        menjadi lebih mudah
                    </h2>
                    <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="email" :value="__('Email')">Email Address </label>
                            <input id="email" type="email" class="form-control w-75" name="email" :value="old('email')"
                                required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="password" :value="__('Password')">Password </label>
                            <input id="password" type="password" class="form-control w-75" name="password" required
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Remember Me -->
                        <div class="row">
                            <div class="col-lg-6 ">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded dark:bg-gray-100 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me')
                                        }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 ">
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </div>
                        </div>


                        <x-primary-button class="btn btn-success btn-block w-75 mt-4">
                            {{ __('Log in') }}
                        </x-primary-button>
                        <a href="{{ route('register') }}" class="btn btn-signup btn-block w-75 mt-2">Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection