<?php

namespace App\Http\Controllers\FrontView;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BOD;
use App\Models\Branch;
use App\Models\BranchCategory;
use App\Models\Circular;
use App\Models\Client;
use App\Models\ContactLabel;
use App\Models\Department;
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
use App\Models\KAM;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Payment;
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
use App\Models\District;
use App\Models\Thana;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Validator;
use App\Ebl\Skypay;
use App\Models\Area;
use App\Models\ClientsReview;
use App\Models\CorporateInternet;
use App\Models\MagicIP;

class FrontViewController extends Controller

{
    public function index()
    {
        $locale = parseLocale();
        $districtOrder = $locale === '/' ? 'en_title' : $locale . '_title';

        // Get the latest records for each model
        $topbar = Topbar::latest('id')->first();
        $menu = Menu::latest('id')->first();
        $footer = Footer::latest('id')->first();
        $home_button_title = homeTitleButton::first();
        $faq = Faq::where('status', 1)->first();
    
        // Eager loading for related models
        $sliders = Slider::where('status', 1)->orderBy('position', 'asc')->get();
        $home_services = HomeService::where('status', 1)->orderBy('id', 'desc')->get();
        $package_category = PackageCategory::where('status', 1)->get();
        $home_packages = Package::where('status', 1)->where('package_category_id', 1)->get();
        $top_packages = Package::where('status', 1)->where('top_package','1')->where('package_category_id', 1)->take(3)->get();
        // $districts = District::where('status', 1)->orderBy($districtOrder, 'asc')->with('thanas')->get();
        $clients = Client::where('status', 1)->get();
        $home_choose_us = HomeChooseUs::where('status', 1)->orderBy('id', 'desc')->get();
    
        return view('frontend.home.index', compact('topbar','menu','footer','sliders','home_services','package_category', 'home_packages', 'top_packages','clients','home_button_title','home_choose_us'));
    }

    public function campaignDetails($id){
        $campaign_details = Slider::where('id',$id)->where('status','1')->first();
        return view('frontend.discount.campaign_details',[
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'campaign_details' => $campaign_details
        ]);
    }

    public function fetchThana(Request $request){
        $data['thanas'] = Thana::where("district_id", $request->district_id)->orderBy('en_title', 'asc')->get(["en_title", "bn_title", "id"]);
        return response()->json($data);
    }
    
