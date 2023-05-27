@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-3 mt-1 shadow-lg">
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

            <div class="card shadow-lg mb-3">
                <div class="card-header">
                    <h2 class="mb-0 fw-bold text-center">Register</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="fullname" class="col-md-4 col-form-label text-md-end">{{ __('Fullname') }}<span class="text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('name') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}<span class="text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}<span class="text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}<span class="text-danger"> *</span></label>

                            <div class="col-md-6">
                                <select class="form-select" name="gender" id="gender">
                                    <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('Birth') }}<span class="text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input type="date" name="birth"
                                    class="form-control @error('birth')
                                    is-invalid
                                @enderror"
                                    placeholder="Username" id="birth">
                                @error('birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}<span class="text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}<span class="text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col d-flex justify-content-center">
                                <p>Already have an account?<a href="{{ route('login') }}"> Pls login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
