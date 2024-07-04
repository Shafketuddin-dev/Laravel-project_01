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
        Schema::create('b_o_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable();
            $table->string('bn_name')->nullable();
            $table->string('department_id')->nullable();
            $table->string('designation_id')->nullable();
            $table->longText('en_description')->nullable();
            $table->longText('bn_description')->nullable();
            $table->longText('image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_o_d_s');
    }
};
