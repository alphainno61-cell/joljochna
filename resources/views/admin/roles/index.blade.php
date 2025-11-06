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
                        <a href="{{ route('roles.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i>Create
                            New
                        </a>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped">
                                <th>Roles Name</th>
                                <th>Permissons</th>
                                <th>Created Date</th>

                                @can('Edit Role')
                                    <th>Roles Edit</th>
                                @endcan

                                @can('Delete Role')
                                    <th>Roles Delete</th>
                                @endcan


                                @foreach ($roles as $role)
                                    <tr>
                                        <td><span class="badge badge-info text-black">{{ $role->name }}</span></td>

                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge bg-primary me-1 mb-1">{{ $permission->name }}</span>
                                                <br>
                                            @endforeach
                                        </td>




                                        <td><span>{{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}</span>
                                        </td>
                                        @can('Edit Role')
                                            <td><a class="btn btn-info" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                            </td>
                                        @endcan

                                        @can('Delete Role')
                                            <td><a class="btn btn-danger delete-item"
                                                    href="{{ route('roles.delete', $role->id) }}">Delete</a></td>
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
