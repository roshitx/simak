@extends('home.layouts.main')
@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <img src="{{ asset('images/logo_simak_black.svg') }}" width="200">
            <h2 class="fw-bold mt-3">Your link is invalid :(</h2>
            <a class="btn btn-primary" href="{{ route('home.page') }}">Redirect to SIMAK</a>
        </div>
    </div>
@endsection
