<?php
// app/Models/ContactInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_data'
    ];

    protected $casts = [
        'contact_data' => 'array'
    ];

    // Default contact data structure
    protected $defaultContactData = [
        'phone' => [
            'title' => 'ফোন',
            'content' => "+880 1991 995 995\n+880 1991 994 994\n+880 1997 995 995\n+880 1677 600 000",
            'icon' => '📞',
            'type' => 'phone',
            'is_active' => true
        ],
        'email' => [
            'title' => 'ইমেইল',
            'content' => 'hello.nexgroup@gmail.com',
            'icon' => '📧',
            'type' => 'email',
            'is_active' => true
        ],
        'website' => [
            'title' => 'ওয়েবসাইট',
            'content' => 'www.joljochna.com',
            'icon' => '🌐',
            'type' => 'website',
            'is_active' => true
        ],
        'address' => [
            'title' => 'ঠিকানা',
            'content' => "শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস\nখুলনা, বাংলাদেশ",
            'icon' => '📍',
            'type' => 'address',
            'is_active' => true
        ]
    ];

    // Get the single contact info instance
    public static function getContactInfo()
    {
        $contactInfo = static::first();
        
        if (!$contactInfo) {
            $contactInfo = new static();
            $contactInfo->contact_data = (new static())->defaultContactData;
            $contactInfo->save();
        }
        
        return $contactInfo;
    }

    // Save contact info (create or update)
    public static function saveContactInfo($data)
    {
        $contactInfo = static::first();
        
        if (!$contactInfo) {
            $contactInfo = new static();
        }
        
        $contactInfo->contact_data = $data;
        $contactInfo->save();
        
        return $contactInfo;
    }

    // Get specific contact item
    public function getContactItem($type)
    {
        return $this->contact_data[$type] ?? null;
    }

    // Helper method to get content as array
    public function getContentArray($content)
    {
        return array_filter(array_map('trim', explode("\n", $content)));
    }

    // Generate appropriate link based on type
    public function getGeneratedLink($type, $content)
    {
        $primaryContent = $this->getContentArray($content)[0] ?? $content;

        switch ($type) {
            case 'phone':
                $phone = preg_replace('/[^\d+]/', '', $primaryContent);
                return "tel:{$phone}";
            case 'email':
                return "mailto:{$primaryContent}";
            case 'website':
                if (!preg_match('/^https?:\/\//', $primaryContent)) {
                    return "https://{$primaryContent}";
                }
                return $primaryContent;
            default:
                return null;
        }
    }

    // Check if item is clickable
    public function isClickable($type)
    {
        return in_array($type, ['phone', 'email', 'website']);
    }
}