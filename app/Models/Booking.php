<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',        
        'seat_number',   
        'name',
        'email',
        'phone',
        'from',
        'to',
        'journey_date',
    ];
}
