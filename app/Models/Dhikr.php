<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dhikr extends Model
{
    protected $fillable = [
        'text',
        'target_count',
    ];
    protected $casts = [
        'target_count' => 'integer',
    ];
}
