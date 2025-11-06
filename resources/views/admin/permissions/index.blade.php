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
                        <a href="{{ route('permissions.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i>Create
                            New
                        </a>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <th>Permission Name</th>
                                <th>Permission Group</th>
                                <th>Created Date</th>

                                @can('Edit Permission')
                                    <th>Permission Edit</th>
                                @endcan

                                @can('Delete Permission')
                                    <th>Permission Delete</th>
                                @endcan



                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td><span>{{ $permission->name }}</span></td>
                                        <td><span>{{ $permission->groupby }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>

                                        @can('Edit Permission')
                                            <td><a class="btn btn-info"
                                                    href="{{ route('permissions.edit', $permission->id) }}">Edit</a></td>
                                        @endcan

                                        @can('Delete Permission')
                                            <td><a class="btn btn-danger"
                                                    href="{{ route('permissions.delete', $permission->id) }}">Delete</a>
                                            </td>
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
