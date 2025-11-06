@extends('admin.layouts.layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-address-book me-2"></i>
                        যোগাযোগের তথ্য ব্যবস্থাপনা
                    </h4>
                </div>
                <div class="card-body">
                    
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.contact-info.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Phone Section -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">
                                            <i class="fas fa-phone me-2"></i>
                                            ফোন তথ্য
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        @php $phone = $contactInfo->getContactItem('phone'); @endphp
                                        <div class="mb-3">
                                            <label for="phone_title" class="form-label">শিরোনাম</label>
                                            <input type="text" class="form-control" id="phone_title" name="phone_title" 
                                                   value="{{ old('phone_title', $phone['title'] ?? 'ফোন') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_content" class="form-label">ফোন নম্বর</label>
                                            <textarea class="form-control" id="phone_content" name="phone_content" 
                                                      rows="4" placeholder="প্রতিটি ফোন নম্বর আলাদা লাইনে লিখুন" required>{{ old('phone_content', $phone['content'] ?? '') }}</textarea>
                                            <small class="text-muted">প্রতিটি ফোন নম্বর আলাদা লাইনে লিখুন</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_icon" class="form-label">আইকন</label>
                                            <select class="form-control" id="phone_icon" name="phone_icon" required>
                                                @foreach($icons as $emoji => $label)
                                                    <option value="{{ $emoji }}" {{ ($phone['icon'] ?? '📞') == $emoji ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="phone_active" name="phone_active" 
                                                   value="1" {{ ($phone['is_active'] ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="phone_active">সক্রিয়</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Section -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0">
                                            <i class="fas fa-envelope me-2"></i>
                                            ইমেইল তথ্য
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        @php $email = $contactInfo->getContactItem('email'); @endphp
                                        <div class="mb-3">
                                            <label for="email_title" class="form-label">শিরোনাম</label>
                                            <input type="text" class="form-control" id="email_title" name="email_title" 
                                                   value="{{ old('email_title', $email['title'] ?? 'ইমেইল') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email_content" class="form-label">ইমেইল ঠিকানা</label>
                                            <textarea class="form-control" id="email_content" name="email_content" 
                                                      rows="4" placeholder="ইমেইল ঠিকানা" required>{{ old('email_content', $email['content'] ?? '') }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email_icon" class="form-label">আইকন</label>
                                            <select class="form-control" id="email_icon" name="email_icon" required>
                                                @foreach($icons as $emoji => $label)
                                                    <option value="{{ $emoji }}" {{ ($email['icon'] ?? '📧') == $emoji ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="email_active" name="email_active" 
                                                   value="1" {{ ($email['is_active'] ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="email_active">সক্রিয়</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Website Section -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-warning text-dark">
                                        <h5 class="mb-0">
                                            <i class="fas fa-globe me-2"></i>
                                            ওয়েবসাইট তথ্য
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        @php $website = $contactInfo->getContactItem('website'); @endphp
                                        <div class="mb-3">
                                            <label for="website_title" class="form-label">শিরোনাম</label>
                                            <input type="text" class="form-control" id="website_title" name="website_title" 
                                                   value="{{ old('website_title', $website['title'] ?? 'ওয়েবসাইট') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="website_content" class="form-label">ওয়েবসাইট URL</label>
                                            <textarea class="form-control" id="website_content" name="website_content" 
                                                      rows="4" placeholder="ওয়েবসাইট ঠিকানা" required>{{ old('website_content', $website['content'] ?? '') }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="website_icon" class="form-label">আইকন</label>
                                            <select class="form-control" id="website_icon" name="website_icon" required>
                                                @foreach($icons as $emoji => $label)
                                                    <option value="{{ $emoji }}" {{ ($website['icon'] ?? '🌐') == $emoji ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="website_active" name="website_active" 
                                                   value="1" {{ ($website['is_active'] ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="website_active">সক্রিয়</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Address Section -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-header bg-secondary text-white">
                                        <h5 class="mb-0">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            ঠিকানা তথ্য
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        @php $address = $contactInfo->getContactItem('address'); @endphp
                                        <div class="mb-3">
                                            <label for="address_title" class="form-label">শিরোনাম</label>
                                            <input type="text" class="form-control" id="address_title" name="address_title" 
                                                   value="{{ old('address_title', $address['title'] ?? 'ঠিকানা') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address_content" class="form-label">ঠিকানা</label>
                                            <textarea class="form-control" id="address_content" name="address_content" 
                                                      rows="4" placeholder="সম্পূর্ণ ঠিকানা" required>{{ old('address_content', $address['content'] ?? '') }}</textarea>
                                            <small class="text-muted">প্রতিটি লাইন আলাদা লাইনে লিখুন</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address_icon" class="form-label">আইকন</label>
                                            <select class="form-control" id="address_icon" name="address_icon" required>
                                                @foreach($icons as $emoji => $label)
                                                    <option value="{{ $emoji }}" {{ ($address['icon'] ?? '📍') == $emoji ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="address_active" name="address_active" 
                                                   value="1" {{ ($address['is_active'] ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="address_active">সক্রিয়</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> ড্যাশবোর্ডে ফিরে যান
                            </a>
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-save me-1"></i> সমস্ত তথ্য সংরক্ষণ করুন
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
    .preview-section {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 12px;
        border: 1px solid #e9ecef;
    }
    
    .contact-item-preview {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.5rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    
    .contact-item-preview:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .contact-icon-preview {
        font-size: 2.5rem;
        flex-shrink: 0;
    }
    
    .contact-details-preview h6 {
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .contact-details-preview div,
    .contact-link-preview {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.4;
        margin: 0;
    }
    
    .contact-link-preview {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
    }
    
    .contact-link-preview:hover {
        color: #1a7a4a;
    }
</style>
@endsection

