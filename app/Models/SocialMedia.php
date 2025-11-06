<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
        'sort_order',
        'is_active',
        'carousel_group'
    ];
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('carousel_group')->orderBy('sort_order');
    }

    public function scopeByGroup($query, $group)
    {
        return $query->where('carousel_group', $group);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return $this->image_url ?? 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?w=400&h=250&fit=crop';
    }
}
