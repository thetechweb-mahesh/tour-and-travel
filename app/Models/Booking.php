<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'name',
        'email',
        'City',
        'person',
        'phone',
        'travel_date',
    ];

    // public function destination()
    // {
    //     return $this->belongsTo(Destination::class, 'destination_id');
    // }
}
