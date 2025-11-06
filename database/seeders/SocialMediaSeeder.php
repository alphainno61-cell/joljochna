<?php
// database/seeders/SocialMediaSeeder.php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run()
    {
        $socialMediaLinks = [
            [
                'title' => 'Modern Design',
                'description' => 'Experience elegance with our modern design collection.',
                'url' => 'https://example.com/modern-design',
                'image' => null, // Will use default image URL from model
                'sort_order' => 1,
                'carousel_group' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Premium Quality',
                'description' => 'Discover premium products crafted with perfection.',
                'url' => 'https://example.com/premium-quality',
                'image' => null,
                'sort_order' => 2,
                'carousel_group' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($socialMediaLinks as $link) {
            SocialMedia::create($link);
        }
    }
}
