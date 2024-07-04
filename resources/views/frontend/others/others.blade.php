@extends('frontend.master')
@section('title')
    Ramadan Calender :: One Sky Communications Limited
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pdf_view_area">
                    <div class="top_area">
                        <h3 class="wow slideInLeft" data-wow-delay="0.1s">Ramadan Calender 2024</h3>
                        <a class="download_btn wow slideInRight" data-wow-delay="0.1s" href="https://drive.google.com/uc?export=download&id=1oJVsRldW5ET7mwOt2TvOyT1VglgRWMrm"> Download <img src="{{ asset('frontendAssets') }}/static_images/download_icon.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center wow zoomIn" data-wow-delay="0.1s">
                <img class="img-fluid" src="{{ asset('frontendAssets') }}/static_images/ramadan.jpg" alt="Ramadan Image">
            </div>
        </div>
    </div>
@endsection
