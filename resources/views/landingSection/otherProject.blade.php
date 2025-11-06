<section id="other-projects" class="other-projects">
    <h2 class="section-title">অন্যান্য প্রকল্প</h2>
    <p class="section-subtitle">NEX Real Estate-এর সফল প্রকল্পগুলো দেখুন</p>

    @if ($projects->count() > 0)
        <div class="carousel-wrapper">
            <button id="prevBtn" class="carousel-btn prev-btn">❮</button>
            <div class="carousel-container">
                <div id="projectTrack" class="carousel-track">
                    @foreach ($projects as $project)
                        <div class="project-card">
                            <div class="project-image">
                                @if ($project->image)
                                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                @else
                                    <div style="font-size: 5rem;">{{ $project->icon ?? '🏢' }}</div>
                                @endif
                            </div>
                            <div class="project-content">
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->description }}</p>
                                <a href="{{ $project->button_link }}" class="btn btn-success"
                                    style="padding: 0.8rem 2rem; font-size: 1rem;">
                                    {{ $project->button_text }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button id="nextBtn" class="carousel-btn next-btn">❯</button>
        </div>
    @else
        <div class="text-center py-5">
            <p class="text-muted">কোন প্রকল্প পাওয়া যায়নি।</p>
        </div>
    @endif
</section>


<style>
    .other-projects {
        padding: 4rem 0;
        background: #f8f9fa;
    }

    .carousel-wrapper {
        position: relative;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 50px;
    }

    .carousel-container {
        overflow: hidden;
        border-radius: 12px;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.3s ease;
        gap: 1.5rem;
        padding: 1rem 0;
    }

    .project-card {
        flex: 0 0 350px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .project-image {
        height: 200px;
        background: linear-gradient(135deg, #1a7a4a, #2ecc71);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
    }

    .project-content {
        padding: 1.5rem;
        text-align: center;
    }

    .project-content h3 {
        color: #2c3e50;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .project-content p {
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.7);
        color: white;
        border: none;
        padding: 12px 16px;
        cursor: pointer;
        border-radius: 50%;
        font-size: 18px;
        z-index: 10;
        transition: background 0.3s ease;
    }

    .carousel-btn:hover {
        background: rgba(0, 0, 0, 0.9);
    }

    .prev-btn {
        left: 0;
    }

    .next-btn {
        right: 0;
    }

    .section-title {
        text-align: center;
        color: #2c3e50;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .section-subtitle {
        text-align: center;
        color: #6c757d;
        font-size: 1.1rem;
        margin-bottom: 3rem;
    }
</style>
