@extends('dashboard.layouts.main')
@section('content.dashboard')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h1 class="fw-bold mb-3">SEMUA USERS</h1>
                                {{-- MESSAGE --}}
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
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                {{-- MESSAGE END --}}
                                <a class="btn btn-success mb-3" href="{{ route('users.create') }}" role="button"><i
                                        class="bi bi-person-fill-add"></i>
                                    Tambah User</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover table" id="allUsers">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th scope="col">No</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Jenkel</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->gender }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                                class="btn btn-warning text-white" data-bs-toggle="tooltip" title="Edit User"><i class="fa-solid fa-user-pen"></i></a>
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#deleteUser{{ $user->id }}"
                                                                class="btn btn-danger" data-bs-toggle="tooltip" title="Delete User"><i class="fa-solid fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Delete User -->
                                                <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1"
                                                    aria-labelledby="deleteUserModal{{ $user->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title text-danger fs-5"
                                                                    id="deleteUserModal{{ $user->id }}"><i
                                                                        class="fa-solid fa-trash"></i> Delete
                                                                    User</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus user ini? <br>
                                                                <small class="text-danger">*user yang sudah terhapus, tidak bisa dikembalikan kembali</small>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                <form
                                                                    action="{{ route('users.destroy', ['user' => $user->id]) }}"
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#allUsers').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
