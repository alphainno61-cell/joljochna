<section id="testimonials" class="testimonials">
    <h2 class="section-title" style="color: #1a7a4a;">বিনিয়োগকারী মন্তব্য</h2>
    <p class="section-subtitle">আমাদের গ্রাহকরা আমাদের প্রকল্প সম্পর্কে কী বলেন</p>

    <div class="carousel-wrapper">
        <button id="prevTestimonialBtn" class="carousel-btn prev-btn">❮</button>
        <div class="carousel-container">
            <div id="testimonialTrack" class="carousel-track">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <!-- Investor Info (LEFT Column) -->
                        <div class="investor-meta">
                            <div class="investor-avatar">{{ $testimonial->avatar_initials }}</div>
                            <div>
                                <div class="investor-name">{{ $testimonial->investor_name }}</div>
                                <div class="investor-title">{{ $testimonial->investor_title }}</div>
                            </div>
                        </div>
                        <!-- Quote Content (RIGHT Column) -->
                        <div class="quote-content-wrapper">
                            <span class="quote-icon">❝</span>
                            <p class="quote-text">{{ $testimonial->quote_text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button id="nextTestimonialBtn" class="carousel-btn next-btn">❯</button>
    </div>
</section>
