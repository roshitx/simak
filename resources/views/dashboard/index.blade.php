@extends('dashboard.layouts.main')
@section('content.dashboard')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-5 shadow-lg">
                            <div class="card-body">
                                <h2 class="text-center fw-bold">Selamat Datang di Dashboard!</h2>
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

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Hello
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 Roshit.</strong> All rights reserved.
    </footer>
    </div>
@endsection
