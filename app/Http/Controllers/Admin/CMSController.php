<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\image;
use App\Models\Award;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BOD;
use App\Models\Branch;
use App\Models\BranchCategory;
use App\Models\Circular;
use App\Models\Client;
use App\Models\ClientsReview;
use App\Models\ContactLabel;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Faq;
use App\Models\Footer;
use App\Models\HomeChooseUs;
use App\Models\HomeService;
use App\Models\homeTitleButton;
use App\Models\ImageCategory;
use App\Models\ImageGallery;
use App\Models\Involvement;
use App\Models\Menu;
use App\Models\Mission;
use App\Models\NewsEvent;
use App\Models\Area;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Payment;
use App\Models\PaymentButtonBanner;
use App\Models\PaymentCategory;
use App\Models\PersonalAward;
use App\Models\Skill;
use App\Models\Slider;
use App\Models\TC;
use App\Models\Testimonial;
use App\Models\Topbar;
use App\Models\Video;
use App\Models\Vision;
use App\Models\YoutubeVideo;
use App\Models\CorporateInternet;
use App\Models\MagicIP;
use App\Models\NewConnectionRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;

require_once app_path('Helper/image.php');

class CMSController extends Controller
{
    public function onlinePayment()
    {
        $payments = DB::table('online_payment')->where('status','success')->orderBy('id', 'desc')->get();
    
        return view('backend.online_payment.index', [
            'payments' => $payments
        ]);
    }

    public function homePackageRequesetCheck()
    {
        $package_request = NewConnectionRequest::orderBy('id', 'desc')->get();
    
        return view('backend.new_connection_request.index', [
            'package_request' => $package_request
        ]);
    }
    

    public function common()
    {
        return view('backend.cms.common.common_menu');
    }
    public function addTopBar()
    {
        return view('backend.cms.common.topbar.show');
    }

    public function saveTopBar(Request $request)
    {
        $topbar = new Topbar();
        $topbar->en_registration_text = $request->en_registration_text;
        $topbar->bn_registration_text = $request->bn_registration_text;
        $topbar->en_brtc = $request->en_brtc;
        $topbar->bn_brtc = $request->bn_brtc;
        $topbar->en_hotline = $request->en_hotline;
        $topbar->bn_hotline = $request->bn_hotline;
        $topbar->query_email = $request->query_email;
        $topbar->fb_link = $request->fb_link;
        $topbar->yt_link = $request->yt_link;
        $topbar->instagram_link = $request->instagram_link;
        $topbar->linkedin_link = $request->linkedin_link;
        $topbar->image = image_upload($request->image);
        $topbar->save();
        return redirect(route('admin.manage_top_bar'))->with('message', 'Successfully Added!');
    }
    public function manageTopBar()
    {
        return view('backend.cms.common.topbar.index', [
            'topbar' => Topbar::all(),
        ]);
    }
    public function editTopBar($id)
    {
        $topbar = Topbar::find($id);

        return view('backend.cms.common.topbar.edit', [
            'topbar' => $topbar
        ]);
    }
    public function updateTopBar(Request $request)
    {
        $topbar               = Topbar::find($request->topbar_id);
        $topbar->en_registration_text = $request->en_registration_text;
        $topbar->bn_registration_text = $request->bn_registration_text;
        $topbar->en_brtc = $request->en_brtc;
        $topbar->bn_brtc = $request->bn_brtc;
        $topbar->en_hotline = $request->en_hotline;
        $topbar->bn_hotline = $request->bn_hotline;
        $topbar->query_email = $request->query_email;
        $topbar->fb_link = $request->fb_link;
        $topbar->yt_link = $request->yt_link;
        $topbar->instagram_link = $request->instagram_link;
        $topbar->linkedin_link = $request->linkedin_link;
        if ($request->file('image')) {
            if (isset($topbar)) {
                delete_image($topbar->image);
                $topbar->delete();
            }
            $topbar->image = image_upload($request->image);
        }
        $topbar->save();
        return redirect(route('admin.manage_top_bar'))->with('message', 'Successfully Updated!');
    }
    public function addMenu()
    {
        return view('backend.cms.common.menu.show');
    }
    public function saveMenu(Request $request)
    {
        $menu = new Menu();
        $menu->en_menu_home = $request->en_menu_home;
        $menu->bn_menu_home = $request->bn_menu_home;
        $menu->en_menu_whoweare_title = $request->en_menu_whoweare_title;
        $menu->bn_menu_whoweare_title = $request->bn_menu_whoweare_title;
        $menu->en_menu_about_us = $request->en_menu_about_us;
        $menu->bn_menu_about_us = $request->bn_menu_about_us;
        $menu->en_menu_branches = $request->en_menu_branches;
        $menu->bn_menu_branches = $request->bn_menu_branches;

        $menu->en_menu_md_profile = $request->en_menu_md_profile;
        $menu->bn_menu_md_profile = $request->bn_menu_md_profile;
        $menu->en_menu_md_message = $request->en_menu_md_message;
        $menu->bn_menu_md_message = $request->bn_menu_md_message;

        $menu->en_menu_chairman_profile = $request->en_menu_chairman_profile;
        $menu->bn_menu_chairman_profile = $request->bn_menu_chairman_profile;
        $menu->en_menu_chairman_message = $request->en_menu_chairman_message;
        $menu->bn_menu_chairman_message = $request->bn_menu_chairman_message;

        $menu->en_menu_ed_profile = $request->en_menu_ed_profile;
        $menu->bn_menu_ed_profile = $request->bn_menu_ed_profile;
        $menu->en_menu_ed_message = $request->en_menu_ed_message;
        $menu->bn_menu_ed_message = $request->bn_menu_ed_message;

        $menu->en_menu_dmd_profile = $request->en_menu_dmd_profile;
        $menu->bn_menu_dmd_profile = $request->bn_menu_dmd_profile;
        $menu->en_menu_dmd_message = $request->en_menu_dmd_message;
        $menu->bn_menu_dmd_message = $request->bn_menu_dmd_message;

        $menu->en_menu_bod = $request->en_menu_bod;
        $menu->bn_menu_bod = $request->bn_menu_bod;
        $menu->en_menu_employee = $request->en_menu_employee;
        $menu->bn_menu_employee = $request->bn_menu_employee;
        $menu->en_menu_internet_plan = $request->en_menu_internet_plan;
        $menu->bn_menu_internet_plan = $request->bn_menu_internet_plan;
        $menu->en_menu_service_title = $request->en_menu_service_title;
        $menu->bn_menu_service_title = $request->bn_menu_service_title;
        $menu->en_menu_internet = $request->en_menu_internet;
        $menu->bn_menu_internet = $request->bn_menu_internet;
        $menu->en_menu_vts = $request->en_menu_vts;
        $menu->bn_menu_vts = $request->bn_menu_vts;
        $menu->en_menu_it = $request->en_menu_it;
        $menu->bn_menu_it = $request->bn_menu_it;
        $menu->en_menu_billpay = $request->en_menu_billpay;
        $menu->bn_menu_billpay = $request->bn_menu_billpay;
        $menu->en_menu_billing_system = $request->en_menu_billing_system;
        $menu->bn_menu_billing_system = $request->bn_menu_billing_system;
        $menu->en_menu_online_pay = $request->en_menu_online_pay;
        $menu->bn_menu_online_pay = $request->bn_menu_online_pay;
        $menu->en_menu_contact_us = $request->en_menu_contact_us;
        $menu->bn_menu_contact_us = $request->bn_menu_contact_us;
        $menu->en_menu_more_title = $request->en_menu_more_title;
        $menu->bn_menu_more_title = $request->bn_menu_more_title;
        $menu->en_menu_blog = $request->en_menu_blog;
        $menu->bn_menu_blog = $request->bn_menu_blog;
        $menu->en_menu_notice = $request->en_menu_notice;
        $menu->bn_menu_notice = $request->bn_menu_notice;
        $menu->en_menu_awards = $request->en_menu_awards;
        $menu->bn_menu_awards = $request->bn_menu_awards;
        $menu->en_menu_gallery = $request->en_menu_gallery;
        $menu->bn_menu_gallery = $request->bn_menu_gallery;
        $menu->en_menu_news_event = $request->en_menu_news_event;
        $menu->bn_menu_news_event = $request->bn_menu_news_event;
        $menu->en_menu_circular = $request->en_menu_circular;
        $menu->bn_menu_circular = $request->bn_menu_circular;
        $menu->en_menu_admin = $request->en_menu_admin;
        $menu->bn_menu_admin = $request->bn_menu_admin;
        $menu->en_tutorial = $request->en_tutorial;
        $menu->bn_tutorial = $request->bn_tutorial;
        $menu->tutorial_link = $request->tutorial_link;

        $menu->image = image_upload($request->image);
        $menu->save();
        return redirect(route('admin.manage_menu'))->with('message', 'Successfully Added!');
    }
    public function manageMenu()
    {
        return view('backend.cms.common.menu.index', [
            'menu' => Menu::all()
        ]);
    }
    public function editMenu($id)
    {
        $menu = Menu::find($id);

        return view('backend.cms.common.menu.edit', [
            'menu' => $menu
        ]);
    }
    public function updateMenu(Request $request)
    {
        $menu               = Menu::find($request->menu_id);
        $menu->en_menu_home = $request->en_menu_home;
        $menu->bn_menu_home = $request->bn_menu_home;
        $menu->en_menu_whoweare_title = $request->en_menu_whoweare_title;
        $menu->bn_menu_whoweare_title = $request->bn_menu_whoweare_title;
        $menu->en_menu_about_us = $request->en_menu_about_us;
        $menu->bn_menu_about_us = $request->bn_menu_about_us;
        $menu->en_menu_branches = $request->en_menu_branches;
        $menu->bn_menu_branches = $request->bn_menu_branches;


        $menu->en_menu_md_profile = $request->en_menu_md_profile;
        $menu->bn_menu_md_profile = $request->bn_menu_md_profile;
        $menu->en_menu_md_message = $request->en_menu_md_message;
        $menu->bn_menu_md_message = $request->bn_menu_md_message;

        $menu->en_menu_chairman_profile = $request->en_menu_chairman_profile;
        $menu->bn_menu_chairman_profile = $request->bn_menu_chairman_profile;
        $menu->en_menu_chairman_message = $request->en_menu_chairman_message;
        $menu->bn_menu_chairman_message = $request->bn_menu_chairman_message;

        $menu->en_menu_ed_profile = $request->en_menu_ed_profile;
        $menu->bn_menu_ed_profile = $request->bn_menu_ed_profile;
        $menu->en_menu_ed_message = $request->en_menu_ed_message;
        $menu->bn_menu_ed_message = $request->bn_menu_ed_message;

        $menu->en_menu_dmd_profile = $request->en_menu_dmd_profile;
        $menu->bn_menu_dmd_profile = $request->bn_menu_dmd_profile;
        $menu->en_menu_dmd_message = $request->en_menu_dmd_message;
        $menu->bn_menu_dmd_message = $request->bn_menu_dmd_message;


        $menu->en_menu_bod = $request->en_menu_bod;
        $menu->bn_menu_bod = $request->bn_menu_bod;
        $menu->en_menu_employee = $request->en_menu_employee;
        $menu->bn_menu_employee = $request->bn_menu_employee;
        $menu->en_menu_internet_plan = $request->en_menu_internet_plan;
        $menu->bn_menu_internet_plan = $request->bn_menu_internet_plan;
        $menu->en_menu_service_title = $request->en_menu_service_title;
        $menu->bn_menu_service_title = $request->bn_menu_service_title;
        $menu->en_menu_internet = $request->en_menu_internet;
        $menu->bn_menu_internet = $request->bn_menu_internet;
        $menu->en_menu_vts = $request->en_menu_vts;
        $menu->bn_menu_vts = $request->bn_menu_vts;
        $menu->en_menu_it = $request->en_menu_it;
        $menu->bn_menu_it = $request->bn_menu_it;
        $menu->en_menu_billpay = $request->en_menu_billpay;
        $menu->bn_menu_billpay = $request->bn_menu_billpay;
        $menu->en_menu_billing_system = $request->en_menu_billing_system;
        $menu->bn_menu_billing_system = $request->bn_menu_billing_system;
        $menu->en_menu_online_pay = $request->en_menu_online_pay;
        $menu->bn_menu_online_pay = $request->bn_menu_online_pay;
        $menu->en_menu_contact_us = $request->en_menu_contact_us;
        $menu->bn_menu_contact_us = $request->bn_menu_contact_us;
        $menu->en_menu_more_title = $request->en_menu_more_title;
        $menu->bn_menu_more_title = $request->bn_menu_more_title;
        $menu->en_menu_blog = $request->en_menu_blog;
        $menu->bn_menu_blog = $request->bn_menu_blog;
        $menu->en_menu_notice = $request->en_menu_notice;
        $menu->bn_menu_notice = $request->bn_menu_notice;
        $menu->en_menu_awards = $request->en_menu_awards;
        $menu->bn_menu_awards = $request->bn_menu_awards;
        $menu->en_menu_gallery = $request->en_menu_gallery;
        $menu->bn_menu_gallery = $request->bn_menu_gallery;
        $menu->en_menu_news_event = $request->en_menu_news_event;
        $menu->bn_menu_news_event = $request->bn_menu_news_event;
        $menu->en_menu_circular = $request->en_menu_circular;
        $menu->bn_menu_circular = $request->bn_menu_circular;
        $menu->en_menu_admin = $request->en_menu_admin;
        $menu->bn_menu_admin = $request->bn_menu_admin;
        $menu->en_tutorial = $request->en_tutorial;
        $menu->bn_tutorial = $request->bn_tutorial;
        $menu->tutorial_link = $request->tutorial_link;
        if ($request->file('image')) {
            if (isset($menu)) {
                delete_image($menu->image);
                $menu->delete();
            }
            $menu->image = image_upload($request->image);
        }
        $menu->save();
        return redirect(route('admin.manage_menu'))->with('message', 'Successfully Updated!');
    }
    public function addFooter()
    {
        return view('backend.cms.common.footer.show');
    }
    public function saveFooter(Request $request)
    {
        $footer = new Footer();
        $footer->en_footer_contact_title = $request->en_footer_contact_title;
        $footer->bn_footer_contact_title = $request->bn_footer_contact_title;
        $footer->en_footer_address = $request->en_footer_address;
        $footer->bn_footer_address = $request->bn_footer_address;
        $footer->en_footer_phone = $request->en_footer_phone;
        $footer->bn_footer_phone = $request->bn_footer_phone;
        $footer->footer_email = $request->footer_email;
        $footer->en_footer_quick_link_title = $request->en_footer_quick_link_title;
        $footer->bn_footer_quick_link_title = $request->bn_footer_quick_link_title;
        $footer->en_footer_map_title = $request->en_footer_map_title;
        $footer->bn_footer_map_title = $request->bn_footer_map_title;
        $footer->footer_map_link = $request->footer_map_link;
        $footer->en_footer_tc = $request->en_footer_tc;
        $footer->bn_footer_tc = $request->bn_footer_tc;
        $footer->app_url = document_upload($request->app_url);
        $footer->image = image_upload($request->image);
        $footer->en_footer_company_profile_title = $request->en_footer_company_profile_title;
        $footer->bn_footer_company_profile_title = $request->bn_footer_company_profile_title;
        $footer->company_profile_url = document_upload($request->company_profile_url);
        $footer->en_footer_copyright = $request->en_footer_copyright;
        $footer->bn_footer_copyright = $request->bn_footer_copyright;
        $footer->save();
        return redirect(route('admin.manage_footer'))->with('message', 'Successfully Added!');
    }
    public function manageFooter()
    {
        return view('backend.cms.common.footer.index', [
            'footer' => Footer::all(),
        ]);
    }
    public function editFooter($id)
    {
        $footer = Footer::find($id);

        return view('backend.cms.common.footer.edit', [
            'footer' => $footer
        ]);
    }
    public function updateFooter(Request $request)
    {
        $footer               = Footer::find($request->footer_id);
        $footer->en_footer_contact_title = $request->en_footer_contact_title;
        $footer->bn_footer_contact_title = $request->bn_footer_contact_title;
        $footer->en_footer_address = $request->en_footer_address;
        $footer->bn_footer_address = $request->bn_footer_address;
        $footer->en_footer_phone = $request->en_footer_phone;
        $footer->bn_footer_phone = $request->bn_footer_phone;
        $footer->footer_email = $request->footer_email;
        $footer->en_footer_quick_link_title = $request->en_footer_quick_link_title;
        $footer->bn_footer_quick_link_title = $request->bn_footer_quick_link_title;
        $footer->en_footer_map_title = $request->en_footer_map_title;
        $footer->bn_footer_map_title = $request->bn_footer_map_title;
        $footer->footer_map_link = $request->footer_map_link;
        $footer->en_footer_tc = $request->en_footer_tc;
        $footer->bn_footer_tc = $request->bn_footer_tc;
        $footer->en_footer_company_profile_title = $request->en_footer_company_profile_title;
        $footer->bn_footer_company_profile_title = $request->bn_footer_company_profile_title;
        $footer->en_footer_copyright = $request->en_footer_copyright;
        $footer->bn_footer_copyright = $request->bn_footer_copyright;
        if ($request->file('app_url')) {
            if (isset($footer)) {
                delete_image($footer->app_url);
                $footer->delete();
            }
            $footer->app_url = document_upload($request->app_url);
        }
        if ($request->file('image')) {
            if (isset($footer)) {
                delete_image($footer->image);
                $footer->delete();
            }
            $footer->image = image_upload($request->image);
        }
        if ($request->file('company_profile_url')) {
            if (isset($footer)) {
                delete_image($footer->company_profile_url);
                $footer->delete();
            }
            $footer->company_profile_url = image_upload($request->company_profile_url);
        }
        $footer->save();
        return redirect(route('admin.manage_footer'))->with('message', 'Successfully Updated!');
    }
    public function addSlider()
    {
        return view('backend.cms.home.slider.show');
    }
    public function saveSlider(Request $request)
    {
        $slider = new Slider();
        $slider->desktop_image = image_upload($request->desktop_image);
        $slider->mobile_image = image_upload($request->mobile_image);
        $slider->en_description = $request->en_description;
        $slider->bn_description = $request->bn_description;
        $slider->offer_last_date = $request->offer_last_date;
        $slider->position = $request->position;
        $slider->website_link = $request->website_link;
        $slider->status = $request->status;
        $slider->save();
        return redirect(route('admin.manage_slider'))->with('message', 'Successfully Added!');
    }
    public function manageSlider()
    {
        return view('backend.cms.home.slider.index', [
            'slider' => Slider::orderBy('position','asc')->get(),
        ]);
    }
    public function editSlider($id)
    {
        $slider = Slider::find($id);

        return view('backend.cms.home.slider.edit', [
            'slider' => $slider
        ]);
    }
    public function updateSlider(Request $request)
    {
        $slider               = Slider::find($request->slider_id);
        $slider->en_description = $request->en_description;
        $slider->bn_description = $request->bn_description;
        $slider->offer_last_date = $request->offer_last_date;
        $slider->position = $request->position;
        $slider->website_link = $request->website_link;
        $slider->status = $request->status;
        if ($request->file('desktop_image')) {
            if (isset($slider)) {
                delete_image($slider->desktop_image);
                $slider->delete();
            }
            $slider->desktop_image = image_upload($request->desktop_image);
        }
        if ($request->file('mobile_image')) {
            if (isset($slider)) {
                delete_image($slider->mobile_image);
                $slider->delete();
            }
            $slider->mobile_image = image_upload($request->mobile_image);
        }
        $slider->save();
        return redirect(route('admin.manage_slider'))->with('message', 'Successfully Updated!');
    }
    public function deleteSlider(Request $request)
    {
        $slider = Slider::find($request->slider_id);

        if (isset($slider)) {
            delete_image($slider->desktop_image);
            $slider->delete();
        }
        if (isset($slider)) {
            delete_image($slider->mobile_image);
            $slider->delete();
        }
        $slider->delete();

        return redirect()->route('admin.manage_slider')->with('message', 'Successfully Deleted!');
    }
    public function homePage()
    {
        return view('backend.cms.home.home_page_menu');
    }

