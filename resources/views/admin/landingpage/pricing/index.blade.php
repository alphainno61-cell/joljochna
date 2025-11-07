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

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-money-bill-wave me-2"></i>
                            মূল্য তালিকা ব্যবস্থাপনা
                        </h4>
                        @can('Create Pricing Section')
                            <a href="{{ route('admin.pricing.create') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-plus me-1"></i> নতুন প্যাকেজ
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @if ($pricings->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="80">ক্রম</th>
                                            <th>প্যাকেজের নাম</th>
                                            <th>আকার</th>
                                            <th>মূল্য</th>
                                            <th>ডাউন পেমেন্ট</th>
                                            <th>স্ট্যাটাস</th>
                                            <th width="150" class="text-end">কাজ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pricings as $pricing)
                                            <tr>
                                                <td>
                                                    <span class="badge bg-secondary">{{ $pricing->sort_order }}</span>
                                                    @if ($pricing->is_featured)
                                                        <span class="badge bg-warning">জনপ্রিয়</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>{{ $pricing->title }}</strong>
                                                </td>
                                                <td>{{ $pricing->size_description }}</td>
                                                <td>
                                                    <strong>{{ number_format($pricing->total_price, 2) }} টাকা</strong>
                                                </td>
                                                <td>
                                                    {{ $pricing->down_payment_percentage }}%<br>
                                                    <small>{{ number_format($pricing->down_payment_amount, 2) }}
                                                        টাকা</small>
                                                </td>
                                                <td>
                                                    @if ($pricing->is_active)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @else
                                                        <span class="badge bg-danger">নিষ্ক্রিয়</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">

                                                    @can('Edit Pricing Section')
                                                        <a href="{{ route('admin.pricing.edit', $pricing->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan

                                                    @can('Delete Pricing Section')
                                                        <form action="{{ route('admin.pricing.destroy', $pricing->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('আপনি কি নিশ্চিত এই প্যাকেজটি মুছে ফেলতে চান?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-3">
                                {{ $pricings->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-money-bill-wave fa-3x text-muted mb-3"></i>
                                <p class="text-muted">কোন প্যাকেজ পাওয়া যায়নি।</p>
                                <a href="{{ route('admin.pricing.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus me-1"></i> প্রথম প্যাকেজ তৈরি করুন
                                </a>
                            </div>
                        @endif
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

        .table {
            margin-bottom: 0;
        }

        .table td {
            vertical-align: middle;
        }

        .btn {
            border-radius: 8px;
        }

        .btn-sm {
            padding: 5px 12px;
        }
    </style>
@endsection
