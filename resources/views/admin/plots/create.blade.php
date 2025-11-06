@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>{{ isset($plot) ? 'Edit' : 'Create' }} Plot</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($plot) ? route('admin.plots.update', $plot->id) : route('admin.plots.store') }}" method="POST">
                @csrf
                @if(isset($plot))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="size" class="form-label">Plot Size (Bangla)</label>
                            <input type="text" class="form-control" id="size" name="size" 
                                   value="{{ old('size', $plot->size ?? '') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category (Bangla)</label>
                            <input type="text" class="form-control" id="category" name="category" 
                                   value="{{ old('category', $plot->category ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category_color" class="form-label">Category Color</label>
                            <select class="form-select" id="category_color" name="category_color" required>
                                <option value="bg-primary" {{ (old('category_color', $plot->category_color ?? '') == 'bg-primary') ? 'selected' : '' }}>Blue (bg-primary)</option>
                                <option value="bg-success" {{ (old('category_color', $plot->category_color ?? '') == 'bg-success') ? 'selected' : '' }}>Green (bg-success)</option>
                                <option value="bg-warning" {{ (old('category_color', $plot->category_color ?? '') == 'bg-warning') ? 'selected' : '' }}>Yellow (bg-warning)</option>
                                <option value="bg-danger" {{ (old('category_color', $plot->category_color ?? '') == 'bg-danger') ? 'selected' : '' }}>Red (bg-danger)</option>
                                <option value="bg-info" {{ (old('category_color', $plot->category_color ?? '') == 'bg-info') ? 'selected' : '' }}>Teal (bg-info)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" class="form-control" id="order" name="order" 
                                   value="{{ old('order', $plot->order ?? 0) }}">
                        </div>
                    </div>
                </div>

                @if(isset($plot))
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                               {{ $plot->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
                @endif

                <button type="submit" class="btn btn-primary">Save Plot</button>
                <a href="{{ route('admin.plots.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection