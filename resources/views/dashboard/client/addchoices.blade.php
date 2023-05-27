@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="info d-flex justify-content-between">
                                <div class="title">
                                    <p class="text-uppercase text-secondary">Tambah opsi di:</p>
                                    <h1 class="m-0 text-uppercase fw-bold">{{ $question->index }}. {{ $question->question }}</h1>
                                </div>
                                <a href="{{ route('kuesioner.show', ['kuesioner' => $question->kuesioner_id]) }}"
                                    class="btn btn-secondary align-self-start"><i class="fa-sharp fa-solid fa-rotate-left"></i> Kembali</a>
                            </div>
                        </div>                        

                        <div class="card-body">
                            <div class="col-12">
                                <form id="formChoice" method="POST" action="{{ route('choice.store') }}">
                                    @csrf
                                    <div class="question">
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                        <div id="optionsContainer">
                                            <!-- Input pertama -->
                                            <div class="input-group mb-3">
                                                <input placeholder="option" type="text" name="option[]"
                                                    class="form-control">
                                                <button class="btn btn-danger deleteOption" type="button"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>

                                            <div class="input-group mb-3">
                                                <input placeholder="option" type="text" name="option[]"
                                                    class="form-control">
                                                <button class="btn btn-danger deleteOption" type="button"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>

                                            <div class="input-group mb-3">
                                                <input placeholder="option" type="text" name="option[]"
                                                    class="form-control">
                                                <button class="btn btn-danger deleteOption" type="button"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <button id="addOption" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="submit" type="submit" class="btn btn-success mt-3"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(() => {
                        $("#addOption").on('click', (e) => {
                            e.preventDefault();
                            // console.log('test');
                            $("#optionsContainer").append(`
                                        <div class="input-group mb-3">
                                            <input placeholder="option" type="text" name="option[]" class="form-control">
                                            <button class="btn btn-danger deleteOption" type="button"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    `);
                        });

                        $("#optionsContainer").on('click', '.deleteOption', function() {
                            $(this).closest('.input-group').remove();
                        });
                    });
                </script>
            @endsection
