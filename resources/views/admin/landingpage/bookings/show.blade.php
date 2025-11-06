@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-eye me-2"></i>
                            বুকিং বিস্তারিত
                        </h4>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>নাম:</strong></label>
                                    <p>{{ $booking->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>ফোন নম্বর:</strong></label>
                                    <p>
                                        <a href="tel:{{ $booking->phone }}" class="text-decoration-none">
                                            {{ $booking->phone }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>ইমেইল:</strong></label>
                                    <p>
                                        <a href="mailto:{{ $booking->email }}" class="text-decoration-none">
                                            {{ $booking->email }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>প্লট সাইজ:</strong></label>
                                    <p>{{ $booking->plot_size ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>বার্তা:</strong></label>
                            <p>{{ $booking->message ?? 'N/A' }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>জমা দেওয়ার তারিখ:</strong></label>
                                    <p>{{ $booking->created_at->format('d M Y, h:i A') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>সর্বশেষ আপডেট:</strong></label>
                                    <p>{{ $booking->updated_at->format('d M Y, h:i A') }}</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Status Update Form -->
                        <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label"><strong>স্ট্যাটাস আপডেট
                                                করুন:</strong></label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="contacted"
                                                {{ $booking->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="completed"
                                                {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled"
                                                {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="admin_notes" class="form-label"><strong>এডমিন নোটস:</strong></label>
                                        <textarea class="form-control" id="admin_notes" name="admin_notes" rows="3" placeholder="কোন নোটস থাকলে লিখুন...">{{ old('admin_notes', $booking->admin_notes) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> ফিরে যান
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> স্ট্যাটাস আপডেট করুন
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<style>
    .contact-form {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #1a7a4a;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1a7a4a, #2ecc71);
        border: none;
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        background: linear-gradient(135deg, #166c41, #27ae60);
    }
</style>
