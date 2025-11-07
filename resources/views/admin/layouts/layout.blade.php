<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ড্যাশবোর্ড')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <style>
        /* Updated Sidebar Styles - Replace in your layout file */

        :root {
            --sidebar-width: 240px;
            --header-height: 90px;
            --primary-green: #1a5f4a;
            --dark-green: #0d3d2f;
        }

        * {
            font-family: 'Noto Sans Bengali', sans-serif;
        }

        body {
            overflow-x: hidden;
            background: #f5f5f5;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Fixed Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--primary-green);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            transition: transform 0.3s ease;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            /* Smooth scrollbar */
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .sidebar-brand {
            padding: 1.5rem 1rem;
            /* background: var(--dark-green); */
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .sidebar-brand h3 {
            margin: 0;
            font-size: 1.25rem;
            white-space: nowrap;
        }

        /* Sidebar Navigation */
        .sidebar-nav {
            padding: 1rem 0;
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            padding-bottom: 80px;
            /* Space for logout button */
        }

        .sidebar-nav .nav-item {
            margin: 0;
        }

        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-left: 3px solid transparent;
            transition: all 0.2s;
            font-size: 0.95rem;
            white-space: nowrap;
            text-decoration: none;
        }

        .sidebar-nav .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-nav .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            border-left-color: white;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            flex-shrink: 0;
        }

        .sidebar-nav .nav-link span {
            flex: 1;
            min-width: 0;
        }

        .sidebar-nav .nav-link .ms-auto {
            margin-left: auto;
            font-size: 0.875rem;
            transition: transform 0.2s;
            flex-shrink: 0;
        }

        .sidebar-nav .nav-link[aria-expanded="true"] .ms-auto {
            transform: rotate(180deg);
        }

        /* Collapsed submenu styles */
        .sidebar-nav .collapse {
            overflow: hidden;
        }

        .sidebar-nav .collapse .nav-link {
            padding: 0.75rem 1.5rem 0.75rem 2.5rem;
            font-size: 0.9rem;
        }

        .sidebar-nav .collapse .nav-link i {
            font-size: 0.95rem;
        }

        /* Logout button - fixed at bottom */
        .sidebar-logout {
            position: fixed;
            bottom: 0;
            left: 0;
            width: var(--sidebar-width);
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            /* background: var(--dark-green); */
            z-index: 10;
            transition: transform 0.3s ease;
        }

        .sidebar-logout button {
            color: #ffffff;
            background: none;
            border: none;
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            cursor: pointer;
            width: 100%;
            transition: opacity 0.2s;
        }

        .sidebar-logout button:hover {
            opacity: 0.8;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
            width: calc(100% - var(--sidebar-width));
            min-width: 0;
        }

        .header {
            min-height: var(--header-height);
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .header-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-box input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .search-box i {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-green);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.125rem;
        }

        .content-area {
            padding: 2rem;
            min-height: calc(100vh - var(--header-height));
        }

        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-content h6 {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
            font-weight: 400;
        }

        .stat-content h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
        }

        .stat-icon.blue {
            background: #3b82f6;
            color: white;
        }

        .stat-icon.green {
            background: #10b981;
            color: white;
        }

        .stat-icon.orange {
            background: #f59e0b;
            color: white;
        }

        .stat-icon.purple {
            background: #8b5cf6;
            color: white;
        }

        .section-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .section-card h5 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #1f2937;
        }

        /* Tablet Styles */
        @media (max-width: 992px) {
            .search-box {
                width: 250px;
            }

            .header-title {
                font-size: 1.5rem;
            }
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            /* Adjust logout button for mobile */
            .sidebar-logout {
                left: 0;
                transform: translateX(-100%);
            }

            .sidebar.show .sidebar-logout {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .header {
                padding: 1rem;
            }

            .header-title {
                font-size: 1.25rem;
            }

            .search-box {
                width: 150px;
            }

            .search-box input {
                font-size: 0.813rem;
                padding: 0.4rem 0.8rem 0.4rem 2rem;
            }

            .content-area {
                padding: 1rem;
            }

            /* Overlay for mobile menu */
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .overlay.show {
                display: block;
            }

            /* Stat cards responsive */
            .stat-card {
                padding: 1rem;
            }

            .stat-content h2 {
                font-size: 1.5rem;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
        }

        /* Small Mobile Styles */
        @media (max-width: 576px) {
            .sidebar {
                width: 280px;
            }

            .sidebar-logout {
                width: 280px;
            }

            .header-title {
                font-size: 1.1rem;
            }

            .search-box {
                display: none;
            }

            .user-avatar {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
        }

        /* Prevent body scroll when sidebar is open on mobile */
        @media (max-width: 768px) {
            body.sidebar-open {
                overflow: hidden;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="main-content">
            @include('admin.layouts.header')

            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtns = document.querySelectorAll('#sidebarToggle');
        const body = document.body;

        // Handle both toggle buttons (header and sidebar)
        toggleBtns.forEach(btn => {
            btn?.addEventListener('click', (e) => {
                e.preventDefault();
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
                body.classList.toggle('sidebar-open');
            });
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
            body.classList.remove('sidebar-open');
        });

        // Close sidebar on window resize to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                body.classList.remove('sidebar-open');
            }
        });
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const installmentsContainer = document.getElementById('installments-container');
            const addInstallmentBtn = document.getElementById('add-installment');

            // Add installment row
            addInstallmentBtn.addEventListener('click', function() {
                const index = installmentsContainer.children.length;

                const row = document.createElement('div');
                row.className = 'installment-row row mb-2';
                row.innerHTML = `
            <div class="col-md-6">
                <input type="text" class="form-control" name="installments[${index}][installment]" 
                       placeholder="কিস্তির বিবরণ (যেমন: ০৩ কিস্তি)" required>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="installments[${index}][amount]" 
                       placeholder="টাকার পরিমাণ (যেমন: ৪০,০০০০০ টাকা)" required>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm remove-installment">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

                installmentsContainer.appendChild(row);
            });

            // Remove installment row using event delegation
            installmentsContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-installment')) {
                    const row = e.target.closest('.installment-row');
                    row.remove();

                    // Re-index the remaining installments
                    reindexInstallments();
                }
            });

            // Function to re-index installments after removal
            function reindexInstallments() {
                const rows = installmentsContainer.querySelectorAll('.installment-row');
                rows.forEach((row, index) => {
                    const installmentInput = row.querySelector('input[name*="[installment]"]');
                    const amountInput = row.querySelector('input[name*="[amount]"]');

                    if (installmentInput) {
                        installmentInput.name = `installments[${index}][installment]`;
                    }
                    if (amountInput) {
                        amountInput.name = `installments[${index}][amount]`;
                    }
                });
            }
        });
    </script>
</body>

</html>
