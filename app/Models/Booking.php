<?php
// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'plot_size',
        'message',
        'status',
        'admin_notes'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-warning',
            'contacted' => 'bg-info',
            'completed' => 'bg-success',
            'cancelled' => 'bg-danger'
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'pending' => 'Pending',
            'contacted' => 'Contacted',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled'
        ];

        return $texts[$this->status] ?? 'Unknown';
    }
}
