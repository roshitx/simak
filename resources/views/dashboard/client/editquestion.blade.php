@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <p class="text-uppercase"><i class="fa-solid fa-pen-to-square"></i> Editing question from kuesioner :</p>
                    <div class="d-flex justify-content-between mb-3">
                        <h1 class="fw-bold">{{ $kuesioner->title }}</h1>
                        <a href="{{ route('kuesioner.show', [$kuesioner->id]) }}" class="btn btn-secondary block"><i class="fa-sharp fa-solid fa-rotate-left"></i> Back</a>
                    </div>
                    <hr>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <script>
                            Swal.fire({
                                title: 'Success',
                                text: '{{ session('success') }}',
                                icon: 'success'
                            });
                        </script>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <script>
                            Swal.fire({
                                title: 'Error',
                                text: '{{ session('error') }}',
                                icon: 'error'
                            });
                        </script>
                    @endif
                    @if ($questions->isEmpty())
                        <p class="text-secondary text-center">Anda belum memiliki pertanyaan.</p>
                    @else
                        @foreach ($questions as $question)
                            <div class="col-md-6">
                                <div class="card card-warning card-outline">
                                    <div class="card-header">
                                        <h4 class="m-0">{{ $loop->iteration }}. {{ $question->question }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('question.update', [$question->id]) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="kuesioner_id" value="{{ $kuesioner->id }}">
                                            <div class="mb-3">
                                                <label for="question" class="form-label">Pertanyaan: <span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" name="question" rows="3" class="form-control @error('question') is-invalid @enderror"
                                                    id="question" required autofocus>{{ old('question', $question->question) }}</textarea>
                                                @error('question')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- Buatkan disini --}}

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa-solid fa-floppy-disk"></i>
                                                    Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
