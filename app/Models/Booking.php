<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'bus_id', 'bus_name', 'seat_number',
        'name', 'email', 'phone', 'from', 'to', 'journey_date',
        'price', 'payment_status', 'departure_time', 'arrival_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
