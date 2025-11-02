<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>জলজোছনা - অ্যাডমিন ড্যাশবোর্ড</title>
    <!-- Chart.js Library for Data Visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            overflow-x: hidden;
            color: #1f2937; /* Default text color */
        }

        .dashboard {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            /* Dark green gradient theme */
            background: linear-gradient(180deg, #0a4d2e 0%, #064029 100%);
            color: white;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
            flex-shrink: 0; /* Prevents shrinking */
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .sidebar.collapsed .sidebar-header h1 {
            display: none;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: background 0.3s;
        }

        .toggle-btn:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav-menu {
            flex: 1;
            padding: 1rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            margin-bottom: 0.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            color: white;
            white-space: nowrap; /* Prevent wrapping in collapsed state */
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav-item.active {
            background: #0a7a4a; /* Lighter shade of green for active state */
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .nav-item svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .sidebar.collapsed .nav-item span {
            display: none;
        }

        .logout-section {
            padding: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: none;
            border: none;
            color: white;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #dc2626; /* Red for emphasis */
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Header */
        .header {
            background: white;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap; /* Added for responsiveness */
            gap: 1rem; /* Added for responsiveness */
        }

        .header-left h2 {
            font-size: 2rem;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .header-left p {
            color: #6b7280;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            width: 250px;
            font-size: 0.875rem;
        }

        .search-box input:focus {
            outline: none;
            border-color: #0a4d2e;
            box-shadow: 0 0 0 3px rgba(10,77,46,0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: #0a4d2e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        /* Content Area */
        .content-area {
            flex: 1;
            overflow-y: auto;
            padding: 2rem;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .stat-card-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .stat-info h3 {
            color: #6b7280;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .stat-info .value {
            font-size: 2rem;
            font-weight: bold;
            color: #1f2937;
        }

        .stat-info .subtitle {
            font-size: 0.875rem;
            color: #9ca3af;
            margin-top: 0.25rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white; /* Emoji will override, but good practice for SVGs */
        }

        .stat-icon.blue { background: #3b82f6; }
        .stat-icon.green { background: #10b981; }
        .stat-icon.yellow { background: #f59e0b; }
        .stat-icon.purple { background: #8b5cf6; }

        /* Charts Section */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Adjusted minmax for better mobile view */
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .chart-card h3 {
            font-size: 1.25rem;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .chart-container {
            height: 300px;
            position: relative;
        }

        /* Recent Bookings List */
        #recentBookings {
            padding-top: 0.5rem;
        }

        .recent-booking-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px dashed #e5e7eb;
        }
        .recent-booking-item:last-child {
            border-bottom: none;
        }

        .recent-booking-info span {
            display: block;
            font-size: 0.875rem;
        }
        .recent-booking-info .name {
            font-weight: 600;
            color: #1f2937;
        }
        .recent-booking-info .plot {
            color: #6b7280;
            font-size: 0.75rem;
        }
        .recent-booking-amount {
            font-weight: bold;
            color: #0a4d2e;
        }


        /* Table Styles */
        .table-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .table-header h2 {
            font-size: 1.5rem;
            color: #1f2937;
        }

        .table-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-select, .search-input {
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            min-width: 150px;
        }

        .btn {
            padding: 0.75rem 1.25rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: #0a4d2e;
            color: white;
        }

        .btn-primary:hover {
            background: #064029;
        }

        .btn-success {
            background: #10b981;
            color: white;
        }

        .btn-success:hover {
            background: #059669;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        thead {
            background: #f9fafb;
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
        }

        td {
            padding: 1rem;
            border-top: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-active {
            background: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background: #dbeafe;
            color: #1e40af;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.5rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s;
            line-height: 1; /* Fix height issue */
        }

        .action-btn svg {
            width: 16px;
            height: 16px;
        }

        .action-btn.view {
            background: #dbeafe;
            color: #1e40af;
        }

        .action-btn.view:hover {
            background: #bfdbfe;
        }

        .action-btn.edit {
            background: #d1fae5;
            color: #065f46;
        }

        .action-btn.edit:hover {
            background: #a7f3d0;
        }

        .action-btn.delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btn.delete:hover {
            background: #fecaca;
        }

        /* Plot Grid */
        .plots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); /* Increased min-width for better display */
            gap: 1.5rem;
        }

        .plot-card {
            padding: 1.5rem;
            border-radius: 0.75rem;
            border: 2px solid;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }

        .plot-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .plot-card.available {
            border-color: #10b981;
            background: #ecfdf5;
        }

        .plot-card.reserved {
            border-color: #f59e0b;
            background: #fffbeb;
        }

        .plot-card.sold {
            border-color: #6b7280;
            background: #f9fafb;
        }

        .plot-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .plot-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1f2937;
        }

        .plot-block {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .plot-status {
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
            white-space: nowrap;
        }

        .plot-status.available { background: #10b981; }
        .plot-status.reserved { background: #f59e0b; }
        .plot-status.sold { background: #6b7280; }

        .plot-size {
            color: #374151;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .plot-price {
            color: #0a4d2e;
            font-weight: bold;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .plot-actions {
            display: flex;
            gap: 0.5rem;
        }

        .plot-actions .btn {
            flex: 1;
            justify-content: center;
            font-size: 0.875rem;
            padding: 0.6rem;
        }

        .btn-reserve {
            background: #f59e0b;
            color: white;
        }
        .btn-reserve:hover {
            background: #d97706;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar .sidebar-header h1,
            .sidebar .nav-item span,
            .sidebar .logout-btn span {
                display: none;
            }

            .sidebar .nav-item {
                justify-content: center;
                gap: 0;
            }

            .sidebar .logout-btn {
                justify-content: center;
                gap: 0;
            }

            .stats-grid,
            .charts-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }

            .search-box input {
                width: 100%;
                min-width: auto;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .table-actions {
                width: 100%;
                flex-direction: column;
            }

            .filter-select, .search-input, .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
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

    <!-- Custom Modal/Message Box (for alerts/confirmations) -->
    <div id="customModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; overflow:auto; background-color:rgba(0,0,0,0.4);">
        <div style="background-color:#fefefe; margin: 15% auto; padding:20px; border:1px solid #888; width: 80%; max-width: 400px; border-radius: 0.75rem; box-shadow: 0 4px 20px rgba(0,0,0,0.2);">
            <h3 id="modalTitle" style="margin-bottom: 1rem; color: #0a4d2e;"></h3>
            <p id="modalMessage" style="margin-bottom: 1.5rem; color: #374151;"></p>
            <div id="modalButtons" style="display: flex; justify-content: flex-end; gap: 0.5rem;">
                <!-- Buttons populated by JS -->
            </div>
        </div>
    </div>


    <script>
        // Data (Hardcoded for demonstration. In a real app, this would come from Firestore)
        const bookingsData = [
            { id: 1, name: 'রহিম আহমেদ', phone: '01711111111', email: 'rahim@example.com', plotSize: '২.৫ কাঠা', plotNumber: 'A-101', amount: 8000000, paid: 3500000, status: 'active', date: '2025-01-15' },
            { id: 2, name: 'করিম হোসেন', phone: '01722222222', email: 'karim@example.com', plotSize: '৫ কাঠা', plotNumber: 'B-205', amount: 15000000, paid: 15000000, status: 'completed', date: '2024-11-20' },
            { id: 3, name: 'সাফিয়া বেগম', phone: '01833333333', email: 'safia@example.com', plotSize: '৩.৭৫ কাঠা', plotNumber: 'C-310', amount: 12500000, paid: 500000, status: 'pending', date: '2025-03-01' },
            { id: 4, name: 'জসিম উদ্দিন', phone: '01944444444', email: 'jasim@example.com', plotSize: '২.৫ কাঠা', plotNumber: 'A-102', amount: 8000000, paid: 8000000, status: 'completed', date: '2024-12-10' },
            { id: 5, name: 'ফরিদা আক্তার', phone: '01655555555', email: 'farida@example.com', plotSize: '৫ কাঠা', plotNumber: 'B-206', amount: 16000000, paid: 6000000, status: 'active', date: '2025-02-28' },
        ];

        const plotData = [
            { id: 'A-101', size: '২.৫ কাঠা', price: 8000000, block: 'A', status: 'sold' },
            { id: 'A-102', size: '২.৫ কাঠা', price: 8000000, block: 'A', status: 'sold' },
            { id: 'A-103', size: '২.৫ কাঠা', price: 8200000, block: 'A', status: 'available' },
            { id: 'B-205', size: '৫ কাঠা', price: 15000000, block: 'B', status: 'sold' },
            { id: 'B-206', size: '৫ কাঠা', price: 16000000, block: 'B', status: 'sold' },
            { id: 'B-207', size: '৫ কাঠা', price: 15500000, block: 'B', status: 'available' },
            { id: 'C-310', size: '৩.৭৫ কাঠা', price: 12500000, block: 'C', status: 'reserved' },
            { id: 'C-311', size: '৩.৭৫ কাঠা', price: 12800000, block: 'C', status: 'available' },
        ];

        // Utility Functions
        const formatCurrency = (amount) => {
            return `৳${(amount / 100000).toFixed(2).replace(/\B(?=(\d{2})+(?!\d))/g, ',')}L`;
        }

        const formatFullCurrency = (amount) => {
            return `৳${amount.toLocaleString('en-IN')}`;
        }

        const getStatusBadge = (status) => {
            let className = '';
            let text = '';
            switch (status) {
                case 'active':
                    className = 'status-active';
                    text = 'সক্রিয়';
                    break;
                case 'pending':
                    className = 'status-pending';
                    text = 'বিচারাধীন';
                    break;
                case 'completed':
                    className = 'status-completed';
                    text = 'সম্পন্ন';
                    break;
                case 'available':
                    className = 'plot-status available';
                    text = 'উপলব্ধ';
                    break;
                case 'reserved':
                    className = 'plot-status reserved';
                    text = 'সংরক্ষিত';
                    break;
                case 'sold':
                    className = 'plot-status sold';
                    text = 'বিক্রিত';
                    break;
                default:
                    className = '';
                    text = status;
            }
            return `<span class="status-badge ${className}">${text}</span>`;
        }

        // Global Variables for Charts
        let salesChartInstance, revenueChartInstance, plotChartInstance;


        // 1. Sidebar and Tab Management
        const pageTitles = {
            'overview': 'ড্যাশবোর্ড ওভারভিউ',
            'bookings': 'বুকিং ব্যবস্থাপনা',
            'plots': 'প্লট তালিকা',
            'customers': 'গ্রাহক তালিকা',
            'reports': 'রিপোর্ট ও বিশ্লেষণ',
            'settings': 'সেটিংস'
        };

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }

        function showTab(tabId) {
            // Update active sidebar item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelector(`.nav-item[data-tab="${tabId}"]`).classList.add('active');

            // Hide all tab content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });

            // Show current tab content
            document.getElementById(tabId).classList.add('active');

            // Update header title
            document.getElementById('pageTitle').textContent = pageTitles[tabId] || 'ড্যাশবোর্ড';

            // Re-render charts/data for the visible tab
            if (tabId === 'overview') {
                renderOverview();
            } else if (tabId === 'bookings') {
                renderBookingsTable(bookingsData);
            } else if (tabId === 'plots') {
                renderPlotsGrid();
            }
        }


        // 2. Overview Tab Logic
        function updateStats() {
            document.getElementById('statTotalBookings').textContent = bookingsData.length;

            const activeBookings = bookingsData.filter(b => b.status === 'active' || b.status === 'pending');
            document.getElementById('statActiveBookings').textContent = activeBookings.length;

            const totalRevenue = bookingsData.reduce((sum, b) => sum + b.paid, 0);
            document.getElementById('statTotalRevenue').textContent = formatCurrency(totalRevenue);

            const availablePlots = plotData.filter(p => p.status === 'available');
            document.getElementById('statAvailablePlots').textContent = availablePlots.length;
        }

        function renderRecentBookings() {
            const container = document.getElementById('recentBookings');
            container.innerHTML = '';

            // Sort by date (most recent first) and take top 5
            const recent = [...bookingsData]
                .sort((a, b) => new Date(b.date) - new Date(a.date))
                .slice(0, 5);

            if (recent.length === 0) {
                container.innerHTML = '<p style="color: #6b7280;">কোনো সাম্প্রতিক বুকিং নেই।</p>';
                return;
            }

            recent.forEach(booking => {
                const item = document.createElement('div');
                item.className = 'recent-booking-item';
                item.innerHTML = `
                    <div class="recent-booking-info">
                        <span class="name">${booking.name}</span>
                        <span class="plot">${booking.plotNumber} (${booking.plotSize}) - ${getStatusText(booking.status)}</span>
                    </div>
                    <div class="recent-booking-amount">${formatFullCurrency(booking.paid)}</div>
                `;
                container.appendChild(item);
            });
        }

        const getStatusText = (status) => {
            switch (status) {
                case 'active': return 'সক্রিয়';
                case 'pending': return 'বিচারাধীন';
                case 'completed': return 'সম্পন্ন';
                default: return status;
            }
        }

        // Chart Rendering
        function renderSalesChart() {
            const ctx = document.getElementById('salesChart').getContext('2d');

            // Dummy data for monthly sales
            const data = {
                labels: ['জানু', 'ফেব্রু', 'মার্চ', 'এপ্রিল', 'মে', 'জুন'],
                datasets: [{
                    label: 'বিক্রিত প্লট',
                    data: [1, 2, 1, 3, 2, 4],
                    backgroundColor: '#10b981',
                    borderColor: '#059669',
                    borderWidth: 1,
                    borderRadius: 5,
                }]
            };

            if (salesChartInstance) salesChartInstance.destroy();
            salesChartInstance = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true, ticks: { precision: 0 } }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }

        function renderRevenueChart() {
            const ctx = document.getElementById('revenueChart').getContext('2d');

            // Dummy data for revenue trend (in Lakhs)
            const data = {
                labels: ['জানু', 'ফেব্রু', 'মার্চ', 'এপ্রিল', 'মে', 'জুন'],
                datasets: [{
                    label: 'মোট আয় (Lakhs)',
                    data: [35, 150, 50, 80, 60, 100],
                    fill: true,
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: '#3b82f6',
                    tension: 0.3,
                    pointBackgroundColor: '#3b82f6',
                }]
            };

            if (revenueChartInstance) revenueChartInstance.destroy();
            revenueChartInstance = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true, title: { display: true, text: 'আয় (Lakhs)' } }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }

        function renderPlotChart() {
            const ctx = document.getElementById('plotChart').getContext('2d');

            // Data for plot distribution by size
            const sizeCounts = plotData.reduce((acc, plot) => {
                acc[plot.size] = (acc[plot.size] || 0) + 1;
                return acc;
            }, {});

            const data = {
                labels: Object.keys(sizeCounts),
                datasets: [{
                    data: Object.values(sizeCounts),
                    backgroundColor: ['#10b981', '#f59e0b', '#3b82f6', '#8b5cf6'],
                    hoverOffset: 4
                }]
            };

            if (plotChartInstance) plotChartInstance.destroy();
            plotChartInstance = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right' }
                    }
                }
            });
        }

        function renderOverview() {
            updateStats();
            renderSalesChart();
            renderRevenueChart();
            renderPlotChart();
            renderRecentBookings();
        }

        // 3. Bookings Tab Logic
        function renderBookingsTable(data) {
            const tbody = document.getElementById('bookingsTableBody');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" style="text-align: center; color: #6b7280;">কোনো বুকিং পাওয়া যায়নি।</td></tr>';
                return;
            }

            data.forEach(booking => {
                const row = tbody.insertRow();
                row.innerHTML = `
                    <td>${booking.name}</td>
                    <td>${booking.phone}</td>
                    <td>${booking.plotNumber}</td>
                    <td>${booking.plotSize}</td>
                    <td>${formatFullCurrency(booking.amount)}</td>
                    <td>${formatFullCurrency(booking.paid)}</td>
                    <td>${getStatusBadge(booking.status)}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" onclick="showModal('বুকিং দেখুন', 'বুকিং আইডি: ${booking.id}<br>নাম: ${booking.name}<br>প্লট: ${booking.plotNumber} (${booking.plotSize})', [{text: 'বন্ধ', action: closeModal}])">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </button>
                            <button class="action-btn edit" onclick="showModal('বুকিং সম্পাদনা', 'বুকিং আইডি: ${booking.id} এর তথ্য সম্পাদনা করুন।', [{text: 'বাতিল', action: closeModal}, {text: 'সংরক্ষণ', action: () => alertUser('সংরক্ষণ সফল', 'বুকিং ${booking.id} আপডেট করা হয়েছে।')}])">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </button>
                            <button class="action-btn delete" onclick="showModal('বুকিং মুছুন', 'আপনি কি নিশ্চিত যে আপনি ${booking.name} এর বুকিং মুছতে চান?', [{text: 'বাতিল', action: closeModal}, {text: 'মুছুন', action: () => deleteBooking(${booking.id}), isDanger: true}])">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </button>
                        </div>
                    </td>
                `;
            });
        }

        function filterBookings() {
            const search = document.getElementById('bookingSearch').value.toLowerCase();
            const filterSize = document.getElementById('plotFilter').value;

            const filtered = bookingsData.filter(booking => {
                const searchMatch = (
                    booking.name.toLowerCase().includes(search) ||
                    booking.plotNumber.toLowerCase().includes(search) ||
                    booking.phone.includes(search)
                );

                const sizeMatch = (filterSize === 'all' || booking.plotSize === filterSize);

                return searchMatch && sizeMatch;
            });

            renderBookingsTable(filtered);
        }

        function deleteBooking(id) {
            closeModal();
            const index = bookingsData.findIndex(b => b.id === id);
            if (index !== -1) {
                bookingsData.splice(index, 1);
                renderBookingsTable(bookingsData);
                renderOverview();
                alertUser('সফল', 'বুকিং সফলভাবে মুছে ফেলা হয়েছে।');
            } else {
                 alertUser('ত্রুটি', 'বুকিং খুঁজে পাওয়া যায়নি।');
            }
        }

        function exportData() {
            // Simple CSV export function
            const headers = ['ID', 'নাম', 'যোগাযোগ', 'প্লট নং', 'সাইজ', 'মোট মূল্য', 'পরিশোধিত', 'অবস্থা', 'তারিখ'];
            const rows = bookingsData.map(b => [
                b.id, b.name, b.phone, b.plotNumber, b.plotSize, b.amount, b.paid, b.status, b.date
            ]);

            let csvContent = "data:text/csv;charset=utf-8," + headers.join(',') + "\n";
            rows.forEach(row => {
                csvContent += row.join(',') + "\n";
            });

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "joljochna_bookings.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            alertUser('রপ্তানি সফল', 'বুকিং ডেটা CSV হিসাবে ডাউনলোড করা হয়েছে।');
        }


        // 4. Plots Tab Logic
        function renderPlotsGrid() {
            const grid = document.getElementById('plotsGrid');
            grid.innerHTML = '';

            if (plotData.length === 0) {
                grid.innerHTML = '<p style="color: #6b7280; grid-column: 1 / -1; text-align: center;">কোনো প্লট পাওয়া যায়নি।</p>';
                return;
            }

            plotData.forEach(plot => {
                const card = document.createElement('div');
                card.className = `plot-card ${plot.status}`;
                card.innerHTML = `
                    <div class="plot-header">
                        <div>
                            <div class="plot-title">প্লট #${plot.id}</div>
                            <div class="plot-block">ব্লক: ${plot.block}</div>
                        </div>
                        ${getStatusBadge(plot.status)}
                    </div>
                    <div class="plot-size">সাইজ: ${plot.size}</div>
                    <div class="plot-price">${formatFullCurrency(plot.price)}</div>
                    <div class="plot-actions">
                        ${plot.status === 'available' ?
                            `<button class="btn btn-reserve" onclick="showModal('প্লট সংরক্ষিত করুন', 'আপনি কি নিশ্চিত যে আপনি প্লট ${plot.id} সংরক্ষিত করতে চান?', [{text: 'বাতিল', action: closeModal}, {text: 'সংরক্ষণ', action: () => setPlotStatus('${plot.id}', 'reserved')}])">সংরক্ষণ</button>
                             <button class="btn btn-primary" onclick="showModal('প্লট বিক্রি করুন', 'প্লট ${plot.id} বিক্রির জন্য একটি নতুন বুকিং তৈরি করুন।', [{text: 'বন্ধ', action: closeModal}])">বিক্রি</button>`
                            : plot.status === 'reserved' ?
                            `<button class="btn btn-primary" onclick="showModal('বুকিং দেখুন', 'প্লট ${plot.id} সংরক্ষিত রয়েছে। বিস্তারিত দেখতে বুকিং ট্যাবে যান।', [{text: 'বন্ধ', action: closeModal}])">বুকিং দেখুন</button>
                             <button class="action-btn delete" style="flex: unset;" onclick="showModal('সংরক্ষণ বাতিল', 'আপনি কি প্লট ${plot.id} এর সংরক্ষণ বাতিল করতে চান?', [{text: 'না', action: closeModal}, {text: 'হ্যাঁ, বাতিল করুন', action: () => setPlotStatus('${plot.id}', 'available'), isDanger: true}])">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                             </button>`
                            :
                            `<button class="btn btn-success" onclick="showModal('বিক্রিত প্লট', 'প্লট ${plot.id} বিক্রি হয়ে গেছে। বুকিং বিস্তারিত দেখতে বুকিং ট্যাবে যান।', [{text: 'বন্ধ', action: closeModal}])">বিস্তারিত</button>`
                        }
                    </div>
                `;
                grid.appendChild(card);
            });
        }

        function addNewPlot() {
             showModal('নতুন প্লট যোগ করুন', 'একটি নতুন প্লট যোগ করার ফর্ম এখানে থাকবে।', [{text: 'বাতিল', action: closeModal}, {text: 'যোগ করুন', action: () => alertUser('যোগ সফল', 'নতুন প্লট যুক্ত করার প্রক্রিয়া শুরু হয়েছে।')}]);
        }

        function setPlotStatus(id, newStatus) {
            closeModal();
            const plot = plotData.find(p => p.id === id);
            if (plot) {
                plot.status = newStatus;
                renderPlotsGrid();
                renderOverview();
                alertUser('অবস্থা আপডেট', `প্লট ${id} এর অবস্থা ${getStatusText(newStatus)} এ আপডেট করা হয়েছে।`);
            }
        }


        // 5. Utility and Initial Load
        function updateCurrentDate() {
            const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date().toLocaleDateString('bn-BD', dateOptions);
            document.getElementById('currentDate').textContent = today;
        }

        function logout() {
            // In a real application, this would clear session/token and redirect to login
            alertUser('লগআউট', 'আপনি সফলভাবে লগআউট করেছেন।', [{text: 'ঠিক আছে', action: closeModal}]);
        }

        // Custom Modal Implementation (replacing alert/confirm)
        const modal = document.getElementById('customModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');
        const modalButtons = document.getElementById('modalButtons');

        /**
         * Shows the custom modal
         * @param {string} title
         * @param {string} message
         * @param {Array<{text: string, action: function, isDanger: boolean}>} buttons
         */
        function showModal(title, message, buttons = []) {
            modalTitle.textContent = title;
            modalMessage.innerHTML = message;
            modalButtons.innerHTML = '';

            buttons.forEach(btn => {
                const buttonElement = document.createElement('button');
                buttonElement.textContent = btn.text;
                buttonElement.className = `btn ${btn.isDanger ? 'btn-danger' : 'btn-primary'}`;
                buttonElement.style.padding = '0.5rem 1rem';
                buttonElement.style.background = btn.isDanger ? '#dc2626' : (btn.text === 'বন্ধ' || btn.text === 'বাতিল' ? '#6b7280' : '#0a4d2e');
                buttonElement.style.color = 'white';
                buttonElement.style.marginLeft = '0.5rem';
                buttonElement.onclick = () => {
                    if (btn.action) btn.action();
                    // Do not close automatically if action is delete/save, let the action handle it (like deleteBooking does)
                    if (btn.text === 'বন্ধ' || btn.text === 'বাতিল' || btn.text === 'ঠিক আছে') {
                        closeModal();
                    }
                };
                modalButtons.appendChild(buttonElement);
            });

            modal.style.display = 'block';
        }

        function closeModal() {
            modal.style.display = 'none';
        }

        function alertUser(title, message) {
            showModal(title, message, [{text: 'ঠিক আছে', action: closeModal}]);
        }


        // Initial setup on window load
        window.onload = function() {
            updateCurrentDate();
            // Start with the 'overview' tab
            showTab('overview');
        };
    </script>
</body>
</html>
