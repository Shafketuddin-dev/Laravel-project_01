<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\JobApplyController;
use App\Http\Controllers\Admin\JobCircularController;
use App\Http\Controllers\Admin\CoverageCheckController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontView\FrontViewController;
use App\Http\Controllers\FrontView\PacakgeBuyController;

if (!function_exists('parseLocale')) {
    function parseLocale()
    {
        $locale = request()->segment(1);

        if (in_array($locale, ['js', 'css'])) {
            return $locale;
        }

        if (array_key_exists($locale, config('languages'))) {
            app()->setLocale($locale);

            return $locale;
        }

        app()->setLocale('en');

        return '/';
    }
}

Route::prefix(parseLocale())->group(function () {

    Route::controller(FrontViewController::class)->group(function () {
        Route::get('/', 'index')->name('/');
        Route::get('/about-us', 'aboutUs')->name('about_us');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/blog-details/{id}', 'blogDetails')->name('blog_details');
        Route::get('/career', 'circular')->name('circular');
        Route::get('/career-details/{id}', 'circularDetails')->name('circular_details');
        Route::get('/news-event', 'newsEvent')->name('news_event');
        Route::get('/news-event-details/{id}', 'newsEventDetails')->name('news_event_details');
        Route::get('/gallery', 'gallery')->name('gallery');
        Route::get('/awards', 'awards')->name('awards');
        Route::get('/notice', 'notice')->name('notice');
        Route::get('/notice-details/{id}', 'noticeDetails')->name('notice_details');
        Route::get('/contact-us', 'contactUs')->name('contact_us');
        Route::get('/payment-process', 'paymentProcess')->name('payment_process');
        Route::get('/packages', 'packages')->name('packages');
        Route::get('/buy-package/{id}', 'buyPackage')->name('buy_package');
        Route::get('/btrc-approved-packages', 'btrc')->name('btrc');
        Route::get('/branches', 'branches')->name('branches');
        Route::get('/board-of-directors', 'BOD')->name('board_of_directors');
        Route::get('/profile-details/{id}', 'profileDetails')->name('profile_details');
        Route::get('/campaign-details/{id}', 'campaignDetails')->name('campaign_details');
        Route::get('/terms-condition', 'termsCondition')->name('terms_condition');
        Route::get('/ramadan-calender', 'ramadanCalender')->name('ramadan_calender');
        Route::get('/clients-review', 'clientsReview')->name('clients_review');
        Route::get('/best-corporate-internet', 'corporateInternet')->name('corporate_internet');
        Route::get('/magic-ip', 'magicIP')->name('magic_ip');


        Route::match(['get', 'post'], '/online-payment', 'onlinePayment')->name('online_payment');
        Route::match(['get', 'post'], '/online-payment/confirm', 'paymantConfirm')->name('online-payment.confirm');
        Route::match(['get', 'post'], '/online-payment/callback/{type}/{orderId}', 'paymentCallback')->name('online-payment.callback');

    });

    Route::post('api/fetch-thanas', [FrontViewController::class, 'fetchThana']);

    Route::post('/check-area', [CoverageCheckController::class, 'checkArea'])->name('check-area');

    Route::controller(PacakgeBuyController::class)->group(function () {
        Route::post('/save-buy-package', 'saveBuyPackage')->name('save_buy_package');;
        Route::get('/success-buy-package', 'successBuyPackage')->name('success_buy_package');
    });

    Route::controller(JobApplyController::class)->group(function () {
        Route::post('/save-job-apply', 'saveJobApply')->name('save_job_apply');
        Route::get('/manage-job-apply', 'manageJobApply')->name('manage_job_apply');
        Route::get('/details-job-apply/{id}', 'detailsJobApply')->name('details_job_apply');
        Route::post('/delete-job-apply', 'deleteJobApply')->name('delete_job_apply');
    });

    Route::controller(AjaxController::class)->name('ajax.')->group(function () {

        //ajax filter
        Route::get('/sort-news-events', 'sortNewsEvent')->name('sort_news_events');
        Route::get('/sort-notice', 'sortNotice')->name('sort_notice');
        Route::get('/sort-employee/{id}', 'sortEmployee')->name('sort_employee');
        Route::get('/sort-branch/{id}', 'sortBranch')->name('sort_branch');
        Route::get('/sort-blog-by-category/{id}', 'sortBlogByCategory')->name('sort_blog_by_category');
        Route::get('/sort-blog-by-tag/{id}', 'sortBlogByTag')->name('sort_blog_by_tag');

        //ajax search
        Route::get('/search-news-events', 'searchNewsEvent')->name('search_news_events');
        Route::get('/search-notice', 'searchNotice')->name('search_notice');
        Route::get('/search-employee', 'searchEmployee')->name('search_employee');
        Route::get('/search-branch', 'searchBranch')->name('search_branch');
        Route::get('/search-blog', 'searchBlog')->name('search_blog');
        Route::get('/search-online-registration-user', 'searchUser')->name('search_user');

    });
});

