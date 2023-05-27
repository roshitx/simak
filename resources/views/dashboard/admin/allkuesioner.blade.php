@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h1 class="fw-bold text-uppercase mb-3">All Questionnaire</h1>
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
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover table" id="allKuesioner">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th scope="col">No</th>
                                                <th scope="col">Owner</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($kuesioners->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">No questionnaire in this table</td>
                                                </tr>
                                            @else
                                                @foreach ($kuesioners as $kuesioner)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $kuesioner->user->username }}</td>
                                                        <td>{{ $kuesioner->title }}</td>
                                                        <td>{{ $kuesioner->created_at->format('D M Y') }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteKuesioner{{ $kuesioner->id }}"
                                                                    class="btn btn-danger mb-2">
                                                                    <i class="fa-solid fa-trash"></i> Delete
                                                                </button>
                                                            </div>
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
                                                                        Delete Questionnaire
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure want to delete this questionnaire?
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
                                                                            class="btn btn-success">Sure</button>
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
        $.fn.dataTable.ext.errMode = 'none';
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
