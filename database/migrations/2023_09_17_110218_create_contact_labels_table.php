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
        Schema::create('contact_labels', function (Blueprint $table) {
            $table->id();
            $table->string('en_title')->nullable();
            $table->string('bn_title')->nullable();
            $table->string('en_name_label')->nullable();
            $table->string('bn_name_label')->nullable();
            $table->string('en_email_label')->nullable();
            $table->string('bn_email_label')->nullable();
            $table->string('en_phone_label')->nullable();
            $table->string('bn_phone_label')->nullable();
            $table->string('en_subject_label')->nullable();
            $table->string('bn_subject_label')->nullable();
            $table->string('en_message_label')->nullable();
            $table->string('bn_message_label')->nullable();
            $table->string('en_button_text')->nullable();
            $table->string('bn_button_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_labels');
    }
};
