@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">মূল্য বুদ্ধির আগে - সেকশন আপডেট করুন</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
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

                            <!-- Booking Amount -->
                            <div class="mb-4">
                                <label for="booking_amount" class="form-label fw-bold">বুকিং পরিমাণ (টাকা)</label>
                                <input type="number" class="form-control @error('booking_amount') is-invalid @enderror"
                                    id="booking_amount" name="booking_amount"
                                    value="{{ old('booking_amount', $priceSection->booking_amount ?? 10000) }}"
                                    min="0" step="1" required>
                                @error('booking_amount')
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
                                <input type="url" class="form-control @error('primary_button_url') is-invalid @enderror"
                                    id="primary_button_url" name="primary_button_url"
                                    value="{{ old('primary_button_url', $priceSection->primary_button_url ?? '#') }}"
                                    required>
                                @error('primary_button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Secondary Button Text -->
                            <div class="mb-4">
                                <label for="secondary_button_text" class="form-label fw-bold">সেকেন্ডারি বাটন
                                    টেক্সট</label>
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
                                <input type="url"
                                    class="form-control @error('secondary_button_url') is-invalid @enderror"
                                    id="secondary_button_url" name="secondary_button_url"
                                    value="{{ old('secondary_button_url', $priceSection->secondary_button_url ?? '#') }}"
                                    required>
                                @error('secondary_button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Background Color -->
                            {{-- <div class="mb-4">
                                <label for="background_color" class="form-label fw-bold">ব্যাকগ্রাউন্ড রঙ</label>
                                <input type="color"
                                    class="form-control form-control-color @error('background_color') is-invalid @enderror"
                                    id="background_color" name="background_color"
                                    value="{{ old('background_color', $priceSection->background_color ?? '#1e7e5c') }}"
                                    required>
                                @error('background_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <!-- Status -->
                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1"
                                        {{ old('is_active', $priceSection->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="is_active">
                                        সেকশন সক্রিয় করুন
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="" class="btn btn-secondary">
                                    বাতিল করুন
                                </a>
                                <button type="submit" class="btn btn-success">
                                    আপডেট করুন
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
