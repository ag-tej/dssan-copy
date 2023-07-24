<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'batch', 'image',
    ];

    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($batches) {
            $batches->slug = Str::slug($batches->batch . '-' . str::random());
        });
    }
}
