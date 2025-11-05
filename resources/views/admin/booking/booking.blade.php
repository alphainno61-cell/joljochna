@extends('admin.layouts.layout')

@section('content')
    <div id="" class="tab-content">
        <div class="table-card">
            <div class="table-header">
                <h2>বুকিং তালিকা</h2>
                <div class="table-actions">
                    <input type="text" class="search-input" placeholder="অনুসন্ধান করুন..." id="">
                    <select class="filter-select" id="plotFilter">
                        <option value="all">সব প্লট সাইজ</option>
                        <option value="২.৫ কাঠা">২.৫ কাঠা</option>
                        <option value="৩.৭৫ কাঠা">৩.৭৫ কাঠা</option>
                        <option value="৫ কাঠা">৫ কাঠা</option>
                    </select>
                    <button class="btn btn-primary" onclick="exportData()">
                        📥 রপ্তানি
                    </button>
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>নাম</th>
                            <th>যোগাযোগ</th>
                            <th>প্লট নং</th>
                            <th>সাইজ</th>
                            <th>মোট মূল্য</th>
                            <th>পরিশোধিত</th>
                            <th>অবস্থা</th>
                            <th>কার্যক্রম</th>
                        </tr>
                    </thead>
                    <tbody id="bookingsTableBody">
                        <!-- Table rows populated by JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
