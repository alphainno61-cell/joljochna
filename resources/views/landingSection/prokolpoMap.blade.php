<style>
    body {
        background: linear-gradient(to right, #004d25, #006b33);
        font-family: 'Noto Sans Bengali', sans-serif;
        color: white;
        overflow-x: hidden;
    }

    .main-section {
        padding: 40px 15px;
    }

    /* ---------- CARD (LEFT OFFER) ---------- */
    .offer-card {
        background-color: #004e25;
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        padding: 25px 20px;
        height: 100%;
    }

    .offer-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #ffd700;
        margin-bottom: 20px;
        text-align: center;
    }

    .plot-box {
        background-color: #125c38;
        color: #fff;
        border: 2px solid #f9b233;
        border-radius: 12px;
        padding: 10px;
        transition: transform 0.3s ease;
    }

    .plot-box:hover {
        transform: translateY(-5px);
    }

    .plot-size {
        font-size: 1.2rem;
        font-weight: 700;
        color: #ffcc33;
    }

    .category-label {
        background-color: #f9b233;
        color: #004d25;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.8rem;
        display: inline-block;
        margin-top: 5px;
    }

    .footer-note {
        margin-top: 20px;
        font-size: 0.9rem;
        line-height: 1.6;
        text-align: center;
    }

    .cta-bar {
        background-color: #ff8800;
        color: white;
        font-weight: 700;
        padding: 10px;
        margin-top: 20px;
        border-radius: 5px;
        font-size: 1rem;
        text-align: center;
    }

    /* ---------- RIGHT (MAP) ---------- */
    .map-section {
        text-align: center;
        background: rgba(0, 0, 0, 0.15);
        border-radius: 15px;
        padding: 20px;
        height: 100%;
        overflow: hidden;
        /* ✅ keeps image inside rounded area */
    }

    .map-section img {
        width: 100%;
        height: 500px;
        /* ✅ fixed height */
        object-fit: cover;
        /* ✅ fills area without stretching */
        border-radius: 10px;
        /* ✅ rounded corners */
        border: 2px solid #ffc107;
        /* optional border */
        display: block;
    }



    .map-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #ffd700;
        margin-bottom: 10px;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 992px) {
        .map-section {
            margin-top: 25px;
        }
    }
</style>

<div class="container main-section py-4 mb-4">
    <div class="row align-items-stretch">
        <!-- LEFT SIDE - OFFER DETAILS -->
        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
            <div class="offer-card h-100">
                <h2 class="offer-title">বেছে নিন আপনার পছন্দের প্লট</h2>

                <div class="row g-3 justify-content-center">
                    @foreach ($plots as $plot)
                        <div class="col-6">
                            <div class="plot-box bg-success">
                                <div class="plot-size">{{ $plot->size }}</div>
                                <div class="category-label {{ $plot->category_color }} text-white">
                                    {{ $plot->category }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3 text-center">
                    @foreach ($amenities as $amenity)
                        <span class="category-label bg-success text-white">
                            {!! $amenity['icon'] !!} {{ $amenity['name'] }}
                        </span>
                    @endforeach
                </div>

                <div class="footer-note">
                    <p>
                        সবুজ প্রকৃতি, নীরব কলকল ধারা আর নির্মল আবহাওয়া — এই জায়গাটি হতে পারে আপনার স্বপ্নের ঠিকানা!
                        এখানে আছে আধুনিক রাস্তাঘাট, বিদ্যুৎ, পানি, গ্যাস, ও নিরাপত্তার নিশ্চয়তা।
                    </p>
                    <p>মূল্য বৃদ্ধির আগে, আজই বুকিং করুন।</p>
                </div>

                <div class="cta-bar">
                    📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার
                </div>
            </div>
        </div>



        <!-- RIGHT SIDE - MAP -->
        <div class="col-lg-6 col-md-12">
            <div class="map-section h-100">
                <h3 class="map-title">প্রকল্পের রোডম্যাপ</h3>

                @if ($footerSetting && $footerSetting->project_roadmap_image_url)
                    <img src="{{ $footerSetting->project_roadmap_image_url }}" class="img-fluid object-fit-fill"
                        alt="Project Map">
                @else
                    <img src="assets/images/realstate3.PNG" class="img-fluid object-fit-fill" alt="Project Map">
                @endif

            </div>
        </div>
    </div>
</div>

<style>
    .offer-card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .offer-title {
        color: #2c5f2d;
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .plot-box {
        border: 2px solid #2c5f2d;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        background: #f8fff8;
        transition: transform 0.3s ease;
    }

    .plot-box:hover {
        transform: translateY(-5px);
    }

    .plot-size {
        font-size: 18px;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 8px;
    }

    .category-label {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        margin: 2px;
    }

    .footer-note {
        margin-top: 20px;
        padding: 15px;
        background: #f8f9fa;
        color: black;
        border-radius: 8px;
        font-size: 18px;
    }

    .cta-bar {
        background: #2c5f2d;
        color: white;
        padding: 12px;
        text-align: center;
        border-radius: 8px;
        margin-top: 15px;
        font-weight: bold;
    }
</style>
