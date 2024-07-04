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
        Schema::create('involvements', function (Blueprint $table) {
            $table->id();
            $table->string('bod_id')->nullable();
            $table->string('en_company_name')->nullable();
            $table->string('bn_company_name')->nullable();
            $table->string('en_designation')->nullable();
            $table->string('bn_designation')->nullable();
            $table->longText('en_description')->nullable();
            $table->longText('bn_description')->nullable();
            $table->string('en_year_from')->nullable();
            $table->string('bn_year_from')->nullable();
            $table->string('en_year_to')->nullable();
            $table->string('bn_year_to')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('involvements');
    }
};
