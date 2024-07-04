@extends('frontend.master')
@section('title')
Clients Review :: One Sky Communications Limited
@endsection
@section('content')
    <section class="single_page_top_section bg_rules"
        style="background: url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb flat">
                        <a href="{{ route('/') }}">{{ $menu->{app()->getLocale() . '_menu_home'} }}</a>
                        <a href="javascript:void(0)" class="active"> {{ __('Clients Review') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row mt-3 mb-5">
            <div class="col-lg-12 text-center">
                <div class="main_title wow slideInUp" data-delay="0.1s">
                    <h1 class="title">{{ __('Clients Review') }}?</h1>
                    <span class="line" style="display: inline-block"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            @if($clients_review->count() == 0)
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                <div class="alert alert-info text-center" role="alert">
                    {{__('No Client Review Available')}}
                </div>
            </div>
            @else
            @foreach($clients_review as $review)
            <div class="col-lg-6 col-md-6 col-12 mb-4 wow zoomIn" data-delay="0.2s">
                <div class="card review_card">
                    <img class="img-fluid" src="{{ asset($review->image) }}" alt="Client Review Image">
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
