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
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'bus_id')) {
                $table->unsignedBigInteger('bus_id')->nullable()->after('user_id');
            }
            if (!Schema::hasColumn('bookings', 'bus_name')) {
                $table->string('bus_name')->nullable()->after('bus_id');
            }
            if (!Schema::hasColumn('bookings', 'seat_number')) {
                $table->string('seat_number')->nullable()->after('to');
            }
            if (!Schema::hasColumn('bookings', 'price')) {
                $table->decimal('price', 10, 2)->nullable()->after('journey_date');
            }
            if (!Schema::hasColumn('bookings', 'payment_status')) {
                $table->string('payment_status')->default('pending')->after('price');
            }
            if (!Schema::hasColumn('bookings', 'departure_time')) {
                $table->string('departure_time')->nullable()->after('payment_status');
            }
            if (!Schema::hasColumn('bookings', 'arrival_time')) {
                $table->string('arrival_time')->nullable()->after('departure_time');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'arrival_time')) {
                $table->dropColumn('arrival_time');
            }
            if (Schema::hasColumn('bookings', 'departure_time')) {
                $table->dropColumn('departure_time');
            }
            if (Schema::hasColumn('bookings', 'payment_status')) {
                $table->dropColumn('payment_status');
            }
            if (Schema::hasColumn('bookings', 'price')) {
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('bookings', 'seat_number')) {
                $table->dropColumn('seat_number');
            }
            if (Schema::hasColumn('bookings', 'bus_name')) {
                $table->dropColumn('bus_name');
            }
            if (Schema::hasColumn('bookings', 'bus_id')) {
                $table->dropColumn('bus_id');
            }
        });
    }
};


