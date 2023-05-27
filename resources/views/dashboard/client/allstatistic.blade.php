@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="mb-3">All Statistic</h1>
                <div class="row">
                    @foreach ($kuesioners as $kuesioner)
                        <div class="col-lg-6 col-xl-4">
                            <div class="card card-primary shadow-lg card-outline">
                                <div class="card-header">
                                    <h4><strong>{{ $kuesioner->title }}</strong></h4>
                                    <p class="fs-6">{{ Str::limit($kuesioner->description, 100)}}</p>
                                    <small class="card-subtitle text-secondary">Made by {{ $kuesioner->user->fullname }}</small>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2 mt-3">
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('detail.statistic', $kuesioner->id) }}" role="button">See Statistic</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection