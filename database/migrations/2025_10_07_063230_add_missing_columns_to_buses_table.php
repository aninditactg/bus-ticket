<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        Schema::table('buses', function (Blueprint $table) {
            if (!Schema::hasColumn('buses', 'bus_number')) {
                $table->string('bus_number')->nullable()->after('id');
            }
            if (!Schema::hasColumn('buses', 'bus_name')) {
                $table->string('bus_name')->nullable()->after('bus_number');
            }
            if (!Schema::hasColumn('buses', 'type')) {
                $table->string('type')->nullable()->after('bus_name');
            }
            if (!Schema::hasColumn('buses', 'total_seat')) {
                $table->integer('total_seat')->default(30)->after('type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buses', function (Blueprint $table) {
            if (Schema::hasColumn('buses', 'total_seat')) {
                $table->dropColumn('total_seat');
            }
            if (Schema::hasColumn('buses', 'type')) {
                $table->dropColumn('type');
            }
            if (Schema::hasColumn('buses', 'bus_name')) {
                $table->dropColumn('bus_name');
            }
            if (Schema::hasColumn('buses', 'bus_number')) {
                $table->dropColumn('bus_number');
            }
        });
    }
};
