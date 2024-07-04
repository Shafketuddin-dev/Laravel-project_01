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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('en_title')->nullable();
            $table->string('bn_title')->nullable();
            $table->string('en_date')->nullable();
            $table->string('bn_date')->nullable();
            $table->string('status')->nullable();
            $table->longText('image')->nullable();
            $table->longText('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
