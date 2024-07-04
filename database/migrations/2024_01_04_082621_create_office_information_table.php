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
        Schema::create('office_information', function (Blueprint $table) {
            $table->id();
            $table->string('en_office_name')->nullable();
            $table->string('bn_office_name')->nullable();
            $table->string('en_address')->nullable();
            $table->string('bn_address')->nullable();
            $table->string('en_person_number')->nullable();
            $table->string('bn_person_number')->nullable();
            $table->string('en_hotline_number')->nullable();
            $table->string('bn_hotline_number')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_information');
    }
};
