<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Karier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_kota',
        'posisi',
        'slug',
        'responsibilities',
        'requirements',
        'email',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Tidak perlu casting khusus untuk field yang ada
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($karier) {
            $karier->slug = Str::slug($karier->posisi . ' ' . $karier->nama_kota . ' ' . Str::random(5));
        });

        static::updating(function ($karier) {
            if ($karier->isDirty(['posisi', 'nama_kota'])) {
                $karier->slug = Str::slug($karier->posisi . ' ' . $karier->nama_kota . ' ' . Str::random(5));
            }
        });
    }
}
