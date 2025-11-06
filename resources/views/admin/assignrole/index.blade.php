@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-comments me-2"></i>
                            বিনিয়োগকারী মন্তব্য ব্যবস্থাপনা
                        </h4>
                        <a href="{{ route('users.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i>Create
                            New
                        </a>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped">
                                <th>Name</th>
                                <th>Email</th>

                                <th>Role</th>
                                <th>Created Date</th>

                                @can('Edit AssignRole')
                                    <th>Edit</th>
                                @endcan

                                @can('Delete AssignRole')
                                    <th>Delete</th>
                                @endcan

                                @foreach ($users as $user)
                                    <tr>
                                        <td><span>{{ $user->name }}</span></td>
                                        <td><span>{{ $user->email }}</span></td>
                                        <td><span>{{ $user->roles->pluck('name')->implode(',') }}</span></td>
                                        <td><span>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</span>
                                        </td>

                                        @can('Edit AssignRole')
                                            <td><a class="btn btn-info" href="{{ route('users.edit', $user->id) }}">Edit
                                                    Role</a></td>
                                        @endcan

                                        @can('Delete AssignRole')
                                            <td><a class="btn btn-danger delete-item"
                                                    href="{{ route('users.delete', $user->id) }}">Delete User</a></td>
                                        @endcan

                                    </tr>
                                @endforeach
                            </table>

                            <div class="pagination">
                                {{-- {{ $categories->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .investor-avatar-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a7a4a, #2ecc71);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
@endsection
