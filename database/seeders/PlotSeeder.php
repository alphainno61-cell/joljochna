<?php

namespace Database\Seeders;

use App\Models\Plot;
use Illuminate\Database\Seeder;

class PlotSeeder extends Seeder
{
    public function run()
    {
        $plots = [
            [
                'size' => '৮ কাঠা',
                'category' => 'প্রিমিয়াম প্লট',
                'category_color' => 'bg-primary',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'size' => '১০ কাঠা',
                'category' => 'ডিলাক্স প্লট', 
                'category_color' => 'bg-info',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'size' => '৩০ কাঠা',
                'category' => 'এক্সিকিউটিভ প্লট',
                'category_color' => 'bg-warning',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'size' => '২০ কাঠা',
                'category' => 'কর্পোরেট প্লট',
                'category_color' => 'bg-danger',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($plots as $plot) {
            Plot::create($plot);
        }
    }
}