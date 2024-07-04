    <!-- top_social_info start -->
    <section class="top_social_info">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <ul class="left">
                        <li> <a class="btn btn-secondary" href="{{ route('btrc') }}"> {{ __('BTRC Approved Tariff') }} </a></li>
                        <li> <i class='bx bx-phone-call'></i> {{ $topbar->{app()->getLocale() . '_hotline'} }}</li>
                        <li> <i class='bx bx-phone-call'></i> {{ $topbar->{app()->getLocale() . '_registration_text'} }}</li>
                        <li> <i class='bx bx-envelope'></i> {{ $topbar->query_email }}</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <ul class="right">
                        <li class="bg2"> <a target="_blank" href="{{ $topbar->yt_link }}"><i class='bx bxl-youtube'></i></a> </li>
                        <li class="bg2"> <a target="_blank" href="{{ $topbar->linkedin_link }}"><i class='bx bxl-linkedin'></i></a> </li>
                        <li class="bg2"> <a target="_blank" href="{{ $topbar->instagram_link }}"><i class='bx bxl-instagram'></i></a> </li>
                        <li class="bg2"> <a target="_blank" href="{{ $topbar->fb_link }}"><i class='bx bxl-facebook'></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- top_social_info end -->