 <aside class="sidebar" id="sidebar">
     <div class="sidebar-header">
         <h1>জলজোছনা</h1>
         <button class="toggle-btn">
             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                 <line x1="3" y1="12" x2="21" y2="12"></line>
                 <line x1="3" y1="6" x2="21" y2="6"></line>
                 <line x1="3" y1="18" x2="21" y2="18"></line>
             </svg>
         </button>
     </div>

     <nav class="nav-menu">

         @can('View Dashboard')
             <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                 data-tab="overview">
                 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                 </svg>
                 <span>ওভারভিউ</span>
             </a>
         @endcan



         @can('View Permission')
             <a href="{{ route('permissions') }}" class="nav-item {{ request()->routeIs('permissions') ? 'active' : '' }}"
                 data-tab="overview">
                 <i class="fa-solid fa-pen-to-square"></i>
                 <span>পারমিশন</span>
             </a>
         @endcan


         @can('View Role')
             <a href="{{ route('roles') }}" class="nav-item {{ request()->routeIs('roles') ? 'active' : '' }}"
                 data-tab="overview">
                 <i class="fa-solid fa-pen-to-square"></i>
                 <span>রোলস</span>
             </a>
         @endcan



         @can('View AssignRole')
             <a href="{{ route('users') }}" class="nav-item {{ request()->routeIs('users') ? 'active' : '' }}"
                 data-tab="overview">
                 <i class="fa-solid fa-pen-to-square"></i>
                 <span>এসাইন ইউজার</span>
             </a>
         @endcan


         @can('View Booking')
             <a href="{{ route('booking') }}" class="nav-item {{ request()->routeIs('booking') ? 'active' : '' }}"
                 data-tab="bookings">
                 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                     <polyline points="14 2 14 8 20 8"></polyline>
                 </svg>
                 <span>বুকিং</span>
             </a>
         @endcan


         @can('View Plot')
             <a href="{{ route('plot') }}" class="nav-item {{ request()->routeIs('plot') ? 'active' : '' }}"
                 data-tab="plots">
                 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                     <circle cx="12" cy="10" r="3"></circle>
                 </svg>
                 <span>প্লট</span>
             </a>
         @endcan



         @can('View Customer')
             <a href="{{ route(name: 'customer') }}" class="nav-item {{ request()->routeIs('customer') ? 'active' : '' }}"
                 data-tab="customers">
                 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                     <circle cx="9" cy="7" r="4"></circle>
                     <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                     <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                 </svg>
                 <span>গ্রাহক</span>
             </a>
         @endcan


         @can('View Report')
             <a href="{{ route('report') }}" class="nav-item {{ request()->routeIs('report') ? 'active' : '' }}"
                 data-tab="reports">
                 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                     <polyline points="17 6 23 6 23 12"></polyline>
                 </svg>
                 <span>রিপোর্ট</span>
             </a>
         @endcan


         @can('View Setting')
             <a href="{{ route('setting') }}" class="nav-item {{ request()->routeIs('setting') ? 'active' : '' }}"
                 data-tab="settings">
                 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <circle cx="12" cy="12" r="3"></circle>
                     <path d="M12 1v6m0 6v6m0-6h6m-6 0H6m3.2-3.2l4.2 4.2m-4.2 0l4.2-4.2M18.8 14.8l-4.2-4.2m4.2 0l-4.2 4.2">
                     </path>
                 </svg>
                 <span>সেটিংস</span>
             </a>
         @endcan


     </nav>

     <div class="logout-section">
         <form method="POST" action="{{ route('logout') }}" class="d-inline">
             @csrf

             <button type="submit" class="btn btn-outline-danger btn-sm"> <i
                     class="fa-solid fa-right-from-bracket"></i> Logout</button>
         </form>
     </div>
 </aside>
