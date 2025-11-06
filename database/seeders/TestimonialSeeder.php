<?php
// database/seeders/TestimonialSeeder.php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'investor_name' => 'জনাব. ফারহান আহমেদ',
                'investor_title' => 'ব্যবসায়ী, ঢাকা',
                'avatar_initials' => 'FA',
                'quote_text' => 'জলজোছনা প্রকল্প দেখে আমি সত্যিই মুগ্ধ! দারুণ লোকেশন, আর পেমেন্ট প্ল্যানগুলো খুবই নমনীয়। আমার বিনিয়োগের সেরা সিদ্ধান্ত ছিল।',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'investor_name' => 'মিসেস. জান্নাতুল ফেরদৌস',
                'investor_title' => 'গৃহিণী, খুলনা',
                'avatar_initials' => 'JF',
                'quote_text' => 'নেক্স রিয়েল এস্টেট এর সাথে কাজ করা সহজ ছিল। সমস্ত আইনি ডকুমেন্টেশন পরিষ্কার এবং দ্রুত সম্পন্ন হয়েছে। আমি অন্য প্রকল্পে বিনিয়োগের পরিকল্পনা করছি।',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'investor_name' => 'জনাব. শফিকুর রহমান',
                'investor_title' => 'প্রকৌশলী, যুক্তরাজ্য',
                'avatar_initials' => 'SR',
                'quote_text' => 'পরিকল্পিত সবুজ পরিবেশ এবং যোগাযোগ ব্যবস্থা খুবই চমৎকার। ভবিষ্যতের জন্য এটি একটি নিরাপদ ও লাভজনক বিনিয়োগ। আমি ১০০% সন্তুষ্ট।',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'investor_name' => 'মিসেস. আয়েশা খানম',
                'investor_title' => 'শিক্ষিকা, চট্টগ্রাম',
                'avatar_initials' => 'AK',
                'quote_text' => 'প্রকল্পের অবস্থান ও উন্নত যোগাযোগ আমাকে আকর্ষণ করেছে। বুকিং প্রক্রিয়া খুবই সহজ ছিল। আমি আমার বন্ধুদেরও এখানে বিনিয়োগ করতে উৎসাহিত করব।',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
