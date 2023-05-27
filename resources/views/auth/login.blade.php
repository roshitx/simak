@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center vh-100">
        <div class="col-md-8">
            <div class="card mb-3 mt-5 shadow-lg">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-5 text-end">
                            <img src="{{ asset('images/logo_simak_black.svg') }}" width="100" alt="Logo Simak" class="me-3">
                        </div>
                        <div class="col-7">
                            <h2 class="fw-bold m-0">SIMAK</h2>
                            <p class="m-0">Sistem Manajemen Kuesioner</p>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="card shadow-lg">
                <div class="card-header">
                    <h2 class="mb-0 fw-bold text-center">Login</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col d-flex justify-content-center">
                                <p>Wan't to create new account?<a href="{{ route('register') }}"> Register here!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
