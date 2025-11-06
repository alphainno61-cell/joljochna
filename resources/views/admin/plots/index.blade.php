@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Plots Management</h1>
        <a href="{{ route('admin.plots.create') }}" class="btn btn-primary">Add New Plot</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
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
                        @foreach($plots as $plot)
                        <tr>
                            <td>{{ $plot->size }}</td>
                            <td>{{ $plot->category }}</td>
                            <td>
                                <span class="badge {{ $plot->category_color }}">{{ $plot->category_color }}</span>
                            </td>
                            <td>{{ $plot->order }}</td>
                            <td>
                                <span class="badge {{ $plot->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $plot->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.plots.edit', $plot->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.plots.destroy', $plot->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection