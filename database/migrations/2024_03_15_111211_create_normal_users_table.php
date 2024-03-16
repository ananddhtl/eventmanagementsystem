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
        Schema::create('normal_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('phonenumber');
            $table->tinyText('address');
            $table->integer('gender');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('otp')->nullable();
            $table->timestamp('otp_sent_at')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('temp_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normal_users');
    }
};
