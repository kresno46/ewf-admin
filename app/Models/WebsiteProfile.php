<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteProfile extends Model
{
    use HasFactory;

    protected $table = 'website_profiles';

    protected $fillable = [
        'website_name',
        'description',
        'address',
        'map_link',
        'complaint_link',
        'phone',
        'fax',
        'email',
    ];
}
