<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'about_title',
        'about_description',
        'fb_url',
        'github_url',
        'linkedin_url',
        'freelance_url',
        'cv_url',
        'video_url',
        'about_photo',
        'contact_mail'
    ];
}
