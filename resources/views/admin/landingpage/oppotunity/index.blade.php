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
                            <i class="fas fa-list me-2"></i>
                            সুবিধাসমূহ তালিকা
                        </h4>
                        <a href="{{ route('opportunity.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i> নতুন সুবিধাসমূহ
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($opportunity->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="60">আইকন</th>
                                            <th>শিরোনাম</th>
                                            <th>বিবরণ</th>
                                            <th width="200" class="text-end">কাজ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($opportunity as $item)
                                            <tr>
                                                <td>
                                                    <span style="font-size: 2rem;">{{ $item->icon ?? '📋' }}</span>
                                                </td>
                                                <td>
                                                    <strong>{{ $item->title }}</strong>
                                                </td>
                                                <td>
                                                    {{ Str::limit($item->description, 50) }}
                                                </td>


                                                <td class="text-end">
                                                    <a href="{{ route('opportunity.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('opportunity.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('আপনি কি নিশ্চিত এই ফিচারটি মুছে ফেলতে চান?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-3">
                                {{ $opportunity->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">কোন ফিচার পাওয়া যায়নি।</p>
                                <a href="{{ route('opportunity.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus me-1"></i> প্রথম ফিচার তৈরি করুন
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
