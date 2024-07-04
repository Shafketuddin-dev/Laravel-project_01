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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id')->nullable();
            $table->string('blog_tag_id')->nullable();
            $table->string('blog_category_id')->nullable();
            $table->string('en_title')->nullable();
            $table->string('bn_title')->nullable();
            $table->longText('en_description')->nullable();
            $table->longText('bn_description')->nullable();
            $table->string('en_published_date')->nullable();
            $table->string('bn_published_date')->nullable();
            $table->string('status')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
