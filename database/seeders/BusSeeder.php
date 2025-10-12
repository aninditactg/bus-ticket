<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buses = [
            [
                'bus_number' => 'GreenLine GL-001',
                'bus_name' => 'GreenLine',
                'type' => 'AC',
                'total_seat' => 40,
                'price' => 160,
                'from' => 'Dhaka',
                'to' => 'Chittagong',
                'departure_time' => '07:00:00',
                'arrival_time' => '13:00:00',
            ],
            [
                'bus_number' => 'Shyamoli SH-002',
                'bus_name' => 'Shyamoli',
                'type' => 'Non-AC',
                'total_seat' => 45,
                'price' => 150,
                'from' => 'Dhaka',
                'to' => 'Khulna',
                'departure_time' => '09:00:00',
                'arrival_time' => '15:00:00',
            ],
            [
                'bus_number' => 'Hanif HN-003',
                'bus_name' => 'Hanif',
                'type' => 'AC',
                'total_seat' => 42,
                'price' => 170,
                'from' => 'Dhaka',
                'to' => 'Rajshahi',
                'departure_time' => '08:00:00',
                'arrival_time' => '14:00:00',
            ],
            [
                'bus_number' => 'Saudia SD-004',
                'bus_name' => 'Saudia',
                'type' => 'AC',
                'total_seat' => 38,
                'price' => 180,
                'from' => 'Dhaka',
                'to' => 'Barisal',
                'departure_time' => '10:00:00',
                'arrival_time' => '16:00:00',
            ],
            [
                'bus_number' => 'Volvo VL-005',
                'bus_name' => 'Volvo',
                'type' => 'AC',
                'total_seat' => 35,
                'price' => 200,
                'from' => 'Sylhet',
                'to' => 'Dhaka',
                'departure_time' => '06:00:00',
                'arrival_time' => '10:00:00',
            ],
            [
                'bus_number' => 'Sohag SO-006',
                'bus_name' => 'Sohag',
                'type' => 'Non-AC',
                'total_seat' => 50,
                'price' => 140,
                'from' => 'Dhaka',
                'to' => "Cox's Bazar",
                'departure_time' => '05:00:00',
                'arrival_time' => '11:00:00',
            ],
            [
                'bus_number' => 'BRTC BR-007',
                'bus_name' => 'BRTC',
                'type' => 'Non-AC',
                'total_seat' => 55,
                'price' => 130,
                'from' => 'Dhaka',
                'to' => 'Rangamati',
                'departure_time' => '11:00:00',
                'arrival_time' => '17:00:00',
            ],
            [
                'bus_number' => 'ExpressLine EX-008',
                'bus_name' => 'ExpressLine',
                'type' => 'AC',
                'total_seat' => 40,
                'price' => 120,
                'from' => 'Dhaka',
                'to' => 'Comilla',
                'departure_time' => '16:00:00',
                'arrival_time' => '18:00:00',
            ],
            [
                'bus_number' => 'S.Alam SA-009',
                'bus_name' => 'S.Alam',
                'type' => 'AC',
                'total_seat' => 45,
                'price' => 190,
                'from' => 'Chittagong',
                'to' => 'Dhaka',
                'departure_time' => '15:00:00',
                'arrival_time' => '19:00:00',
            ],
        ];

        foreach ($buses as $busData) {
            Bus::create($busData);
        }
    }
}
