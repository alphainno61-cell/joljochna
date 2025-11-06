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
                            <i class="fas fa-building me-2"></i>
                            প্রকল্প ব্যবস্থাপনা
                        </h4>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i> নতুন প্রকল্প
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($projects->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="80">ক্রম</th>
                                            <th width="100">আইকন/ইমেজ</th>
                                            <th>প্রকল্পের নাম</th>
                                            <th>বিবরণ</th>
                                            <th>বাটন টেক্সট</th>
                                            <th>স্ট্যাটাস</th>
                                            <th width="150" class="text-end">কাজ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>
                                                    <span class="badge bg-secondary">{{ $project->sort_order }}</span>
                                                    @if ($project->is_featured)
                                                        <span class="badge bg-warning mt-1">ফিচার্ড</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($project->image)
                                                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                                                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                                    @elseif($project->icon)
                                                        <div style="font-size: 2rem;">{{ $project->icon }}</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>{{ $project->title }}</strong>
                                                </td>
                                                <td>
                                                    {{ Str::limit($project->description, 50) }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">{{ $project->button_text }}</span>
                                                </td>
                                                <td>
                                                    @if ($project->is_active)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @else
                                                        <span class="badge bg-danger">নিষ্ক্রিয়</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('আপনি কি নিশ্চিত এই প্রকল্পটি মুছে ফেলতে চান?');">
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
                                {{ $projects->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                                <p class="text-muted">কোন প্রকল্প পাওয়া যায়নি।</p>
                                <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus me-1"></i> প্রথম প্রকল্প তৈরি করুন
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
