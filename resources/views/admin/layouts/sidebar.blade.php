<div class="sidebar">
    <div class="sidebar-brand bg-success">
        <h3>ডাশবোর্ড</h3>
        <button class="btn btn-link text-white p-0 d-md-none" id="sidebarToggle">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i>
                    <span>ল্যান্ডিং পেজ</span>
                </a>
            </li>

            @can('View Dashboard')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>ওভারভিউ</span>
                    </a>
                </li>
            @endcan

            @canany(['View Permission', 'View Role', 'View AssignRole'])
                <li class="nav-item">
                    <a href="#accessControl"
                        class="nav-link {{ request()->routeIs(['permissions', 'roles', 'users', 'permissions.create', 'permissions.edit', 'roles.create', 'roles.edit', 'users.create', 'users.edit']) ? 'active' : '' }}"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->routeIs(['permissions', 'roles', 'users', 'permissions.create', 'permissions.edit', 'roles.create', 'roles.edit', 'users.create', 'users.edit']) ? 'true' : 'false' }}"
                        aria-controls="accessControl">
                        <i class="bi bi-shield-lock"></i>
                        <span>এক্সেস কন্ট্রোল</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs(['permissions', 'roles', 'users', 'permissions.create', 'permissions.edit', 'roles.create', 'roles.edit', 'users.create', 'users.edit']) ? 'show' : '' }}"
                        id="accessControl">
                        <ul class="nav flex-column ms-3">
                            @can('View Permission')
                                <li class="nav-item">
                                    <a href="{{ route('permissions') }}"
                                        class="nav-link {{ request()->routeIs(['permissions', 'permissions.create', 'permissions.edit']) ? 'active' : '' }}">
                                        <i class="bi bi-key"></i>
                                        <span>পারমিশন</span>
                                    </a>
                                </li>
                            @endcan

                            @can('View Role')
                                <li class="nav-item">
                                    <a href="{{ route('roles') }}"
                                        class="nav-link {{ request()->routeIs(['roles', 'roles.create', 'roles.edit']) ? 'active' : '' }}">
                                        <i class="bi bi-person-badge"></i>
                                        <span>রোলস</span>
                                    </a>
                                </li>
                            @endcan

                            @can('View AssignRole')
                                <li class="nav-item">
                                    <a href="{{ route('users') }}"
                                        class="nav-link {{ request()->routeIs(['users', 'users.create', 'users.edit']) ? 'active' : '' }}">
                                        <i class="bi bi-people"></i>
                                        <span>এডমিন ইউজার</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcanany

            {{-- <li class="nav-item">
                <a href="#landingPage"
                    class="nav-link {{ request()->routeIs(['heroSection', 'opportunity.index', 'admin.pricing.index', 'admin.testimonials.index', 'admin.socialmedias.index', 'admin.projects.index', 'admin.contact-info.edit', 'opportunity.create', 'opportunity.edit']) ? 'active' : '' }}"
                    data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ request()->routeIs(['heroSection', 'opportunity.index', 'admin.pricing.index', 'admin.testimonials.index', 'admin.socialmedias.index', 'admin.projects.index', 'admin.contact-info.edit', 'opportunity.create', 'opportunity.edit']) ? 'true' : 'false' }}"
                    aria-controls="landingPage">
                    <i class="bi bi-shield-lock"></i>
                    <span>ল্যান্ডিং পেইজ</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse {{ request()->routeIs(['heroSection', 'opportunity.index', 'admin.pricing.index', 'admin.testimonials.index', 'admin.socialmedias.index', 'admin.projects.index', 'admin.contact-info.edit', 'opportunity.edit', 'opportunity.create']) ? 'show' : '' }}"
                    id="landingPage">
                    <ul class="nav flex-column ms-3">

                        <li class="nav-item">
                            <a href="{{ route('heroSection') }}"
                                class="nav-link {{ request()->routeIs('heroSection') ? 'active' : '' }}">
                                <i class="bi bi-key"></i>
                                <span>হিরো সেকশন</span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('opportunity.index') }}"
                                class="nav-link {{ request()->routeIs(['opportunity.index', 'opportunity.create', 'opportunity.edit']) ? 'active' : '' }}">
                                <i class="bi bi-key"></i>
                                <span>সুবিধাসমূহ</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pricing.index') }}"
                                class="nav-link {{ request()->routeIs('admin.pricing.index') ? 'active' : '' }}">
                                <i class="bi bi-key"></i>
                                <span>প্রাইসিং</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.index') }}"
                                class="nav-link {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}">
                                <i class="bi bi-key"></i>
                                <span>মন্তব্য সমূহ</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.socialmedias.index') }}"
                                class="nav-link {{ request()->routeIs('admin.socialmedias.index') ? 'active' : '' }}">
                                <i class="bi bi-key"></i>
                                <span>সোস্যাল মিডিয়া</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.projects.index') }}"
                                class="nav-link {{ request()->routeIs('admin.projects.index') ? 'active' : '' }}">
                                <i class="bi bi-key"></i>
                                <span>প্রজেক্টস</span>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a href="{{ route('admin.contact-info.edit') }}"
                                class="nav-link {{ request()->routeIs('admin.contact-info.edit') ? 'active' : '' }}">
                                <i class="bi bi-key"></i>
                                <span>যোগাযোগের তথ্য</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li> --}}

            @can('Hero Section')
                <li class="nav-item">
                    <a href="{{ route('heroSection') }}"
                        class="nav-link {{ request()->routeIs('heroSection') ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>হিরো সেকশন</span>
                    </a>
                </li>
            @endcan


            @can('View Opportunity Section')
                <li class="nav-item ">
                    <a href="{{ route('opportunity.index') }}"
                        class="nav-link {{ request()->routeIs(['opportunity.index', 'opportunity.create', 'opportunity.edit']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>সুবিধাসমূহ</span>
                    </a>
                </li>
            @endcan

            @can('View Pricing Section')
                <li class="nav-item">
                    <a href="{{ route('admin.pricing.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.pricing.index', 'admin.pricing.create', 'admin.pricing.edit']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>প্রাইসিং</span>
                    </a>
                </li>
            @endcan


            @can('View Testimonial Section')
                <li class="nav-item">
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.testimonials.index', 'admin.testimonials.create', 'admin.testimonials.edit']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>মন্তব্য সমূহ</span>
                    </a>
                </li>
            @endcan

            @can('View SocialMedia Section')
                <li class="nav-item">
                    <a href="{{ route('admin.socialmedias.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.socialmedias.index', 'admin.socialmedias.create', 'admin.socialmedias.edit']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>সোস্যাল মিডিয়া</span>
                    </a>
                </li>
            @endcan


            @can('View Project Section')
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.projects.index', 'admin.projects.create', 'admin.projects.edit']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>প্রজেক্টস</span>
                    </a>
                </li>
            @endcan



            @can('Contact Section')
                <li class="nav-item">
                    <a href="{{ route('admin.contact-info.edit') }}"
                        class="nav-link {{ request()->routeIs(['admin.contact-info.edit']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>যোগাযোগের তথ্য</span>
                    </a>
                </li>
            @endcan


            @can('View Booking')
                <li class="nav-item">
                    <a href="{{ route('admin.bookings.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.bookings.index', 'admin.bookings.show']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>বুকিং</span>
                    </a>
                </li>
            @endcan

            @can('View Plot')
                <li class="nav-item">
                    <a href="{{ route('admin.plots.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.plots.index', 'admin.plots.create', 'admin.plots.edit']) ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>প্লটস</span>
                    </a>
                </li>
            @endcan


            @can('View Setting')
                <li class="nav-item">
                    <a href="{{ route('admin.footer-settings.index') }}"
                        class="nav-link {{ request()->routeIs('admin.footer-settings.index') ? 'active' : '' }}">
                        <i class="bi bi-key"></i>
                        <span>সেটিংস</span>
                    </a>
                </li>
            @endcan



            @canany([
                'View About Hero',
                'View About History',
                'View About Mission & Vision',
                'View About Founder',
                'View
                About Chairman',
                ])
                <li class="nav-item">
                    <a href="#about" class="nav-link {{ request()->routeIs(['View About Hero']) ? 'active' : '' }}"
                        data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->routeIs(['amader-somporke.hero', 'amader-somporke.history', 'amader-somporke.missionAndVission', 'amader-somporke.founder', 'amader-somporke.chairman']) ? 'true' : 'false' }}"
                        aria-controls="about">
                        <i class="bi bi-shield-lock"></i>
                        <span>আমাদের সম্পর্কে</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs(['amader-somporke.hero', 'amader-somporke.history', 'amader-somporke.missionAndVission', 'amader-somporke.founder', 'amader-somporke.chairman']) ? 'show' : '' }}"
                        id="about">
                        <ul class="nav flex-column ms-3">


                            @can('View About Hero')
                                <li class="nav-item">
                                    <a href="{{ route('amader-somporke.hero') }}"
                                        class="nav-link {{ request()->routeIs('amader-somporke.hero') ? 'active' : '' }}">
                                        <i class="bi bi-key"></i>
                                        <span>হিরো সেকশন</span>
                                    </a>
                                </li>
                            @endcan

                            @can('View About History')
                                <li class="nav-item">
                                    <a href="{{ route('amader-somporke.history') }}"
                                        class="nav-link {{ request()->routeIs('amader-somporke.history') ? 'active' : '' }}">
                                        <i class="bi bi-key"></i>
                                        <span>আমাদের ইতিহাস</span>
                                    </a>
                                </li>
                            @endcan

                            @can('View About Mission & Vision')
                                <li class="nav-item">
                                    <a href="{{ route('amader-somporke.missionAndVission') }}"
                                        class="nav-link {{ request()->routeIs('amader-somporke.missionAndVission') ? 'active' : '' }}">
                                        <i class="bi bi-key"></i>
                                        <span>মিশন এবং ভিশন </span>
                                    </a>
                                </li>
                            @endcan

                            @can('View About Founder')
                                <li class="nav-item">
                                    <a href="{{ route('amader-somporke.founder') }}"
                                        class="nav-link {{ request()->routeIs('amader-somporke.founder') ? 'active' : '' }}">
                                        <i class="bi bi-key"></i>
                                        <span>আমাদের প্রতিষ্ঠাতা </span>
                                    </a>
                                </li>
                            @endcan

                            @can('View About Chairman')
                                <li class="nav-item">
                                    <a href="{{ route('amader-somporke.chairman') }}"
                                        class="nav-link {{ request()->routeIs('amader-somporke.chairman') ? 'active' : '' }}">
                                        <i class="bi bi-key"></i>
                                        <span>আমাদের চেয়ারম্যান </span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </li>
            @endcanany
        </ul>

    </nav>

    <div class="sidebar-logout bg-success">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>
