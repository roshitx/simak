@extends('dashboard.layouts.main')
@section('content.dashboard')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if (auth()->user()->role === 'Admin')
                    <div class="row mt-3">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $user->count() }}</h3>

                                    <p>User Registrated</p>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="small-box-footer"><img src="{{ asset('images/logo_simak_black.svg') }}"></div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $kuesioner->count() }}</h3>
                                    <p>Questionnaire</p>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-file-earmark-font"></i>
                                </div>
                                <div class="small-box-footer"><img src="{{ asset('images/logo_simak_black.svg') }}"></div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $question->count() }}</h3>

                                    <p>Total Questions</p>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-question-square-fill"></i>
                                </div>
                                <div class="small-box-footer"><img src="{{ asset('images/logo_simak_black.svg') }}"></div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $respon->count() }}</h3>

                                    <p>Total Responden</p>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-person-lines-fill"></i>
                                </div>
                                <div class="small-box-footer"><img src="{{ asset('images/logo_simak_black.svg') }}"></div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                @elseif (auth()->user()->role === 'Client')
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $kuesioner->count() }}</h3>

                                    <p>Surveys Created</p>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-question-diamond-fill"></i>
                                </div>
                                <div class="small-box-footer"><img src="{{ asset('images/logo_simak_black.svg') }}"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $question->count() }}</h3>

                                    <p>Question Created</p>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="small-box-footer"><img src="{{ asset('images/logo_simak_black.svg') }}"></div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-5 shadow-lg">
                            <div class="card-body">
                                <h2 class="text-center fw-bold">Welcome to Dashboard!</h2>
                                <h4 class="text-center m-0">{{ Auth::user()->username }}</h4>
                                <p class="text-center m-0">{{ Auth::user()->role }}</p>
                                <div class="logo d-flex justify-content-center m-2">
                                    <img src="{{ asset('images/logo_simak_black.svg') }}" width="150">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
@endsection
