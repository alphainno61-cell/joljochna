<section id="pricing" class="pricing">
    <h2 class="section-title">মূল্য তালিকা</h2>
    <p class="section-subtitle">আপনার বাজেট অনুযায়ী নির্বাচন করুন</p>
    <div class="pricing-grid">
        @foreach ($pricings as $pricing)
            <div class="pricing-card {{ $pricing->is_featured ? 'featured' : '' }}">
                <h3>{{ $pricing->title }} ({{ $pricing->size_description }})</h3>
                <div class="price">{{ number_format($pricing->total_price, 2) }} টাকা</div>
                <p class="price-details">{{ $pricing->down_payment_percentage }}% ডাউন পেমেন্ট:
                    {{ number_format($pricing->down_payment_amount, 2) }} টাকা</p>
                <ul class="price-list">
                    @foreach ($pricing->installments as $installment)
                        <li>{{ $installment['installment'] }}: {{ $installment['amount'] }} টাকা</li>
                    @endforeach
                </ul>
                <a href="#contact" class="btn btn-primary">
                    {{ $pricing->is_featured ? 'জনপ্রিয়' : 'বুকিং করুন' }}
                </a>
            </div>
        @endforeach
    </div>
</section>
