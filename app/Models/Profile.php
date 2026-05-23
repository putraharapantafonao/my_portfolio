<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    'title_name',
    'sub_title',
    'about_text',
    'profile_image',
    'cv_link',
    'github_link',
    'linkedin_link',
    'instagram_link'
];
}
