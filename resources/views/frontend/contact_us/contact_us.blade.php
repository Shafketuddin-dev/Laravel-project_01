@extends('frontend.master')
@section('title')
Contact Us || One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}">{{ $menu->{app()->getLocale() . '_menu_home'} }}</a>
                    <a href="javascript:void(0)">{{ $menu->{app()->getLocale() . '_menu_more_title'} }}</a>
                    <a href="javascript:void(0)" class="active">{{ $menu->{app()->getLocale() . '_menu_contact_us'} }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact_section">
    <div class="container">
        <div class="contact_container">
            <div class="form">
                <div class="contact-info wow fadeInLeft">
                    <h3 class="title mb-2 fw-bold text-dark text-muted">{{ $contact_label->{app()->getLocale() . '_title'} }}</h3>
                    <div class="info">
                        <div class="information">
                            <iframe class="mb-3" data-wow-delay="0.1s" src="{{$footer->footer_map_link}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="information">
                            <i class="fa-solid fa-house"></i>
                            <p> {{ $footer->{app()->getLocale() . '_footer_address'} }}</p>
                        </div>
                        <div class="information">
                            <i class="fa-solid fa-envelope"></i>
                            <p> {{ $footer->footer_email }}</p>
                        </div>
                        <div class="information">
                            <i class="fa-solid fa-square-phone"></i>
                            <p> {{ $footer->{app()->getLocale() . '_footer_phone'} }}</p>
                        </div>
                    </div>

                    <div class="social-media">
                        <div class="social-icons">
                            <a target="_blank" href="{{ $topbar->fb_link }}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a target="_blank" href="{{ $topbar->yt_link }}">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a target="_blank" href="{{ $topbar->instagram_link }}">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a target="_blank" href="{{ $topbar->linkedin_link }}">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-form wow fadeInRight">

                    <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="input-container">
                            <input type="text" name="name" class="input" required />
                            <label for="">{{ $contact_label->{app()->getLocale() . '_name_label'} }}</label>
                            <span>{{ $contact_label->{app()->getLocale() . '_name_label'} }}</span>
                            @if ($errors->has('name'))
                            <strong class="error_text">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                        <div class="input-container">
                            <input type="email" name="email" class="input" required />
                            <label for="">{{ $contact_label->{app()->getLocale() . '_email_label'} }}</label>
                            <span>{{ $contact_label->{app()->getLocale() . '_email_label'} }}</span>
                            @if ($errors->has('email'))
                            <strong class="error_text">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                        <div class="input-container">
                            <input type="tel" name="phone" class="input" required />
                            <label for="">{{ $contact_label->{app()->getLocale() . '_phone_label'} }}</label>
                            <span>{{ $contact_label->{app()->getLocale() . '_phone_label'} }}</span>
                            @if ($errors->has('phone'))
                            <strong class="error_text">{{ $errors->first('phone') }}</strong>
                            @endif
                        </div>
                        <div class="input-container">
                            <input type="text" name="subject" class="input" required />
                            <label for="">{{ $contact_label->{app()->getLocale() . '_subject_label'} }}</label>
                            <span>{{ $contact_label->{app()->getLocale() . '_subject_label'} }}</span>
                            @if ($errors->has('subject'))
                            <strong class="error_text">{{ $errors->first('subject') }}</strong>
                            @endif
                        </div>
                        <div class="input-container textarea">
                            <textarea name="query" class="input" required></textarea>
                            <label for="">{{ $contact_label->{app()->getLocale() . '_message_label'} }}</label>
                            <span>{{ $contact_label->{app()->getLocale() . '_message_label'} }}</span>
                            @if ($errors->has('query'))
                            <strong class="error_text">{{ $errors->first('query') }}</strong>
                            @endif
                        </div>
                        @if(config('services.recaptcha.key'))
                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">
                        </div>
                            @if ($errors->has('g-recaptcha-response'))
                            <strong class="error_text">{{ $errors->first('g-recaptcha-response') }}</strong>
                            @endif
                        @endif
                        <input class="btn btn-outline-info text-white mt-3" type="submit" value="{{ $contact_label->{app()->getLocale() . '_button_text'} }}">
                        <i class="fa-regular fa-paper-plane text-white"></i>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
