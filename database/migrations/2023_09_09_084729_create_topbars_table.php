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
        Schema::create('topbars', function (Blueprint $table) {
            $table->id();
            $table->string('en_registration_text')->nullable();
            $table->string('bn_registration_text')->nullable();
            $table->string('en_brtc')->nullable();
            $table->string('bn_brtc')->nullable();
            $table->string('en_hotline')->nullable();
            $table->string('bn_hotline')->nullable();
            $table->string('query_email')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('yt_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topbars');
    }
};