    public function blog()
    {
        // Get the latest records for each model with eager loading
        $topbar = Topbar::latest('id')->first();
        $menu = Menu::latest('id')->first();
        $footer = Footer::latest('id')->first();
        
        // Eager loading for related models in the 'blogs' query
        $blogs = Blog::with(['blogCategory', 'blogTag', 'admin'])
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(6);
    
        $recents = Blog::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
        $tags = BlogTag::where('status', 1)->orderBy('id', 'desc')->get();
        $categories = BlogCategory::where('status', 1)->orderBy('id', 'desc')->get();
    
        return view('frontend.blog.blog', compact('topbar','menu','footer','blogs','recents','tags','categories'));
    }       
    
    
    public function blogDetails($id)
    {
        $blog_details = Blog::with(['blogCategory', 'blogTag', 'admin'])
            ->where('id', $id)
            ->where('status', 1)
            ->first();
    
        return view('frontend.blog.blog_details', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'recents' => Blog::with(['blogCategory', 'blogTag'])
                ->where('status', 1)
                ->orderBy('id', 'desc')
                ->take(10)
                ->get(),
            'blog_details' => $blog_details
        ]);
    }
    


    public function circular()
    {
        $circulars = Circular::where('status', 1)->orderBy('id', 'asc')->paginate(6);
    
        return view('frontend.circular.circular', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'circulars' => $circulars
        ]);
    }    
    
    
    public function circularDetails($id)
    {
        $circular_details = Circular::where('id', $id)->where('status', 1)->first();
    
        return view('frontend.circular.circular_details', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'circular_details' => $circular_details
        ]);
    }
    
    public function newsEvent()
    {
        $news_events = NewsEvent::where('status', 1)->orderBy('id', 'desc')->paginate(6);
    
        return view('frontend.news_event.news_event', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'news_events' => $news_events
        ]);
    }
    
    public function newsEventDetails($id)
    {
        $news_event_details = NewsEvent::where('id', $id)->where('status', 1)->first();
    
        return view('frontend.news_event.news_event_details', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'news_event_details' => $news_event_details
        ]);
    }
    
    public function gallery()
    {
        $videos = Video::where('status', 1)->orderBy('id', 'desc')->get();
        $youtube_videos = YoutubeVideo::where('status', 1)->orderBy('id', 'desc')->get();
        $categories = ImageCategory::where('status', 1)->whereNotIn('id', [2])->orderBy('en_title', 'asc')->get();
        $image_category_all = ImageCategory::where('status', 1)->where('id', 2)->first();
        $images = ImageGallery::where('status', 1)->latest('id')->get();
    
        return view('frontend.gallery.gallery', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'videos' => $videos,
            'youtube_videos' => $youtube_videos,
            'categories' => $categories,
            'image_category_all' => $image_category_all,
            'images' => $images,
        ]);
    }
    
    public function contactUs()
    {
        return view('frontend.contact_us.contact_us', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'contact_label' => ContactLabel::latest('id')->first()
        ]);
    }
    
    public function paymentProcess()
    {
        $topbar = Topbar::latest('id')->first();
        $menu = Menu::latest('id')->first();
        $footer = Footer::latest('id')->first();
        
        $category = PaymentCategory::where('status', 1)->get();
        $bkash_payment = Payment::where('status', 1)->where('payment_category_id', 2)->first();
        $rocket_payment = Payment::where('status', 1)->where('payment_category_id', 3)->first();
        $nagad_payment = Payment::where('status', 1)->where('payment_category_id', 4)->first();
    
        return view('frontend.payment_process.payment_process', compact('topbar','menu','footer','category','bkash_payment','rocket_payment','nagad_payment'));
    }
    
    public function packages()
    {
        $topbar = Topbar::latest('id')->first();
        $menu = Menu::latest('id')->first();
        $footer = Footer::latest('id')->first();
        
        $package_category = PackageCategory::where('status', 1)->get();
        $home_packages = Package::where('status', 1)->where('package_category_id', 1)->get();
        $sme_package = Package::where('status', 1)->where('package_category_id', 2)->get();
        $corporate_package = Package::where('status', 1)->where('package_category_id', 3)->get();
        $home_button_title = homeTitleButton::first();
    
        return view('frontend.packages.packages', compact('topbar','menu','footer','package_category','home_packages','sme_package','corporate_package','home_button_title'));
    }
    

    public function buyPackage($id)
    {
        $package_buy = Package::where('id', $id)->where('status', 1)->first();
        $areas = Area::orderBy('en_area_name','asc')->get();
    
        return view('frontend.packages.package_buy', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'package_buy' => $package_buy,
            'areas' => $areas
        ]);
    }

    public function btrc()
    {
        return view('frontend.packages.btrc', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
        ]);
    }
    
    public function branches()
    {
        $locale = parseLocale();
        $columnToOrder = $locale === '/' ? 'en_branch_name' : $locale . '_branch_name';
        return view('frontend.branches.branches', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'categories' => BranchCategory::where('status', 1)->orderBy('id', 'asc')->get(),
            'branches' => Branch::where('status', 1)->orderBy($columnToOrder, 'asc')->get()
        ]);
    }

    public function BOD()
    {
        return view('frontend.profile.bod', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'bods' => BOD::where('status', 1)->orderBy('id', 'asc')->paginate(6),
        ]);
    }

    public function profileDetails($id)
    {
        $profile_details = BOD::where('id', $id)->where('status', 1)->first();

        return view('frontend.profile.profile_details', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'involvements' => Involvement::where('bod_id', $id)->get(),
            'awards' => PersonalAward::where('bod_id', $id)->get(),
            'profile_details' => $profile_details
        ]);
    }
    public function aboutUs()
    {
        return view('frontend.about.about', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'home_button_title' => homeTitleButton::first(),
            'faq' => Faq::where('status', 1)->first(),
            'mission' => Mission::latest('id')->first(),
            'vision' => Vision::latest('id')->first(),
            'skill' => Skill::latest('id')->first(),
            'choose_uss' => HomeChooseUs::where('status', 1)->orderBy('id', 'desc')->get(),
            'testimonials' => Testimonial::where('status', 1)->orderBy('id', 'desc')->get(),
        ]);
    }
    
    public function termsCondition()
    {
        return view('frontend.tc.tc', [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'tc' => TC::latest('id')->first(),
        ]);
    }

    public function ramadanCalender(){
        return view('frontend.others.others',[
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
        ]);
    }
    public function clientsReview(){
        $clients_review = ClientsReview::orderBy('id','desc')->get();
        return view('frontend.others.clients_review',[
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'clients_review' => $clients_review,
        ]);
    }

    public function corporateInternet(){
        $clients = Client::where('status', 1)->get();
        $corporate_internet = CorporateInternet::orderBy('id','desc')->first();
        return view('frontend.others.corporate_internet',[
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'corporate_internet' => $corporate_internet,
            'clients' => $clients
        ]);
    }

    public function magicIP(){
        $magic_ip = MagicIP::orderBy('id','desc')->first();
        return view('frontend.others.magic_ip',[
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'magic_ip' => $magic_ip
        ]);
    }

    public function onlinePayment(Request $request)
    {
        $data = [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'tc' => TC::latest('id')->first(),
        ];

        $paymentData = [];

        if( empty($_GET['edit']) ){
            session()->forget('payment_data');
        } else {
            $paymentData = session()->get('payment_data');
        }

        $data['name'] = !empty($paymentData['name']) ? $paymentData['name'] : '';
        $data['email'] = !empty($paymentData['email']) ? $paymentData['email'] : '';
        $data['user_id'] = !empty($paymentData['user_id']) ? $paymentData['user_id'] : '';
        $data['phone'] = !empty($paymentData['phone']) ? $paymentData['phone'] : '';
        $data['amount'] = !empty($paymentData['amount']) ? $paymentData['amount'] : '';

        if ($request->has('payment')) {

            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'user_id' => 'required',
                'phone' => 'required|numeric|digits:11',
                'amount' => 'required|numeric|min:500',
            ];

            $request->validate($rules);

            $paymentData = [
                'name' => $request->name,
                'email' => $request->email,
                'user_id' => $request->user_id,
                'phone' => $request->phone,
                'amount' => $request->amount,
            ];

            session(['payment_data' => $paymentData]);

            return redirect()->route('online-payment.confirm');
        }

        return view('frontend.online_payment.online_payment', $data);
    }

    public function paymantConfirm(Request $request) {
        if( !session()->has('payment_data') ){
            return redirect()->route('online_payment');
        }

        $data = [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'tc' => TC::latest('id')->first(),
        ];

        $data['session_data'] = $payment_data = session()->get('payment_data');

        $data['name'] = !empty($payment_data['name']) ? $payment_data['name'] : '';
        $data['email'] = !empty($payment_data['email']) ? $payment_data['email'] : '';
        $data['user_id'] = !empty($payment_data['user_id']) ? $payment_data['user_id'] : '';
        $data['phone'] = !empty($payment_data['phone']) ? $payment_data['phone'] : '';
        $data['amount'] = !empty($payment_data['amount']) ? $payment_data['amount'] : '';

        if ($request->has('cancel')) {
            session()->forget('payment_data');
            return redirect()->route('online_payment');
        }

        if ($request->has('confirm')) {

            require_once app_path('Ebl/configuration.php');
            $skypay = new Skypay($configArray);

            $orderId = 'ebl-'.time();
            $paymentData = $payment_data;

            $postData = [];
            $postData['order'] = array(
                'id' => $orderId,
                'amount' => $paymentData['amount'],
                'description' => 'OneSky monthly internet bill for user id: '.$paymentData['user_id'],
                'currency' => 'BDT',
            );
            $postData['submit'] = 'PAY WITH EBL SKYPAY';

            $postData['interaction'] = array(
                'merchant' => array(
                    'name' => 'OneSky Communications Limited.',
                    'logo' => 'https://onesky.com.bd/assets/frontend/images/logo.png',
                ),
                'displayControl' => array(
                    'billingAddress' => 'HIDE'
                ),
                'operation' => 'PURCHASE',
                'timeout'   => '600',
                'timeoutUrl' => route('online-payment.callback', ['timeout', $orderId]),
                'cancelUrl'  => route('online-payment.callback', ['cancel', $orderId]),
                'returnUrl'  => route('online-payment.callback', ['complete', $orderId]),
            );

            // dd($postData['interaction']);

            //Save data into database
            $paymentData['order_id'] = $orderId;
            $paymentData['status']   = 'processing';
            $paymentData['request'] = json_encode($postData);
            $paymentData['created_at'] = date('Y-m-d H:i:s');

            DB::table('online_payment')->insert($paymentData);

            $result = $skypay->Checkout($postData);

            if( !empty($result['redirect']) ){
                return redirect($result['redirect']);
            }

            session()->forget('payment_data');
            if(isset($result['result']) && $result['result'] == 'ERROR'){
                //Update Payment Info
                $updatePayment = [];
                $updatePayment['status'] = 'error';
                $updatePayment['response'] = json_encode($result);
                $updatePayment['updated_at'] = date('Y-m-d H:i:s');

                DB::table('online_payment')->where(['order_id' => $orderId])->update($paymentData);

                return redirect()->route('online_payment')->with(['error_msg' => 'Something went wrong please check your info and try again']);
            }
           
        }

        return view('frontend.online_payment.confirm_payment', $data);
    }

    public function paymentCallback(Request $request, $type, $orderId){
        if( !session()->has('payment_data') ){
            return redirect()->route('online_payment');
        }

        session()->forget('payment_data');

        $data = ['type' => 'error', 'message' => 'Payment failed. please try again.'];

        if( $type == 'cancel' ){  
            //Update Payment Info
            $updatePayment = [];
            $updatePayment['status'] = 'cancel';
            $updatePayment['response'] = json_encode($_REQUEST);
            $updatePayment['updated_at'] = date('Y-m-d H:i:s');

            DB::table('online_payment')->where(['order_id' => $orderId])->update($updatePayment);

            $data = ['type' => 'error', 'message' => 'Your payment has been canceled.'];
        }

        if( $type == 'timeout' ){  
            //Update Payment Info
            $updatePayment = [];
            $updatePayment['status'] = 'timeout';
            $updatePayment['response'] = json_encode($_REQUEST);
            $updatePayment['updated_at'] = date('Y-m-d H:i:s');

            DB::table('online_payment')->where(['order_id' => $orderId])->update($updatePayment);

            $data = ['type' => 'error', 'message' => 'Your payment operation timeout'];
        }

        if( $type == 'complete' ){
            require_once app_path('Ebl/configuration.php');

            $transactionId   = $orderId;
            $resultIndicator = $request->resultIndicator ?? '';
            $eblskypay       = session()->get('eblskypay');
            $status          = 'failed';

            $responseArray = [];
            if( !empty($eblskypay['successIndicator']) && ($eblskypay['successIndicator'] == $resultIndicator) ) {

                $skypay = new Skypay($configArray);
                $responseArray = $skypay->RetrieveOrder($transactionId);

                if(isset($responseArray['id']) && ($responseArray['id'] == $transactionId) && ($responseArray['result'] == 'SUCCESS') && ($responseArray['amount'] == $responseArray['totalAuthorizedAmount']) && ($responseArray['amount'] == $responseArray['totalAuthorizedAmount']) && ($responseArray['status'] == 'CAPTURED')) {
                    
                    $status = 'success';
                }
            }
            else{
                $responseArray = $_REQUEST;
            }

            //Update Payment Info
            $updatePayment = [];
            $updatePayment['status'] = $status;
            $updatePayment['response'] = json_encode($responseArray);
            $updatePayment['updated_at'] = date('Y-m-d H:i:s');

            DB::table('online_payment')->where(['order_id' => $orderId])->update($updatePayment);

            if( $status == 'success' ){
                $data = ['type' => 'success', 'message' => 'Payment received successfully, thank you.'];
            }
            else{
                $data = ['type' => 'error', 'message' => 'Payment failed. please try again.'];
            }
        }

        $data2 = [
            'topbar' => Topbar::latest('id')->first(),
            'menu' => Menu::latest('id')->first(),
            'footer' => Footer::latest('id')->first(),
            'tc' => TC::latest('id')->first(),
        ];

        return view('frontend.online_payment.payment_callback', $data + $data2);
    }
}
