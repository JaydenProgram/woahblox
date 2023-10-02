@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-10">
    <div class="bg-gray-200 w-3/12 h-4/6 flex justify-center">

            <div class="">
                <h1 class="text-3xl font-bold mt-4">Login to Roblox</h1>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mt-3">

                            <div class="">
                                <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="px-4 py-2 rounded-md w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <input id="password" type="password" placeholder="{{ __('Password') }}" class="px-4 py-2 rounded-md mt-2 w-full form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="px-4 py-2 rounded-md bg-white w-full">
                                {{ __('Login') }}
                            </button>
                        </div>


                            <div class="">


                                @if (Route::has('password.request'))
                                    <a class="underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        <div class="mt-5">
                            <p class="font-bold">Don't have an account? @if (Route::has('register'))
                                    <a class="ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif</p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</div>

@endsection
