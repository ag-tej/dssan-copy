<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'event_title', 'description', 'event_date_time',
    ];

    protected $casts = [
        'event_date_time' => 'datetime:Y-m-d h:i:s',
    ];
}
