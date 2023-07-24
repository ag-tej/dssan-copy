<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'full_name', 'email', 'address', 'contact', 'batch_id', 'social_link', 'birth_date', 'gender', 'current_university', 'major_subject',
    ];

    // A student belongs to one batch
    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    protected $casts = [
        'birth_date' => 'datetime:Y-m-d',
    ];
}
