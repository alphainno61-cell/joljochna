@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>কিছু ত্রুটি হয়েছে:</strong>
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-edit me-2"></i>
                            মূল্য বুদ্ধির আগে - সেকশন আপডেট করুন
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateorcreate') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Main Title -->
                            <div class="mb-4">
                                <label for="main_title" class="form-label fw-bold">প্রধান শিরোনাম</label>
                                <input type="text" class="form-control @error('main_title') is-invalid @enderror"
                                    id="main_title" name="main_title"
                                    value="{{ old('main_title', $priceSection->main_title ?? 'মূল্য বুদ্ধির আগে') }}"
                                    required>
                                @error('main_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subtitle -->
                            <div class="mb-4">
                                <label for="subtitle" class="form-label fw-bold">উপ-শিরোনাম</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                    id="subtitle" name="subtitle"
                                    value="{{ old('subtitle', $priceSection->subtitle ?? 'বাড়ি বুকিং করুন') }}" required>
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">বিবরণ</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" required>{{ old('description', $priceSection->description ?? 'প্রকল্পের মূল্য তালিকা - বুকিং পরিমাণ: ১০,০০০ টাকা (কার্ড প্রতি)') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Primary Button Text -->
                            <div class="mb-4">
                                <label for="primary_button_text" class="form-label fw-bold">প্রাথমিক বাটন টেক্সট</label>
                                <input type="text"
                                    class="form-control @error('primary_button_text') is-invalid @enderror"
                                    id="primary_button_text" name="primary_button_text"
                                    value="{{ old('primary_button_text', $priceSection->primary_button_text ?? 'মূল্য দেখুন') }}"
                                    required>
                                @error('primary_button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Primary Button URL -->
                            <div class="mb-4">
                                <label for="primary_button_url" class="form-label fw-bold">প্রাথমিক বাটন URL</label>
                                <input type="text" class="form-control @error('primary_button_url') is-invalid @enderror"
                                    id="primary_button_url" name="primary_button_url"
                                    value="{{ old('primary_button_url', $priceSection->primary_button_url ?? '#') }}"
                                    required>
                                @error('primary_button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Secondary Button Text -->
                            <div class="mb-4">
                                <label for="secondary_button_text" class="form-label fw-bold">সেকেন্ডারি বাটন টেক্সট</label>
                                <input type="text"
                                    class="form-control @error('secondary_button_text') is-invalid @enderror"
                                    id="secondary_button_text" name="secondary_button_text"
                                    value="{{ old('secondary_button_text', $priceSection->secondary_button_text ?? 'যোগাযোগ করুন') }}"
                                    required>
                                @error('secondary_button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Secondary Button URL -->
                            <div class="mb-4">
                                <label for="secondary_button_url" class="form-label fw-bold">সেকেন্ডারি বাটন URL</label>
                                <input type="text"
                                    class="form-control @error('secondary_button_url') is-invalid @enderror"
                                    id="secondary_button_url" name="secondary_button_url"
                                    value="{{ old('secondary_button_url', $priceSection->secondary_button_url ?? '#') }}"
                                    required>
                                @error('secondary_button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-success">
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

@section('styles')
    <style>
        .alert {
            border-radius: 8px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
        }
    </style>
@endsection
