<section id="contact" class="contact">
    <h2 class="section-title">যোগাযোগ করুন</h2>
    <p class="section-subtitle">আমরা আপনার সেবায় প্রস্তুত</p>
    <div class="contact-content">
        @if($contactInfo)
        <div class="contact-info-wrapper">
            <div class="contact-cards-grid">
                @foreach(['phone', 'email', 'website', 'address'] as $type)
                    @php $item = $contactInfo->getContactItem($type); @endphp
                    @if($item && ($item['is_active'] ?? true))
                        <div class="contact-card">
                            <div class="contact-card-icon">{!! $item['icon'] !!}</div>
                            <div>
                                <h3 class="contact-card-title">{{ $item['title'] }}</h3>
                                <div class="contact-card-text">
                                    @foreach($contactInfo->getContentArray($item['content']) as $line)
                                        @if($contactInfo->isClickable($item['type']))
                                            <a href="{{ $contactInfo->getGeneratedLink($item['type'], $line) }}" 
                                               target="{{ $item['type'] == 'website' ? '_blank' : '_self' }}"
                                               class="contact-card-link">
                                                {{ $line }}
                                            </a>
                                        @else
                                            <div class="contact-card-line">{{ $line }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif

        <div class="contact-form">
            <h3 style="margin-bottom: 2rem;">বুকিং তথ্য পাঠান</h3>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">নাম *</label>
                    <input type="text" id="name" name="name" placeholder="আপনার নাম লিখুন"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">ফোন নম্বর *</label>
                    <input type="tel" id="phone" name="phone" placeholder="আপনার ফোন নম্বর"
                        value="{{ old('phone') }}" required>
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">ইমেইল *</label>
                    <input type="email" id="email" name="email" placeholder="আপনার ইমেইল ঠিকানা"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="plot_size">আগ্রহের প্লট সাইজ</label>
                    <select id="plot_size" name="plot_size" class="form-control">
                        <option value="">প্লট সাইজ নির্বাচন করুন</option>
                        <option value="২০ কুড়া মালা (২.৫ কাঠা)"
                            {{ old('plot_size') == '২০ কুড়া মালা (২.৫ কাঠা)' ? 'selected' : '' }}>২০ কুড়া মালা (২.৫ কাঠা)</option>
                        <option value="৩০ কুড়া মালা (৩.৭৫ কাঠা)"
                            {{ old('plot_size') == '৩০ কুড়া মালা (৩.৭৫ কাঠা)' ? 'selected' : '' }}>৩০ কুড়া মালা (৩.৭৫ কাঠা)</option>
                        <option value="৪০ কুড়া মালা (৫ কাঠা)"
                            {{ old('plot_size') == '৪০ কুড়া মালা (৫ কাঠা)' ? 'selected' : '' }}>৪০ কুড়া মালা (৫ কাঠা)</option>
                        <option value="অন্যান্য" {{ old('plot_size') == 'অন্যান্য' ? 'selected' : '' }}>অন্যান্য</option>
                    </select>
                    @error('plot_size')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">বার্তা</label>
                    <textarea id="message" name="message" rows="4" placeholder="আপনার প্রশ্ন বা মন্তব্য">{{ old('message') }}</textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    <i class="fas fa-paper-plane me-2"></i>পাঠান
                </button>
            </form>
        </div>
    </div>
</section>

<style>
/* Contact Info Wrapper */
.contact-info-wrapper {
    margin-bottom: 3rem;
}

/* Contact Cards Grid - Vertical Stack Layout */
.contact-cards-grid {
    display: flex;
    flex-direction: column;
    gap: 0;
    margin-bottom: 2rem;
}

/* Individual Contact Card */
.contact-card {
    background: #f8f9fa;
    border: none;
    border-radius: 12px;
    padding: 25px 30px;
    display: flex;
    align-items: flex-start;
    gap: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    margin-bottom: 15px;
}

.contact-card:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

/* Contact Card Icon */
.contact-card-icon {
    font-size: 40px;
    line-height: 1;
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    border-radius: 10px;
    padding: 8px;
}

.contact-card-icon img {
    width: 34px;
    height: 34px;
}

/* Contact Card Content */
.contact-card > div:last-child {
    flex: 1;
    text-align: left;
}

/* Contact Card Title */
.contact-card-title {
    font-size: 20px !important;
    font-weight: 600 !important;
    margin-bottom: 12px !important;
    color: #212529 !important;
    margin-top: 0 !important;
}

/* Contact Card Text Container */
.contact-card-text {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

/* Contact Links */
.contact-card-link {
    color: #495057;
    text-decoration: none;
    font-size: 15px;
    transition: color 0.3s ease;
    display: block;
    line-height: 1.6;
}

.contact-card-link:hover {
    color: #007bff;
    text-decoration: none;
}

/* Non-clickable text */
.contact-card-line {
    color: #495057;
    font-size: 15px;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-card {
        flex-direction: column;
        text-align: center;
    }
    
    .contact-card > div:last-child {
        text-align: center;
    }
    
    .contact-card-icon {
        margin: 0 auto;
    }
}
</style>