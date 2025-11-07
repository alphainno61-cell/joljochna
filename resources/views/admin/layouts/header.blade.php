<header class="header">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-link text-dark d-md-none p-0" id="sidebarToggle">
                <i class="bi bi-list fs-3"></i>
            </button>
            <h1 class="header-title">@yield('page-title', 'ড্যাশবোর্ড ওভারভিউ')</h1>
        </div>

        <div class="header-actions">
            {{-- <div class="search-box d-none d-sm-block">
                <i class="bi bi-search"></i>
                <input type="text" class="form-control" placeholder="খুঁজুন...">
            </div> --}}

            <div class="dropdown">
                <button class="btn p-0 border-0 bg-transparent" data-bs-toggle="dropdown">
                    <div class="user-avatar">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item mb-2 mt-2" href="{{ route('profile.index') }}"><i
                                class="bi bi-person me-2"></i>প্রোফাইল</a></li>
                    <li><a class="dropdown-item mb-2" href="{{ route('admin.footer-settings.index') }}"><i
                                class="bi bi-gear me-2"></i>সেটিংস</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"><i
                                    class="bi bi-box-arrow-right me-2"></i>লগআউট</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
