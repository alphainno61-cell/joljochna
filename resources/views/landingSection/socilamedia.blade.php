<section class="carousel-section">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            @foreach ($socialMediaLinks as $group => $items)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="d-flex justify-content-center flex-wrap gap-3">
                        @foreach ($items as $item)
                            @if ($item->url)
                                <a href="{{ $item->url }}" target="_blank" class="text-decoration-none">
                            @endif

                            <div class="card" style="width: 20rem;">

                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                </div>
                                <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->title }}"
                                    style="height: 250px; object-fit: cover;">
                            </div>

                            @if ($item->url)
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Custom Carousel Buttons -->
    <button class="carousel-btn prev-btn" onclick="prevSlide()">❮</button>
    <button class="carousel-btn next-btn" onclick="nextSlide()">❯</button>
</section>
