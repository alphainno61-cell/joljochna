@extends('admin.layouts')

@section('content')

  <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h1>জলজোছনা</h1>
                <button class="toggle-btn" onclick="toggleSidebar()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>

            <nav class="nav-menu">
                <div class="nav-item active" data-tab="overview" onclick="showTab('overview')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    </svg>
                    <span>ওভারভিউ</span>
                </div>

                <div class="nav-item" data-tab="bookings" onclick="showTab('bookings')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                    </svg>
                    <span>বুকিং</span>
                </div>

                <div class="nav-item" data-tab="plots" onclick="showTab('plots')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>প্লট</span>
                </div>

                <div class="nav-item" data-tab="customers" onclick="showTab('customers')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>গ্রাহক</span>
                </div>

                <div class="nav-item" data-tab="reports" onclick="showTab('reports')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                    <span>রিপোর্ট</span>
                </div>

                <div class="nav-item" data-tab="settings" onclick="showTab('settings')">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M12 1v6m0 6v6m0-6h6m-6 0H6m3.2-3.2l4.2 4.2m-4.2 0l4.2-4.2M18.8 14.8l-4.2-4.2m4.2 0l-4.2 4.2"></path>
                    </svg>
                    <span>সেটিংস</span>
                </div>
            </nav>

            <div class="logout-section">
                <button class="logout-btn" onclick="logout()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>লগআউট</span>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <h2 id="pageTitle">ড্যাশবোর্ড ওভারভিউ</h2>
                    <p id="currentDate"></p>
                </div>
                <div class="header-right">
                    <div class="search-box">
                        <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        <input type="text" placeholder="খুঁজুন..." id="globalSearch">
                    </div>
                    <div class="user-avatar">A</div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content-area">
                <!-- Overview Tab -->
                <div id="overview" class="tab-content active">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>মোট বুকিং</h3>
                                    <div class="value" id="statTotalBookings">0</div>
                                    <div class="subtitle">সর্বমোট গ্রাহক</div>
                                </div>
                                <div class="stat-icon blue">👥</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>সক্রিয় বুকিং</h3>
                                    <div class="value" id="statActiveBookings">0</div>
                                    <div class="subtitle">চলমান লেনদেন</div>
                                </div>
                                <div class="stat-icon green">📈</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>মোট আয়</h3>
                                    <div class="value" id="statTotalRevenue">৳0L</div>
                                    <div class="subtitle">প্রাপ্ত অর্থ</div>
                                </div>
                                <div class="stat-icon yellow">💰</div>
                            </div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-card-content">
                                <div class="stat-info">
                                    <h3>উপলব্ধ প্লট</h3>
                                    <div class="value" id="statAvailablePlots">0</div>
                                    <div class="subtitle">বিক্রয়ের জন্য</div>
                                </div>
                                <div class="stat-icon purple">🏘️</div>
                            </div>
                        </div>
                    </div>

                    <div class="charts-grid">
                        <div class="chart-card">
                            <h3>মাসিক বিক্রয়</h3>
                            <div class="chart-container">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-card">
                            <h3>আয়ের প্রবণতা</h3>
                            <div class="chart-container">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="charts-grid">
                        <div class="chart-card">
                            <h3>প্লট বিতরণ</h3>
                            <div class="chart-container">
                                <canvas id="plotChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-card">
                            <h3>সাম্প্রতিক বুকিং</h3>
                            <div id="recentBookings">
                                <!-- Recent bookings list populated by JS -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bookings Tab -->
                <div id="bookings" class="tab-content">
                    <div class="table-card">
                        <div class="table-header">
                            <h2>বুকিং তালিকা</h2>
                            <div class="table-actions">
                                <input type="text" class="search-input" placeholder="অনুসন্ধান করুন..." id="bookingSearch" oninput="filterBookings()">
                                <select class="filter-select" id="plotFilter" onchange="filterBookings()">
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
                            <table id="bookingsTable">
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

                <!-- Plots Tab -->
                <div id="plots" class="tab-content">
                    <div class="table-card">
                        <div class="table-header">
                            <h2>প্লট তালিকা</h2>
                            <button class="btn btn-success" onclick="addNewPlot()">
                                ➕ নতুন প্লট যোগ করুন
                            </button>
                        </div>

                        <div class="plots-grid" id="plotsGrid">
                            <!-- Plot cards populated by JS -->
                        </div>
                    </div>
                </div>

                <!-- Other Tabs (Placeholders) -->
                <div id="customers" class="tab-content">
                    <div class="table-card">
                        <h2>গ্রাহক তালিকা</h2>
                        <p style="color: #6b7280; margin-top: 1rem;">এই বিভাগটি শীঘ্রই আসছে...</p>
                    </div>
                </div>

                <div id="reports" class="tab-content">
                    <div class="table-card">
                        <h2>রিপোর্ট ও বিশ্লেষণ</h2>
                        <p style="color: #6b7280; margin-top: 1rem;">এই বিভাগটি শীঘ্রই আসছে...</p>
                    </div>
                </div>

                <div id="settings" class="tab-content">
                    <div class="table-card">
                        <h2>সেটিংস</h2>
                        <p style="color: #6b7280; margin-top: 1rem;">এই বিভাগটি শীঘ্রই আসছে...</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    
@endsection