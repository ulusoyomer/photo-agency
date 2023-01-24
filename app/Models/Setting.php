<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_image',
        'title',
        'twitter',
        'facebook',
        'youtube',
        'instagram',
        'linkedin',
        'footer',
        'home_title',
        'home_text',
        'about_us_image',
        'about_us_title',
        'about_us_text',
        'address',
        'email',
        'phone',
        'map'
    ];
}
