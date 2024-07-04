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
        Schema::create('corporate_internets', function (Blueprint $table) {
            $table->id();
            $table->string('en_title')->nullable();
            $table->string('bn_title')->nullable();

            $table->longText('en_head_para_one')->nullable();
            $table->longText('bn_head_para_one')->nullable();

            $table->string('en_item_title_one')->nullable();
            $table->string('bn_item_title_one')->nullable();
            $table->longText('en_item_description_one')->nullable();
            $table->longText('bn_item_description_one')->nullable();

            $table->string('en_item_title_two')->nullable();
            $table->string('bn_item_title_two')->nullable();
            $table->longText('en_item_description_two')->nullable();
            $table->longText('bn_item_description_two')->nullable();

            $table->string('en_item_title_three')->nullable();
            $table->string('bn_item_title_three')->nullable();
            $table->longText('en_item_description_three')->nullable();
            $table->longText('bn_item_description_three')->nullable();

            $table->string('en_item_title_four')->nullable();
            $table->string('bn_item_title_four')->nullable();
            $table->longText('en_item_description_four')->nullable();
            $table->longText('bn_item_description_four')->nullable();

            $table->string('en_item_title_five')->nullable();
            $table->string('bn_item_title_five')->nullable();
            $table->longText('en_item_description_five')->nullable();
            $table->longText('bn_item_description_five')->nullable();
            
            $table->string('en_item_title_six')->nullable();
            $table->string('bn_item_title_six')->nullable();
            $table->longText('en_item_description_six')->nullable();
            $table->longText('bn_item_description_six')->nullable();

            $table->longText('en_footer_description')->nullable();
            $table->longText('bn_footer_description')->nullable();

            $table->string('status')->nullable();
            $table->longText('image')->nullable();
            $table->longText('item_image_one')->nullable();
            $table->longText('item_image_two')->nullable();
            $table->longText('item_image_three')->nullable();
            $table->longText('item_image_four')->nullable();
            $table->longText('item_image_five')->nullable();
            $table->longText('item_image_six')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate_internets');
    }
};
