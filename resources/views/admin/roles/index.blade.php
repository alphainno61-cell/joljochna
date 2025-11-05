@extends('admin.layouts.layout')

@section('content')
    <style>
        li {
            list-style: none;
        }

        td,
        th {
            word-break: break-all;
        }
    </style>

    <section class="section">
        <div class="section-header">
            {{-- <h1>Role</h1> --}}

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4>Create Role</h4> --}}
                            <div class="card-header-action d-flex justify-content-between align-items-center">
                                @can('Create Role')
                                    <a href="{{ route('roles.create') }}" class="btn btn-info">Create New</a>
                                @endcan

                                @if (Session('error'))
                                    <span class="me-5 bg-danger text-white p-3">{{ Session('error') }}</span>
                                @endif

                                @if (Session('success'))
                                    <span class="me-5 bg-success text-white p-3">{{ Session('success') }}</span>
                                @endif
                            </div>
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
    </section>
@endsection
