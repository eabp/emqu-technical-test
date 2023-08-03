<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatencyTesting extends Model
{
    use HasFactory;

    protected $fillable = [
        'alive',
        'time',
        'system_id',
    ];
}
