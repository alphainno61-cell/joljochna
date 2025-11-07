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

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>{{ $stats['total'] }}</h4>
                                        <p>মোট বুকিং</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-list fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>{{ $stats['pending'] }}</h4>
                                        <p>Pending</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-clock fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>{{ $stats['contacted'] }}</h4>
                                        <p>Contacted</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-phone fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>{{ $stats['completed'] }}</h4>
                                        <p>Completed</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-check fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-calendar-check me-2"></i>
                            বুকিং ব্যবস্থাপনা
                        </h4>
                    </div>
                    <div class="card-body">
                        @if ($bookings->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>নাম</th>
                                            <th>ফোন</th>
                                            <th>ইমেইল</th>
                                            <th>প্লট সাইজ</th>
                                            <th>তারিখ</th>
                                            <th>স্ট্যাটাস</th>
                                            <th width="150" class="text-end">কাজ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>
                                                    <strong>{{ $booking->name }}</strong>
                                                </td>
                                                <td>
                                                    <a href="tel:{{ $booking->phone }}" class="text-decoration-none">
                                                        {{ $booking->phone }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $booking->email }}" class="text-decoration-none">
                                                        {{ $booking->email }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $booking->plot_size ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    <small>{{ $booking->created_at->format('d M Y') }}</small>
                                                    <br>
                                                    <small
                                                        class="text-muted">{{ $booking->created_at->format('h:i A') }}</small>
                                                </td>
                                                <td>
                                                    <span class="badge {{ $booking->status_badge }}">
                                                        {{ $booking->status_text }}
                                                    </span>
                                                </td>
                                                <td class="text-end">

                                                    @can('Edit Booking')
                                                        <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @endcan

                                                    @can('Delete Booking')
                                                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('আপনি কি নিশ্চিত এই বুকিংটি মুছে ফেলতে চান?');">
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
                                {{ $bookings->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                <p class="text-muted">কোন বুকিং পাওয়া যায়নি।</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
