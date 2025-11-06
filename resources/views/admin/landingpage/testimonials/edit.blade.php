@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-edit me-2"></i>
                            বিনিয়োগকারী মন্তব্য সম্পাদনা
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="investor_name" class="form-label">বিনিয়োগকারীর নাম *</label>
                                        <input type="text"
                                            class="form-control @error('investor_name') is-invalid @enderror"
                                            id="investor_name" name="investor_name"
                                            value="{{ old('investor_name', $testimonial->investor_name) }}" required>
                                        @error('investor_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="investor_title" class="form-label">পদবী *</label>
                                        <input type="text"
                                            class="form-control @error('investor_title') is-invalid @enderror"
                                            id="investor_title" name="investor_title"
                                            value="{{ old('investor_title', $testimonial->investor_title) }}"
                                            placeholder="ব্যবসায়ী, ঢাকা" required>
                                        @error('investor_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="avatar_initials" class="form-label">আভাটার ইনিশিয়াল *</label>
                                        <input type="text"
                                            class="form-control @error('avatar_initials') is-invalid @enderror"
                                            id="avatar_initials" name="avatar_initials"
                                            value="{{ old('avatar_initials', $testimonial->avatar_initials) }}"
                                            placeholder="FA" maxlength="5" required>
                                        <small class="text-muted">বিনিয়োগকারীর নামের প্রথম অক্ষর (সর্বোচ্চ ৫টি)</small>
                                        @error('avatar_initials')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">ক্রম</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                            id="sort_order" name="sort_order"
                                            value="{{ old('sort_order', $testimonial->sort_order) }}">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="quote_text" class="form-label">মন্তব্য *</label>
                                <textarea class="form-control @error('quote_text') is-invalid @enderror" id="quote_text" name="quote_text"
                                    rows="5" placeholder="বিনিয়োগকারীর মন্তব্য লিখুন..." required>{{ old('quote_text', $testimonial->quote_text) }}</textarea>
                                <small class="text-muted">সর্বোচ্চ ১০০০ অক্ষর</small>
                                @error('quote_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">সক্রিয়</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-info">
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
