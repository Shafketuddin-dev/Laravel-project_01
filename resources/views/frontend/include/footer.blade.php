    <!-- Footer Start -->
    <div class="container-fluid text-light footer fixed-bottom">
        <img class="img-fluid footer_bg_img" src="{{ asset('frontendAssets/img/map.png') }}" alt="">
        <div class="container relativewithzindex999 mt-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <p class="section-title text-white h5 mb-4"> {{ $footer->{app()->getLocale() . '_footer_contact_title'} }} <span></span></p>

                    <p class="mb-0 d-flex justify-content-space-between"><i class="fa-solid fa-house-signal me-2"></i> {{ $footer->{app()->getLocale() . '_footer_address'} }} </p>
                    <p><i class="fa fa-phone-alt me-2"></i>{{ $footer->{app()->getLocale() . '_footer_phone'} }}</p>
                    <p><i class="fa fa-envelope me-2"></i>{{ $footer->footer_email }}</p>
                    <div class="pt-2 footer_social">
                        <a target="_blank" class="btn btn-outline-light btn-social" href="{{ $topbar->yt_link }}"><i class="fa-brands fa-youtube"></i>
                            <a target="_blank" class="btn btn-outline-light btn-social" href="{{ $topbar->fb_link }}"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" class="btn btn-outline-light btn-social" href="{{ $topbar->instagram_link }}"><i class="fab fa-instagram"></i></a>
                            <a target="_blank" class="btn btn-outline-light btn-social" href="{{ $topbar->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <a href="{{$footer->app_url}}">
                        <img class="img-fluid app_link_image mt-3" src="{{ asset($footer->image) }}" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <p class="section-title text-white h5 mb-4">{{ $footer->{app()->getLocale() . '_footer_quick_link_title'} }} <span></span></p>
                    <a class="btn btn-link" href="{{ route('about_us') }}">{{ $menu->{app()->getLocale() . '_menu_about_us'} }}</a>
                    <a class="btn btn-link" href="https://skytrackerbd.com">{{ $menu->{app()->getLocale() . '_menu_vts'} }}</a>
                    <a class="btn btn-link" href="https://ositbd.com">{{ $menu->{app()->getLocale() . '_menu_it'} }}</a>
                    <a class="btn btn-link" href="{{ route('circular') }}">{{ $menu->{app()->getLocale() . '_menu_circular'} }}</a>
                    <a class="btn btn-link" href="{{ route('btrc') }}">{{ $topbar->{app()->getLocale() . '_brtc'} }}</a>
                    <a class="btn btn-success" href="{{ $footer->company_profile_url }}"><i class="fa-solid fa-file-arrow-down me-1"></i> {{ $footer->{app()->getLocale() . '_footer_company_profile_title'} }} </a>
                </div>
                <div class="col-lg-5 col-md-12">
                    <p class="section-title text-white h5 mb-4">{{ $footer->{app()->getLocale() . '_footer_map_title'} }} <span></span> </p>
                    <iframe
                        src="{{$footer->footer_map_link}}"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="container relativewithzindex999">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                         <strong> {{ $footer->{app()->getLocale() . '_footer_copyright'} }} </strong> </a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{ route('clients_review') }}">{{ __('Review') }}</a>
                            <a href="{{ route('blog') }}">{{ $menu->{app()->getLocale() . '_menu_blog'} }}</a>
                            <a href="{{ route('news_event') }}">{{ $menu->{app()->getLocale() . '_menu_news_event'} }}</a>
                            <a href="{{ route('terms_condition') }}">{{ $footer->{app()->getLocale() . '_footer_tc'} }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->