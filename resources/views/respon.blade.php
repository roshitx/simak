@extends('home.layouts.main')
@section('content')
    <div class="container text-dark">
        <div class="d-flex flex-column">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card mt-5 shadow-lg">
                        <div class="card-header" style="background-color: #5E2CED;">
                            <h3 class="m-0 fw-bold text-white">{{ $kuesioner->title }}</h3>
                        </div>
                        <div class="card-body mb-3">
                            <p class="card-text">{{ $kuesioner->description }}</p>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Made by {{ $kuesioner->user->fullname }}</h6>
                            <h6 class="card-subtitle text-body-secondary">Created at {{ $kuesioner->created_at->format('d F Y') }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card mt-5 mb-5 shadow-lg">
                        <div class="card-header text-white" style="background-color: #5E2CED;">
                            Question
                        </div>
                        <div class="card-body">
                            <form action="{{ route('respon.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="kuesioner_id" value="{{ $kuesioner->id }}">

                                {{-- Pertanyaan --}}
                                @foreach ($kuesioner->questions as $question)
                                    <div class="mb-3">
                                        <label for="question{{ $question->id }}"
                                            class="form-label"><strong>{{ $loop->iteration }}.</strong>
                                            {{ $question->question }}</label>
                                        @if ($question->type === 'text')
                                            <input type="text" class="form-control @error('answer') is-invalid @enderror"
                                                name="single[{{ $question->id }}]" required>
                                        @elseif ($question->type === 'multiple')
                                            @foreach ($question->choices as $choice)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="multiple[{{ $question->id }}]" id="option{{ $choice->id }}"
                                                        value="{{ $choice->id }}">
                                                    <label class="form-check-label" for="option{{ $choice->id }}">
                                                        {{ $choice->option }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach

                                {{-- End Pertanyaan --}}
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
