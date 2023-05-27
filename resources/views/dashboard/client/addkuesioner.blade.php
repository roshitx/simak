@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8 mx-auto">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h1 class="m-0 text-uppercase fw-bold">Buat Kuesioner</h1>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <form action="{{ route('kuesioner.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul kuesioner: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title')
											is-invalid
										@enderror"
                                            placeholder="Kuesioner tentang kesehatan mental" id="title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi: <span
                                                class="text-danger">*</span></label>
                                        <textarea type="text" name="description"
                                            class="form-control @error('description')
											is-invalid
										@enderror" placeholder="Description"
                                            id="description" rows="5">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('kuesioner.index') }}" class="btn btn-secondary"><i
                                                class="fa-sharp fa-solid fa-rotate-left"></i> Back</a>
                                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                            Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
