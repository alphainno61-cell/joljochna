@php
    $footerSetting = \App\Models\FooterSetting::where('is_active', true)->first();

    // Default values if no data in database
    $defaultSettings = [
        'project_name' => 'জলজোছনা',
        'project_description' =>
            'NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।',
        'phone_numbers' => '+880 1991 995 995,+880 1991 994 994',
        'email' => 'hello.nexup@gmail.com',
        'project_address' => 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ',
        'contact_address' =>
            'NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka',
        'facebook_url' => '#',
        'instagram_url' => '#',
        'twitter_url' => '#',
        'linkedin_url' => '#',
        'youtube_url' => '#',
        'show_payment_methods' => true,
        'google_map_url' => 'https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা',
        'logo_image_url' => null,
        'qr_code_image_url' => null,
    ];

    // Use database settings or defaults
    $settings = $footerSetting
        ? [
            'project_name' => $footerSetting->project_name,
            'project_description' => $footerSetting->project_description,
            'phone_numbers' => $footerSetting->phone_numbers,
            'email' => $footerSetting->email,
            'project_address' => $footerSetting->project_address,
            'contact_address' => $footerSetting->contact_address,
            'facebook_url' => $footerSetting->facebook_url,
            'instagram_url' => $footerSetting->instagram_url,
            'twitter_url' => $footerSetting->twitter_url,
            'linkedin_url' => $footerSetting->linkedin_url,
            'youtube_url' => $footerSetting->youtube_url,
            'show_payment_methods' => $footerSetting->show_payment_methods,
            'google_map_url' => $footerSetting->google_map_url,
            'logo_image_url' => $footerSetting->logo_image_url,
            'qr_code_image_url' => $footerSetting->qr_code_image_url,
        ]
        : $defaultSettings;

    // Convert phone numbers to array
    $phoneNumbers = $footerSetting
        ? $footerSetting->phone_numbers_array
        : explode(',', $defaultSettings['phone_numbers']);
@endphp

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <div class="footer-logo">
                @if ($settings['logo_image_url'])
                    <img src="{{ $settings['logo_image_url'] }}" alt="{{ $settings['project_name'] }}"
                        style="height: 70px;">
                @else
                    <i class="fas fa-home"></i>
                    <h2>{{ $settings['project_name'] }}</h2>
                @endif
            </div>
            <p>{{ $settings['project_description'] }}</p>

            <div class="contact-info">
                <div class="contact-item" style="background-color: #ffd700">
                    <i class="fas fa-phone-alt" style="color: #0a4d2e"></i>
                    <div class="phone-no" style="color: #0a4d2e">
                        <strong style="color: #0a4d2e">ফোন নম্বর</strong><br>
                        @foreach ($phoneNumbers as $phone)
                            {{ trim($phone) }}<br>
                        @endforeach
                    </div>
                </div>
                <div class="contact-item" style="background-color: #ffd700">
                    <i class="fas fa-envelope" style="color: #0a4d2e"></i>
                    <div class="email" style="color: #0a4d2e">
                        <strong style="color: #0a4d2e">ইমেইল</strong><br>
                        {{ $settings['email'] }}
                    </div>
                </div>
            </div>

            <div class="social-links">
                @if ($settings['facebook_url'] && $settings['facebook_url'] !== '#')
                    <a href="{{ $settings['facebook_url'] }}"><i class="fab fa-facebook-f"></i></a>
                @else
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                @endif

                @if ($settings['instagram_url'] && $settings['instagram_url'] !== '#')
                    <a href="{{ $settings['instagram_url'] }}"><i class="fab fa-instagram"></i></a>
                @else
                    <a href="#"><i class="fab fa-instagram"></i></a>
                @endif

                @if ($settings['twitter_url'] && $settings['twitter_url'] !== '#')
                    <a href="{{ $settings['twitter_url'] }}"><i class="fab fa-twitter"></i></a>
                @else
                    <a href="#"><i class="fab fa-twitter"></i></a>
                @endif

                @if ($settings['linkedin_url'] && $settings['linkedin_url'] !== '#')
                    <a href="{{ $settings['linkedin_url'] }}"><i class="fab fa-linkedin-in"></i></a>
                @else
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                @endif

                @if ($settings['youtube_url'] && $settings['youtube_url'] !== '#')
                    <a href="{{ $settings['youtube_url'] }}"><i class="fab fa-youtube"></i></a>
                @else
                    <a href="#"><i class="fab fa-youtube"></i></a>
                @endif
            </div>
        </div>

        <div class="footer-section" style="margin-left: 110px">
            <h3>প্রকল্পের ঠিকানা</h3>
            <p>{{ $settings['project_address'] }}</p>

            <h3>যোগাযোগের ঠিকানা</h3>
            <p>{{ $settings['contact_address'] }}</p>

            @if ($settings['show_payment_methods'])
                <h3>পেমেন্ট মাধ্যম</h3>
                <div class="payment-methods text-sm" style="width:220px;">
                    <span class="payment-method text-sm">
                        <i class="fas fa-mobile-alt text-sm"></i> বিকাশ
                    </span>
                    <span class="payment-method text-sm">
                        <i class="fas fa-money-bill-wave text-sm"></i> নগদ
                    </span>

                    <div style="width:220px;">
                        <span class="payment-method text-sm">
                            <i class="fas fa-university text-sm"></i> ব্যাংক ট্রান্সফার
                        </span>
                        <span class="payment-method text-sm ms-2">
                            <i class="fas fa-credit-card text-sm"></i> কার্ড
                        </span>
                    </div>
                </div>
            @endif
        </div>

        <div class="footer-section" style="margin-left:110px">
            <h3>দ্রুত লিংক</h3>
            <ul class="footer-links">
                <li><a href="#home"><i class="fas fa-chevron-right"></i> হোম</a></li>
                <li><a href="#features"><i class="fas fa-chevron-right"></i> সুবিধাসমূহ</a></li>
                <li><a href="#pricing"><i class="fas fa-chevron-right"></i> মূল্য তালিকা</a></li>
                <li><a href="#contact"><i class="fas fa-chevron-right"></i> যোগাযোগ</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> গ্যালারি</a></li>
            </ul>

            <h3>আইনি তথ্য</h3>
            <ul class="footer-links">
                <li><a href="#"><i class="fas fa-chevron-right"></i> গোপনীয়তা নীতি</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> সেবার শর্তাবলী</a></li>
            </ul>
        </div>

        <div class="footer-section qr-section">
            <h3 class="text-center">অবস্থান দেখুন</h3>
            <div class="qr-container">
                @if ($settings['qr_code_image_url'])
                    <img src="{{ $settings['qr_code_image_url'] }}" alt="QR Code"
                        style="width: 150px; height: 150px; object-fit: contain;">
                @else
                    <div id="qr-reader"></div>
                    <div id="qr-reader-results"></div>
                @endif
                <a href="{{ $settings['google_map_url'] }}" target="_blank" class="map-btn">
                    <i class="fas fa-map-marker-alt"></i> গুগল ম্যাপে দেখুন
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} {{ $settings['project_name'] }}। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি
            প্রকল্প</p>
    </div>
</footer>
