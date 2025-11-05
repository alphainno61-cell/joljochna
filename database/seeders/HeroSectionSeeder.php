<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::create([
            'main_title' => 'মূল্য বুদ্ধির আগে',
            'subtitle' => 'বাড়ি বুকিং করুন',
            'description' => 'প্রকল্পের মূল্য তালিকা - বুকিং পরিমাণ: ১০,০০০ টাকা (কার্ড প্রতি)',
            'primary_button_text' => 'মূল্য দেখুন',
            'primary_button_url' => '#',
            'secondary_button_text' => 'যোগাযোগ করুন',
            'secondary_button_url' => '#',
            'is_active' => true,
        ]);
    }
}
