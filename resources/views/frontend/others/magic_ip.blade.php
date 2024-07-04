@extends('frontend.master')
@section('title')
Magic IP :: One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background: url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}">{{ $menu->{app()->getLocale() . '_menu_home'} }}</a>
                    <a href="javascript:void(0)" class="active"> {{ __('Magic IP') }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container corporate_internet mt-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-3 wow fadeInLeft" data-wow-delay="0.1s">
            <h1>{{ $magic_ip->{app()->getLocale() . '_title'} }}</h1>
            <p class="mt-3"> {{ $magic_ip->{app()->getLocale() . '_head_para'} }} </p>
        </div>
        <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
            <img class="img-fluid hero_image" src="{{ asset($magic_ip->image) }}" alt="Magic IP Image">
        </div>
    </div>
</div>
<div class="container corporate_client mt-5">
    <div class="row">
        <div class="col-lg-12">
            {!! $magic_ip->{app()->getLocale() . '_body_text'} !!}
        </div>
        <div class="col-lg-12">
            <p style="font-size: 22px;">Contact Us for a Magic IP Trial:
                Try out Magic IP for your business today! Contact us for a trial and enjoy seamless connectivity for your corporate operations. You can register for a trial by filling out the <a class="btn trial_button" target="_blank" href="https://forms.gle/zv3vdapX26neQeub9">form here</a> or by calling us at <a href="tel:01980011577">01980011577</a></p>
        </div>
    </div>
</div>
@endsection
