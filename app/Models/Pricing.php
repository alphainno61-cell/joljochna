<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'title',
        'size_description',
        'total_price',
        'down_payment_percentage',
        'down_payment_amount',
        'installments',
        'is_featured',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'installments' => 'array',
        'total_price' => 'decimal:2',
        'down_payment_amount' => 'decimal:2',
        'down_payment_percentage' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }
}