Route::controller(ContactUsController::class)->group(function () {
    Route::post('contact-us', 'store')->name('contact.us.store');
    Route::get('/manage-contact-message', 'manageContactMessage')->name('admin.manage_contact_message');
    Route::get('/view-contact-message/{id}', 'viewContactMessage')->name('admin.view_contact_message');
    Route::post('/delete-contact-message', 'deleteContactMessage')->name('admin.delete_contact_message');

    Route::post('/save-home-connection-request','saveConnectionForm')->name('save_home_connection_request');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home.dashboard');
    })->name('dashboard');
    Route::middleware(['authorizedoscl'])->group(function () {
        Route::middleware(['authorizedadmin'])->group(function () {
            Route::controller(AdminController::class)->prefix('/admin')->group(function () {
                Route::get('/role/{id}/{newRole}', 'role')->name('role');
                Route::get('/manage-admin', 'manageAdmin')->name('manage_admin');
                Route::get('/edit-admin/{id}', 'editAdmin')->name('edit_admin');
                Route::post('/update-user-name-by-admin', 'updateUserNameByAdmin')->name('update_user_name_by_admin');
                Route::post('/update-user-phone-by-admin', 'updateUserPhoneByAdmin')->name('update_user_phone_by_admin');
                Route::post('/update-user-email-by-admin', 'updateUserEmailByAdmin')->name('update_user_email_by_admin');
                Route::post('/update-user-employee-id-by-admin', 'updateUserEmployeeIDByAdmin')->name('update_user_employee_id_by_admin');
                Route::post('/update-user-photo-by-admin', 'updateUserPhotoByAdmin')->name('update_user_photo_by_admin');
                Route::post('/update-user-password-by-admin', 'updateUserPasswordByAdmin')->name('update_user_password_by_admin');
                Route::post('/update-branch-name-by-admin', 'updateBranchNameByAdmin')->name('update_branch_name_by_admin');
            });
        });

        Route::controller(CMSController::class)->prefix('/admin')->name('admin.')->group(function () {
            Route::get('/common', 'common')->name('common');

            Route::get('/online-payment-check', 'onlinePayment')->name('manage_online_payment');
            Route::get('/home-package-request-check', 'homePackageRequesetCheck')->name('manage_home_package_request');

            Route::get('/add-top-bar', 'addTopBar')->name('add_top_bar');
            Route::post('/save-top-bar', 'saveTopBar')->name('save_top_bar');
            Route::get('/manage-top-bar', 'manageTopBar')->name('manage_top_bar');
            Route::get('/edit-top-bar/{id}', 'editTopBar')->name('edit_top_bar');
            Route::post('/update-top-bar', 'updateTopBar')->name('update_top_bar');

            Route::get('/add-menu', 'addMenu')->name('add_menu');
            Route::post('/save-menu', 'saveMenu')->name('save_menu');
            Route::get('/manage-menu', 'manageMenu')->name('manage_menu');
            Route::get('/edit-menu/{id}', 'editMenu')->name('edit_menu');
            Route::post('/update-menu', 'updateMenu')->name('update_menu');

            Route::get('/add-footer', 'addFooter')->name('add_footer');
            Route::post('/save-footer', 'saveFooter')->name('save_footer');
            Route::get('/manage-footer', 'manageFooter')->name('manage_footer');
            Route::get('/edit-footer/{id}', 'editFooter')->name('edit_footer');
            Route::post('/update-footer', 'updateFooter')->name('update_footer');

            Route::get('/home-page', 'homePage')->name('home_page_menu');

            Route::get('/add-slider', 'addSlider')->name('add_slider');
            Route::post('/save-slider', 'saveSlider')->name('save_slider');
            Route::get('/manage-slider', 'manageSlider')->name('manage_slider');
            Route::get('/edit-slider/{id}', 'editSlider')->name('edit_slider');
            Route::post('/update-slider', 'updateSlider')->name('update_slider');
            Route::post('/delete-slider', 'deleteSlider')->name('delete_slider');

            Route::get('/add-home-about', 'addHomeAbout')->name('add_home_about');
            Route::post('/save-home-about', 'saveHomeAbout')->name('save_home_about');
            Route::get('/manage-home-about', 'manageHomeAbout')->name('manage_home_about');
            Route::get('/edit-home-about/{id}', 'editHomeAbout')->name('edit_home_about');
            Route::post('/update-home-about', 'updateHomeAbout')->name('update_home_about');

            Route::get('/add-home-counter', 'addHomeCounter')->name('add_home_counter');
            Route::post('/save-home-counter', 'saveHomeCounter')->name('save_home_counter');
            Route::get('/manage-home-counter', 'manageHomeCounter')->name('manage_home_counter');
            Route::get('/edit-home-counter/{id}', 'editHomeCounter')->name('edit_home_counter');
            Route::post('/update-home-counter', 'updateHomeCounter')->name('update_home_counter');
            Route::post('/delete-home-counter', 'deleteHomeCounter')->name('delete_home_counter');

            Route::get('/add-home-service', 'addHomeService')->name('add_home_service');
            Route::post('/save-home-service', 'saveHomeService')->name('save_home_service');
            Route::get('/manage-home-service', 'manageHomeService')->name('manage_home_service');
            Route::get('/edit-home-service/{id}', 'editHomeService')->name('edit_home_service');
            Route::post('/update-home-service', 'updateHomeService')->name('update_home_service');
            Route::post('/delete-home-service', 'deleteHomeService')->name('delete_home_service');

            Route::get('/add-home-choose-us', 'addChooseUS')->name('add_home_choose_us');
            Route::post('/save-home-choose-us', 'saveHomeChooseUS')->name('save_home_choose_us');
            Route::get('/manage-home-choose-us', 'manageHomeChooseUS')->name('manage_home_choose_us');
            Route::get('/edit-home-choose-us/{id}', 'editHomeChooseUS')->name('edit_home_choose_us');
            Route::post('/update-home-choose-us', 'updateHomeChooseUS')->name('update_home_choose_us');
            Route::post('/delete-home-choose-us', 'deleteHomeChooseUS')->name('delete_home_choose_us');

            Route::get('/add-faq', 'addFaq')->name('add_faq');
            Route::post('/save-faq', 'saveFaq')->name('save_faq');
            Route::get('/manage-faq', 'manageFaq')->name('manage_faq');
            Route::get('/edit-faq/{id}', 'editFaq')->name('edit_faq');
            Route::post('/update-faq', 'updateFaq')->name('update_faq');
            Route::post('/delete-faq', 'deleteFaq')->name('delete_faq');

            Route::get('/add-testimonial', 'addTestimonial')->name('add_testimonial');
            Route::post('/save-testimonial', 'saveTestimonial')->name('save_testimonial');
            Route::get('/manage-testimonial', 'manageTestimonial')->name('manage_testimonial');
            Route::get('/edit-testimonial/{id}', 'editTestimonial')->name('edit_testimonial');
            Route::post('/update-testimonial', 'updateTestimonial')->name('update_testimonial');
            Route::post('/delete-testimonial', 'deleteTestimonial')->name('delete_testimonial');

            Route::get('/add-home-title-button', 'addTitleButton')->name('add_home_title_button');
            Route::post('/save-home-title-button', 'saveTitleButton')->name('save_home_title_button');
            Route::get('/manage-home-title-button', 'manageTitleButton')->name('manage_home_title_button');
            Route::get('/edit-home-title-button/{id}', 'editTitleButton')->name('edit_home_title_button');
            Route::post('/update-home-title-button', 'updateTitleButton')->name('update_home_title_button');

            Route::get('/who-we-are', 'whoWeAre')->name('who_we_are_menu');

            Route::get('/add-branch-category', 'addBranchCategory')->name('add_branch_category');
            Route::post('/save-branch-category', 'saveBranchCategory')->name('save_branch_category');
            Route::get('/manage-branch-category', 'manageBranchCategory')->name('manage_branch_category');
            Route::get('/edit-branch-category/{id}', 'editBranchCategory')->name('edit_branch_category');
            Route::post('/update-branch-category', 'updateBranchCategory')->name('update_branch_category');
            Route::post('/delete-branch-category', 'deleteBranchCategory')->name('delete_branch_category');

            Route::get('/add-branch', 'addBranch')->name('add_branch');
            Route::post('/save-branch', 'saveBranch')->name('save_branch');
            Route::get('/manage-branch', 'manageBranch')->name('manage_branch');
            Route::get('/edit-branch/{id}', 'editBranch')->name('edit_branch');
            Route::post('/update-branch', 'updateBranch')->name('update_branch');
            Route::post('/delete-branch', 'deleteBranch')->name('delete_branch');

            Route::get('/add-board-of-director', 'addBOD')->name('add_bod');
            Route::post('/save-board-of-director', 'saveBOD')->name('save_bod');
            Route::get('/manage-board-of-director', 'manageBOD')->name('manage_bod');
            Route::get('/edit-board-of-director/{id}', 'editBOD')->name('edit_bod');
            Route::post('/update-board-of-director', 'updateBOD')->name('update_bod');
            Route::post('/delete-board-of-director', 'deleteBOD')->name('delete_bod');

            Route::get('/add-involvement', 'addInvolvement')->name('add_involvement');
            Route::post('/save-involvement', 'saveInvolvement')->name('save_involvement');
            Route::get('/manage-involvement', 'manageInvolvement')->name('manage_involvement');
            Route::get('/edit-involvement/{id}', 'editInvolvement')->name('edit_involvement');
            Route::post('/update-involvement', 'updateInvolvement')->name('update_involvement');
            Route::post('/delete-involvement', 'deleteInvolvement')->name('delete_involvement');

            Route::get('/add-personal-award', 'addPersonalAward')->name('add_personal_award');
            Route::post('/save-personal-award', 'savePersonalAward')->name('save_personal_award');
            Route::get('/manage-personal-award', 'managePersonalAward')->name('manage_personal_award');
            Route::get('/edit-personal-award/{id}', 'editPersonalAward')->name('edit_personal_award');
            Route::post('/update-personal-award', 'updatePersonalAward')->name('update_personal_award');
            Route::post('/delete-personal-award', 'deletePersonalAward')->name('delete_personal_award');

            Route::get('/add-department', 'addDepartment')->name('add_department');
            Route::post('/save-department', 'saveDepartment')->name('save_department');
            Route::get('/manage-department', 'manageDepartment')->name('manage_department');
            Route::get('/edit-department/{id}', 'editDepartment')->name('edit_department');
            Route::post('/update-department', 'updateDepartment')->name('update_department');
            Route::post('/delete-department', 'deleteDepartment')->name('delete_department');

            Route::get('/add-designation', 'addDesignation')->name('add_designation');
            Route::post('/save-designation', 'saveDesignation')->name('save_designation');
            Route::get('/manage-designation', 'manageDesignation')->name('manage_designation');
            Route::get('/edit-designation/{id}', 'editDesignation')->name('edit_designation');
            Route::post('/update-designation', 'updateDesignation')->name('update_designation');
            Route::post('/delete-designation', 'deleteDesignation')->name('delete_designation');

            Route::get('/add-blood-category', 'addBloodCategory')->name('add_blood_category');
            Route::post('/save-blood-category', 'saveBloodCategory')->name('save_blood_category');
            Route::get('/manage-blood-category', 'manageBloodCategory')->name('manage_blood_category');
            Route::get('/edit-blood-category/{id}', 'editBloodCategory')->name('edit_blood_category');
            Route::post('/update-blood-category', 'updateBloodCategory')->name('update_blood_category');
            Route::post('/delete-blood-category', 'deleteBloodCategory')->name('delete_blood_category');

            Route::get('/add-about-top', 'addAboutTop')->name('add_about_top');
            Route::post('/save-about-top', 'saveAboutTop')->name('save_about_top');
            Route::get('/manage-about-top', 'manageAboutTop')->name('manage_about_top');
            Route::get('/edit-about-top/{id}', 'editAboutTop')->name('edit_about_top');
            Route::post('/update-about-top', 'updateAboutTop')->name('update_about_top');

            Route::get('/add-mission', 'addMission')->name('add_mission');
            Route::post('/save-mission', 'saveMission')->name('save_mission');
            Route::get('/manage-mission', 'manageMission')->name('manage_mission');
            Route::get('/edit-mission/{id}', 'editMission')->name('edit_mission');
            Route::post('/update-mission', 'updateMission')->name('update_mission');

            Route::get('/add-vision', 'addVision')->name('add_vision');
            Route::post('/save-vision', 'saveVision')->name('save_vision');
            Route::get('/manage-vision', 'manageVision')->name('manage_vision');
            Route::get('/edit-vision/{id}', 'editVision')->name('edit_vision');
            Route::post('/update-vision', 'updateVision')->name('update_vision');

            Route::get('/add-about-bottom', 'addAboutBottom')->name('add_about_bottom');
            Route::post('/save-about-bottom', 'saveAboutBottom')->name('save_about_bottom');
            Route::get('/manage-about-bottom', 'manageAboutBottom')->name('manage_about_bottom');
            Route::get('/edit-about-bottom/{id}', 'editAboutBottom')->name('edit_about_bottom');
            Route::post('/update-about-bottom', 'updateAboutBottom')->name('update_about_bottom');

            Route::get('/add-skill', 'addSkill')->name('add_skill');
            Route::post('/save-skill', 'saveSkill')->name('save_skill');
            Route::get('/manage-skill', 'manageSkill')->name('manage_skill');
            Route::get('/edit-skill/{id}', 'editSkill')->name('edit_skill');
            Route::post('/update-skill', 'updateSkill')->name('update_skill');


            Route::get('/internet-package', 'internetPackage')->name('internet_package');

            Route::get('/add-package-category', 'addPackageCategory')->name('add_package_category');
            Route::post('/save-package-category', 'savePackageCategory')->name('save_package_category');
            Route::get('/manage-package-category', 'managePackageCategory')->name('manage_package_category');
            Route::get('/edit-package-category/{id}', 'editPackageCategory')->name('edit_package_category');
            Route::post('/update-package-category', 'updatePackageCategory')->name('update_package_category');
            Route::post('/delete-package-category', 'deletePackageCategory')->name('delete_package_category');

            Route::get('/add-package', 'addPackage')->name('add_package');
            Route::post('/save-package', 'savePackage')->name('save_package');
            Route::get('/manage-package', 'managePackage')->name('manage_package');
            Route::get('/edit-package/{id}', 'editPackage')->name('edit_package');
            Route::post('/update-package', 'updatePackage')->name('update_package');
            Route::post('/delete-package', 'deletePackage')->name('delete_package');

            Route::get('/add-area', 'addArea')->name('add_area');
            Route::post('/save-area', 'saveArea')->name('save_area');
            Route::get('/manage-area', 'manageArea')->name('manage_area');
            Route::get('/edit-area/{id}', 'editArea')->name('edit_area');
            Route::post('/update-area', 'updateArea')->name('update_area');
            Route::post('/delete-area', 'deleteArea')->name('delete_area');

            Route::get('/add-client', 'addClient')->name('add_client');
            Route::post('/save-client', 'saveClient')->name('save_client');
            Route::get('/manage-client', 'manageClient')->name('manage_client');
            Route::get('/edit-client/{id}', 'editClient')->name('edit_client');
            Route::post('/update-client', 'updateClient')->name('update_client');
            Route::post('/delete-client', 'deleteClient')->name('delete_client');

            Route::get('/pay-bill', 'payBill')->name('pay_bill');

            Route::get('/add-payment-category', 'addPaymentCategory')->name('add_payment_category');
            Route::post('/save-payment-category', 'savePaymentCategory')->name('save_payment_category');
            Route::get('/manage-payment-category', 'managePaymentCategory')->name('manage_payment_category');
            Route::get('/edit-payment-category/{id}', 'editPaymentCategory')->name('edit_payment_category');
            Route::post('/update-payment-category', 'updatePaymentCategory')->name('update_payment_category');
            Route::post('/delete-payment-category', 'deletePaymentCategory')->name('delete_payment_category');

            Route::get('/add-payment', 'addPayment')->name('add_payment');
            Route::post('/save-payment', 'savePayment')->name('save_payment');
            Route::get('/manage-payment', 'managePayment')->name('manage_payment');
            Route::get('/edit-payment/{id}', 'editPayment')->name('edit_payment');
            Route::post('/update-payment', 'updatePayment')->name('update_payment');
            Route::post('/delete-payment', 'deletePayment')->name('delete_payment');


            Route::get('/add-contact-label', 'addContactlabel')->name('add_contact_label');
            Route::post('/save-contact-label', 'saveContactlabel')->name('save_contact_label');
            Route::get('/manage-contact-label', 'manageContactlabel')->name('manage_contact_label');
            Route::get('/edit-contact-label/{id}', 'editContactlabel')->name('edit_contact_label');
            Route::post('/update-contact-label', 'updateContactlabel')->name('update_contact_label');


            Route::get('/more-page', 'morePage')->name('more_page');

            Route::get('/add-notice', 'addNotice')->name('add_notice');
            Route::post('/save-notice', 'saveNotice')->name('save_notice');
            Route::get('/manage-notice', 'manageNotice')->name('manage_notice');
            Route::get('/edit-notice/{id}', 'editNotice')->name('edit_notice');
            Route::post('/update-notice', 'updateNotice')->name('update_notice');
            Route::post('/delete-notice', 'deleteNotice')->name('delete_notice');

            Route::get('/add-blog-tag', 'addBlogTag')->name('add_blog_tag');
            Route::post('/save-blog-tag', 'saveBlogTag')->name('save_blog_tag');
            Route::get('/manage-blog-tag', 'manageBlogTag')->name('manage_blog_tag');
            Route::get('/edit-blog-tag/{id}', 'editBlogTag')->name('edit_blog_tag');
            Route::post('/update-blog-tag', 'updateBlogTag')->name('update_blog_tag');
            Route::post('/delete-blog-tag', 'deleteBlogTag')->name('delete_blog_tag');

            Route::get('/add-blog-category', 'addBlogCategory')->name('add_blog_category');
            Route::post('/save-blog-category', 'saveBlogCategory')->name('save_blog_category');
            Route::get('/manage-blog-category', 'manageBlogCategory')->name('manage_blog_category');
            Route::get('/edit-blog-category/{id}', 'editBlogCategory')->name('edit_blog_category');
            Route::post('/update-blog-category', 'updateBlogCategory')->name('update_blog_category');
            Route::post('/delete-blog-category', 'deleteBlogCategory')->name('delete_blog_category');

            Route::get('/add-blog', 'addBlog')->name('add_blog');
            Route::post('/save-blog', 'saveBlog')->name('save_blog');
            Route::get('/manage-blog', 'manageBlog')->name('manage_blog');
            Route::get('/edit-blog/{id}', 'editBlog')->name('edit_blog');
            Route::post('/update-blog', 'updateBlog')->name('update_blog');
            Route::post('/delete-blog', 'deleteBlog')->name('delete_blog');

            Route::get('/add-award', 'addAward')->name('add_award');
            Route::post('/save-award', 'saveAward')->name('save_award');
            Route::get('/manage-award', 'manageAward')->name('manage_award');
            Route::get('/edit-award/{id}', 'editAward')->name('edit_award');
            Route::post('/update-award', 'updateAward')->name('update_award');
            Route::post('/delete-award', 'deleteAward')->name('delete_award');

            Route::get('/add-news-event', 'addNewsEvent')->name('add_news_event');
            Route::post('/save-news-event', 'saveNewsEvent')->name('save_news_event');
            Route::get('/manage-news-event', 'manageNewsEvent')->name('manage_news_event');
            Route::get('/edit-news-event/{id}', 'editNewsEvent')->name('edit_news_event');
            Route::post('/update-news-event', 'updateNewsEvent')->name('update_news_event');
            Route::post('/delete-news-event', 'deleteNewsEvent')->name('delete_news_event');

            Route::get('/add-circular', 'addCircular')->name('add_circular');
            Route::post('/save-circular', 'saveCircular')->name('save_circular');
            Route::get('/manage-circular', 'manageCircular')->name('manage_circular');
            Route::get('/edit-circular/{id}', 'editCircular')->name('edit_circular');
            Route::post('/update-circular', 'updateCircular')->name('update_circular');
            Route::post('/delete-circular', 'deleteCircular')->name('delete_circular');

            Route::get('/add-video', 'addVideo')->name('add_video');
            Route::post('/save-video', 'saveVideo')->name('save_video');
            Route::get('/manage-video', 'manageVideo')->name('manage_video');
            Route::get('/edit-video/{id}', 'editVideo')->name('edit_video');
            Route::post('/update-video', 'updateVideo')->name('update_video');
            Route::post('/delete-video', 'deleteVideo')->name('delete_video');

            Route::get('/add-youtube-video', 'addYoutubeVideo')->name('add_youtube_video');
            Route::post('/save-youtube-video', 'saveYoutubeVideo')->name('save_youtube_video');
            Route::get('/manage-youtube-video', 'manageYoutubeVideo')->name('manage_youtube_video');
            Route::get('/edit-youtube-video/{id}', 'editYoutubeVideo')->name('edit_youtube_video');
            Route::post('/update-youtube-video', 'updateYoutubeVideo')->name('update_youtube_video');
            Route::post('/delete-youtube-video', 'deleteYoutubeVideo')->name('delete_youtube_video');

            Route::get('/add-image-category', 'addImageCategory')->name('add_image_category');
            Route::post('/save-image-category', 'saveImageCategory')->name('save_image_category');
            Route::get('/manage-image-category', 'manageImageCategory')->name('manage_image_category');
            Route::get('/edit-image-category/{id}', 'editImageCategory')->name('edit_image_category');
            Route::post('/update-image-category', 'updateImageCategory')->name('update_image_category');
            Route::post('/delete-image-category', 'deleteImageCategory')->name('delete_image_category');

            Route::get('/add-image', 'addImage')->name('add_image');
            Route::post('/save-image', 'saveImage')->name('save_image');
            Route::get('/manage-image', 'manageImage')->name('manage_image');
            Route::get('/edit-image/{id}', 'editImage')->name('edit_image');
            Route::post('/update-image', 'updateImage')->name('update_image');
            Route::post('/delete-image', 'deleteImage')->name('delete_image');

            Route::get('/add-terms-condition', 'addTC')->name('add_tc');
            Route::post('/save-terms-condition', 'saveTC')->name('save_tc');
            Route::get('/manage-terms-condition', 'manageTC')->name('manage_tc');
            Route::get('/edit-terms-condition/{id}', 'editTC')->name('edit_tc');
            Route::post('/update-terms-condition', 'updateTC')->name('update_tc');


            Route::get('/add-clients-review', 'addClientsReview')->name('add_clients_review');
            Route::post('/save-clients-review', 'saveClientsReview')->name('save_clients_review');
            Route::get('/manage-clients-review', 'manageClientsReview')->name('manage_clients_review');
            Route::get('/edit-clients-review/{id}', 'editClientsReview')->name('edit_clients_review');
            Route::post('/update-clients-review', 'updateClientsReview')->name('update_clients_review');
            Route::post('/delete-clients-review', 'deleteClientsReview')->name('delete_clients_review');

            Route::get('/add-corporate-internet', 'addCorporateInternet')->name('add_corporate_internet');
            Route::post('/save-corporate-internet', 'saveCorporateInternet')->name('save_corporate_internet');
            Route::get('/manage-corporate-internet', 'manageCorporateInternet')->name('manage_corporate_internet');
            Route::get('/edit-corporate-internet/{id}', 'editCorporateInternet')->name('edit_corporate_internet');
            Route::post('/update-corporate-internet', 'updateCorporateInternet')->name('update_corporate_internet');

            Route::get('/add-magic-ip', 'addMagicIP')->name('add_magic_ip');
            Route::post('/save-magic-ip', 'saveMagicIP')->name('save_magic_ip');
            Route::get('/manage-magic-ip', 'manageMagicIP')->name('manage_magic_ip');
            Route::get('/edit-magic-ip/{id}', 'editMagicIP')->name('edit_magic_ip');
            Route::post('/update-magic-ip', 'updateMagicIP')->name('update_magic_ip');
        });
        Route::controller(CoverageCheckController::class)->prefix('/admin')->name('admin.')->group(function () {
            Route::get('/coverage-check-menu', 'coverageCheckMenu')->name('coverage_check_menu');

            Route::get('/add-district', 'addDistrict')->name('add_district');
            Route::post('/save-district', 'saveDistrict')->name('save_district');
            Route::get('/manage-district', 'manageDistrict')->name('manage_district');
            Route::get('/edit-district/{id}', 'editDistrict')->name('edit_district');
            Route::post('/update-district', 'updateDistrict')->name('update_district');
            Route::post('/delete-district', 'deleteDistrict')->name('delete_district');

            Route::get('/add-thana', 'addThana')->name('add_thana');
            Route::post('/save-thana', 'saveThana')->name('save_thana');
            Route::get('/manage-thana', 'manageThana')->name('manage_thana');
            Route::get('/edit-thana/{id}', 'editThana')->name('edit_thana');
            Route::post('/update-thana', 'updateThana')->name('update_thana');
            Route::post('/delete-thana', 'deleteThana')->name('delete_thana');

            Route::get('/add-office-information', 'addOfficeInformation')->name('add_office_information');
            Route::post('/save-office-information', 'saveOfficeInformation')->name('save_office_information');
            Route::get('/manage-office-information', 'manageOfficeInformation')->name('manage_office_information');
            Route::get('/edit-office-information/{id}', 'editOfficeInformation')->name('edit_office_information');
            Route::post('/update-office-information', 'updateOfficeInformation')->name('update_office_information');
            Route::post('/delete-office-information', 'deleteOfficeInformation')->name('delete_office_information');

            Route::get('/add-coverage', 'addCoverage')->name('add_coverage');
            Route::post('/save-coverage', 'saveCoverage')->name('save_coverage');
            Route::get('/manage-coverage', 'manageCoverage')->name('manage_coverage');
            Route::get('/edit-coverage/{id}', 'editCoverage')->name('edit_coverage');
            Route::post('/update-coverage', 'updateCoverage')->name('update_coverage');
            Route::post('/delete-coverage', 'deleteCoverage')->name('delete_coverage');
        });
    });
    Route::controller(PacakgeBuyController::class)->group(function () {
        Route::get('/manage-buy-package', 'manageBuyPackage')->name('manage_buy_package');
        Route::get('/pending-connection', 'pendingConnection')->name('pending_connection');
        Route::get('/completed-connection', 'completedConnection')->name('completed_connection');
        Route::get('/status/{id}', 'status')->name('status');
        Route::post('/delete-buy-package', 'deleteBuyPackage')->name('delete_buy_package');
        Route::get('/edit-buy-package/{id}', 'editBuyPackage')->name('edit_buy_package');
        Route::get('/preview-buy-package/{id}', 'previewBuyPackage')->name('preview_buy_package');
        Route::post('/update-buy-package', 'updateBuyPackage')->name('update_buy_package');
        Route::get('/export-package-pdf/{id}', 'exportPackagePdf')->name('export_package_pdf');
        Route::get('/new-registration-send-mail/{id}', 'sendRegistrationEmail')->name('new_registration_send_mail');
        Route::get('/filter-registration', 'filterRegistration')->name('filter_registration');
        Route::get('/filter-pending-registration', 'filterPendingRegistration')->name('filter_pending_registration');
        Route::get('/filter-completed-registration', 'filterCompletedRegistration')->name('filter_completed_registration');
    });
    Route::controller(AdminController::class)->prefix('/admin')->group(function () {
        Route::get('/profile-admin', 'adminProfile')->name('profile_admin');
        Route::get('/pending-user', 'pendingUser')->name('pending_user');
        Route::get('/admin-user', 'adminUser')->name('admin_user');
        Route::get('/viewer-user', 'viewerUser')->name('viewer_user');
        Route::get('/editor-user', 'editorUser')->name('editor_user');
        Route::get('/super-admin-user', 'superAdminUser')->name('super_admin_user');
        Route::delete('/delete-admin/{id}', 'deleteAdmin')->name('delete_admin');
        Route::post('/update-user-name', 'updateUserName')->name('update_user_name');
        Route::post('/update-user-phone', 'updateUserPhone')->name('update_user_phone');
        Route::post('/update-user-email', 'updateUserEmail')->name('update_user_email');
        Route::post('/update-user-employee-id', 'updateUserEmployeeID')->name('update_user_employee_id');
        Route::post('/update-user-photo', 'updateUserPhoto')->name('update_user_photo');
        Route::post('/update-user-password', 'updateUserPassword')->name('update_user_password');
        Route::post('/update-branch-name', 'updateBranchName')->name('update_branch_name');
    });
});

Route::get('/clear', function () {
    \Artisan::call('optimize:clear');
    return redirect()->back();
})->name('clear');
