   <section id="home" class="hero">
       <div class="hero-content">
           <h1>{{ $heroData->main_title }}</h1>
           <h2>{{ $heroData->subtitle }}</h2>
           <p class="hero-subtitle">{{ $heroData->description }}</p>
           <div class="cta-buttons">
               <a href="{{ $heroData->primary_button_url }}"
                   class="btn btn-primary">{{ $heroData->primary_button_text }}</a>
               <a href="{{ $heroData->secondary_button_url }}"
                   class="btn btn-secondary">{{ $heroData->secondary_button_text }}</a>
           </div>
       </div>
       <div class="scroll-indicator">
           <span></span>
       </div>
   </section>
