@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas {{ isset($pricing) ? 'fa-edit' : 'fa-plus' }} me-2"></i>
                            {{ isset($pricing) ? 'প্যাকেজ সম্পাদনা' : 'নতুন প্যাকেজ তৈরি' }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($pricing) ? route('admin.pricing.update', $pricing->id) : route('admin.pricing.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($pricing))
                                @method('PUT')
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">প্যাকেজের নাম *</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $pricing->title ?? '') }}"
                                            required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="size_description" class="form-label">আকারের বিবরণ *</label>
                                        <input type="text"
                                            class="form-control @error('size_description') is-invalid @enderror"
                                            id="size_description" name="size_description"
                                            value="{{ old('size_description', $pricing->size_description ?? '') }}"
                                            required>
                                        @error('size_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="total_price" class="form-label">মোট মূল্য (টাকা) *</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('total_price') is-invalid @enderror" id="total_price"
                                            name="total_price" value="{{ old('total_price', $pricing->total_price ?? '') }}"
                                            required>
                                        @error('total_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="down_payment_percentage" class="form-label">ডাউন পেমেন্ট (%) *</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('down_payment_percentage') is-invalid @enderror"
                                            id="down_payment_percentage" name="down_payment_percentage"
                                            value="{{ old('down_payment_percentage', $pricing->down_payment_percentage ?? '') }}"
                                            required>
                                        @error('down_payment_percentage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">ক্রম</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                            id="sort_order" name="sort_order"
                                            value="{{ old('sort_order', $pricing->sort_order ?? 0) }}">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Installments Section -->
                            <div class="mb-4">
                                <label class="form-label">কিস্তির বিবরণ *</label>
                                <div id="installments-container">
                                    @php
                                        $oldInstallments = old(
                                            'installments',
                                            isset($pricing) ? $pricing->installments : [],
                                        );
                                        if (empty($oldInstallments)) {
                                            $oldInstallments = [['installment' => '', 'amount' => '']];
                                        }
                                    @endphp

                                    @foreach ($oldInstallments as $index => $installment)
                                        <div class="installment-row row mb-2">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    name="installments[{{ $index }}][installment]"
                                                    placeholder="কিস্তির বিবরণ (যেমন: ০৩ কিস্তি)"
                                                    value="{{ $installment['installment'] }}" required>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control"
                                                    name="installments[{{ $index }}][amount]"
                                                    placeholder="টাকার পরিমাণ (যেমন: ৪০,০০০০০ টাকা)"
                                                    value="{{ $installment['amount'] }}" required>
                                            </div>
                                            <div class="col-md-1">
                                                @if ($index > 0)
                                                    <button type="button" class="btn btn-danger btn-sm remove-installment">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-installment" class="btn btn-success btn-sm mt-2">
                                    <i class="fas fa-plus me-1"></i> কিস্তি যোগ করুন
                                </button>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_featured"
                                                name="is_featured" value="1"
                                                {{ old('is_featured', isset($pricing) && $pricing->is_featured ? 'checked' : '') }}>
                                            <label class="form-check-label" for="is_featured">জনপ্রিয় প্যাকেজ হিসেবে
                                                চিহ্নিত করুন</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active"
                                                name="is_active" value="1"
                                                {{ old('is_active', isset($pricing) && $pricing->is_active ? 'checked' : '') }}>
                                            <label class="form-check-label" for="is_active">সক্রিয়</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.pricing.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> {{ isset($pricing) ? 'আপডেট করুন' : 'সেভ করুন' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
