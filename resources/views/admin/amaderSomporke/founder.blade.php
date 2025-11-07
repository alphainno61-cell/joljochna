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
                        <i class="fas fa-user-tie me-2"></i>
                        প্রতিষ্ঠাতা সেকশন আপডেট করুন
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('amader-somporke.founder.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Founder Image --}}
                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">প্রতিষ্ঠাতার ছবি</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if (!empty($founder->image))
                                <div class="mt-3 text-center">
                                    <img src="{{ asset('storage/' . $founder->image) }}"
                                        alt="Founder Image" class="img-fluid rounded shadow-sm"
                                        style="max-width: 200px;">
                                </div>
                            @endif
                        </div>

                        {{-- Founder Name --}}
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">প্রতিষ্ঠাতার নাম</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $founder->name ?? '') }}"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Founder Position --}}
                        <div class="mb-4">
                            <label for="position" class="form-label fw-bold">পদবি</label>
                            <input type="text"
                                   class="form-control @error('position') is-invalid @enderror"
                                   id="position"
                                   name="position"
                                   value="{{ old('position', $founder->position ?? '') }}"
                                   required>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Founder Description 1 --}}
                        <div class="mb-4">
                            <label for="description1" class="form-label fw-bold">বর্ণনা ১</label>
                            <textarea class="form-control @error('description1') is-invalid @enderror"
                                      id="description1"
                                      name="description1"
                                      rows="4"
                                      placeholder="প্রতিষ্ঠাতার বিস্তারিত বর্ণনা লিখুন..." required>{{ old('description1', $founder->description1 ?? '') }}</textarea>
                            @error('description1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Founder Description 2 --}}
                        <div class="mb-4">
                            <label for="description2" class="form-label fw-bold">বর্ণনা ২</label>
                            <textarea class="form-control @error('description2') is-invalid @enderror"
                                      id="description2"
                                      name="description2"
                                      rows="4"
                                      placeholder="প্রতিষ্ঠাতার আরও বিস্তারিত লিখুন...">{{ old('description2', $founder->description2 ?? '') }}</textarea>
                            @error('description2')
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
    .alert { border-radius: 8px; }
    .card { border: none; border-radius: 12px; }
    .card-header { border-radius: 12px 12px 0 0 !important; }
    .form-control { border-radius: 8px; padding: 12px 15px; }
    .btn { border-radius: 8px; padding: 10px 20px; }
    img { border-radius: 8px; }
</style>
@endsection
