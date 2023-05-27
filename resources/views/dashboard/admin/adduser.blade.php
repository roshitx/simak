@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8 mx-auto">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h1 class="m-0 text-uppercase fw-bold">Tambah User</h1>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Nama Lengkap: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="fullname"
                                            class="form-control @error('fullname')
											is-invalid
										@enderror"
                                            placeholder="Fullname" id="fullname" value="{{ old('fullname') }}">
                                        @error('fullname')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username: <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="username"
                                            class="form-control @error('username')
											is-invalid
										@enderror"
                                            placeholder="Username" id="username" value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Alamat email: <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email"
                                            class="form-control @error('email')
											is-invalid
										@enderror"
                                            placeholder="example@gmail.com" id="email" required value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password: <span
                                                class="text-danger">*</span></label>
                                        <input type="password" name="password"
                                            class="form-control @error('password')
											is-invalid
										@enderror"
                                            placeholder="Make a strong password" id="password" value="{{ old('password') }}">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="birth" class="form-label">Tanggal Lahir:</label>
                                        <input type="date" name="birth"
                                            class="form-control @error('birth')
											is-invalid
										@enderror"
                                            placeholder="Username" id="birth" value="{{ old('birth') }}">
                                        @error('birth')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin: <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option>-- Select Gender --</option>
                                            <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female
                                            </option>
                                            <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="role" class="form-label">Role: <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="role" id="role">
                                            <option>-- Select Role --</option>
                                            <option value="Client" {{ old('role') === 'Client' ? 'selected' : '' }}>Client
                                            </option>
                                            <option value="Admin" {{ old('role') === 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i
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
