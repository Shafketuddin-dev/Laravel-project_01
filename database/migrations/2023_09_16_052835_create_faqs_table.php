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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('en_question_one')->nullable();
            $table->string('bn_question_one')->nullable();
            $table->longText('en_answer_one')->nullable();
            $table->longText('bn_answer_one')->nullable();
            $table->string('en_question_two')->nullable();
            $table->string('bn_question_two')->nullable();
            $table->longText('en_answer_two')->nullable();
            $table->longText('bn_answer_two')->nullable();
            $table->string('en_question_three')->nullable();
            $table->string('bn_question_three')->nullable();
            $table->longText('en_answer_three')->nullable();
            $table->longText('bn_answer_three')->nullable();
            $table->string('en_question_four')->nullable();
            $table->string('bn_question_four')->nullable();
            $table->longText('en_answer_four')->nullable();
            $table->longText('bn_answer_four')->nullable();
            $table->string('en_question_five')->nullable();
            $table->string('bn_question_five')->nullable();
            $table->longText('en_answer_five')->nullable();
            $table->longText('bn_answer_five')->nullable();

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
        Schema::dropIfExists('faqs');
    }
};
