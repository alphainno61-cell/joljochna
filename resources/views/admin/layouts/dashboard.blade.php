@extends('admin.layouts.layout')

@section('title', 'ড্যাশবোর্ড ওভারভিউ')
@section('page-title', 'ড্যাশবোর্ড ওভারভিউ')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>মোট বুকিং</h6>
                    <h2>0</h2>
                    <small class="text-muted">সর্বমোট গ্রাহক</small>
                </div>
                <div class="stat-icon blue">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>সক্রিয় বুকিং</h6>
                    <h2>0</h2>
                    <small class="text-muted">চলমান সেবাসমূহ</small>
                </div>
                <div class="stat-icon green">
                    <i class="bi bi-calendar-check"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>মোট আয়</h6>
                    <h2>৳০</h2>
                    <small class="text-muted">প্রাপ্ত অর্থ</small>
                </div>
                <div class="stat-icon orange">
                    <i class="bi bi-currency-dollar"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-content">
                    <h6>উপশাহর মট</h6>
                    <h2>0</h2>
                    <small class="text-muted">বিভাগের জন্য</small>
                </div>
                <div class="stat-icon purple">
                    <i class="bi bi-gift"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-7">
            <div class="section-card">
                <h5>মাসিক বিক্রয়</h5>
                <div style="height: 300px;" class="d-flex align-items-center justify-content-center text-muted">
                    <p>চার্ট এখানে প্রদর্শিত হবে</p>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="section-card">
                <h5>আয়ের প্রবন্তা</h5>
                <div style="height: 300px;" class="d-flex align-items-center justify-content-center text-muted">
                    <p>তথ্য লোড হচ্ছে...</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-3">
        <div class="col-lg-6">
            <div class="section-card">
                <h5>শপ বিবরণ</h5>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>শপের নাম</th>
                                <th>অবস্থান</th>
                                <th>স্ট্যাটাস</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">কোন তথ্য নেই</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="section-card">
                <h5>সাম্প্রতিক বুকিং</h5>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>গ্রাহক</th>
                                <th>সেবা</th>
                                <th>তারিখ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">কোন বুকিং নেই</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
