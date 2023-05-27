@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h1 class="fw-bold m-0"><i class="fa-solid fa-user-pen"></i> EDIT DATA USER</h1>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Nama Lengkap: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="fullname"
                                                class="form-control @error('fullname')
                                                is-invalid
                                            @enderror"
                                                placeholder="Fullname" id="fullname" value="{{ old('fullname', $user->fullname) }}">
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
                                                placeholder="Username" id="username" value="{{ old('username', $user->username) }}">
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
                                                placeholder="example@gmail.com" id="email" required
                                                value="{{ old('email', $user->email) }}">
                                            @error('email')
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
                                                placeholder="Username" id="birth" value="{{ old('birth', $user->birth) }}">
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
                                                <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                                <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="role" class="form-label">Role: <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="role" id="role">
                                                <option>-- Select Role --</option>
                                                <option value="Client" {{ $user->role === 'Client' ? 'selected' : '' }}>
                                                    Client
                                                </option>
                                                <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('users.index') }}" class="btn btn-secondary"><i
                                                    class="fa-sharp fa-solid fa-rotate-left"></i> Kembali</a>
                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                                Buat</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
