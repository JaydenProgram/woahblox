@extends('layouts.app')

@section('content')

    <div class="flex justify-center mt-10">
        <div class="bg-gray-200 w-3/12 h-4/6 p-6">

            <h1 class="text-3xl font-bold mt-4">Sign up to start having fun!</h1>

                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="">


                            <div class="">
                                <input id="name" type="text" placeholder="{{ __('Name') }}" class="px-4 py-2 rounded-md w-full mt-1 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">


                            <div class="">
                                <input id="email" type="email"placeholder="{{ __('Email Address') }}" class="px-4 py-2 rounded-md w-full mt-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">


                            <div class="">
                                <input id="password" type="password" placeholder="{{ __('Password') }}" class="px-4 py-2 rounded-md w-full mt-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">


                            <div class="">
                                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="px-4 py-2 rounded-md w-full mt-2 form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="">
                                <button type="submit" class="px-4 py-2 rounded-md bg-white w-full">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>

        </div>
    </div>

@endsection
