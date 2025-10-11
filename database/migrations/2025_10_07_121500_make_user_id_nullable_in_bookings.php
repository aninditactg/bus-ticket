<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Drop FK if exists, then make column nullable
            try {
                $table->dropForeign(['user_id']);
            } catch (Throwable $e) {
                // ignore if foreign key doesn't exist
            }
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            // Best-effort: restore FK constraint
            try {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            } catch (Throwable $e) {
                // ignore in down if cannot recreate automatically
            }
        });
    }
};


