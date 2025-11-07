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
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-history me-2"></i>
                            আমাদের ইতিহাস সেকশন ম্যানেজমেন্ট
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('amader-somporke.history.update') }}" method="POST">
                            @csrf

                            {{-- Section Title --}}
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">সেকশন টাইটেল</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title"
                                    value="{{ old('title', $history->title ?? 'আমাদের ইতিহাস') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Paragraph 1 --}}
                            <div class="mb-4">
                                <label for="paragraph1" class="form-label fw-bold">প্যারাগ্রাফ ১</label>
                                <textarea class="form-control @error('paragraph1') is-invalid @enderror"
                                    id="paragraph1" name="paragraph1" rows="4"
                                    placeholder="প্যারাগ্রাফ ১ লিখুন">{{ old('paragraph1', $history->paragraph1 ?? '') }}</textarea>
                                @error('paragraph1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Paragraph 2 --}}
                            <div class="mb-4">
                                <label for="paragraph2" class="form-label fw-bold">প্যারাগ্রাফ ২</label>
                                <textarea class="form-control @error('paragraph2') is-invalid @enderror"
                                    id="paragraph2" name="paragraph2" rows="4"
                                    placeholder="প্যারাগ্রাফ ২ লিখুন">{{ old('paragraph2', $history->paragraph2 ?? '') }}</textarea>
                                @error('paragraph2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Card 1 --}}
                            <h5 class="fw-bold text-success mt-4 mb-3">প্রথম সাফল্য</h5>
                            <div class="mb-4">
                                <label for="card1_title" class="form-label fw-bold">কার্ড ১ টাইটেল</label>
                                <input type="text" class="form-control @error('card1_title') is-invalid @enderror"
                                    id="card1_title" name="card1_title"
                                    value="{{ old('card1_title', $history->card1_title ?? '') }}" required>
                                @error('card1_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="card1_description" class="form-label fw-bold">কার্ড ১ বর্ণনা</label>
                                <textarea class="form-control @error('card1_description') is-invalid @enderror"
                                    id="card1_description" name="card1_description" rows="3"
                                    placeholder="কার্ড ১ বর্ণনা লিখুন">{{ old('card1_description', $history->card1_description ?? '') }}</textarea>
                                @error('card1_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Card 2 --}}
                            <h5 class="fw-bold text-success mt-4 mb-3">প্রসারিত উদ্যোগ</h5>
                            <div class="mb-4">
                                <label for="card2_title" class="form-label fw-bold">কার্ড ২ টাইটেল</label>
                                <input type="text" class="form-control @error('card2_title') is-invalid @enderror"
                                    id="card2_title" name="card2_title"
                                    value="{{ old('card2_title', $history->card2_title ?? '') }}" required>
                                @error('card2_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="card2_description" class="form-label fw-bold">কার্ড ২ বর্ণনা</label>
                                <textarea class="form-control @error('card2_description') is-invalid @enderror"
                                    id="card2_description" name="card2_description" rows="3"
                                    placeholder="কার্ড ২ বর্ণনা লিখুন">{{ old('card2_description', $history->card2_description ?? '') }}</textarea>
                                @error('card2_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit Buttons --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-success">
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
