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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('en_title')->nullable();
            $table->string('bn_title')->nullable();
            
            $table->string('en_corporate_internet')->nullable();
            $table->string('bn_corporate_internet')->nullable();
            $table->string('en_corporate_internet_percentage')->nullable();
            $table->string('bn_corporate_internet_percentage')->nullable();

            $table->string('en_home_internet')->nullable();
            $table->string('bn_home_internet')->nullable();
            $table->string('en_home_internet_percentage')->nullable();
            $table->string('bn_home_internet_percentage')->nullable();

            $table->string('en_customer_support')->nullable();
            $table->string('bn_customer_support')->nullable();
            $table->string('en_customer_support_percentage')->nullable();
            $table->string('bn_customer_support_percentage')->nullable();

            $table->string('en_vts')->nullable();
            $table->string('bn_vts')->nullable();
            $table->string('en_vts_percentage')->nullable();
            $table->string('bn_vts_percentage')->nullable();

            $table->string('en_training')->nullable();
            $table->string('bn_training')->nullable();
            $table->string('en_training_percentage')->nullable();
            $table->string('bn_training_percentage')->nullable();

            $table->longText('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
