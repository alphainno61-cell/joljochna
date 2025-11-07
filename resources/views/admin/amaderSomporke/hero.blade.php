@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                {{-- ✅ Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- ⚠️ Error Messages --}}
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

                {{-- 🧭 Card --}}
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-pen-nib me-2"></i>
                            হিরো সেকশন আপডেট করুন
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('amader-somporke.hero.update') }}" method="POST">
                            @csrf

                            {{-- Title --}}
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">শিরোনাম</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title"
                                    value="{{ old('title', $hero->title ?? 'শিরোনাম') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- First Short Description --}}
                            <div class="mb-4">
                                <label for="shortDescription1" class="form-label fw-bold">প্রথম সংক্ষিপ্ত বিবরণ</label>
                                <input type="text"
                                    class="form-control @error('shortDescription1') is-invalid @enderror"
                                    id="shortDescription1" name="shortDescription1"
                                    value="{{ old('shortDescription1', $hero->short_desc_1 ?? '') }}" required>
                                @error('shortDescription1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Second Short Description --}}
                            <div class="mb-4">
                                <label for="shortDescription2" class="form-label fw-bold">দ্বিতীয় সংক্ষিপ্ত বিবরণ</label>
                                <input type="text"
                                    class="form-control @error('shortDescription2') is-invalid @enderror"
                                    id="shortDescription2" name="shortDescription2"
                                    value="{{ old('shortDescription2', $hero->short_desc_2 ?? '') }}" required>
                                @error('shortDescription2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit Buttons --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> সংরক্ষণ করুন
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
