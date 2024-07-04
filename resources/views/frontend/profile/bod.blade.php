@extends('frontend.master')
@section('title')
Board of Directors || One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_whoweare_title'} }} </a>
                    <a href="javascript:void(0)" class="active">{{ $menu->{app()->getLocale() . '_menu_bod'} }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bod_section bg1">
    <div class="container">
        <div class="row mb-20 justify-content-center">
            @foreach($bods as $bod)
            <div class="col-xl-6 col-lg-12 mobile_bods mt-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="board_of_director_card_section">
                    <div class="row all_bods mt-10">
                        <div class="col-lg-4 col-md-3 col-sm-12 col-12">
                            <img class="frame wow zoomIn img-fluid bod_img" src="{{ asset($bod->image) }}" alt="Board of Director image">
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-12 col-12 cus_mt_10 profile_info_area">
                            <h3>{{ $bod->{app()->getLocale() . '_name'} }}</h3>
                            <span>{{ $bod->designation->{app()->getLocale() . '_name'} }}</span>
                            <p>{{ \Illuminate\Support\Str::limit($bod->{app()->getLocale() . '_description'}, 150, '...') }}</p>
                            <div class="animation_btn_view">
                                <a href="{{ route('profile_details', $bod->id) }}" class="text-white">
                                    <img class="left_icon" src="{{ asset('frontendAssets') }}/static_images/school_crown.png" alt="">
                                    {{__('View Profile')}}
                                    <img class="arrow_icon" src="{{ asset('frontendAssets') }}/static_images/right_arrow_white.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
                {{$bods->links()}}
            </div>
        </div>
    </div>
</section>
@endsection