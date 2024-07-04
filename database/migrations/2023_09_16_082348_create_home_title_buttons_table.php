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
        Schema::create('home_title_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('en_home_about_title')->nullable();
            $table->string('bn_home_about_title')->nullable();
            $table->string('en_home_about_button_text')->nullable();
            $table->string('bn_home_about_button_text')->nullable();
            $table->string('en_home_service_title')->nullable();
            $table->string('bn_home_service_title')->nullable();
            $table->string('en_home_internet_title')->nullable();
            $table->string('bn_home_internet_title')->nullable();
            $table->string('en_home_internet_button_text')->nullable();
            $table->string('bn_home_internet_button_text')->nullable();
            $table->string('en_home_choose_us_title')->nullable();
            $table->string('bn_home_choose_us_title')->nullable();
            $table->string('en_home_faq_title')->nullable();
            $table->string('bn_home_faq_title')->nullable();
            $table->string('en_home_testimonial_title')->nullable();
            $table->string('bn_home_testimonial_title')->nullable();
            $table->string('en_home_coverage_title')->nullable();
            $table->string('bn_home_coverage_title')->nullable();
            $table->string('en_home_coverage_button_text')->nullable();
            $table->string('bn_home_coverage_button_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_title_buttons');
    }
};
