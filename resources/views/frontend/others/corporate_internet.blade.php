@extends('frontend.master')
@section('title')
Best Corporate Internet :: One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background: url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}">{{ $menu->{app()->getLocale() . '_menu_home'} }}</a>
                    <a href="javascript:void(0)" class="active"> {{ __('Corporate Internet') }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container corporate_internet mt-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-3 wow fadeInLeft" data-wow-delay="0.1s">
            <h1>{{ $corporate_internet->en_title }}</h1>
            <p class="mt-3"> {{ $corporate_internet->en_head_para_one }} </p>
        </div>
        <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
            <img class="img-fluid hero_image" src="{{ asset($corporate_internet->image) }}" alt="Corporate Image">
        </div>
    </div>
    <div class="row points mt-5">
        <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="card h-100 text-center">
                <img class="img-fluid" src="{{ asset($corporate_internet->item_image_one) }}" alt="Corporate Item Image">
                <h3 class="mt-3 fw-bold"> {{ $corporate_internet->en_item_title_one }} </h3>
                <p class="mt-3"> {!! $corporate_internet->en_item_description_one !!} </p>
            </div>
        </div>
        <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="card h-100 text-center">
                <img class="img-fluid" src="{{ asset($corporate_internet->item_image_two) }}" alt="Corporate Item Image">
                <h3 class="mt-3 fw-bold"> {{ $corporate_internet->en_item_title_two }} </h3>
                <p class="mt-3"> {!! $corporate_internet->en_item_description_two !!} </p>
            </div>
        </div>
        <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.3s">
            <a href="{{ route('magic_ip') }}">
                <div class="card h-100 text-center">
                    <img class="img-fluid" src="{{ asset($corporate_internet->item_image_three) }}" alt="Corporate Item Image">
                    <h3 class="mt-3 fw-bold"> {{ $corporate_internet->en_item_title_three }} </h3>
                    <p class="mt-3"> {!! $corporate_internet->en_item_description_three !!} </p>
                </div>
            </a>
        </div>
        <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="card h-100 text-center">
                <img class="img-fluid" src="{{ asset($corporate_internet->item_image_four) }}" alt="Corporate Item Image">
                <h3 class="mt-3 fw-bold"> {{ $corporate_internet->en_item_title_four }} </h3>
                <p class="mt-3"> {!! $corporate_internet->en_item_description_four !!} </p>
            </div>
        </div>
        <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="card h-100 text-center">
                <img class="img-fluid" src="{{ asset($corporate_internet->item_image_five) }}" alt="Corporate Item Image">
                <h3 class="mt-3 fw-bold"> {{ $corporate_internet->en_item_title_five }} </h3>
                <p class="mt-3"> {!! $corporate_internet->en_item_description_five !!} </p>
            </div>
        </div>
        <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="card h-100 text-center">
                <img class="img-fluid" src="{{ asset($corporate_internet->item_image_six) }}" alt="Corporate Item Image">
                <h3 class="mt-3 fw-bold"> {{ $corporate_internet->en_item_title_six }} </h3>
                <p class="mt-3"> {!! $corporate_internet->en_item_description_six !!} </p>
            </div>
        </div>
        <div class="col-lg-12 wow fadeInUp footer_description" data-wow-delay="0.4s">
            {!! $corporate_internet->en_footer_description !!}
        </div>
        <div class="col-lg-12">
            <p style="font-size: 22px;">Register for a <a target="_blank" class="btn trial_button" href="https://forms.gle/zv3vdapX26neQeub9">free trial</a> today or Call us at <a href="tel:01980011577">01980011577</a></p>
        </div>
    </div>
</div>
<div class="container corporate_client mt-5">
    <div class="row client_slick">
        @foreach ($clients as $client)
        <div class="item">
            <img class="img-fluid" src="{{ asset($client->image) }}">
        </div>
        @endforeach
    </div>
</div>
@endsection
