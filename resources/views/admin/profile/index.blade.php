{{-- resources/views/profile/index.blade.php --}}
@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <ul class="mb-0">
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
                            <i class="fas fa-user me-2"></i>
                            প্রোফাইল ব্যবস্থাপনা
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Profile Information -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0">
                                            <i class="fas fa-user-edit me-2"></i>
                                            প্রোফাইল তথ্য
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('profile.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="text-center mb-4">
                                                <div class="position-relative d-inline-block">
                                                    <img src="{{ $user->photo_url }}" alt="{{ $user->name }}"
                                                        class="rounded-circle"
                                                        style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #0d6efd;">
                                                    <div class="position-absolute bottom-0 end-0">
                                                        <label for="photo"
                                                            class="btn btn-primary btn-sm rounded-circle cursor-pointer">
                                                            <i class="fas fa-camera"></i>
                                                        </label>
                                                        <input type="file" id="photo" name="photo" class="d-none"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="name" class="form-label">পুরো নাম *</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" value="{{ old('name', $user->name) }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">ইমেইল *</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" value="{{ old('email', $user->email) }}" required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="form-label">ফোন নম্বর</label>
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    name="phone" value="{{ old('phone', $user->phone) }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="address" class="form-label">ঠিকানা</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="fas fa-save me-1"></i> প্রোফাইল আপডেট করুন
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Update -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-warning text-dark">
                                        <h5 class="mb-0">
                                            <i class="fas fa-lock me-2"></i>
                                            পাসওয়ার্ড পরিবর্তন
                                            </5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('profile.password.update') }}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">বর্তমান পাসওয়ার্ড
                                                    *</label>
                                                <input type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    id="current_password" name="current_password" required>
                                                @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">নতুন পাসওয়ার্ড *</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" required>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">নতুন পাসওয়ার্ড
                                                    নিশ্চিত করুন *</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation" required>
                                            </div>

                                            <button type="submit" class="btn btn-warning w-100">
                                                <i class="fas fa-key me-1"></i> পাসওয়ার্ড পরিবর্তন করুন
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- User Information -->
                                <div class="card mt-4">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">
                                            <i class="fas fa-info-circle me-2"></i>
                                            অ্যাকাউন্ট তথ্য
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <p><strong>অ্যাকাউন্ট তৈরি:</strong>
                                                    {{ $user->created_at->format('d M, Y') }}</p>
                                                <p><strong>সর্বশেষ আপডেট:</strong>
                                                    {{ $user->updated_at->format('d M, Y') }}</p>
                                                <p><strong>ইমেইল ভেরিফাই:</strong>
                                                    @if ($user->email_verified_at)
                                                        <span class="badge bg-success">ভেরিফাইড</span>
                                                    @else
                                                        <span class="badge bg-warning">অপেক্ষমান</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview image before upload
        document.getElementById('photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.querySelector('.rounded-circle');
                    img.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
