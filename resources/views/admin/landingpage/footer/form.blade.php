@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-footer me-2"></i>
                            ফুটার সেটিংস ব্যবস্থাপনা
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.footer-settings.store-or-update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Project Information -->
                                <div class="col-md-6">
                                    <h5 class="border-bottom pb-2 mb-4">প্রকল্প তথ্য</h5>

                                    <div class="mb-3">
                                        <label for="project_name" class="form-label">প্রকল্পের নাম *</label>
                                        <input type="text"
                                            class="form-control @error('project_name') is-invalid @enderror"
                                            id="project_name" name="project_name"
                                            value="{{ old('project_name', $footerSetting->project_name ?? 'জলজোছনা') }}"
                                            required>
                                        @error('project_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="project_description" class="form-label">প্রকল্পের বিবরণ *</label>
                                        <textarea class="form-control @error('project_description') is-invalid @enderror" id="project_description"
                                            name="project_description" rows="3" required>{{ old('project_description', $footerSetting->project_description ?? 'NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।') }}</textarea>
                                        @error('project_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone_numbers" class="form-label">ফোন নম্বর * (কমা দ্বারা আলাদা
                                            করুন)</label>
                                        <input type="text"
                                            class="form-control @error('phone_numbers') is-invalid @enderror"
                                            id="phone_numbers" name="phone_numbers"
                                            value="{{ old('phone_numbers', $footerSetting->phone_numbers ?? '+880 1991 995 995,+880 1991 994 994') }}"
                                            placeholder="+880 1991 995 995, +880 1991 994 994" required>
                                        @error('phone_numbers')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">ইমেইল *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email"
                                            value="{{ old('email', $footerSetting->email ?? 'hello.nexup@gmail.com') }}"
                                            required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Logo Image Upload -->
                                    <div class="mb-3">
                                        <label for="logo_image" class="form-label">লোগো ইমেজ</label>
                                        <input type="file" class="form-control @error('logo_image') is-invalid @enderror"
                                            id="logo_image" name="logo_image" accept="image/*">
                                        @error('logo_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if (isset($footerSetting) && $footerSetting->logo_image_url)
                                            <div class="mt-2">
                                                <img src="{{ $footerSetting->logo_image_url }}" alt="Logo"
                                                    style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                                                <small class="text-muted d-block">বর্তমান লোগো</small>
                                            </div>
                                        @endif
                                    </div>


                                    <!-- Project Roadmap Image Upload -->
                                    <div class="mb-3">
                                        <label for="project_roadmap_image" class="form-label">প্রজেক্ট রোডম্যাপ ইমেজ</label>
                                        <input type="file"
                                            class="form-control @error('project_roadmap_image') is-invalid @enderror"
                                            id="project_roadmap_image" name="project_roadmap_image" accept="image/*">
                                        @error('project_roadmap_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if (isset($footerSetting) && $footerSetting->project_roadmap_image_url)
                                            <div class="mt-2">
                                                <img src="{{ $footerSetting->project_roadmap_image_url }}"
                                                    alt="Project Roadmap" style="max-width: 100px; max-height: 100px;"
                                                    class="img-thumbnail">
                                                <small class="text-muted d-block">বর্তমান প্রজেক্ট রোডম্যাপ</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Address Information -->
                                <div class="col-md-6">
                                    <h5 class="border-bottom pb-2 mb-4">ঠিকানা তথ্য</h5>

                                    <div class="mb-3">
                                        <label for="project_address" class="form-label">প্রকল্পের ঠিকানা *</label>
                                        <textarea class="form-control @error('project_address') is-invalid @enderror" id="project_address"
                                            name="project_address" rows="2" required>{{ old('project_address', $footerSetting->project_address ?? 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ') }}</textarea>
                                        @error('project_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="contact_address" class="form-label">যোগাযোগের ঠিকানা *</label>
                                        <textarea class="form-control @error('contact_address') is-invalid @enderror" id="contact_address"
                                            name="contact_address" rows="2" required>{{ old('contact_address', $footerSetting->contact_address ?? 'NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka') }}</textarea>
                                        @error('contact_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="google_map_url" class="form-label">গুগল ম্যাপ URL *</label>
                                        <input type="url"
                                            class="form-control @error('google_map_url') is-invalid @enderror"
                                            id="google_map_url" name="google_map_url"
                                            value="{{ old('google_map_url', $footerSetting->google_map_url ?? 'https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা') }}"
                                            required>
                                        @error('google_map_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- QR Code Image Upload -->
                                    <div class="mb-3">
                                        <label for="qr_code_image" class="form-label">QR কোড ইমেজ</label>
                                        <input type="file"
                                            class="form-control @error('qr_code_image') is-invalid @enderror"
                                            id="qr_code_image" name="qr_code_image" accept="image/*">
                                        @error('qr_code_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if (isset($footerSetting) && $footerSetting->qr_code_image_url)
                                            <div class="mt-2">
                                                <img src="{{ $footerSetting->qr_code_image_url }}" alt="QR Code"
                                                    style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                                                <small class="text-muted d-block">বর্তমান QR কোড</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Links -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5 class="border-bottom pb-2 mb-4">সোশ্যাল মিডিয়া লিংক</h5>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook_url" class="form-label">Facebook URL</label>
                                        <input type="url"
                                            class="form-control @error('facebook_url') is-invalid @enderror"
                                            id="facebook_url" name="facebook_url"
                                            value="{{ old('facebook_url', $footerSetting->facebook_url ?? '') }}">
                                        @error('facebook_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="instagram_url" class="form-label">Instagram URL</label>
                                        <input type="url"
                                            class="form-control @error('instagram_url') is-invalid @enderror"
                                            id="instagram_url" name="instagram_url"
                                            value="{{ old('instagram_url', $footerSetting->instagram_url ?? '') }}">
                                        @error('instagram_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="twitter_url" class="form-label">Twitter URL</label>
                                        <input type="url"
                                            class="form-control @error('twitter_url') is-invalid @enderror"
                                            id="twitter_url" name="twitter_url"
                                            value="{{ old('twitter_url', $footerSetting->twitter_url ?? '') }}">
                                        @error('twitter_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                                        <input type="url"
                                            class="form-control @error('linkedin_url') is-invalid @enderror"
                                            id="linkedin_url" name="linkedin_url"
                                            value="{{ old('linkedin_url', $footerSetting->linkedin_url ?? '') }}">
                                        @error('linkedin_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="youtube_url" class="form-label">YouTube URL</label>
                                        <input type="url"
                                            class="form-control @error('youtube_url') is-invalid @enderror"
                                            id="youtube_url" name="youtube_url"
                                            value="{{ old('youtube_url', $footerSetting->youtube_url ?? '') }}">
                                        @error('youtube_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Settings -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="show_payment_methods"
                                            name="show_payment_methods" value="1"
                                            {{ old('show_payment_methods', $footerSetting->show_payment_methods ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="show_payment_methods">
                                            পেমেন্ট মাধ্যম দেখান
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                            value="1"
                                            {{ old('is_active', $footerSetting->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            সক্রিয়
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i>
                                    {{ isset($footerSetting) ? 'আপডেট করুন' : 'সেভ করুন' }}
                                </button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
