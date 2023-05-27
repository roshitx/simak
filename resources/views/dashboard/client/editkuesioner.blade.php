@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8 mx-auto">
                    <div class="card card-warning card-outline">
                        <div class="card-body">
                            <h1 class="mb-3 fw-bold"><i class="fa-solid fa-pen-to-square"></i> Edit Questionnaire</h1>
                            <div class="col-lg-12">
                                <hr>
                                <form action="{{ route('kuesioner.update', [$kuesioner->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title" value="{{ old('title', $kuesioner->title) }}"
                                            class="form-control @error('title') is-invalid @enderror id="title" required
                                            autofocus>
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description: <span
                                                class="text-danger">*</span></label>
                                        <textarea type="text" rows="5" name="description"
                                            class="form-control @error('description') is-invalid @enderror id="description" required autofocus>{{ old('description', $kuesioner->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('kuesioner.index') }}" class="btn btn-secondary"><i class="fa-sharp fa-solid fa-rotate-left"></i> Back</a>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa-solid fa-floppy-disk"></i>
                                            Save</button>
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