    public function whoWeAre()
    {
        return view('backend.cms.who_we_are.who_we_are_menu');
    }

    public function addBranchCategory()
    {
        return view('backend.cms.who_we_are.branch_category.show');
    }
    public function saveBranchCategory(Request $request)
    {
        $branch_category = new BranchCategory();
        $branch_category->en_title = $request->en_title;
        $branch_category->bn_title = $request->bn_title;
        $branch_category->status = $request->status;
        $branch_category->save();
        return redirect(route('admin.manage_branch_category'))->with('message', 'Successfully Added!');
    }
    public function manageBranchCategory()
    {
        return view('backend.cms.who_we_are.branch_category.index', [
            'branch_category' => BranchCategory::get(),
        ]);
    }
    public function editBranchCategory($id)
    {
        $branch_category = BranchCategory::find($id);

        return view('backend.cms.who_we_are.branch_category.edit', [
            'branch_category' => $branch_category
        ]);
    }
    public function updateBranchCategory(Request $request)
    {
        $branch_category               = BranchCategory::find($request->branch_category_id);
        $branch_category->en_title = $request->en_title;
        $branch_category->bn_title = $request->bn_title;
        $branch_category->status = $request->status;
        $branch_category->save();
        return redirect(route('admin.manage_branch_category'))->with('message', 'Successfully Updated!');
    }

    public function deleteBranchCategory(Request $request)
    {
        $branch_category = BranchCategory::find($request->branch_category_id);

        if (!$branch_category) {
            return redirect()->route('admin.manage_branch_category')->with('error', 'Branch Category not found.');
        }

        $branch_category->delete();

        return redirect()->route('admin.manage_branch_category')->with('message', 'Successfully Deleted!');
    }

