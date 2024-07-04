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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('en_footer_contact_title')->nullable();
            $table->string('bn_footer_contact_title')->nullable();
            $table->string('en_footer_address')->nullable();
            $table->string('bn_footer_address')->nullable();
            $table->string('en_footer_phone')->nullable();
            $table->string('bn_footer_phone')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('en_footer_quick_link_title')->nullable();
            $table->string('bn_footer_quick_link_title')->nullable();
            $table->string('en_footer_map_title')->nullable();
            $table->string('bn_footer_map_title')->nullable();
            $table->string('en_footer_copyright')->nullable();
            $table->string('bn_footer_copyright')->nullable();
            $table->longText('footer_map_link')->nullable();
            $table->string('en_footer_tc')->nullable();
            $table->string('bn_footer_tc')->nullable();
            $table->longText('image')->nullable();
            $table->longText('app_url')->nullable();
            $table->string('en_footer_company_profile_title')->nullable();
            $table->string('bn_footer_company_profile_title')->nullable();
            $table->longText('company_profile_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
