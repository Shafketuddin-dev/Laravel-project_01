@extends('frontend.master')
@section('title')
Profile Details:: One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_whoweare_title'} }} </a>
                    <a href="{{ route('board_of_directors') }}"> {{ $menu->{app()->getLocale() . '_menu_bod'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{__('Profile Details')}} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="profile_details_section bg2">
    <div class="container mb-5">
        <div class="row profile_area align-items-center">
            <div class="col-xxl-3 col-lg-4 col-md-5 col-sm-12 order-lg-1 order-sm-2 order-2 col-12 mt-40 wow fadeInDown mb-5" data-wow-delay="0.1s">
                <img class="shadow wow zoomIn img-fluid bod_img" src="{{ asset($profile_details->image) }}" alt="Board of Director image">
            </div>
            <div class="col-xxl-9 col-lg-8 col-md-7 col-sm-12 order-lg-2 order-sm-1 order-1 col-12 mt-3 profile_info_area wow fadeInUp" data-wow-delay="0.1s">
                <h1>{{ $profile_details->{app()->getLocale() . '_name'} }}</h1>
                <span>{{ $profile_details->designation->{app()->getLocale() . '_name'} }}</span>
                <p> {{ $profile_details->{app()->getLocale() . '_description'} }} </p>
            </div>
        </div>
    </div>
</section>
@endsection