    public function addBranch()
    {
        return view('backend.cms.who_we_are.branch.show',[
            'category' => BranchCategory::where('status', 1)->get(),
        ]);
    }
    public function saveBranch(Request $request)
    {
        $branch = new Branch();
        $branch->branch_category_id = $request->branch_category_id;
        $branch->en_branch_name = $request->en_branch_name;
        $branch->bn_branch_name = $request->bn_branch_name;
        $branch->en_address = $request->en_address;
        $branch->bn_address = $request->bn_address;
        $branch->en_phone = $request->en_phone;
        $branch->bn_phone = $request->bn_phone;
        $branch->call_phone = $request->call_phone;
        $branch->image = image_upload_branch($request->image);
        $branch->status = $request->status;
        $branch->save();
        return redirect(route('admin.manage_branch'))->with('message', 'Successfully Added!');
    }
    public function manageBranch()
    {
        return view('backend.cms.who_we_are.branch.index', [
            'branch' => Branch::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editBranch($id)
    {
        $branch = Branch::find($id);

        return view('backend.cms.who_we_are.branch.edit', [
            'category' => BranchCategory::where('status', 1)->get(),
            'branch' => $branch
        ]);
    }
    public function updateBranch(Request $request)
    {
        $branch               = Branch::find($request->branch_id);
        $branch->branch_category_id = $request->branch_category_id;
        $branch->en_branch_name = $request->en_branch_name;
        $branch->bn_branch_name = $request->bn_branch_name;
        $branch->en_address = $request->en_address;
        $branch->bn_address = $request->bn_address;
        $branch->en_phone = $request->en_phone;
        $branch->bn_phone = $request->bn_phone;
        $branch->call_phone = $request->call_phone;
        if ($request->file('image')) {
            if (isset($branch)) {
                delete_image($branch->image);
                $branch->delete();
            }
            $branch->image = image_upload_branch($request->image);
        }
        $branch->status = $request->status;
        $branch->save();
        return redirect(route('admin.manage_branch'))->with('message', 'Successfully Updated!');
    }

    public function deleteBranch(Request $request)
    {
        $branch = Branch::find($request->branch_id);

        if (isset($branch)) {
            delete_image($branch->image);
            $branch->delete();
        }
        $branch->delete();

        return redirect()->route('admin.manage_branch')->with('message', 'Successfully Deleted!');
    }

    public function addBOD()
    {
        return view('backend.cms.who_we_are.bod.show', [
            'department' => Department::where('status', 1)->get(),
            'designation' => Designation::where('status', 1)->get(),
        ]);
    }
    public function saveBOD(Request $request)
    {
        $bod = new BOD();
        $bod->department_id = $request->department_id;
        $bod->designation_id = $request->designation_id;
        $bod->en_name = $request->en_name;
        $bod->bn_name = $request->bn_name;
        $bod->en_description = $request->en_description;
        $bod->bn_description = $request->bn_description;
        $bod->image = image_upload($request->image);
        $bod->status = $request->status;
        $bod->save();
        return redirect(route('admin.manage_bod'))->with('message', 'Successfully Added!');
    }
    public function manageBOD()
    {
        return view('backend.cms.who_we_are.bod.index', [
            'bod' => BOD::get(),
        ]);
    }
    public function editBOD($id)
    {
        $bod = BOD::find($id);

        return view('backend.cms.who_we_are.bod.edit', [
            'department' => Department::where('status', 1)->get(),
            'designation' => Designation::where('status', 1)->get(),
            'bod' => $bod
        ]);
    }
    public function updateBOD(Request $request)
    {
        $bod               = BOD::find($request->bod_id);
        $bod->department_id = $request->department_id;
        $bod->designation_id = $request->designation_id;
        $bod->en_name = $request->en_name;
        $bod->bn_name = $request->bn_name;
        $bod->en_description = $request->en_description;
        $bod->bn_description = $request->bn_description;
        if ($request->file('image')) {
            if (isset($bod)) {
                delete_image($bod->image);
                $bod->delete();
            }
            $bod->image = image_upload($request->image);
        }
        $bod->status = $request->status;
        $bod->save();
        return redirect(route('admin.manage_bod'))->with('message', 'Successfully Updated!');
    }

    public function deleteBOD(Request $request)
    {
        $bod = BOD::find($request->bod_id);

        if (isset($bod)) {
            delete_image($bod->image);
            $bod->delete();
        }
        $bod->delete();

        return redirect()->route('admin.manage_bod')->with('message', 'Successfully Deleted!');
    }

    public function addInvolvement()
    {
        return view('backend.cms.who_we_are.involvement.show', [
            'bod' => BOD::where('status', 1)->get(),
        ]);
    }
    public function saveInvolvement(Request $request)
    {
        $involvement = new Involvement();
        $involvement->bod_id = $request->bod_id;
        $involvement->en_company_name = $request->en_company_name;
        $involvement->bn_company_name = $request->bn_company_name;
        $involvement->en_designation = $request->en_designation;
        $involvement->bn_designation = $request->bn_designation;
        $involvement->en_description = $request->en_description;
        $involvement->bn_description = $request->bn_description;
        $involvement->en_year_from = $request->en_year_from;
        $involvement->bn_year_from = $request->bn_year_from;
        $involvement->en_year_to = $request->en_year_to;
        $involvement->bn_year_to = $request->bn_year_to;
        $involvement->status = $request->status;
        $involvement->save();
        return redirect(route('admin.manage_involvement'))->with('message', 'Successfully Added!');
    }
    public function manageInvolvement()
    {
        return view('backend.cms.who_we_are.involvement.index', [
            'involvement' => Involvement::get(),
        ]);
    }
    public function editInvolvement($id)
    {
        $involvement = Involvement::find($id);

        return view('backend.cms.who_we_are.involvement.edit', [
            'bod' => BOD::where('status', 1)->get(),
            'involvement' => $involvement
        ]);
    }
    public function updateInvolvement(Request $request)
    {
        $involvement               = Involvement::find($request->involvement_id);
        $involvement->bod_id = $request->bod_id;
        $involvement->en_company_name = $request->en_company_name;
        $involvement->bn_company_name = $request->bn_company_name;
        $involvement->en_designation = $request->en_designation;
        $involvement->bn_designation = $request->bn_designation;
        $involvement->en_description = $request->en_description;
        $involvement->bn_description = $request->bn_description;
        $involvement->en_year_from = $request->en_year_from;
        $involvement->bn_year_from = $request->bn_year_from;
        $involvement->en_year_to = $request->en_year_to;
        $involvement->bn_year_to = $request->bn_year_to;
        $involvement->status = $request->status;
        $involvement->save();
        return redirect(route('admin.manage_involvement'))->with('message', 'Successfully Updated!');
    }

    public function deleteInvolvement(Request $request)
    {
        $involvement = Involvement::find($request->involvement_id);

        if (!$involvement) {
            return redirect()->route('admin.manage_involvement')->with('error', 'Involvement not found.');
        }
        $involvement->delete();

        return redirect()->route('admin.manage_involvement')->with('message', 'Successfully Deleted!');
    }

    public function addPersonalAward()
    {
        return view('backend.cms.who_we_are.award.show', [
            'bod' => BOD::where('status', 1)->get()
        ]);
    }
    public function savePersonalAward(Request $request)
    {
        $personal_award = new PersonalAward();
        $personal_award->bod_id = $request->bod_id;
        $personal_award->en_title = $request->en_title;
        $personal_award->bn_title = $request->bn_title;
        $personal_award->en_description = $request->en_description;
        $personal_award->bn_description = $request->bn_description;
        $personal_award->status = $request->status;
        $personal_award->image = image_upload($request->image);
        $personal_award->save();
        return redirect(route('admin.manage_personal_award'))->with('message', 'Successfully Added!');
    }
    public function managePersonalAward()
    {
        return view('backend.cms.who_we_are.award.index', [
            'personal_award' => PersonalAward::get(),
        ]);
    }
    public function editPersonalAward($id)
    {
        $personal_award = PersonalAward::find($id);

        return view('backend.cms.who_we_are.award.edit', [
            'bod' => BOD::where('status', 1)->get(),
            'personal_award' => $personal_award
        ]);
    }
    public function updatePersonalAward(Request $request)
    {
        $personal_award               = PersonalAward::find($request->personal_award_id);
        $personal_award->bod_id = $request->bod_id;
        $personal_award->en_title = $request->en_title;
        $personal_award->bn_title = $request->bn_title;
        $personal_award->en_description = $request->en_description;
        $personal_award->bn_description = $request->bn_description;

        $personal_award->status = $request->status;
        if ($request->file('image')) {
            if (isset($personal_award)) {
                delete_image($personal_award->image);
                $personal_award->delete();
            }
            $personal_award->image = image_upload($request->image);
        }
        $personal_award->save();
        return redirect(route('admin.manage_personal_award'))->with('message', 'Successfully Updated!');
    }
    public function deletePersonalAward(Request $request)
    {
        $personal_award = PersonalAward::find($request->personal_award_id);

        if (isset($personal_award)) {
            delete_image($personal_award->image);
            $personal_award->delete();
        }

        $personal_award->delete();

        return redirect()->route('admin.manage_personal_award')->with('message', 'Successfully Deleted!');
    }


    public function addDepartment()
    {
        return view('backend.cms.who_we_are.department.show');
    }
    public function saveDepartment(Request $request)
    {
        $department = new Department();
        $department->en_name = $request->en_name;
        $department->bn_name = $request->bn_name;
        $department->status = $request->status;
        $department->save();
        return redirect(route('admin.manage_department'))->with('message', 'Successfully Added!');
    }
    public function manageDepartment()
    {
        return view('backend.cms.who_we_are.department.index', [
            'department' => Department::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editDepartment($id)
    {
        $department = Department::find($id);

        return view('backend.cms.who_we_are.department.edit', [
            'department' => $department
        ]);
    }
    public function updateDepartment(Request $request)
    {
        $department               = Department::find($request->department_id);
        $department->en_name = $request->en_name;
        $department->bn_name = $request->bn_name;
        $department->status = $request->status;
        $department->save();
        return redirect(route('admin.manage_department'))->with('message', 'Successfully Updated!');
    }

    public function deleteDepartment(Request $request)
    {
        $department = Department::find($request->department_id);

        if (!$department) {
            return redirect()->route('admin.manage_department')->with('error', 'Department not found.');
        }
        $department->delete();

        return redirect()->route('admin.manage_department')->with('message', 'Successfully Deleted!');
    }

    public function addDesignation()
    {
        return view('backend.cms.who_we_are.designation.show');
    }
    public function saveDesignation(Request $request)
    {
        $designation = new Designation();
        $designation->en_name = $request->en_name;
        $designation->bn_name = $request->bn_name;
        $designation->status = $request->status;
        $designation->save();
        return redirect(route('admin.manage_designation'))->with('message', 'Successfully Added!');
    }
    public function manageDesignation()
    {
        return view('backend.cms.who_we_are.designation.index', [
            'designation' => Designation::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editDesignation($id)
    {
        $designation = Designation::find($id);

        return view('backend.cms.who_we_are.designation.edit', [
            'designation' => $designation
        ]);
    }
    public function updateDesignation(Request $request)
    {
        $designation               = Designation::find($request->designation_id);
        $designation->en_name = $request->en_name;
        $designation->bn_name = $request->bn_name;
        $designation->status = $request->status;
        $designation->save();
        return redirect(route('admin.manage_designation'))->with('message', 'Successfully Updated!');
    }

    public function deleteDesignation(Request $request)
    {
        $designation = Designation::find($request->designation_id);

        if (!$designation) {
            return redirect()->route('admin.manage_designation')->with('error', 'Designation not found.');
        }
        $designation->delete();

        return redirect()->route('admin.manage_designation')->with('message', 'Successfully Deleted!');
    }

    public function addMission()
    {
        return view('backend.cms.who_we_are.about.mission.show');
    }
    public function saveMission(Request $request)
    {
        $mission = new Mission();

        $mission->en_title = $request->en_title;
        $mission->bn_title = $request->bn_title;
        $mission->en_description = $request->en_description;
        $mission->bn_description = $request->bn_description;
        $mission->image = image_upload($request->image);
        $mission->save();
        return redirect(route('admin.manage_mission'))->with('message', 'Successfully Added!');
    }
    public function manageMission()
    {
        return view('backend.cms.who_we_are.about.mission.index', [
            'mission' => Mission::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editMission($id)
    {
        $mission = Mission::find($id);

        return view('backend.cms.who_we_are.about.mission.edit', [
            'mission' => $mission
        ]);
    }
    public function updateMission(Request $request)
    {
        $mission               = Mission::find($request->mission_id);
        $mission->en_title = $request->en_title;
        $mission->bn_title = $request->bn_title;
        $mission->en_description = $request->en_description;
        $mission->bn_description = $request->bn_description;

        if ($request->file('image')) {
            if (isset($mission)) {
                delete_image($mission->image);
                $mission->delete();
            }
            $mission->image = image_upload($request->image);
        }
        $mission->save();
        return redirect(route('admin.manage_mission'))->with('message', 'Successfully Updated!');
    }

    public function addVision()
    {
        return view('backend.cms.who_we_are.about.vision.show');
    }
    public function saveVision(Request $request)
    {
        $vision = new Vision();

        $vision->en_title = $request->en_title;
        $vision->bn_title = $request->bn_title;
        $vision->en_description = $request->en_description;
        $vision->bn_description = $request->bn_description;
        $vision->image = image_upload($request->image);
        $vision->save();
        return redirect(route('admin.manage_vision'))->with('message', 'Successfully Added!');
    }
    public function manageVision()
    {
        return view('backend.cms.who_we_are.about.vision.index', [
            'vision' => Vision::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editVision($id)
    {
        $vision = Vision::find($id);

        return view('backend.cms.who_we_are.about.vision.edit', [
            'vision' => $vision
        ]);
    }
    public function updateVision(Request $request)
    {
        $vision               = Vision::find($request->vision_id);
        $vision->en_title = $request->en_title;
        $vision->bn_title = $request->bn_title;
        $vision->en_description = $request->en_description;
        $vision->bn_description = $request->bn_description;

        if ($request->file('image')) {
            if (isset($vision)) {
                delete_image($vision->image);
                $vision->delete();
            }
            $vision->image = image_upload($request->image);
        }
        $vision->save();
        return redirect(route('admin.manage_vision'))->with('message', 'Successfully Updated!');
    }

    public function addSkill()
    {
        return view('backend.cms.who_we_are.about.skill.show');
    }
    public function saveSkill(Request $request)
    {
        $skill = new Skill();

        $skill->en_title = $request->en_title;
        $skill->bn_title = $request->bn_title;
        $skill->en_corporate_internet = $request->en_corporate_internet;
        $skill->bn_corporate_internet = $request->bn_corporate_internet;
        $skill->en_corporate_internet_percentage = $request->en_corporate_internet_percentage;
        $skill->bn_corporate_internet_percentage = $request->bn_corporate_internet_percentage;

        $skill->en_home_internet = $request->en_home_internet;
        $skill->bn_home_internet = $request->bn_home_internet;
        $skill->en_home_internet_percentage = $request->en_home_internet_percentage;
        $skill->bn_home_internet_percentage = $request->bn_home_internet_percentage;

        $skill->en_customer_support = $request->en_customer_support;
        $skill->bn_customer_support = $request->bn_customer_support;
        $skill->en_customer_support_percentage = $request->en_customer_support_percentage;
        $skill->bn_customer_support_percentage = $request->bn_customer_support_percentage;

        $skill->en_vts = $request->en_vts;
        $skill->bn_vts = $request->bn_vts;
        $skill->en_vts_percentage = $request->en_vts_percentage;
        $skill->en_vts_percentage = $request->en_vts_percentage;

        $skill->en_training = $request->en_training;
        $skill->bn_training = $request->bn_training;
        $skill->en_training_percentage = $request->en_training_percentage;
        $skill->bn_training_percentage = $request->bn_training_percentage;
        $skill->image = image_upload($request->image);
        $skill->save();
        return redirect(route('admin.manage_skill'))->with('message', 'Successfully Added!');
    }
    public function manageSkill()
    {
        return view('backend.cms.who_we_are.about.skill.index', [
            'skill' => Skill::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editSkill($id)
    {
        $skill = Skill::find($id);

        return view('backend.cms.who_we_are.about.skill.edit', [
            'skill' => $skill
        ]);
    }
    public function updateSkill(Request $request)
    {
        $skill               = Skill::find($request->skill_id);
        $skill->en_title = $request->en_title;
        $skill->bn_title = $request->bn_title;
        $skill->en_corporate_internet = $request->en_corporate_internet;
        $skill->bn_corporate_internet = $request->bn_corporate_internet;
        $skill->en_corporate_internet_percentage = $request->en_corporate_internet_percentage;
        $skill->bn_corporate_internet_percentage = $request->bn_corporate_internet_percentage;

        $skill->en_home_internet = $request->en_home_internet;
        $skill->bn_home_internet = $request->bn_home_internet;
        $skill->en_home_internet_percentage = $request->en_home_internet_percentage;
        $skill->bn_home_internet_percentage = $request->bn_home_internet_percentage;

        $skill->en_customer_support = $request->en_customer_support;
        $skill->bn_customer_support = $request->bn_customer_support;
        $skill->en_customer_support_percentage = $request->en_customer_support_percentage;
        $skill->bn_customer_support_percentage = $request->bn_customer_support_percentage;

        $skill->en_vts = $request->en_vts;
        $skill->bn_vts = $request->bn_vts;
        $skill->en_vts_percentage = $request->en_vts_percentage;
        $skill->bn_vts_percentage = $request->bn_vts_percentage;

        $skill->en_training = $request->en_training;
        $skill->bn_training = $request->bn_training;
        $skill->en_training_percentage = $request->en_training_percentage;
        $skill->bn_training_percentage = $request->bn_training_percentage;

        if ($request->file('image')) {
            if (isset($image)) {
                delete_image($image->image);
                $image->delete();
            }
            $skill->image = image_upload($request->image);
        }
        $skill->save();
        return redirect(route('admin.manage_skill'))->with('message', 'Successfully Updated!');
    }

    public function internetPackage()
    {
        return view('backend.cms.package.internet_package');
    }

    public function addPackageCategory()
    {
        return view('backend.cms.package_category.show');
    }
    public function savePackageCategory(Request $request)
    {
        $package_category = new PackageCategory();
        $package_category->en_title = $request->en_title;
        $package_category->bn_title = $request->bn_title;
        $package_category->status = $request->status;
        $package_category->save();
        return redirect(route('admin.manage_package_category'))->with('message', 'Successfully Added!');
    }
    public function managePackageCategory()
    {
        return view('backend.cms.package_category.index', [
            'package_category' => PackageCategory::get(),
        ]);
    }
    public function editPackageCategory($id)
    {
        $package_category = PackageCategory::find($id);

        return view('backend.cms.package_category.edit', [
            'package_category' => $package_category
        ]);
    }
    public function updatePackageCategory(Request $request)
    {
        $package_category               = PackageCategory::find($request->package_category_id);
        $package_category->en_title = $request->en_title;
        $package_category->bn_title = $request->bn_title;
        $package_category->status = $request->status;
        $package_category->save();
        return redirect(route('admin.manage_package_category'))->with('message', 'Successfully Updated!');
    }

    public function deletePackageCategory(Request $request)
    {
        $package_category = PackageCategory::find($request->package_category_id);

        if (!$package_category) {
            return redirect()->route('admin.manage_package_category')->with('error', 'Package Category not found.');
        }

        $package_category->delete();

        return redirect()->route('admin.manage_package_category')->with('message', 'Successfully Deleted!');
    }

    public function addPackage()
    {
        return view('backend.cms.package.show', [
            'category' => PackageCategory::where('status', 1)->get(),
        ]);
    }
    public function savePackage(Request $request)
    {
        $package = new Package();
        $package->package_category_id = $request->package_category_id;
        $package->en_package_name = $request->en_package_name;
        $package->bn_package_name = $request->bn_package_name;
        $package->en_amount_label = $request->en_amount_label;
        $package->bn_amount_label = $request->bn_amount_label;
        $package->en_amount = $request->en_amount;
        $package->bn_amount = $request->bn_amount;
        $package->en_mbps_value = $request->en_mbps_value;
        $package->bn_mbps_value = $request->bn_mbps_value;
        $package->en_short_info_one = $request->en_short_info_one;
        $package->bn_short_info_one = $request->bn_short_info_one;
        $package->en_short_info_two = $request->en_short_info_two;
        $package->bn_short_info_two = $request->bn_short_info_two;
        $package->en_short_info_three = $request->en_short_info_three;
        $package->bn_short_info_three = $request->bn_short_info_three;
        $package->en_short_info_four = $request->en_short_info_four;
        $package->bn_short_info_four = $request->bn_short_info_four;
        $package->en_short_info_five = $request->en_short_info_five;
        $package->bn_short_info_five = $request->bn_short_info_five;
        $package->en_short_info_six = $request->en_short_info_six;
        $package->bn_short_info_six = $request->bn_short_info_six;
        $package->en_short_info_seven = $request->en_short_info_seven;
        $package->bn_short_info_seven = $request->bn_short_info_seven;
        $package->en_short_info_eight = $request->en_short_info_eight;
        $package->bn_short_info_eight = $request->bn_short_info_eight;
        $package->en_short_info_nine = $request->en_short_info_nine;
        $package->bn_short_info_nine = $request->bn_short_info_nine;
        $package->en_short_info_ten = $request->en_short_info_ten;
        $package->bn_short_info_ten = $request->bn_short_info_ten;
        $package->en_button_text = $request->en_button_text;
        $package->bn_button_text = $request->bn_button_text;
        $package->en_otc_amount = $request->en_otc_amount;
        $package->en_otc_amount = $request->en_otc_amount;
        $package->bn_discount_otc = $request->bn_discount_otc;
        $package->bn_discount_otc = $request->bn_discount_otc;
        $package->en_discount_monthly_fee = $request->en_discount_monthly_fee;
        $package->bn_discount_monthly_fee = $request->bn_discount_monthly_fee;
        $package->top_package = $request->top_package;
        $package->status = $request->status;
        $package->save();
        return redirect(route('admin.manage_package'))->with('message', 'Successfully Added!');
    }
    public function managePackage()
    {
        return view('backend.cms.package.index', [
            'home_package' => Package::where('package_category_id', 1)->get(),
            'sme_package' => Package::where('package_category_id', 2)->get(),
            'corporate_package' => Package::where('package_category_id', 3)->get(),
        ]);
    }
    public function editPackage($id)
    {
        $package = Package::find($id);

        return view('backend.cms.package.edit', [
            'category' => PackageCategory::where('status', 1)->get(),
            'package' => $package
        ]);
    }
    public function updatePackage(Request $request)
    {
        $package               = Package::find($request->package_id);
        $package->package_category_id = $request->package_category_id;
        $package->en_package_name = $request->en_package_name;
        $package->bn_package_name = $request->bn_package_name;
        $package->en_amount_label = $request->en_amount_label;
        $package->bn_amount_label = $request->bn_amount_label;
        $package->en_amount = $request->en_amount;
        $package->bn_amount = $request->bn_amount;
        $package->en_mbps_value = $request->en_mbps_value;
        $package->bn_mbps_value = $request->bn_mbps_value;
        $package->en_short_info_one = $request->en_short_info_one;
        $package->bn_short_info_one = $request->bn_short_info_one;
        $package->en_short_info_two = $request->en_short_info_two;
        $package->bn_short_info_two = $request->bn_short_info_two;
        $package->en_short_info_three = $request->en_short_info_three;
        $package->bn_short_info_three = $request->bn_short_info_three;
        $package->en_short_info_four = $request->en_short_info_four;
        $package->bn_short_info_four = $request->bn_short_info_four;
        $package->en_short_info_five = $request->en_short_info_five;
        $package->bn_short_info_five = $request->bn_short_info_five;
        $package->en_short_info_six = $request->en_short_info_six;
        $package->bn_short_info_six = $request->bn_short_info_six;
        $package->en_short_info_seven = $request->en_short_info_seven;
        $package->bn_short_info_seven = $request->bn_short_info_seven;
        $package->en_short_info_eight = $request->en_short_info_eight;
        $package->bn_short_info_eight = $request->bn_short_info_eight;
        $package->en_short_info_nine = $request->en_short_info_nine;
        $package->bn_short_info_nine = $request->bn_short_info_nine;
        $package->en_short_info_ten = $request->en_short_info_ten;
        $package->bn_short_info_ten = $request->bn_short_info_ten;
        $package->en_button_text = $request->en_button_text;
        $package->bn_button_text = $request->bn_button_text;
        $package->en_otc_amount = $request->en_otc_amount;
        $package->bn_otc_amount = $request->bn_otc_amount;
        $package->en_discount_otc = $request->en_discount_otc;
        $package->bn_discount_otc = $request->bn_discount_otc;
        $package->en_discount_monthly_fee = $request->en_discount_monthly_fee;
        $package->bn_discount_monthly_fee = $request->bn_discount_monthly_fee;
        $package->top_package = $request->top_package;
        $package->status = $request->status;
        $package->save();
        return redirect(route('admin.manage_package'))->with('message', 'Successfully Updated!');
    }

    public function deletePackage(Request $request)
    {
        $package = Package::find($request->package_id);

        if (!$package) {
            return redirect()->route('admin.manage_package')->with('error', 'Package not found.');
        }

        $package->delete();

        return redirect()->route('admin.manage_package')->with('message', 'Successfully Deleted!');
    }

    public function addArea(){
        return view('backend.cms.area.show');
    }

    public function saveArea(Request $request){
        $area = new Area();
        $area->en_area_name = $request->en_area_name;
        $area->status = $request->status;
        $area->save();
        return redirect(route('admin.manage_area'))->with('message', 'Successfully Added!');
    }

    public function manageArea(){
        return view('backend.cms.area.index',[
            'area' => Area::orderBy('id','asc')->get()
        ]);
    }

    public function editArea($id){
        $area = Area::find($id);
        return view('backend.cms.area.edit',[
            'area' => $area
        ]);
    }

    public function updateArea(Request $request){
        $area               = Area::find($request->area_id);
        $area->en_area_name = $request->en_area_name;
        $area->status = $request->status;
        $area->save();
        return redirect(route('admin.manage_area'))->with('message', 'Successfully Updated!');
    }

    public function deleteArea(Request $request)
    {
        $area = Area::find($request->area_id);
        $area->delete();

        return redirect()->route('admin.manage_area')->with('message', 'Successfully Deleted!');
    }

    public function addHomeService()
    {
        return view('backend.cms.home.service.show');
    }
    public function saveHomeService(Request $request)
    {
        $home_service = new HomeService();
        $home_service->en_title = $request->en_title;
        $home_service->bn_title = $request->bn_title;
        $home_service->en_description = $request->en_description;
        $home_service->bn_description = $request->bn_description;
        $home_service->en_button_text = $request->en_button_text;
        $home_service->bn_button_text = $request->bn_button_text;
        $home_service->status = $request->status;
        $home_service->url = $request->url;
        $home_service->image = image_upload($request->image);
        $home_service->save();
        return redirect(route('admin.manage_home_service'))->with('message', 'Successfully Added!');
    }
    public function manageHomeService()
    {
        return view('backend.cms.home.service.index', [
            'home_service' => HomeService::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editHomeService($id)
    {
        $home_service = HomeService::find($id);

        return view('backend.cms.home.service.edit', [
            'home_service' => $home_service
        ]);
    }
    public function updateHomeService(Request $request)
    {
        $home_service               = HomeService::find($request->home_service_id);
        $home_service->en_title = $request->en_title;
        $home_service->bn_title = $request->bn_title;
        $home_service->en_description = $request->en_description;
        $home_service->bn_description = $request->bn_description;
        $home_service->en_button_text = $request->en_button_text;
        $home_service->bn_button_text = $request->bn_button_text;
        $home_service->status = $request->status;
        $home_service->url = $request->url;
        if ($request->file('image')) {
            if (isset($home_service)) {
                delete_image($home_service->image);
                $home_service->delete();
            }
            $home_service->image = image_upload($request->image);
        }
        $home_service->save();
        return redirect(route('admin.manage_home_service'))->with('message', 'Successfully Updated!');
    }
    public function deleteHomeService(Request $request)
    {
        $home_service = HomeService::find($request->home_service_id);

        if (isset($home_service)) {
            delete_image($home_service->image);
            $home_service->delete();
        }
        $home_service->delete();

        return redirect()->route('admin.manage_home_service')->with('message', 'Successfully Deleted!');
    }

    public function addChooseUS()
    {
        return view('backend.cms.who_we_are.about.choose_us.show');
    }
    public function saveHomeChooseUS(Request $request)
    {
        $home_choose_us = new HomeChooseUs();
        $home_choose_us->en_title = $request->en_title;
        $home_choose_us->bn_title = $request->bn_title;
        $home_choose_us->en_description = $request->en_description;
        $home_choose_us->bn_description = $request->bn_description;
        $home_choose_us->status = $request->status;
        $home_choose_us->image = image_upload($request->image);
        $home_choose_us->save();
        return redirect(route('admin.manage_home_choose_us'))->with('message', 'Successfully Added!');
    }
    public function manageHomeChooseUS()
    {
        return view('backend.cms.who_we_are.about.choose_us.index', [
            'home_choose_us' => HomeChooseUs::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editHomeChooseUS($id)
    {
        $home_choose_us = HomeChooseUs::find($id);

        return view('backend.cms.who_we_are.about.choose_us.edit', [
            'home_choose_us' => $home_choose_us
        ]);
    }
    public function updateHomeChooseUS(Request $request)
    {
        $home_choose_us               = HomeChooseUs::find($request->home_choose_us_id);
        $home_choose_us->en_title = $request->en_title;
        $home_choose_us->bn_title = $request->bn_title;
        $home_choose_us->en_description = $request->en_description;
        $home_choose_us->bn_description = $request->bn_description;
        $home_choose_us->status = $request->status;
        if ($request->file('image')) {
            if (isset($home_choose_us)) {
                delete_image($home_choose_us->image);
                $home_choose_us->delete();
            }    
            $home_choose_us->image = image_upload($request->image);
        }
        $home_choose_us->save();
        return redirect(route('admin.manage_home_choose_us'))->with('message', 'Successfully Updated!');
    }
    public function deleteHomeChooseUS(Request $request)
    {
        $home_choose_us = HomeChooseUs::find($request->home_choose_us_id);

        if (isset($home_choose_us)) {
            delete_image($home_choose_us->image);
            $home_choose_us->delete();
        }

        $home_choose_us->delete();

        return redirect()->route('admin.manage_home_choose_us')->with('message', 'Successfully Deleted!');
    }

    public function addFaq()
    {
        return view('backend.cms.who_we_are.about.faq.show');
    }
    public function saveFaq(Request $request)
    {
        $faq = new Faq();
        $faq->en_question_one = $request->en_question_one;
        $faq->bn_question_one = $request->bn_question_one;
        $faq->en_answer_one = $request->en_answer_one;
        $faq->bn_answer_one = $request->bn_answer_one;

        $faq->en_question_two = $request->en_question_two;
        $faq->bn_question_two = $request->bn_question_two;
        $faq->en_answer_two = $request->en_answer_two;
        $faq->bn_answer_two = $request->bn_answer_two;

        $faq->en_question_three = $request->en_question_three;
        $faq->bn_question_three = $request->bn_question_three;
        $faq->en_answer_three = $request->en_answer_three;
        $faq->bn_answer_three = $request->bn_answer_three;

        $faq->en_question_four = $request->en_question_four;
        $faq->bn_question_four = $request->bn_question_four;
        $faq->en_answer_four = $request->en_answer_four;
        $faq->bn_answer_four = $request->bn_answer_four;

        $faq->en_question_five = $request->en_question_five;
        $faq->bn_question_five = $request->bn_question_five;
        $faq->en_answer_five = $request->en_answer_five;
        $faq->bn_answer_five = $request->bn_answer_five;

        $faq->image = image_upload($request->image);

        $faq->status = $request->status;
        $faq->save();
        return redirect(route('admin.manage_faq'))->with('message', 'Successfully Added!');
    }
    public function manageFaq()
    {
        return view('backend.cms.who_we_are.about.faq.index', [
            'faq' => Faq::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editFaq($id)
    {
        $faq = Faq::find($id);

        return view('backend.cms.who_we_are.about.faq.edit', [
            'faq' => $faq
        ]);
    }
    public function updateFaq(Request $request)
    {
        $faq               = Faq::find($request->faq_id);

        $faq->en_question_one = $request->en_question_one;
        $faq->bn_question_one = $request->bn_question_one;
        $faq->en_answer_one = $request->en_answer_one;
        $faq->bn_answer_one = $request->bn_answer_one;

        $faq->en_question_two = $request->en_question_two;
        $faq->bn_question_two = $request->bn_question_two;
        $faq->en_answer_two = $request->en_answer_two;
        $faq->bn_answer_two = $request->bn_answer_two;

        $faq->en_question_three = $request->en_question_three;
        $faq->bn_question_three = $request->bn_question_three;
        $faq->en_answer_three = $request->en_answer_three;
        $faq->bn_answer_three = $request->bn_answer_three;

        $faq->en_question_four = $request->en_question_four;
        $faq->bn_question_four = $request->bn_question_four;
        $faq->en_answer_four = $request->en_answer_four;
        $faq->bn_answer_four = $request->bn_answer_four;

        $faq->en_question_five = $request->en_question_five;
        $faq->bn_question_five = $request->bn_question_five;
        $faq->en_answer_five = $request->en_answer_five;
        $faq->bn_answer_five = $request->bn_answer_five;

        $faq->status = $request->status;

        if ($request->file('image')) {
            if ($faq->image) {
                Storage::delete($faq->image);
            }
            $faq->image = image_upload($request->image);
        }

        $faq->save();
        return redirect(route('admin.manage_faq'))->with('message', 'Successfully Updated!');
    }
    public function deleteFaq(Request $request)
    {
        $faq = Faq::find($request->faq_id);

        if (!$faq) {
            return redirect()->route('admin.manage_faq')->with('error', 'Faq  not found.');
        }

        if ($faq->image) {
            Storage::delete($faq->image);
        }

        $faq->delete();

        return redirect()->route('admin.manage_faq')->with('message', 'Successfully Deleted!');
    }

    public function addTestimonial()
    {
        return view('backend.cms.testimonial.show');
    }
    public function saveTestimonial(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->en_name = $request->en_name;
        $testimonial->bn_name = $request->bn_name;
        $testimonial->en_designation = $request->en_designation;
        $testimonial->bn_designation = $request->bn_designation;
        $testimonial->en_description = $request->en_description;
        $testimonial->bn_description = $request->bn_description;

        $testimonial->status = $request->status;
        $testimonial->image = image_upload($request->image);
        $testimonial->save();
        return redirect(route('admin.manage_testimonial'))->with('message', 'Successfully Added!');
    }
    public function manageTestimonial()
    {
        return view('backend.cms.testimonial.index', [
            'testimonial' => Testimonial::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editTestimonial($id)
    {
        $testimonial = Testimonial::find($id);

        return view('backend.cms.testimonial.edit', [
            'testimonial' => $testimonial
        ]);
    }
    public function updateTestimonial(Request $request)
    {
        $testimonial               = Testimonial::find($request->testimonial_id);
        $testimonial->en_name = $request->en_name;
        $testimonial->bn_name = $request->bn_name;
        $testimonial->en_designation = $request->en_designation;
        $testimonial->bn_designation = $request->bn_designation;
        $testimonial->en_description = $request->en_description;
        $testimonial->bn_description = $request->bn_description;
        $testimonial->status = $request->status;
        if ($request->file('image')) {
            if (isset($testimonial)) {
                delete_image($testimonial->image);
                $testimonial->delete();
            }
            $testimonial->image = image_upload($request->image);
        }
        $testimonial->save();
        return redirect(route('admin.manage_testimonial'))->with('message', 'Successfully Updated!');
    }
    public function deleteTestimonial(Request $request)
    {
        $testimonial = Testimonial::find($request->testimonial_id);

        if (isset($testimonial)) {
            delete_image($testimonial->image);
            $testimonial->delete();
        }

        $testimonial->delete();

        return redirect()->route('admin.manage_testimonial')->with('message', 'Successfully Deleted!');
    }

    public function addTitleButton()
    {
        return view('backend.cms.home.title_button.show');
    }
    public function saveTitleButton(Request $request)
    {
        $home_title_button = new homeTitleButton();
        $home_title_button->en_home_about_title = $request->en_home_about_title;
        $home_title_button->bn_home_about_title = $request->bn_home_about_title;
        $home_title_button->en_home_about_button_text = $request->en_home_about_button_text;
        $home_title_button->bn_home_about_button_text = $request->bn_home_about_button_text;

        $home_title_button->en_home_service_title = $request->en_home_service_title;
        $home_title_button->bn_home_service_title = $request->bn_home_service_title;

        $home_title_button->en_home_internet_title = $request->en_home_internet_title;
        $home_title_button->bn_home_internet_title = $request->bn_home_internet_title;
        $home_title_button->en_home_internet_button_text = $request->en_home_internet_button_text;
        $home_title_button->bn_home_internet_button_text = $request->bn_home_internet_button_text;

        $home_title_button->en_home_choose_us_title = $request->en_home_choose_us_title;
        $home_title_button->bn_home_choose_us_title = $request->bn_home_choose_us_title;

        $home_title_button->en_home_faq_title = $request->en_home_faq_title;
        $home_title_button->bn_home_faq_title = $request->bn_home_faq_title;

        $home_title_button->en_home_testimonial_title = $request->en_home_testimonial_title;
        $home_title_button->bn_home_testimonial_title = $request->bn_home_testimonial_title;

        $home_title_button->en_home_coverage_title = $request->en_home_coverage_title;
        $home_title_button->bn_home_coverage_title = $request->bn_home_coverage_title;
        $home_title_button->en_home_coverage_button_text = $request->en_home_coverage_button_text;
        $home_title_button->bn_home_coverage_button_text = $request->bn_home_coverage_button_text;
        
        $home_title_button->save();
        return redirect(route('admin.manage_home_title_button'))->with('message', 'Successfully Added!');
    }
    public function manageTitleButton()
    {
        return view('backend.cms.home.title_button.index', [
            'home_title_button' => homeTitleButton::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editTitleButton($id)
    {
        $home_title_button = homeTitleButton::find($id);

        return view('backend.cms.home.title_button.edit', [
            'home_title_button' => $home_title_button
        ]);
    }
    public function updateTitleButton(Request $request)
    {
        $home_title_button               = homeTitleButton::find($request->home_title_button_id);
        $home_title_button->en_home_about_title = $request->en_home_about_title;
        $home_title_button->bn_home_about_title = $request->bn_home_about_title;
        $home_title_button->en_home_about_button_text = $request->en_home_about_button_text;
        $home_title_button->bn_home_about_button_text = $request->bn_home_about_button_text;

        $home_title_button->en_home_service_title = $request->en_home_service_title;
        $home_title_button->bn_home_service_title = $request->bn_home_service_title;

        $home_title_button->en_home_internet_title = $request->en_home_internet_title;
        $home_title_button->bn_home_internet_title = $request->bn_home_internet_title;
        $home_title_button->en_home_internet_button_text = $request->en_home_internet_button_text;
        $home_title_button->bn_home_internet_button_text = $request->bn_home_internet_button_text;

        $home_title_button->en_home_choose_us_title = $request->en_home_choose_us_title;
        $home_title_button->bn_home_choose_us_title = $request->bn_home_choose_us_title;

        $home_title_button->en_home_faq_title = $request->en_home_faq_title;
        $home_title_button->bn_home_faq_title = $request->bn_home_faq_title;

        $home_title_button->en_home_testimonial_title = $request->en_home_testimonial_title;
        $home_title_button->bn_home_testimonial_title = $request->bn_home_testimonial_title;

        $home_title_button->en_home_coverage_title = $request->en_home_coverage_title;
        $home_title_button->bn_home_coverage_title = $request->bn_home_coverage_title;
        $home_title_button->en_home_coverage_button_text = $request->en_home_coverage_button_text;
        $home_title_button->bn_home_coverage_button_text = $request->bn_home_coverage_button_text;

        $home_title_button->save();
        return redirect(route('admin.manage_home_title_button'))->with('message', 'Successfully Updated!');
    }


    public function addClient()
    {
        return view('backend.cms.home.client.show');
    }
    public function saveClient(Request $request)
    {
        $client = new Client();
        $client->status = $request->status;
        $client->image = image_upload($request->image);
        $client->save();
        return redirect(route('admin.manage_client'))->with('message', 'Successfully Added!');
    }
    public function manageClient()
    {
        return view('backend.cms.home.client.index', [
            'client' => Client::get(),
        ]);
    }
    public function editClient($id)
    {
        $client = Client::find($id);
        return view('backend.cms.home.client.edit', [
            'client' => $client
        ]);
    }
    public function updateClient(Request $request)
    {
        $client               = Client::find($request->client_id);
        $client->status = $request->status;
        if ($request->file('image')) {
            if (isset($client)) {
                delete_image($client->image);
                $client->delete();
            }    
            $client->image = image_upload($request->image);
        }
        $client->save();
        return redirect(route('admin.manage_client'))->with('message', 'Successfully Updated!');
    }

    public function deleteClient(Request $request)
    {
        $client = Client::find($request->client_id);

        if (isset($client)) {
            delete_image($client->image);
            $client->delete();
        }

        $client->delete();

        return redirect()->route('admin.manage_client')->with('message', 'Successfully Deleted!');
    }

    public function payBill()
    {
        return view('backend.cms.payment.pay_bill');
    }

    public function addPaymentCategory()
    {
        return view('backend.cms.payment_category.show');
    }
    public function savePaymentCategory(Request $request)
    {
        $payment_category = new PaymentCategory();
        $payment_category->en_title = $request->en_title;
        $payment_category->bn_title = $request->bn_title;
        $payment_category->status = $request->status;
        $payment_category->save();
        return redirect(route('admin.manage_payment_category'))->with('message', 'Successfully Added!');
    }
    public function managePaymentCategory()
    {
        return view('backend.cms.payment_category.index', [
            'payment_category' => PaymentCategory::get(),
        ]);
    }
    public function editPaymentCategory($id)
    {
        $payment_category = PaymentCategory::find($id);

        return view('backend.cms.payment_category.edit', [
            'payment_category' => $payment_category
        ]);
    }
    public function updatePaymentCategory(Request $request)
    {
        $payment_category               = PaymentCategory::find($request->payment_category_id);
        $payment_category->en_title = $request->en_title;
        $payment_category->bn_title = $request->bn_title;
        $payment_category->status = $request->status;
        $payment_category->save();
        return redirect(route('admin.manage_payment_category'))->with('message', 'Successfully Updated!');
    }

    public function deletePaymentCategory(Request $request)
    {
        $payment_category = PaymentCategory::find($request->payment_category_id);

        if (!$payment_category) {
            return redirect()->route('admin.manage_payment_category')->with('error', 'Payment Category not found.');
        }

        $payment_category->delete();

        return redirect()->route('admin.manage_payment_category')->with('message', 'Successfully Deleted!');
    }

    public function addPayment()
    {
        return view('backend.cms.payment.show', [
            'category' => PaymentCategory::where('status', 1)->get(),
        ]);
    }
    public function savePayment(Request $request)
    {
        $payment = new Payment();
        $payment->payment_category_id = $request->payment_category_id;


        $payment->en_banner_text = $request->en_banner_text;
        $payment->bn_banner_text = $request->bn_banner_text;


        $payment->en_heading_one = $request->en_heading_one;
        $payment->bn_heading_one = $request->bn_heading_one;
        $payment->en_description_one = $request->en_description_one;
        $payment->bn_description_one = $request->bn_description_one;
        $payment->image_one = image_upload($request->image_one);

        $payment->en_heading_two = $request->en_heading_two;
        $payment->bn_heading_two = $request->bn_heading_two;
        $payment->en_description_two = $request->en_description_two;
        $payment->bn_description_two = $request->bn_description_two;
        $payment->image_two = image_upload($request->image_two);

        $payment->en_heading_three = $request->en_heading_three;
        $payment->bn_heading_three = $request->bn_heading_three;
        $payment->en_description_three = $request->en_description_three;
        $payment->bn_description_three = $request->bn_description_three;
        $payment->image_three = image_upload($request->image_three);

        $payment->en_heading_four = $request->en_heading_four;
        $payment->bn_heading_four = $request->bn_heading_four;
        $payment->en_description_four = $request->en_description_four;
        $payment->bn_description_four = $request->bn_description_four;
        $payment->image_four = image_upload($request->image_four);

        $payment->en_heading_five = $request->en_heading_five;
        $payment->bn_heading_five = $request->bn_heading_five;
        $payment->en_description_five = $request->en_description_five;
        $payment->bn_description_five = $request->bn_description_five;
        $payment->image_five = image_upload($request->image_five);

        $payment->en_heading_six = $request->en_heading_six;
        $payment->bn_heading_six = $request->bn_heading_six;
        $payment->en_description_six = $request->en_description_six;
        $payment->bn_description_six = $request->bn_description_six;
        $payment->image_six = image_upload($request->image_six);


        $payment->status = $request->status;
        $payment->save();
        return redirect(route('admin.manage_payment'))->with('message', 'Successfully Added!');
    }
    public function managePayment()
    {
        return view('backend.cms.payment.index', [
            'bkash_payment' => Payment::where('payment_category_id', 2)->get(),
            'rocket_payment' => Payment::where('payment_category_id', 3)->get(),
            'nagad_payment' => Payment::where('payment_category_id', 4)->get(),
        ]);
    }
    public function editPayment($id)
    {
        $payment = Payment::find($id);

        return view('backend.cms.payment.edit', [
            'category' => PaymentCategory::where('status', 1)->get(),
            'payment' => $payment
        ]);
    }
    public function updatePayment(Request $request)
    {
        $payment               = Payment::find($request->payment_id);
        $payment->payment_category_id = $request->payment_category_id;


        $payment->en_banner_text = $request->en_banner_text;
        $payment->bn_banner_text = $request->bn_banner_text;


        $payment->en_heading_one = $request->en_heading_one;
        $payment->bn_heading_one = $request->bn_heading_one;
        $payment->en_description_one = $request->en_description_one;
        $payment->bn_description_one = $request->bn_description_one;

        if ($request->file('image_one')) {
            if (isset($payment)) {
                delete_image($payment->image_one);
                $payment->delete();
            }
            $payment->image_one = image_upload($request->image_one);
        }

        $payment->en_heading_two = $request->en_heading_two;
        $payment->bn_heading_two = $request->bn_heading_two;
        $payment->en_description_two = $request->en_description_two;
        $payment->bn_description_two = $request->bn_description_two;
        if ($request->file('image_two')) {
            if (isset($payment)) {
                delete_image($payment->image_two);
                $payment->delete();
            }
            $payment->image_two = image_upload($request->image_two);
        }

        $payment->en_heading_three = $request->en_heading_three;
        $payment->bn_heading_three = $request->bn_heading_three;
        $payment->en_description_three = $request->en_description_three;
        $payment->bn_description_three = $request->bn_description_three;
        if ($request->file('image_three')) {
            if (isset($payment)) {
                delete_image($payment->image_three);
                $payment->delete();
            }
            $payment->image_three = image_upload($request->image_three);
        }

        $payment->en_heading_four = $request->en_heading_four;
        $payment->bn_heading_four = $request->bn_heading_four;
        $payment->en_description_four = $request->en_description_four;
        $payment->bn_description_four = $request->bn_description_four;
        if ($request->file('image_four')) {
            if (isset($payment)) {
                delete_image($payment->image_four);
                $payment->delete();
            }
            $payment->image_four = image_upload($request->image_four);
        }

        $payment->en_heading_five = $request->en_heading_five;
        $payment->bn_heading_five = $request->bn_heading_five;
        $payment->en_description_five = $request->en_description_five;
        $payment->bn_description_five = $request->bn_description_five;
        if ($request->file('image_five')) {
            if (isset($payment)) {
                delete_image($payment->image_five);
                $payment->delete();
            }
            $payment->image_five = image_upload($request->image_five);
        }

        $payment->en_heading_six = $request->en_heading_six;
        $payment->bn_heading_six = $request->bn_heading_six;
        $payment->en_description_six = $request->en_description_six;
        $payment->bn_description_six = $request->bn_description_six;
        if ($request->file('image_six')) {
            if (isset($payment)) {
                delete_image($payment->image_six);
                $payment->delete();
            }
            $payment->image_six = image_upload($request->image_six);
        }
        $payment->save();
        return redirect(route('admin.manage_payment'))->with('message', 'Successfully Updated!');
    }

    public function deletePayment(Request $request)
    {
        $payment = Payment::find($request->payment_id);

        if (isset($payment)) {
            delete_image($payment->image);
            $payment->delete();
        }
        $payment->delete();

        return redirect()->route('admin.manage_payment')->with('message', 'Successfully Deleted!');
    }
    public function addContactlabel()
    {
        return view('backend.cms.contact_us.show');
    }
    public function saveContactlabel(Request $request)
    {
        $contact_label = new ContactLabel();
        $contact_label->en_title = $request->en_title;
        $contact_label->bn_title = $request->bn_title;
        $contact_label->en_name_label = $request->en_name_label;
        $contact_label->bn_name_label = $request->bn_name_label;

        $contact_label->en_email_label = $request->en_email_label;
        $contact_label->bn_email_label = $request->bn_email_label;

        $contact_label->en_phone_label = $request->en_phone_label;
        $contact_label->bn_phone_label = $request->bn_phone_label;

        $contact_label->en_subject_label = $request->en_subject_label;
        $contact_label->bn_subject_label = $request->bn_subject_label;

        $contact_label->en_message_label = $request->en_message_label;
        $contact_label->bn_message_label = $request->bn_message_label;

        $contact_label->en_button_text = $request->en_button_text;
        $contact_label->bn_button_text = $request->bn_button_text;
        $contact_label->save();
        return redirect(route('admin.manage_contact_label'))->with('message', 'Successfully Added!');
    }
    public function manageContactlabel()
    {
        return view('backend.cms.contact_us.index', [
            'contact_label' => ContactLabel::orderBy('id', 'desc')->get()
        ]);
    }
    public function editContactlabel($id)
    {
        $contact_label = ContactLabel::find($id);

        return view('backend.cms.contact_us.edit', [
            'contact_label' => $contact_label
        ]);
    }
    public function updateContactlabel(Request $request)
    {
        $contact_label               = ContactLabel::find($request->contact_label_id);
        $contact_label->en_title = $request->en_title;
        $contact_label->bn_title = $request->bn_title;
        $contact_label->en_name_label = $request->en_name_label;
        $contact_label->bn_name_label = $request->bn_name_label;

        $contact_label->en_email_label = $request->en_email_label;
        $contact_label->bn_email_label = $request->bn_email_label;

        $contact_label->en_phone_label = $request->en_phone_label;
        $contact_label->bn_phone_label = $request->bn_phone_label;

        $contact_label->en_subject_label = $request->en_subject_label;
        $contact_label->bn_subject_label = $request->bn_subject_label;

        $contact_label->en_message_label = $request->en_message_label;
        $contact_label->bn_message_label = $request->bn_message_label;

        $contact_label->en_button_text = $request->en_button_text;
        $contact_label->bn_button_text = $request->bn_button_text;

        $contact_label->save();
        return redirect(route('admin.manage_contact_label'))->with('message', 'Successfully Updated!');
    }


    public function morePage()
    {
        return view('backend.cms.more.more_page');
    }

    public function addBlogTag()
    {
        return view('backend.cms.blog.blog_tag.show');
    }
    public function saveBlogTag(Request $request)
    {
        $blog_tag = new BlogTag();
        $blog_tag->en_title = $request->en_title;
        $blog_tag->bn_title = $request->bn_title;
        $blog_tag->status = $request->status;
        $blog_tag->save();
        return redirect(route('admin.manage_blog_tag'))->with('message', 'Successfully Added!');
    }
    public function manageBlogTag()
    {
        return view('backend.cms.blog.blog_tag.index', [
            'blog_tag' => BlogTag::get(),
        ]);
    }
    public function editBlogTag($id)
    {
        $blog_tag = BlogTag::find($id);

        return view('backend.cms.blog.blog_tag.edit', [
            'blog_tag' => $blog_tag
        ]);
    }
    public function updateBlogTag(Request $request)
    {
        $blog_tag               = BlogTag::find($request->blog_tag_id);
        $blog_tag->en_title = $request->en_title;
        $blog_tag->bn_title = $request->bn_title;
        $blog_tag->status = $request->status;
        $blog_tag->save();
        return redirect(route('admin.manage_blog_tag'))->with('message', 'Successfully Updated!');
    }

    public function deleteBlogTag(Request $request)
    {
        $blog_tag = BlogTag::find($request->blog_tag_id);


        $blog_tag->delete();

        return redirect()->route('admin.manage_blog_tag')->with('message', 'Successfully Deleted!');
    }

    public function addBlogCategory()
    {
        return view('backend.cms.blog.blog_category.show');
    }
    public function saveBlogCategory(Request $request)
    {
        $blog_category = new BlogCategory();
        $blog_category->en_title = $request->en_title;
        $blog_category->bn_title = $request->bn_title;
        $blog_category->status = $request->status;
        $blog_category->save();
        return redirect(route('admin.manage_blog_category'))->with('message', 'Successfully Added!');
    }
    public function manageBlogCategory()
    {
        return view('backend.cms.blog.blog_category.index', [
            'blog_category' => BlogCategory::get(),
        ]);
    }
    public function editBlogCategory($id)
    {
        $blog_category = BlogCategory::find($id);

        return view('backend.cms.blog.blog_category.edit', [
            'blog_category' => $blog_category
        ]);
    }
    public function updateBlogCategory(Request $request)
    {
        $blog_category               = BlogCategory::find($request->blog_category_id);
        $blog_category->en_title = $request->en_title;
        $blog_category->bn_title = $request->bn_title;
        $blog_category->status = $request->status;
        $blog_category->save();
        return redirect(route('admin.manage_blog_category'))->with('message', 'Successfully Updated!');
    }

    public function deleteBlogCategory(Request $request)
    {
        $blog_category = BlogCategory::find($request->blog_category_id);

        $blog_category->delete();

        return redirect()->route('admin.manage_blog_category')->with('message', 'Successfully Deleted!');
    }

    public function addBlog()
    {
        return view('backend.cms.blog.show', [
            'category' => BlogCategory::where('status', 1)->get(),
            'tag' => BlogTag::where('status', 1)->get(),
        ]);
    }
    public function saveBlog(Request $request)
    {
        $blog = new Blog();
        $blog->admin_id = $request->admin_id;
        $blog->blog_tag_id = $request->blog_tag_id;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->en_title = $request->en_title;
        $blog->bn_title = $request->bn_title;
        $blog->en_description = $request->en_description;
        $blog->bn_description = $request->bn_description;
        $blog->en_published_date = $request->en_published_date;
        $blog->bn_published_date = $request->bn_published_date;
        $blog->status = $request->status;
        $blog->image = image_upload($request->image);
        $blog->save();
        return redirect(route('admin.manage_blog'))->with('message', 'Successfully Added!');
    }
    public function manageBlog()
    {
        return view('backend.cms.blog.index', [
            'blog' => Blog::orderBy('id','desc')->get(),
        ]);
    }
    public function editBlog($id)
    {
        $blog = Blog::find($id);

        return view('backend.cms.blog.edit', [
            'blog' => $blog,
            'category' => BlogCategory::where('status', 1)->get(),
            'tag' => BlogTag::where('status', 1)->get(),
        ]);
    }
    public function updateBlog(Request $request)
    {
        $blog               = Blog::find($request->blog_id);
        $blog->admin_id = $request->admin_id;
        $blog->blog_tag_id = $request->blog_tag_id;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->en_title = $request->en_title;
        $blog->bn_title = $request->bn_title;
        $blog->en_description = $request->en_description;
        $blog->bn_description = $request->bn_description;
        $blog->en_published_date = $request->en_published_date;
        $blog->bn_published_date = $request->bn_published_date;
        $blog->status = $request->status;
        if ($request->file('image')) {
            if (isset($blog)) {
                delete_image($blog->image);
                $blog->delete();
            }
            $blog->image = image_upload($request->image);
        }
        $blog->save();
        return redirect(route('admin.manage_blog'))->with('message', 'Successfully Updated!');
    }

    public function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->blog_id);

        if (isset($blog)) {
            delete_image($blog->image);
            $blog->delete();
        }

        $blog->delete();

        return redirect()->route('admin.manage_blog')->with('message', 'Successfully Deleted!');
    }

    public function addAward()
    {
        return view('backend.cms.award.show');
    }
    public function saveAward(Request $request)
    {
        $award = new Award();
        $award->en_title = $request->en_title;
        $award->bn_title = $request->bn_title;
        $award->en_description = $request->en_description;
        $award->bn_description = $request->bn_description;
        $award->status = $request->status;
        $award->image = image_upload($request->image);
        $award->save();
        return redirect(route('admin.manage_award'))->with('message', 'Successfully Added!');
    }
    public function manageAward()
    {
        return view('backend.cms.award.index', [
            'award' => Award::orderBy('id','desc')->get(),
        ]);
    }
    public function editAward($id)
    {
        $award = Award::find($id);

        return view('backend.cms.award.edit', [
            'award' => $award
        ]);
    }
    public function updateAward(Request $request)
    {
        $award               = Award::find($request->award_id);
        $award->en_title = $request->en_title;
        $award->bn_title = $request->bn_title;
        $award->en_description = $request->en_description;
        $award->bn_description = $request->bn_description;

        $award->status = $request->status;
        if ($request->file('image')) {
            if (isset($award)) {
                delete_image($award->image);
                $award->delete();
            }
            $award->image = image_upload($request->image);
        }
        $award->save();
        return redirect(route('admin.manage_award'))->with('message', 'Successfully Updated!');
    }

    public function deleteAward(Request $request)
    {
        $award = Award::find($request->award_id);

        if (isset($award)) {
            delete_image($award->image);
            $award->delete();
        }

        $award->delete();

        return redirect()->route('admin.manage_award')->with('message', 'Successfully Deleted!');
    }

    public function addNewsEvent()
    {
        return view('backend.cms.news_event.show');
    }
    public function saveNewsEvent(Request $request)
    {
        $news_event = new NewsEvent();
        $news_event->en_title = $request->en_title;
        $news_event->bn_title = $request->bn_title;
        $news_event->en_description = $request->en_description;
        $news_event->bn_description = $request->bn_description;
        $news_event->en_published_date = $request->en_published_date;
        $news_event->bn_published_date = $request->bn_published_date;
        $news_event->status = $request->status;
        $news_event->image = image_upload($request->image);
        $news_event->save();
        return redirect(route('admin.manage_news_event'))->with('message', 'Successfully Added!');
    }
    public function manageNewsEvent()
    {
        return view('backend.cms.news_event.index', [
            'news_event' => NewsEvent::orderBy('id','desc')->get(),
        ]);
    }
    public function editNewsEvent($id)
    {
        $news_event = NewsEvent::find($id);

        return view('backend.cms.news_event.edit', [
            'news_event' => $news_event
        ]);
    }
    public function updateNewsEvent(Request $request)
    {
        $news_event               = NewsEvent::find($request->news_event_id);
        $news_event->en_title = $request->en_title;
        $news_event->bn_title = $request->bn_title;
        $news_event->en_description = $request->en_description;
        $news_event->bn_description = $request->bn_description;
        $news_event->en_published_date = $request->en_published_date;
        $news_event->bn_published_date = $request->bn_published_date;
        $news_event->status = $request->status;
        if ($request->file('image')) {
            if (isset($news_event)) {
                delete_image($news_event->image);
                $news_event->delete();
            }
            $news_event->image = image_upload($request->image);
        }
        $news_event->save();
        return redirect(route('admin.manage_news_event'))->with('message', 'Successfully Updated!');
    }

    public function deleteNewsEvent(Request $request)
    {
        $news_event = NewsEvent::find($request->news_event_id);

        if (isset($news_event)) {
            delete_image($news_event->image);
            $news_event->delete();
        }

        $news_event->delete();

        return redirect()->route('admin.manage_news_event')->with('message', 'Successfully Deleted!');
    }

    public function addCircular()
    {
        return view('backend.cms.circular.show');
    }
    public function saveCircular(Request $request)
    {
        $circular = new Circular();
        $circular->en_title = $request->en_title;
        $circular->bn_title = $request->bn_title;
        $circular->en_published_date = $request->en_published_date;
        $circular->bn_published_date = $request->bn_published_date;
        $circular->status = $request->status;
        $circular->document = document_upload($request->document);
        $circular->save();
        return redirect(route('admin.manage_circular'))->with('message', 'Successfully Added!');
    }
    public function manageCircular()
    {
        return view('backend.cms.circular.index', [
            'circular' => Circular::orderBy('id', 'desc')->get()
        ]);
    }
    public function editCircular($id)
    {
        $circular = Circular::find($id);

        return view('backend.cms.circular.edit', [
            'circular' => $circular
        ]);
    }
    public function updateCircular(Request $request)
    {
        $circular               = Circular::find($request->circular_id);
        $circular->en_title = $request->en_title;
        $circular->bn_title = $request->bn_title;
        $circular->en_published_date = $request->en_published_date;
        $circular->bn_published_date = $request->bn_published_date;
        $circular->status = $request->status;
        if ($request->file('document')) {
            if (isset($circular)) {
                delete_image($circular->document);
                $circular->delete();
            }
            $circular->document = document_upload($request->document);
        }
        $circular->save();
        return redirect(route('admin.manage_circular'))->with('message', 'Successfully Updated!');
    }

    public function deleteCircular(Request $request)
    {
        $circular = Circular::find($request->circular_id);

        if (isset($circular)) {
            delete_image($circular->document);
            $circular->delete();
        }

        $circular->delete();

        return redirect()->route('admin.manage_circular')->with('message', 'Successfully Deleted!');
    }

    public function addVideo()
    {
        return view('backend.cms.video.show');
    }
    public function saveVideo(Request $request)
    {
        $video = new Video();
        $video->en_title = $request->en_title;
        $video->bn_title = $request->bn_title;
        $video->en_date = $request->en_date;
        $video->bn_date = $request->bn_date;
        $video->status = $request->status;
        $video->image = image_upload($request->image);
        $video->video = document_upload($request->video);
        $video->save();
        return redirect(route('admin.manage_video'))->with('message', 'Successfully Added!');
    }
    public function manageVideo()
    {
        return view('backend.cms.video.index', [
            'video' => Video::orderBy('id', 'desc')->get()
        ]);
    }
    public function editVideo($id)
    {
        $video = Video::find($id);

        return view('backend.cms.video.edit', [
            'video' => $video
        ]);
    }
    public function updateVideo(Request $request)
    {
        $video               = Video::find($request->video_id);
        $video->en_title = $request->en_title;
        $video->bn_title = $request->bn_title;
        $video->en_date = $request->en_date;
        $video->bn_date = $request->bn_date;
        $video->status = $request->status;
        if ($request->file('video')) {
            if (isset($video)) {
                delete_image($video->video);
                $video->delete();
            }
            $video->video = document_upload($request->video);
        }
        if ($request->file('image')) {
            if (isset($video)) {
                delete_image($video->image);
                $video->delete();
            }
            $video->image = document_upload($request->image);
        }
        $video->save();
        return redirect(route('admin.manage_video'))->with('message', 'Successfully Updated!');
    }

    public function deleteVideo(Request $request)
    {
        $video = Video::find($request->video_id);

        if (isset($video)) {
            delete_image($video->video);
            $video->delete();
        }
        if (isset($video)) {
            delete_image($video->image);
            $video->delete();
        }

        $video->delete();

        return redirect()->route('admin.manage_video')->with('message', 'Successfully Deleted!');
    }

    public function addYoutubeVideo()
    {
        return view('backend.cms.youtube_video.show');
    }
    public function saveYoutubeVideo(Request $request)
    {
        $youtube_video = new YoutubeVideo();
        $youtube_video->url = $request->url;
        $youtube_video->status = $request->status;
        $youtube_video->save();
        return redirect(route('admin.manage_youtube_video'))->with('message', 'Successfully Added!');
    }
    public function manageYoutubeVideo()
    {
        return view('backend.cms.youtube_video.index', [
            'youtube_video' => YoutubeVideo::orderBy('id', 'desc')->get()
        ]);
    }
    public function editYoutubeVideo($id)
    {
        $youtube_video = YoutubeVideo::find($id);

        return view('backend.cms.youtube_video.edit', [
            'youtube_video' => $youtube_video
        ]);
    }
    public function updateYoutubeVideo(Request $request)
    {
        $youtube_video               = YoutubeVideo::find($request->youtube_video_id);
        $youtube_video->url = $request->url;
        $youtube_video->status = $request->status;
        $youtube_video->save();
        return redirect(route('admin.manage_youtube_video'))->with('message', 'Successfully Updated!');
    }

    public function deleteYoutubeVideo(Request $request)
    {
        $youtube_video = YoutubeVideo::find($request->youtube_video_id);

        $youtube_video->delete();

        return redirect()->route('admin.manage_youtube_video')->with('message', 'Successfully Deleted!');
    }

    public function addImageCategory()
    {
        return view('backend.cms.image_category.show');
    }
    public function saveImageCategory(Request $request)
    {
        $image_category = new ImageCategory();
        $image_category->en_title = $request->en_title;
        $image_category->bn_title = $request->bn_title;
        $image_category->status = $request->status;
        $image_category->save();
        return redirect(route('admin.manage_image_category'))->with('message', 'Successfully Added!');
    }
    public function manageImageCategory()
    {
        return view('backend.cms.image_category.index', [
            'image_category_all' => ImageCategory::where('id', 2)->first(),
            'image_category' => ImageCategory::whereNotIn('id', [2])->get(),
        ]);
    }
    public function editImageCategory($id)
    {
        $image_category = ImageCategory::find($id);

        return view('backend.cms.image_category.edit', [
            'image_category' => $image_category
        ]);
    }
    public function updateImageCategory(Request $request)
    {
        $image_category               = ImageCategory::find($request->image_category_id);
        $image_category->en_title = $request->en_title;
        $image_category->bn_title = $request->bn_title;
        $image_category->status = $request->status;
        $image_category->save();
        return redirect(route('admin.manage_image_category'))->with('message', 'Successfully Updated!');
    }

    public function deleteImageCategory(Request $request)
    {
        $image_category = ImageCategory::find($request->image_category_id);

        if (!$image_category) {
            return redirect()->route('admin.manage_image_category')->with('error', 'Image Category not found.');
        }

        $image_category->delete();

        return redirect()->route('admin.manage_image_category')->with('message', 'Successfully Deleted!');
    }

    public function addImage()
    {
        return view('backend.cms.image.show', [
            'category' => ImageCategory::where('status', 1)->get()
        ]);
    }
    public function saveImage(Request $request)
    {
        $image = new ImageGallery();
        $image->image_category_id = $request->image_category_id;
        $image->image = image_upload($request->image);
        $image->status = $request->status;
        $image->save();
        return redirect(route('admin.manage_image'))->with('message', 'Successfully Added!');
    }
    public function manageImage()
    {
        return view('backend.cms.image.index', [
            'image' => ImageGallery::latest('id')->get(),
        ]);
    }
    public function editImage($id)
    {
        $image = ImageGallery::find($id);

        return view('backend.cms.image.edit', [
            'category' => ImageCategory::where('status', 1)->get(),
            'image' => $image
        ]);
    }
    public function updateImage(Request $request)
    {
        $image               = ImageGallery::find($request->image_id);
        $image->image_category_id = $request->image_category_id;
        if ($request->file('image')) {
            if (isset($image)) {
                delete_image($image->image);
                $image->delete();
            }
            $image->image = image_upload($request->image);
        }
        $image->status = $request->status;
        $image->save();
        return redirect(route('admin.manage_image'))->with('message', 'Successfully Updated!');
    }

    public function deleteImage(Request $request)
    {
        $image = ImageGallery::find($request->image_id);

        if (isset($image)) {
            delete_image($image->image);
            $image->delete();
        }

        return redirect()->route('admin.manage_image')->with('message', 'Successfully Deleted!');
    }

    public function addTC()
    {
        return view('backend.cms.tc.show');
    }
    public function saveTC(Request $request)
    {
        $tc = new TC();
        $tc->en_title = $request->en_title;
        $tc->bn_title = $request->bn_title;
        $tc->en_payment_mode = $request->en_payment_mode;
        $tc->bn_payment_mode = $request->bn_payment_mode;
        $tc->en_documentation = $request->en_documentation;
        $tc->bn_documentation = $request->bn_documentation;
        $tc->en_after_sales_service = $request->en_after_sales_service;
        $tc->bn_after_sales_service = $request->bn_after_sales_service;
        $tc->en_client_responsibility = $request->en_client_responsibility;
        $tc->bn_client_responsibility = $request->bn_client_responsibility;
        $tc->en_others = $request->en_others;
        $tc->bn_others = $request->bn_others;
        $tc->en_contact_termination = $request->en_contact_termination;
        $tc->bn_contact_termination = $request->bn_contact_termination;
        $tc->save();
        return redirect(route('admin.manage_tc'))->with('message', 'Successfully Added!');
    }
    public function manageTC()
    {
        return view('backend.cms.tc.index', [
            'tc' => TC::get(),
        ]);
    }
    public function editTC($id)
    {
        $tc = TC::find($id);

        return view('backend.cms.tc.edit', [
            'tc' => $tc
        ]);
    }
    public function updateTC(Request $request)
    {
        $tc               = TC::find($request->tc_id);
        $tc->en_title = $request->en_title;
        $tc->bn_title = $request->bn_title;
        $tc->en_payment_mode = $request->en_payment_mode;
        $tc->bn_payment_mode = $request->bn_payment_mode;
        $tc->en_documentation = $request->en_documentation;
        $tc->bn_documentation = $request->bn_documentation;
        $tc->en_after_sales_service = $request->en_after_sales_service;
        $tc->bn_after_sales_service = $request->bn_after_sales_service;
        $tc->en_client_responsibility = $request->en_client_responsibility;
        $tc->bn_client_responsibility = $request->bn_client_responsibility;
        $tc->en_others = $request->en_others;
        $tc->bn_others = $request->bn_others;
        $tc->en_contact_termination = $request->en_contact_termination;
        $tc->bn_contact_termination = $request->bn_contact_termination;
        $tc->save();
        return redirect(route('admin.manage_tc'))->with('message', 'Successfully Updated!');
    }

    public function addClientsReview()
    {
        return view('backend.cms.clients_review.show');
    }
    public function saveClientsReview(Request $request)
    {
        $clients_review = new ClientsReview();
        $clients_review->image = image_upload($request->image);
        $clients_review->save();
        return redirect(route('admin.manage_clients_review'))->with('message', 'Successfully Added!');
    }
    public function manageClientsReview()
    {
        return view('backend.cms.clients_review.index', [
            'clients_review' => ClientsReview::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editClientsReview($id)
    {
        $clients_review = ClientsReview::find($id);

        return view('backend.cms.clients_review.edit', [
            'clients_review' => $clients_review
        ]);
    }
    public function updateClientsReview(Request $request)
    {
        $clients_review               = ClientsReview::find($request->clients_review_id);
        if ($request->file('image')) {
            if (isset($clients_review)) {
                delete_image($clients_review->image);
                $clients_review->delete();
            }
            $clients_review->image = image_upload($request->image);
        }
        $clients_review->save();
        return redirect(route('admin.manage_clients_review'))->with('message', 'Successfully Updated!');
    }
    public function deleteClientsReview(Request $request)
    {
        $clients_review = ClientsReview::find($request->clients_review_id);

        if (isset($clients_review)) {
            delete_image($clients_review->image);
            $clients_review->delete();
        }

        $clients_review->delete();

        return redirect()->route('admin.manage_clients_review')->with('message', 'Successfully Deleted!');
    }

    public function addCorporateInternet()
    {
        return view('backend.cms.corporate_internet.show');
    }
    public function saveCorporateInternet(Request $request)
    {
        $corporate_internet = new CorporateInternet();
        $corporate_internet->en_title = $request->en_title;
        $corporate_internet->bn_title = $request->bn_title;

        $corporate_internet->en_head_para_one = $request->en_head_para_one;
        $corporate_internet->bn_head_para_one = $request->bn_head_para_one;

        $corporate_internet->en_item_title_one = $request->en_item_title_one;
        $corporate_internet->bn_item_title_one = $request->bn_item_title_one;
        $corporate_internet->en_item_description_one = $request->en_item_description_one;
        $corporate_internet->bn_item_description_one = $request->bn_item_description_one;

        $corporate_internet->en_item_title_two = $request->en_item_title_two;
        $corporate_internet->bn_item_title_two = $request->bn_item_title_two;
        $corporate_internet->en_item_description_two = $request->en_item_description_two;
        $corporate_internet->bn_item_description_two = $request->bn_item_description_two;

        $corporate_internet->en_item_title_three = $request->en_item_title_three;
        $corporate_internet->bn_item_title_three = $request->bn_item_title_three;
        $corporate_internet->en_item_description_three = $request->en_item_description_three;
        $corporate_internet->bn_item_description_three = $request->bn_item_description_three;

        $corporate_internet->en_item_title_four = $request->en_item_title_four;
        $corporate_internet->bn_item_title_four = $request->bn_item_title_four;
        $corporate_internet->en_item_description_four = $request->en_item_description_four;
        $corporate_internet->bn_item_description_four = $request->bn_item_description_four;

        $corporate_internet->en_item_title_five = $request->en_item_title_five;
        $corporate_internet->bn_item_title_five = $request->bn_item_title_five;
        $corporate_internet->en_item_description_five = $request->en_item_description_five;
        $corporate_internet->bn_item_description_five = $request->bn_item_description_five;

        $corporate_internet->en_item_title_six = $request->en_item_title_six;
        $corporate_internet->bn_item_title_six = $request->bn_item_title_six;
        $corporate_internet->en_item_description_six = $request->en_item_description_six;
        $corporate_internet->bn_item_description_six = $request->bn_item_description_six;

        $corporate_internet->en_footer_description = $request->en_footer_description;
        $corporate_internet->bn_footer_description = $request->bn_footer_description;

        $corporate_internet->status = $request->status;

        $corporate_internet->image = image_upload($request->image);
        $corporate_internet->item_image_one = image_upload($request->item_image_one);
        $corporate_internet->item_image_two = image_upload($request->item_image_two);
        $corporate_internet->item_image_three = image_upload($request->item_image_three);
        $corporate_internet->item_image_four = image_upload($request->item_image_four);
        $corporate_internet->item_image_five = image_upload($request->item_image_five);
        $corporate_internet->item_image_six = image_upload($request->item_image_six);
        $corporate_internet->save();
        return redirect(route('admin.manage_corporate_internet'))->with('message', 'Successfully Added!');
    }
    public function manageCorporateInternet()
    {
        return view('backend.cms.corporate_internet.index', [
            'corporate_internet' => CorporateInternet::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editCorporateInternet($id)
    {
        $corporate_internet = CorporateInternet::find($id);

        return view('backend.cms.corporate_internet.edit', [
            'corporate_internet' => $corporate_internet
        ]);
    }
    public function updateCorporateInternet(Request $request)
    {
        $corporate_internet               = CorporateInternet::find($request->corporate_internet_id);
        $corporate_internet->en_title = $request->en_title;
        $corporate_internet->bn_title = $request->bn_title;

        $corporate_internet->en_head_para_one = $request->en_head_para_one;
        $corporate_internet->bn_head_para_one = $request->bn_head_para_one;

        $corporate_internet->en_item_title_one = $request->en_item_title_one;
        $corporate_internet->bn_item_title_one = $request->bn_item_title_one;
        $corporate_internet->en_item_description_one = $request->en_item_description_one;
        $corporate_internet->bn_item_description_one = $request->bn_item_description_one;

        $corporate_internet->en_item_title_two = $request->en_item_title_two;
        $corporate_internet->bn_item_title_two = $request->bn_item_title_two;
        $corporate_internet->en_item_description_two = $request->en_item_description_two;
        $corporate_internet->bn_item_description_two = $request->bn_item_description_two;

        $corporate_internet->en_item_title_three = $request->en_item_title_three;
        $corporate_internet->bn_item_title_three = $request->bn_item_title_three;
        $corporate_internet->en_item_description_three = $request->en_item_description_three;
        $corporate_internet->bn_item_description_three = $request->bn_item_description_three;

        $corporate_internet->en_item_title_four = $request->en_item_title_four;
        $corporate_internet->bn_item_title_four = $request->bn_item_title_four;
        $corporate_internet->en_item_description_four = $request->en_item_description_four;
        $corporate_internet->bn_item_description_four = $request->bn_item_description_four;

        $corporate_internet->en_item_title_five = $request->en_item_title_five;
        $corporate_internet->bn_item_title_five = $request->bn_item_title_five;
        $corporate_internet->en_item_description_five = $request->en_item_description_five;
        $corporate_internet->bn_item_description_five = $request->bn_item_description_five;

        $corporate_internet->en_item_title_six = $request->en_item_title_six;
        $corporate_internet->bn_item_title_six = $request->bn_item_title_six;
        $corporate_internet->en_item_description_six = $request->en_item_description_six;
        $corporate_internet->bn_item_description_six = $request->bn_item_description_six;

        $corporate_internet->en_footer_description = $request->en_footer_description;
        $corporate_internet->bn_footer_description = $request->bn_footer_description;

        $corporate_internet->status = $request->status;
        if ($request->file('image')) {
            if (isset($corporate_internet)) {
                delete_image($corporate_internet->image);
                $corporate_internet->delete();
            }    
            $corporate_internet->image = image_upload($request->image);
        }
        if ($request->file('item_image_one')) {
            if (isset($corporate_internet)) {
                delete_image($corporate_internet->item_image_one);
                $corporate_internet->delete();
            }    
            $corporate_internet->item_image_one = image_upload($request->item_image_one);
        }
        if ($request->file('item_image_two')) {
            if (isset($corporate_internet)) {
                delete_image($corporate_internet->item_image_two);
                $corporate_internet->delete();
            }    
            $corporate_internet->item_image_two = image_upload($request->item_image_two);
        }
        if ($request->file('item_image_three')) {
            if (isset($corporate_internet)) {
                delete_image($corporate_internet->item_image_three);
                $corporate_internet->delete();
            }    
            $corporate_internet->item_image_three = image_upload($request->item_image_three);
        }
        if ($request->file('item_image_four')) {
            if (isset($corporate_internet)) {
                delete_image($corporate_internet->item_image_four);
                $corporate_internet->delete();
            }    
            $corporate_internet->item_image_four = image_upload($request->item_image_four);
        }
        if ($request->file('item_image_five')) {
            if (isset($corporate_internet)) {
                delete_image($corporate_internet->item_image_five);
                $corporate_internet->delete();
            }    
            $corporate_internet->item_image_five = image_upload($request->item_image_five);
        }
        if ($request->file('item_image_six')) {
            if (isset($corporate_internet)) {
                delete_image($corporate_internet->item_image_six);
                $corporate_internet->delete();
            }    
            $corporate_internet->item_image_six = image_upload($request->item_image_six);
        }
        $corporate_internet->save();
        return redirect(route('admin.manage_corporate_internet'))->with('message', 'Successfully Updated!');
    }
    public function addMagicIP()
    {
        return view('backend.cms.magic_ip.show');
    }
    public function saveMagicIP(Request $request)
    {
        $magic_ip = new MagicIP();
        $magic_ip->en_title = $request->en_title;
        $magic_ip->bn_title = $request->bn_title;

        $magic_ip->en_head_para = $request->en_head_para;
        $magic_ip->bn_head_para = $request->bn_head_para;

        $magic_ip->en_body_text = $request->en_body_text;
        $magic_ip->bn_body_text = $request->bn_body_text;

        $magic_ip->image = image_upload($request->image);
        $magic_ip->save();
        return redirect(route('admin.manage_magic_ip'))->with('message', 'Successfully Added!');
    }
    public function manageMagicIP()
    {
        return view('backend.cms.magic_ip.index', [
            'magic_ip' => MagicIP::orderBy('id', 'desc')->get(),
        ]);
    }
    public function editMagicIP($id)
    {
        $magic_ip = MagicIP::find($id);

        return view('backend.cms.magic_ip.edit', [
            'magic_ip' => $magic_ip
        ]);
    }
    public function updateMagicIP(Request $request)
    {
        $magic_ip               = MagicIP::find($request->magic_ip_id);
        $magic_ip->en_title = $request->en_title;
        $magic_ip->bn_title = $request->bn_title;

        $magic_ip->en_head_para = $request->en_head_para;
        $magic_ip->bn_head_para = $request->bn_head_para;

        $magic_ip->en_body_text = $request->en_body_text;
        $magic_ip->bn_body_text = $request->bn_body_text;

        if ($request->file('image')) {
            if (isset($magic_ip)) {
                delete_image($magic_ip->image);
                $magic_ip->delete();
            }    
            $magic_ip->image = image_upload($request->image);
        }
        $magic_ip->save();
        return redirect(route('admin.manage_magic_ip'))->with('message', 'Successfully Updated!');
    }
}
