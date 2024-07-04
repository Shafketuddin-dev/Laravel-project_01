@extends('frontend.master')
@section('title')
    About Us :: One Sky Communications Limited
@endsection
@section('content')
    <section class="single_page_top_section bg_rules"
        style="background: url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb flat">
                        <a href="{{ route('/') }}">{{ $menu->{app()->getLocale() . '_menu_home'} }}</a>
                        <a href="javascript:void(0)">{{ $menu->{app()->getLocale() . '_menu_whoweare_title'} }}</a>
                        <a href="javascript:void(0)" class="active">{{ $menu->{app()->getLocale() . '_menu_about_us'} }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why we end -->
    <section class="why_we_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_title">
                        <h1 class="title">{{ $home_button_title->{app()->getLocale() . '_home_choose_us_title'} }}</h1>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                @foreach ($choose_uss as $choose_us)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3 mb-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card why_choose_us_card h-100">
                            <div class="card-body">
                                <div class="choose_card_header">
                                    <div class="row align-items-center">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-3">
                                            <img src="{{ asset($choose_us->image) }}" alt="">
                                        </div>
                                        <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-9 col-sm-8 col-9">
                                            <h4 class="fw-bold">{{ $choose_us->{app()->getLocale() . '_title'} }} </h4>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <p class="text-justify">
                                                {{ $choose_us->{app()->getLocale() . '_description'} }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- why we end -->
    <section class="mission_vission_section mt-5 mb-5">
        <div class="container">
            <div class="row mission_vission_body align-items-center">
                <div class="col-lg-4 order-lg-1 order-sm-2 order-2 col-md-6 col-sm-12 text-center">
                    <img class="frame wow zoomIn" src="{{ asset($mission->image) }}" alt="mission image">
                </div>
                <div class="col-lg-8 order-lg-2 order-sm-1 order-1 col-md-6 col-sm-12 wow fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main_title">
                                <h1 class="title">{{ $mission->{app()->getLocale() . '_title'} }}</h1>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <p class="text-justify">{{ $mission->{app()->getLocale() . '_description'} }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mission_vission_body align-items-center mt-5">
                <div class="col-lg-8 col-md-6 col-sm-12 wow fadeInLeft">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main_title">
                                <h1 class="title">{{ $vision->{app()->getLocale() . '_title'} }}</h1>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <p class="text-justify">{{ $vision->{app()->getLocale() . '_description'} }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <img class="frame wow zoomIn" src="{{ asset($vision->image) }}" alt="vision image">
                </div>
            </div>
        </div>
    </section>
    <!-- skills faq start -->
    <section class="skills_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 py-3">
                    <div class="main_title">
                        <h1 class="title">{{ $skill->{app()->getLocale() . '_title'} }}</h1>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" src="{{ asset($skill->image) }}" alt="">
                </div>
                <div class="col-lg-6 col-md-12 mt-3">
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2">{{ $skill->{app()->getLocale() . '_corporate_internet'} }}</h4>
                            <p class="mb-2">{{ $skill->{app()->getLocale() . '_corporate_internet_percentage'} }}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar"
                                aria-valuenow="{{ $skill->en_corporate_internet_percentage }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2">{{ $skill->{app()->getLocale() . '_home_internet'} }}</h4>
                            <p class="mb-2">{{ $skill->{app()->getLocale() . '_home_internet_percentage'} }}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar"
                                aria-valuenow="{{ $skill->en_home_internet_percentage }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2">{{ $skill->{app()->getLocale() . '_customer_support'} }}</h4>
                            <p class="mb-2">{{ $skill->{app()->getLocale() . '_customer_support_percentage'} }}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar"
                                aria-valuenow="{{ $skill->en_customer_support_percentage }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2">{{ $skill->{app()->getLocale() . '_vts'} }}</h4>
                            <p class="mb-2">{{ $skill->{app()->getLocale() . '_vts_percentage'} }}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar"
                                aria-valuenow="{{ $skill->en_vts_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2">{{ $skill->{app()->getLocale() . '_training'} }}</h4>
                            <p class="mb-2">{{ $skill->{app()->getLocale() . '_training_percentage'} }}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                aria-valuenow="{{ $skill->en_training_percentage }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- skills faq end -->
    <!--  faq start -->
    <section class="skills_section mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 py-3 mb-3">
                    <div class="main_title">
                        <h1 class="title">{{ $home_button_title->{app()->getLocale() . '_home_faq_title'} }}</h1>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 text-center">
                    <img class="img-fluid" src="{{ asset($faq->image) }}" alt="">
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="accordion_wrapper mt-2">
                        <div class="accordion">
                            <input type="radio" name="radio-a" id="check1" checked>
                            <label class="accordion_label"
                                for="check1">{{ $faq->{app()->getLocale() . '_question_one'} }}</label>
                            <div class="accordion_content">
                                <p>{{ $faq->{app()->getLocale() . '_answer_one'} }}</p>
                            </div>
                        </div>
                        <div class="accordion">
                            <input type="radio" name="radio-a" id="check2">
                            <label class="accordion_label"
                                for="check2">{{ $faq->{app()->getLocale() . '_question_two'} }}</label>
                            <div class="accordion_content">
                                <p>{{ $faq->{app()->getLocale() . '_answer_two'} }}</p>
                            </div>
                        </div>
                        <div class="accordion">
                            <input type="radio" name="radio-a" id="check3">
                            <label class="accordion_label"
                                for="check3">{{ $faq->{app()->getLocale() . '_question_three'} }}</label>
                            <div class="accordion_content">
                                <p>{{ $faq->{app()->getLocale() . '_answer_three'} }}</p>
                            </div>
                        </div>
                        <div class="accordion">
                            <input type="radio" name="radio-a" id="check4">
                            <label class="accordion_label"
                                for="check4">{{ $faq->{app()->getLocale() . '_question_four'} }}</label>
                            <div class="accordion_content">
                                <p>{{ $faq->{app()->getLocale() . '_answer_four'} }}</p>
                            </div>
                        </div>
                        <div class="accordion">
                            <input type="radio" name="radio-a" id="check5">
                            <label class="accordion_label"
                                for="check5">{{ $faq->{app()->getLocale() . '_question_five'} }}</label>
                            <div class="accordion_content">
                                <p>{{ $faq->{app()->getLocale() . '_answer_five'} }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  faq end -->
    <!-- testimonial start -->
    <section class="testimonial_section bg_rules mb-3">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 py-3">
                    <div class="main_title">
                        <h1 class="title">{{ $home_button_title->{app()->getLocale() . '_home_testimonial_title'} }}
                        </h1>
                        <span class="line" style="display: inline-block"></span>
                    </div>
                </div>
            </div>
            <div class="row testimonial wow zoomIn" data-wow-delay="0.1s">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-12 mb-5">
                        <div class="feedback_wrapper">
                            <div class="card feedback_card">
                                <div class="info_box">
                                    <img src="{{ asset($testimonial->image) }}" alt="">
                                    <p><i class='fas fa-quote-left'
                                            style='font-size:36px; display: block; margin-top: 15px;'></i>
                                        {{ $testimonial->{app()->getLocale() . '_description'} }} <i
                                            class='fas fa-quote-right' style='font-size:36px; display: block;'></i></p>
                                    <h3>{{ $testimonial->{app()->getLocale() . '_name'} }}</h3>
                                    <span
                                        class="fst-italic">{{ $testimonial->{app()->getLocale() . '_designation'} }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- testimonial end -->
@endsection
