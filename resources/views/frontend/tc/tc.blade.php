@extends('frontend.master')
@section('title')
Terms & Conditions :: One Sky Communications Limited
@endsection
@section('content')
<!-- Terms Condition start -->
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{ $tc->{app()->getLocale() . '_title'} }} </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
<div class="row mt-3">
            <div class="col-lg-8 mb-3">
                <div class="main_title">
                    <h1 class="title">{{ $tc->{app()->getLocale() . '_title'} }}</h1>
                    <span class="line"></span>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            {!! $tc->{app()->getLocale() . '_payment_mode'} !!} <br>
            {!! $tc->{app()->getLocale() . '_documentation'} !!} <br>
            {!! $tc->{app()->getLocale() . '_after_sales_service'} !!} <br>
            {!! $tc->{app()->getLocale() . '_client_responsibility'} !!} <br>
            {!! $tc->{app()->getLocale() . '_others'} !!} <br>
            {!! $tc->{app()->getLocale() . '_contact_termination'} !!} <br>
        </div>
    </div>
</div>

<!-- Terms Condition end -->
@endsection