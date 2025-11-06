@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-edit me-2"></i>
                            Carousel Edit
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.socialmedias.update', $socialmedia->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">শিরোনাম *</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $socialmedia->title) }}"
                                            placeholder="Modern Design" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="carousel_group" class="form-label">ক্যারousel গ্রুপ *</label>
                                        <select class="form-control @error('carousel_group') is-invalid @enderror"
                                            id="carousel_group" name="carousel_group" required>
                                            <option value="1"
                                                {{ old('carousel_group', $socialmedia->carousel_group) == 1 ? 'selected' : '' }}>
                                                স্লাইড ১</option>
                                            <option value="2"
                                                {{ old('carousel_group', $socialmedia->carousel_group) == 2 ? 'selected' : '' }}>
                                                স্লাইড ২</option>
                                            <option value="3"
                                                {{ old('carousel_group', $socialmedia->carousel_group) == 3 ? 'selected' : '' }}>
                                                স্লাইড ৩</option>
                                        </select>
                                        @error('carousel_group')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">বিবরণ *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" placeholder="Experience elegance with our modern design collection." required>{{ old('description', $socialmedia->description) }}</textarea>
                                <small class="text-muted">সর্বোচ্চ ৫০০ অক্ষর</small>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">URL লিঙ্ক</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" id="url"
                                    name="url" value="{{ old('url', $socialmedia->url) }}"
                                    placeholder="https://example.com/product">
                                <small class="text-muted">ঐচ্ছিক - আইটেম ক্লিক করলে যেখানে নিয়ে যাবে</small>
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">ইমেজ</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                <small class="text-muted">সাপোর্টেড: JPEG, PNG, JPG, GIF | সর্বোচ্চ সাইজ: 2MB | নতুন ইমেজ
                                    আপলোড না করলে পুরাতন ইমেজ থাকবে</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Current Image and Preview -->
                            <div class="mb-3">
                                <label class="form-label">বর্তমান ইমেজ</label>
                                <div>
                                    @if ($socialmedia->image)
                                        <img src="{{ $socialmedia->image_url }}" alt="Current Image"
                                            style="max-width: 200px; max-height: 150px; border-radius: 8px; margin-bottom: 10px;">
                                        <br>
                                        <small class="text-muted">বর্তমান ইমেজ</small>
                                    @else
                                        <span class="text-muted">কোন ইমেজ নেই</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">নতুন ইমেজ প্রিভিউ</label>
                                <div id="imagePreviewContainer" style="display: none;">
                                    <img id="imagePreview" src="" alt="Preview"
                                        style="max-width: 200px; max-height: 150px; border-radius: 8px;">
                                    <br>
                                    <small class="text-muted">নতুন ইমেজ প্রিভিউ</small>
                                </div>
                                <div id="noImageText" class="text-muted">
                                    নতুন ইমেজ সিলেক্ট করলে প্রিভিউ দেখাবে
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">ক্রম</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                            id="sort_order" name="sort_order"
                                            value="{{ old('sort_order', $socialmedia->sort_order) }}">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-switch mt-4">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                                value="1"
                                                {{ old('is_active', $socialmedia->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">সক্রিয়</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.socialmedias.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> আপডেট করুন
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const noImageText = document.getElementById('noImageText');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreviewContainer.style.display = 'block';
                        noImageText.style.display = 'none';
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreviewContainer.style.display = 'none';
                    noImageText.style.display = 'block';
                }
            });
        });
    </script>
@endsection
