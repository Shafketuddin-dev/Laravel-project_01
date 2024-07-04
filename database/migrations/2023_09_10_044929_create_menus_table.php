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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('en_menu_home')->nullable();
            $table->string('bn_menu_home')->nullable();
            $table->string('en_menu_whoweare_title')->nullable();
            $table->string('bn_menu_whoweare_title')->nullable();
            $table->string('en_menu_about_us')->nullable();
            $table->string('bn_menu_about_us')->nullable();
            $table->string('en_menu_branches')->nullable();
            $table->string('bn_menu_branches')->nullable();

            $table->string('en_menu_md_profile')->nullable();
            $table->string('bn_menu_md_profile')->nullable();
            $table->string('en_menu_md_message')->nullable();
            $table->string('bn_menu_md_message')->nullable();

            $table->string('en_menu_chairman_profile')->nullable();
            $table->string('bn_menu_chairman_profile')->nullable();
            $table->string('en_menu_chairman_message')->nullable();
            $table->string('bn_menu_chairman_message')->nullable();

            $table->string('en_menu_ed_profile')->nullable();
            $table->string('bn_menu_ed_profile')->nullable();
            $table->string('en_menu_ed_message')->nullable();
            $table->string('bn_menu_ed_message')->nullable();

            $table->string('en_menu_dmd_profile')->nullable();
            $table->string('bn_menu_dmd_profile')->nullable();
            $table->string('en_menu_dmd_message')->nullable();
            $table->string('bn_menu_dmd_message')->nullable();  

            $table->string('en_menu_bod')->nullable();
            $table->string('bn_menu_bod')->nullable();
            $table->string('en_menu_employee')->nullable();
            $table->string('bn_menu_employee')->nullable();
            $table->string('en_menu_internet_plan')->nullable();
            $table->string('bn_menu_internet_plan')->nullable();
            $table->string('en_menu_service_title')->nullable();
            $table->string('bn_menu_service_title')->nullable();
            $table->string('en_menu_internet')->nullable();
            $table->string('bn_menu_internet')->nullable();
            $table->string('en_menu_vts')->nullable();
            $table->string('bn_menu_vts')->nullable();
            $table->string('en_menu_it')->nullable();
            $table->string('bn_menu_it')->nullable();
            $table->string('en_menu_billpay')->nullable();
            $table->string('bn_menu_billpay')->nullable();
            $table->string('en_menu_billing_system')->nullable();
            $table->string('bn_menu_billing_system')->nullable();
            $table->string('en_menu_online_pay')->nullable();
            $table->string('bn_menu_online_pay')->nullable();
            $table->string('en_menu_contact_us')->nullable();
            $table->string('bn_menu_contact_us')->nullable();
            $table->string('en_menu_more_title')->nullable();
            $table->string('bn_menu_more_title')->nullable();
            $table->string('en_menu_blog')->nullable();
            $table->string('bn_menu_blog')->nullable();
            $table->string('en_menu_notice')->nullable();
            $table->string('bn_menu_notice')->nullable();
            $table->string('en_menu_awards')->nullable();
            $table->string('bn_menu_awards')->nullable();
            $table->string('en_menu_gallery')->nullable();
            $table->string('bn_menu_gallery')->nullable();
            $table->string('en_menu_news_event')->nullable();
            $table->string('bn_menu_news_event')->nullable();
            $table->string('en_menu_circular')->nullable();
            $table->string('bn_menu_circular')->nullable();
            $table->string('en_menu_admin')->nullable();
            $table->string('bn_menu_admin')->nullable();
            $table->string('en_tutorial')->nullable();
            $table->string('bn_tutorial')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
