<?php
// database/seeders/FooterSettingSeeder.php

namespace Database\Seeders;

use App\Models\FooterSetting;
use Illuminate\Database\Seeder;

class FooterSettingSeeder extends Seeder
{
    public function run()
    {
        FooterSetting::create([
            'project_name' => 'জলজোছনা',
            'project_description' => 'NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।',
            'phone_numbers' => '+880 1991 995 995,+880 1991 994 994',
            'email' => 'hello.nexup@gmail.com',
            'project_address' => 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ',
            'contact_address' => 'NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'twitter_url' => 'https://twitter.com',
            'linkedin_url' => 'https://linkedin.com',
            'youtube_url' => 'https://youtube.com',
            'show_payment_methods' => true,
            'google_map_url' => 'https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা',
            'is_active' => true,
        ]);
    }
}
