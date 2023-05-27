@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-warning card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-text text-center fs-2 fw-bold mb-3">{{ $kuesioner->title }}</h5>
                                <p class="card-subtitle text-body-secondary text-uppercase">Deskripsi</p>
                                <p class="card-text">{{ $kuesioner->description }}</p>
                                <a href="{{ route('kuesioner.index') }}" class="btn btn-secondary btn-sm"><i
                                        class="fa-sharp fa-solid fa-rotate-left"></i> Kembali</a>
                                <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addQuestion{{ $kuesioner->id }}"><i class="fa-solid fa-plus"></i>
                                    Buat Pertanyaan</a>
                                {{-- <a href="#" class="btn btn-success btn-sm">Another link</a> --}}
                            </div>
                        </div>
                    </div>
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
                    {{-- Add Question --}}
                    <div class="col-12">
                        <div class="card card-info card-outline">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="fw-bold">Semua Pertanyaan</h4>
                                    <div class="flex-column mb-2">
                                        <a href="{{ route('question.edit', [$kuesioner->id]) }}"
                                            class="btn btn-warning text-white" data-bs-toggle="tooltip"
                                            title="Edit semua pertanyaan"><i class="fa-solid fa-pen-to-square"></i>
                                            Edit Pertanyaan</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-striped table-hover table" id="allQuestions">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th scope="col">No</th>
                                                <th scope="col">Pertanyaan</th>
                                                <th scope="col">Tipe</th>
                                                <th scope="col">Urutan Pertanyaan</th>
                                                <th scope="col">Opsi</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($questions->isEmpty())
                                                <tr>
                                                    <td colspan="12" class="text-center">Belum ada pertanyaan, buat
                                                        sekarang.
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($questions as $question)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $question->question }}</td>
                                                        <td>{{ ucfirst($question->type) }}</td>
                                                        <td>{{ $question->index }}</td>
                                                        <td>
                                                            @if ($question->type === 'text')
                                                                <p>None</p>
                                                            @else
                                                                <ul>
                                                                    @if (!empty($question->choices))
                                                                        @foreach ($question->choices as $choice)
                                                                            @foreach (explode(', ', $choice->option) as $option)
                                                                                <li>{{ $option }}</li>
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($question->type == 'multiple' && $question->choices->isEmpty())
                                                                <a href="{{ route('add.choices', ['id' => $question->id]) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa-solid fa-plus"></i> Opsi</a>
                                                            @endif
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#deleteQuestion{{ $question->id }}"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </td>

                                                    </tr>
                                                    {{-- DELETE QUESTION --}}
                                                    <div class="modal fade" id="deleteQuestion{{ $question->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="deleteQuestionModal{{ $question->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5 text-danger"
                                                                        id="deleteQuestionModal{{ $question->id }}"><i
                                                                            class="fa-solid fa-trash"></i> Hapus pertanyaan
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus pertanyaan ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Kembali</button>
                                                                    <form
                                                                        action="{{ route('question.destroy', ['question' => $question->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="kuesioner_id"
                                                                            value="{{ $kuesioner->id }}">
                                                                        <button type="submit"
                                                                            class="btn btn-success">Yakin</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- END DELETE QUESTION --}}
                                                @endforeach
                                            @endif
                                        </tbody>
                                        {{-- ADD QUESTION --}}
                                        <div class="modal fade" id="addQuestion{{ $kuesioner->id }}" tabindex="-1"
                                            aria-labelledby="addQuestionModal{{ $kuesioner->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="addQuestionLabel{{ $kuesioner->id }}">
                                                            Buat Pertanyaan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="form" method="POST"
                                                            action="{{ route('question.store') }}">
                                                            @csrf
                                                            <div id="questionsContainer">
                                                                <div class="question">
                                                                    <input type="hidden" name="kuesioner_id"
                                                                        value="{{ $kuesioner->id }}">
                                                                    <div class="row">
                                                                        <label for="question">Pertanyaan<span
                                                                                class="text-danger"> *</span></label>
                                                                        <input type="text" id="question"
                                                                            name="question"
                                                                            placeholder="Bagaimana kualitas pelayanan kami?"
                                                                            class="form-control mb-3 @error('question')
                                                                                is-invalid
                                                                            @enderror"
                                                                            required>
                                                                        @error('question')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="row">
                                                                        <label for="type" class="form-label">Tipe<span
                                                                                class="text-danger"> *</span></label>
                                                                        <select id="type" class="form-select mb-3"
                                                                            name="type">
                                                                            <option>-- Pilih tipe perrtanyaan --</option>
                                                                            <option value="text"
                                                                                {{ old('type') === 'text' ? 'selected' : '' }}>
                                                                                Short Answer
                                                                            </option>
                                                                            <option value="multiple"
                                                                                {{ old('type') === 'multiple' ? 'selected' : '' }}>
                                                                                Multiple Choice
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="row">
                                                                        <label for="index">Urutan Pertanyaan<span
                                                                                class="text-danger"> *</span></label>

                                                                        <input type="number" id="index"
                                                                            name="index"
                                                                            class="form-control @error('index') is-invalid @enderror"
                                                                            placeholder="1" required>

                                                                        @error('index')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 d-flex justify-content-center">
                                                                <button id="submit" type="submit"
                                                                    class="btn btn-success mt-3">Buat Pertanyaan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                                {{-- END ADD QUESTION --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Datatables
        $(document).ready(function() {
            $('#allQuestions').DataTable();
        });
    </script>
@endsection
