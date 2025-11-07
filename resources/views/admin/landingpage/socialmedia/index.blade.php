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
                            <i class="fas fa-images me-2"></i>
                            Carousel ব্যবস্থাপনা
                        </h4>

                        @can('Create SocialMedia Section')
                            <a href="{{ route('admin.socialmedias.create') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-plus me-1"></i> নতুন আইটেম
                            </a>
                        @endcan

                    </div>
                    <div class="card-body">
                        @if ($socialMediaLinks->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="80">ক্রম</th>
                                            <th width="100">গ্রুপ</th>
                                            <th width="150">ইমেজ</th>
                                            <th>শিরোনাম</th>
                                            <th>URL</th>
                                            <th>স্ট্যাটাস</th>
                                            <th width="150" class="text-end">কাজ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($socialMediaLinks as $socialmedia)
                                            <tr>
                                                <td>
                                                    <span class="badge bg-secondary">{{ $socialmedia->sort_order }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">স্লাইড
                                                        {{ $socialmedia->carousel_group }}</span>
                                                </td>
                                                <td>
                                                    <img src="{{ $socialmedia->image_url }}" alt="{{ $socialmedia->title }}"
                                                        style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                                                </td>
                                                <td>
                                                    <strong>{{ $socialmedia->title }}</strong>
                                                    <br>
                                                    <small
                                                        class="text-muted">{{ Str::limit($socialmedia->description, 50) }}</small>
                                                </td>
                                                <td>
                                                    @if ($socialmedia->url)
                                                        <a href="{{ $socialmedia->url }}" target="_blank"
                                                            class="text-decoration-none">
                                                            {{ Str::limit($socialmedia->url, 30) }}
                                                            <i class="fas fa-external-link-alt ms-1"></i>
                                                        </a>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($socialmedia->is_active)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @else
                                                        <span class="badge bg-danger">নিষ্ক্রিয়</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">

                                                    @can('Edit SocialMedia Section')
                                                        <a href="{{ route('admin.socialmedias.edit', $socialmedia->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan

                                                    @can('Delete SocialMedia Section')
                                                        <form
                                                            action="{{ route('admin.socialmedias.destroy', $socialmedia->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('আপনি কি নিশ্চিত এই আইটেমটি মুছে ফেলতে চান?');">
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
                                {{ $socialMediaLinks->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                                <p class="text-muted">কোন ক্যারousel আইটেম পাওয়া যায়নি।</p>
                                <a href="{{ route('admin.socialmedias.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i> প্রথম আইটেম তৈরি করুন
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
