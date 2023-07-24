<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover_image'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
}
