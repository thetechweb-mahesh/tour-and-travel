<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'checkin_date',
        'checkout_date',
        'price_limit',
        'image'
    ];
}
