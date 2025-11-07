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
                            <i class="fas fa-images me-2"></i>
                            প্লট ব্যবস্থাপনা
                        </h4>

                        @can('Create Plot')
                            <a href="{{ route('admin.plots.create') }}" class="btn btn-primary">Add New Plot</a>
                        @endcan

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="bg-success">
                                    <tr>
                                        <th>Size</th>
                                        <th>Category</th>
                                        <th>Color</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plots as $plot)
                                        <tr>
                                            <td>{{ $plot->size }}</td>
                                            <td>{{ $plot->category }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $plot->category_color }}">{{ $plot->category_color }}</span>
                                            </td>
                                            <td>{{ $plot->order }}</td>
                                            <td>
                                                <span class="badge {{ $plot->is_active ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $plot->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>

                                                @can('Edit Plot')
                                                    <a href="{{ route('admin.plots.edit', $plot->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                @endcan

                                                @can('Delete Plot')
                                                    <form action="{{ route('admin.plots.destroy', $plot->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                @endcan

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
