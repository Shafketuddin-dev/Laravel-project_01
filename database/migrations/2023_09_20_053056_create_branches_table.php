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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branch_category_id')->nullable();
            $table->string('en_branch_name')->nullable();
            $table->string('bn_branch_name')->nullable();
            $table->string('en_address')->nullable();
            $table->string('bn_address')->nullable();
            $table->string('en_phone')->nullable();
            $table->string('bn_phone')->nullable();
            $table->string('call_phone')->nullable();
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
        Schema::dropIfExists('branches');
    }
};
