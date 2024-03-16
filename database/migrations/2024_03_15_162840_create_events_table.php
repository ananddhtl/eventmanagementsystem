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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("event_title");
            $table->text("description");
            $table->string("thumbnail");
            $table->string("event_date");
            $table->string("location");
            $table->integer("organizer_id");
            $table->bigInteger("total_seats");
            $table->bigInteger("total_vip_seats");
            $table->bigInteger("total_public_seats");
            $table->bigInteger("total_available_vip_seats")->nullable();
            $table->bigInteger("total_available_public_seats")->nullable();
            $table->double("vip_seats_price");
            $table->double("public_seats_price");
            $table->integer("status")->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
