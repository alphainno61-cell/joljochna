@extends('admin.layouts.layout')

@section('title', 'ড্যাশবোর্ড ওভারভিউ')
@section('page-title', 'ড্যাশবোর্ড ওভারভিউ')

@section('content')
    <!-- Main Business Stats -->
    <div class="row g-3 g-md-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>মোট বুকিং</h6>
                    <h2>{{ $stats['bookings']['total'] }}</h2>
                    <small class="text-muted">
                        পেন্ডিং: {{ $stats['bookings']['pending'] }} |
                        সম্পূর্ণ: {{ $stats['bookings']['completed'] }}
                    </small>
                </div>
                <div class="stat-icon blue">
                    <i class="bi bi-calendar-check"></i>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>মোট ব্যবহারকারী</h6>
                    <h2>{{ $stats['users']['total'] }}</h2>
                    <small class="text-muted d-none d-sm-block">রেজিস্টার্ড ব্যবহারকারী</small>
                </div>
                <div class="stat-icon green">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>সক্রিয় প্রকল্প</h6>
                    <h2>{{ $stats['projects']['active'] }}</h2>
                    <small class="text-muted">ফিচার্ড: {{ $stats['projects']['featured'] }}</small>
                </div>
                <div class="stat-icon orange">
                    <i class="bi bi-building"></i>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>উপলব্ধ প্লট</h6>
                    <h2>{{ $stats['plots']['active'] }}</h2>
                    <small class="text-muted">মোট: {{ $stats['plots']['total'] }} প্লট</small>
                </div>
                <div class="stat-icon purple">
                    <i class="bi bi-map"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 g-md-4">
        <!-- Left Column -->
        <div class="col-12 col-lg-8">
            <!-- Property & Business Section -->
            <div class="row g-3 mb-3 mb-md-4">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="stat-card secondary">
                        <div class="stat-content">
                            <h6>মূল্য প্যাকেজ</h6>
                            <h2>{{ $stats['pricings']['active'] }}</h2>
                            <small class="text-muted">ফিচার্ড: {{ $stats['pricings']['featured'] }}</small>
                        </div>
                        <div class="stat-icon blue">
                            <i class="bi bi-tags"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="stat-card secondary">
                        <div class="stat-content">
                            <h6>সক্রিয় সুযোগ</h6>
                            <h2>{{ $stats['opportunities']['total'] }}</h2>
                            <small class="text-muted d-none d-sm-block">ব্যবসায়িক সুযোগ</small>
                        </div>
                        <div class="stat-icon green">
                            <i class="bi bi-briefcase"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="stat-card secondary">
                        <div class="stat-content">
                            <h6>সন্তুষ্টি মন্তব্য</h6>
                            <h2>{{ $stats['testimonials']['active'] }}</h2>
                            <small class="text-muted">সক্রিয় রিভিউ</small>
                        </div>
                        <div class="stat-icon orange">
                            <i class="bi bi-chat-quote"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings -->
            <div class="card mb-3 mb-md-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">সাম্প্রতিক বুকিং</h5>
                    <span class="badge bg-primary">{{ $latestBookings->count() }}</span>
                </div>
                <div class="card-body p-0">
                    @if ($latestBookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>নাম</th>
                                        <th class="d-none d-md-table-cell">ফোন</th>
                                        <th class="d-none d-lg-table-cell">প্লট সাইজ</th>
                                        <th>স্ট্যাটাস</th>
                                        <th class="d-none d-sm-table-cell">তারিখ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestBookings as $booking)
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">{{ $booking->name }}</div>
                                                <small class="text-muted d-md-none">{{ $booking->phone }}</small>
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ $booking->phone }}</td>
                                            <td class="d-none d-lg-table-cell">{{ $booking->plot_size ?? 'N/A' }}</td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill 
                                                    @if ($booking->status == 'pending') bg-warning text-dark
                                                    @elseif($booking->status == 'contacted') bg-info
                                                    @elseif($booking->status == 'completed') bg-success
                                                    @else bg-secondary @endif">
                                                    {{ $booking->status }}
                                                </span>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <small>{{ $booking->created_at->format('d/m/Y') }}</small>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2">কোন বুকিং নেই</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-12 col-lg-4">
            <!-- Plot Categories -->
            <div class="card mb-3 mb-md-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">প্লট বিভাগ</h5>
                </div>
                <div class="card-body">
                    @if ($plotCategories->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach ($plotCategories as $category)
                                <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span class="text-truncate me-2">{{ $category->category }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ $category->count }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-folder-x text-muted" style="font-size: 2.5rem;"></i>
                            <p class="text-muted mt-2 mb-0">কোন প্লট বিভাগ নেই</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Website Content Stats -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">ওয়েবসাইট কন্টেন্ট</h5>
                </div>
                <div class="card-body">
                    <div class="content-stat-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-star-fill text-warning me-2"></i>
                                <span>মূল হিরো</span>
                            </div>
                            <strong class="text-primary">{{ $stats['heroes']['total'] }}</strong>
                        </div>
                    </div>
                    <div class="content-stat-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-columns-gap text-info me-2"></i>
                                <span>হিরো সেকশন</span>
                            </div>
                            <strong class="text-primary">{{ $stats['hero_sections']['total'] }}</strong>
                        </div>
                    </div>
                    <div class="content-stat-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-share text-success me-2"></i>
                                <span>সোশ্যাল মিডিয়া</span>
                            </div>
                            <strong
                                class="text-primary">{{ $stats['social_media']['active'] }}/{{ $stats['social_media']['total'] }}</strong>
                        </div>
                    </div>
                    <div class="content-stat-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-telephone text-danger me-2"></i>
                                <span>যোগাযোগ তথ্য</span>
                            </div>
                            <strong class="text-primary">{{ $stats['contact_info']['total'] }}</strong>
                        </div>
                    </div>
                    <div class="content-stat-item mb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-layout-text-window text-secondary me-2"></i>
                                <span>ফুটার সেটিংস</span>
                            </div>
                            <strong
                                class="text-primary">{{ $stats['footer_settings']['active'] }}/{{ $stats['footer_settings']['total'] }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Company Information Section -->
    <div class="row g-3 g-md-4 mt-2">
        <div class="col-6 col-lg-3">
            <div class="stat-card info">
                <div class="stat-content">
                    <h6>চেয়ারম্যান</h6>
                    <h2>{{ $stats['chairmen']['total'] }}</h2>
                    <small class="text-muted d-none d-sm-block">নেতৃত্বের তথ্য</small>
                </div>
                <div class="stat-icon blue">
                    <i class="bi bi-person-badge"></i>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card info">
                <div class="stat-content">
                    <h6>প্রতিষ্ঠাতা</h6>
                    <h2>{{ $stats['founders']['total'] }}</h2>
                    <small class="text-muted d-none d-sm-block">প্রতিষ্ঠাতার তথ্য</small>
                </div>
                <div class="stat-icon green">
                    <i class="bi bi-person-heart"></i>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card info">
                <div class="stat-content">
                    <h6>ইতিহাস</h6>
                    <h2>{{ $stats['histories']['total'] }}</h2>
                    <small class="text-muted d-none d-sm-block">কোম্পানি ইতিহাস</small>
                </div>
                <div class="stat-icon orange">
                    <i class="bi bi-clock-history"></i>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card info">
                <div class="stat-content">
                    <h6>মিশন ও ভিশন</h6>
                    <h2>{{ $stats['mission_visions']['total'] }}</h2>
                    <small class="text-muted d-none d-sm-block">কোম্পানি লক্ষ্য</small>
                </div>
                <div class="stat-icon purple">
                    <i class="bi bi-eye"></i>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 1.25rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
        border-left: 4px solid #007bff;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.05) 0%, transparent 100%);
        border-radius: 0 12px 0 100%;
        z-index: 0;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .stat-card.secondary {
        border-left-width: 3px;
    }

    .stat-card.info {
        border-left-width: 3px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    }

    .stat-content {
        flex: 1;
        position: relative;
        z-index: 1;
    }

    .stat-content h6 {
        color: #6c757d;
        font-size: 0.813rem;
        margin-bottom: 0.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-content h2 {
        color: #343a40;
        font-weight: 700;
        margin-bottom: 0.25rem;
        font-size: 1.75rem;
        line-height: 1.2;
    }

    .stat-content small {
        font-size: 0.75rem;
        display: block;
        line-height: 1.4;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        min-width: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .stat-icon.blue {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    }

    .stat-icon.green {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
    }

    .stat-icon.orange {
        background: linear-gradient(135deg, #fd7e14 0%, #dc6502 100%);
    }

    .stat-icon.purple {
        background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
    }

    .card {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 1px solid #dee2e6;
        padding: 1rem 1.25rem;
        font-weight: 600;
    }

    .card-body {
        padding: 1.25rem;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        font-weight: 600;
        font-size: 0.875rem;
        color: #495057;
        padding: 0.75rem;
    }

    .table tbody td {
        padding: 0.875rem 0.75rem;
        vertical-align: middle;
        font-size: 0.875rem;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }

    .badge {
        font-weight: 500;
        padding: 0.35em 0.65em;
        font-size: 0.75rem;
    }

    .list-group-item {
        border: none;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .content-stat-item {
        padding: 0.75rem 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .content-stat-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .content-stat-item i {
        font-size: 1.1rem;
    }

    /* Mobile Responsive Adjustments */
    @media (max-width: 575.98px) {
        .stat-card {
            padding: 1rem;
        }

        .stat-content h2 {
            font-size: 1.5rem;
        }

        .stat-content h6 {
            font-size: 0.75rem;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 1rem;
        }

        .table thead th,
        .table tbody td {
            padding: 0.5rem;
            font-size: 0.813rem;
        }
    }

    @media (max-width: 767.98px) {
        .stat-card::before {
            width: 80px;
            height: 80px;
        }
    }

    @media (min-width: 992px) {
        .stat-content h2 {
            font-size: 2rem;
        }
    }

    /* Animation for cards on load */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card,
    .card {
        animation: fadeInUp 0.5s ease-out;
    }

    /* Smooth scrolling for mobile */
    @media (max-width: 991.98px) {
        .table-responsive {
            -webkit-overflow-scrolling: touch;
        }
    }
</style>
