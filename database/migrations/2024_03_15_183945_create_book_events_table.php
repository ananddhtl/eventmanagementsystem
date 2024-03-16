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
        Schema::create('book_events', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('transaction_code');
            $table->integer('event_id');
            $table->integer('qty');
            $table->text('ticket_type');
            $table->text('total_price');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_events');
    }
};
