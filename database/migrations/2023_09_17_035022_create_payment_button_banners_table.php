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
        Schema::create('payment_button_banners', function (Blueprint $table) {
            $table->id();
            
            $table->string('en_bkash_payment_title')->nullable();
            $table->string('bn_bkash_payment_title')->nullable();
            $table->string('en_bkash_payment_banner')->nullable();
            $table->string('bn_bkash_payment_banner')->nullable();

            $table->string('en_rocket_payment_title')->nullable();
            $table->string('bn_rocket_payment_title')->nullable();
            $table->string('en_rocket_payment_banner')->nullable();
            $table->string('bn_rocket_payment_banner')->nullable();

            $table->string('en_nagad_payment_title')->nullable();
            $table->string('bn_nagad_payment_title')->nullable();
            $table->string('en_nagad_payment_banner')->nullable();
            $table->string('bn_nagad_payment_banner')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_button_banners');
    }
};
