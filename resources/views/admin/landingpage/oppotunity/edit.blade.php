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
                            ফিচার আপডেট করুন
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('opportunity.update', $opportunity->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Icon -->
                            <div class="mb-4">
                                <label for="icon" class="form-label fw-bold">
                                    আইকন (ইমোজি বা টেক্সট)
                                    <small class="text-muted">(ঐচ্ছিক)</small>
                                </label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                    id="icon" name="icon" value="{{ old('icon', $opportunity->icon) }}"
                                    placeholder="যেমন: 🏠 বা একটি আইকন ক্লাস">
                                <small class="text-muted">ইমোজি ব্যবহার করতে Windows: Win + . অথবা Mac: Cmd + Ctrl +
                                    Space</small>
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">
                                    শিরোনাম
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $opportunity->title) }}"
                                    placeholder="যেমন: প্রিমিয়াম লোকেশন" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">
                                    বিবরণ
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" placeholder="ফিচারের বিস্তারিত বিবরণ লিখুন" required>{{ old('description', $opportunity->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Submit Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('opportunity.index') }}" class="btn btn-secondary me-md-2">
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

        .form-check-input {
            width: 20px;
            height: 20px;
            margin-top: 0.15em;
        }
    </style>
@endsection
