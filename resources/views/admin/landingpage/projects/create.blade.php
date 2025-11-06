@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-plus me-2"></i>
                            নতুন প্রকল্প
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">প্রকল্পের নাম *</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title') }}"
                                            placeholder="শান্তি নিবাস" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">আইকন (ইমোজি)</label>
                                        <select class="form-control @error('icon') is-invalid @enderror" id="icon"
                                            name="icon">
                                            <option value="">আইকন নির্বাচন করুন</option>
                                            @foreach ($icons as $emoji => $label)
                                                <option value="{{ $emoji }}"
                                                    {{ old('icon') == $emoji ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">ইমেজ না দিলে আইকন দেখাবে</small>
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">বিবরণ *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" placeholder="শহরের ঠিক মাঝে আপনার শান্তির ঠিকানা..." required>{{ old('description') }}</textarea>
                                <small class="text-muted">সর্বোচ্চ ৫০০ অক্ষর</small>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="button_text" class="form-label">বাটন টেক্সট *</label>
                                        <input type="text"
                                            class="form-control @error('button_text') is-invalid @enderror" id="button_text"
                                            name="button_text" value="{{ old('button_text', 'বিস্তারিত জানুন') }}"
                                            placeholder="বিস্তারিত জানুন" required>
                                        @error('button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="button_link" class="form-label">বাটন লিঙ্ক *</label>
                                        <input type="text"
                                            class="form-control @error('button_link') is-invalid @enderror" id="button_link"
                                            name="button_link" value="{{ old('button_link', '#contact') }}"
                                            placeholder="#contact বা /projects/1" required>
                                        @error('button_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">প্রকল্প ইমেজ</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                <small class="text-muted">সাপোর্টেড: JPEG, PNG, JPG, GIF | সর্বোচ্চ সাইজ: 2MB</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Preview -->
                            <div class="mb-3">
                                <label class="form-label">ইমেজ প্রিভিউ</label>
                                <div id="imagePreviewContainer" style="display: none;">
                                    <img id="imagePreview" src="" alt="Preview"
                                        style="max-width: 200px; max-height: 150px; border-radius: 8px;">
                                </div>
                                <div id="noImageText" class="text-muted">
                                    ইমেজ সিলেক্ট করলে প্রিভিউ দেখাবে
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">ক্রম</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                            id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check form-switch mt-4">
                                            <input class="form-check-input" type="checkbox" id="is_active"
                                                name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">সক্রিয়</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check form-switch mt-4">
                                            <input class="form-check-input" type="checkbox" id="is_featured"
                                                name="is_featured" value="1"
                                                {{ old('is_featured') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_featured">ফিচার্ড</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> সেভ করুন
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
