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
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-comments me-2"></i>
                            বিনিয়োগকারী মন্তব্য ব্যবস্থাপনা
                        </h4>

                        @can('Create Testimonial Section')
                            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-plus me-1"></i> নতুন মন্তব্য
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @if ($testimonials->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="80">ক্রম</th>
                                            <th width="80">আভাটার</th>
                                            <th>বিনিয়োগকারীর নাম</th>
                                            <th>পদবী</th>
                                            <th>মন্তব্য</th>
                                            <th>স্ট্যাটাস</th>
                                            <th width="150" class="text-end">কাজ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $testimonial)
                                            <tr>
                                                <td>
                                                    <span class="badge bg-secondary">{{ $testimonial->sort_order }}</span>
                                                </td>
                                                <td>
                                                    <div class="investor-avatar-small">
                                                        {{ $testimonial->avatar_initials }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong>{{ $testimonial->investor_name }}</strong>
                                                </td>
                                                <td>{{ $testimonial->investor_title }}</td>
                                                <td>
                                                    {{ Str::limit($testimonial->quote_text, 80) }}
                                                </td>
                                                <td>
                                                    @if ($testimonial->is_active)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @else
                                                        <span class="badge bg-danger">নিষ্ক্রিয়</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">

                                                    @can('Edit Testimonial Section')
                                                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan

                                                    @can('Delete Testimonial Section')
                                                        <form
                                                            action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('আপনি কি নিশ্চিত এই মন্তব্যটি মুছে ফেলতে চান?');">
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
                                {{ $testimonials->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                <p class="text-muted">কোন মন্তব্য পাওয়া যায়নি।</p>
                                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-info">
                                    <i class="fas fa-plus me-1"></i> প্রথম মন্তব্য তৈরি করুন
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
        .investor-avatar-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a7a4a, #2ecc71);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
@endsection
