 <nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
     <div class="container-fluid">
         <!-- Logo -->
         <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
             <i class="fas fa-home me-2 text-warning"></i>
             <span class="brand-text">জলজোছনা</span>
         </a>

         <!-- Mobile Toggle Button -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <!-- Navigation Items -->
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('home') ? 'text-success' : '' }}"
                         href="{{ route('home') }}">হোম</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('about') ? 'text-success' : '' }}"
                         href="{{ route('about') }}">আমাদের সম্পর্কে</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/#features">সুবিধা</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/#pricing">মূল্য
                         তালিকা</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/#testimonials">মন্তব্য</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('projects') ? 'text-success' : '' }}"
                         href="{{ route('projects') }}">অন্যান্য প্রকল্প</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/#contact">যোগাযোগ</a>
                 </li>
             </ul>

             <!-- CTA Button -->
             <div class="nav-actions d-flex">
                 <div class="me-2">
                     <a href="#contact" class="btn btn-warning btn-cta">
                         <i class="fas fa-calendar-check me-2"></i>
                         এখনই বুক করুন
                     </a>
                 </div>
                 @auth()
                     <div class="nav-actions">
                         <a href="{{ route('dashboard') }}" class="btn btn-warning btn-cta">
                             ড্যাশবোর্ড
                         </a>
                     </div>
                 @endauth
             </div>

         </div>
     </div>
 </nav>
