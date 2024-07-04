@extends('frontend.master')
@section('title')
News Event Details || One Sky Communications Limited
@endsection
@section('content')
<!-- news event Details start -->
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                    <a href="{{ route('news_event') }}"> {{ $menu->{app()->getLocale() . '_menu_news_event'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{__('News & Event Details')}} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news_event_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-20 wow zoomIn">
                <div class="news_event_card details_news_event">
                    <img class="news_event_img" src="{{ asset($news_event_details->image) }}" alt="">
                    <span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>
                    <span>{{ $news_event_details->{app()->getLocale() . '_published_date'} }}</span>
                    <p>
                    {!! $news_event_details->{app()->getLocale() . '_description'} !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news event Details end -->
@endsection