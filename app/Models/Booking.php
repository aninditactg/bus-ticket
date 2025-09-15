<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'bus_name', 'from', 'to', 'seat_numbers',
        'total_passengers', 'price', 'payment_status',
        'departure_time', 'arrival_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
