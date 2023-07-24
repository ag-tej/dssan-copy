<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'headline', 'slug', 'tagline', 'reported_by', 'article', 'release_date',
    ];

    protected $casts = [
        'release_date' => 'datetime:Y-m-d',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($news) {
            $news->slug = Str::slug($news->headline . '-' . str::random());
        });
    }
}
