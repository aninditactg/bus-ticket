<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('bus_name');
            $table->string('from');
            $table->string('to');
            $table->string('seat_numbers'); 
            $table->integer('total_passengers');
            $table->decimal('price', 8, 2);
            $table->string('payment_status')->default('pending');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
