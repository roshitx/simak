@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h1 class="fw-bold text-uppercase mb-3">Kelola Kuesioner</h1>
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
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
                                    <div class="alert alert-danger" role="alert">
                                        <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    <script>
                                        Swal.fire({
                                            title: 'Error',
                                            text: '{{ session('error') }}',
                                            icon: 'error'
                                        });
                                    </script>
                                @endif
                                <a class="btn btn-success mb-3" href="{{ route('kuesioner.create') }}" role="button"><i
                                        class="fa-solid fa-plus"></i>
                                    Buat Kuesioner</a>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-info-circle-fill me-2"></i>
                                    <small>
                                        Untuk membuat pertanyaan, klik tombol <span class="badge bg-info"><i
                                                class="fa-solid fa-eye"></i></span>.
                                    </small>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover table" id="allKuesioner">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th scope="col">No</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($kuesioners->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">Anda belum memiliki kuesioner,
                                                        buat sekarang!</td>
                                                </tr>
                                            @else
                                                @foreach ($kuesioners as $kuesioner)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $kuesioner->title }}</td>
                                                        <td>{{ Str::limit($kuesioner->description, 50) }}</td>
                                                        <td>
                                                            {{-- Copy to Clipboard --}}
                                                            <div class="d-flex btn-group align-items-center">
                                                                <input id="link{{ $kuesioner->id }}" class="form-control"
                                                                    value="{{ url('/kuesioner/' . $kuesioner->link) }}"
                                                                    readonly>
                                                                <button class="btn bg-secondary btn-clipboard"
                                                                    data-clipboard-target="#link{{ $kuesioner->id }}"
                                                                    data-bs-toggle="tooltip"
                                                                    data-kuesioner-id="{{ $kuesioner->id }}"
                                                                    title="Copy to Clipboard">
                                                                    <i class="bi bi-clipboard" id="iconClipboard"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{ route('kuesioner.show', $kuesioner->id) }}"
                                                                    class="btn btn-info text-white mb-2"
                                                                    data-bs-toggle="tooltip" title="Detail Kuesioner">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('kuesioner.edit', $kuesioner->id) }}"
                                                                    class="btn btn-warning text-white mb-2"
                                                                    data-bs-toggle="tooltip" title="Edit Kuesioner">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteKuesioner{{ $kuesioner->id }}"
                                                                    class="btn btn-danger mb-2">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </div>
                                                            <a href="{{ route('generate.link', $kuesioner->id) }}"
                                                                class="btn btn-sm btn-primary text-white mb-2"
                                                                data-bs-toggle="tooltip" title="Generate new link">
                                                                <i class="fa-solid fa-link"></i> Generate link
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal Delete Survey -->
                                                    <div class="modal fade" id="deleteKuesioner{{ $kuesioner->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="deleteKuesionerModal{{ $kuesioner->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="deleteKuesionerModal{{ $kuesioner->id }}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                        Delete Survey
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus kuesioner ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Back</button>
                                                                    <form
                                                                        action="{{ route('kuesioner.destroy', ['kuesioner' => $kuesioner->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-success">Yakin</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Datatable
        $(document).ready(function() {
            $('#allKuesioner').DataTable();
        });
        // Clipboard JS
        new ClipboardJS('.btn');
        // Change Icon Clipboard
        $(document).ready(function() {
            $('.btn-clipboard').on('click', function() {
                var button = $(this);
                var kuesionerId = button.data('kuesioner-id');

                // Ganti ikon menjadi check
                button.find('.bi.bi-clipboard').removeClass('bi bi-clipboard');
                button.find('i').addClass('bi bi-check2');

                // Setelah beberapa detik, kembalikan ikon ke clipboard
                setTimeout(function() {
                    button.find('.bi.bi-check2').removeClass('bi bi-check2');
                    button.find('i').addClass('bi bi-clipboard');
                }, 800); // Waktu dalam milidetik (misalnya 3000 untuk 3 detik)
            });
        });
    </script>
@endsection
