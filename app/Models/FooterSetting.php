<?php
// app/Models/FooterSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_description',
        'phone_numbers',
        'email',
        'project_address',
        'contact_address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'show_payment_methods',
        'google_map_url',
        'logo_image',
        'qr_code_image',
        'is_active',
        'project_roadmap_image'
    ];

    protected $casts = [
        'show_payment_methods' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getPhoneNumbersArrayAttribute()
    {
        return $this->phone_numbers ? explode(',', $this->phone_numbers) : [];
    }

    // Get logo image URL
    public function getLogoImageUrlAttribute()
    {
        if (!$this->logo_image) {
            return null;
        }

        // Check if it's already a full URL
        if (filter_var($this->logo_image, FILTER_VALIDATE_URL)) {
            return $this->logo_image;
        }

        return asset('storage/' . $this->logo_image);
    }


    public function getProjectRoadmapImageUrlAttribute()
    {
        if (!$this->project_roadmap_image) {
            return null;
        }

        // Check if it's already a full URL
        if (filter_var($this->project_roadmap_image, FILTER_VALIDATE_URL)) {
            return $this->project_roadmap_image;
        }

        return asset('storage/' . $this->project_roadmap_image);
    }



    // Get QR code image URL
    public function getQrCodeImageUrlAttribute()
    {
        if (!$this->qr_code_image) {
            return null;
        }

        // Check if it's already a full URL
        if (filter_var($this->qr_code_image, FILTER_VALIDATE_URL)) {
            return $this->qr_code_image;
        }

        return asset('storage/' . $this->qr_code_image);
    }
}
