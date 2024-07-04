@extends('frontend.master')
@section('title')
BTRC Approved Packages :: One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{ $topbar->{app()->getLocale() . '_brtc'} }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="package_section">
    <div class="container">
        <div class="row wow zoomIn" data-wow-delay="0.1s">
            <div class="col-lg-12 btrc_approved_img">
                <img src="{{ asset($topbar->image) }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection