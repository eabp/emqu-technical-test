<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'ip_address',
    ];

    /**
     * Get the LatencyTesting for the System.
     */
    public function latencyTestings()
    {
        return $this->hasMany(LatencyTesting::class);
    }
}
