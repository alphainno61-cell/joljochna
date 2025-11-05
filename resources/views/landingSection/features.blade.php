 <section id="features" class="features">
     <h2 class="section-title">আমাদের সুবিধাসমূহ</h2>
     <p class="section-subtitle">NEX Real Estate এর একটি প্রকল্প</p>

     <div class="features-grid">

         @foreach ($opportunities as $opportunity)
             <div class="feature-card">
                 <div class="feature-icon">{{ $opportunity->icon }}</div>
                 <h3>{{ $opportunity->title }}</h3>
                 <p>{{ $opportunity->description }}</p>
             </div>
         @endforeach


     </div>
 </section>
