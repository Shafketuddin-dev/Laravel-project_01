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
    <div class="container">
        <div class="row profile_area align-items-center">
            <div class="col-xxl-3 col-lg-4 col-md-5 col-sm-12 order-lg-1 order-sm-2 order-2 col-12 mt-40 wow fadeInDown" data-wow-delay="0.1s">
                <img class="frame wow zoomIn img-fluid bod_img" src="{{ asset($profile_details->image) }}" alt="Board of Director image">
            </div>
            <div class="col-xxl-9 col-lg-8 col-md-7 col-sm-12 order-lg-2 order-sm-1 order-1 col-12 mt-3 profile_info_area wow fadeInUp" data-wow-delay="0.1s">
                <h1>{{ $profile_details->{app()->getLocale() . '_name'} }}</h1>
                <span>{{ $profile_details->designation->{app()->getLocale() . '_name'} }}</span>
                <p> {{ $profile_details->{app()->getLocale() . '_description'} }} </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="main_title" style="background: url('{{ asset('frontendAssets') }}/static_images/title_bg_box.png'); background-repeat: no-repeat">
                    <h1 class="title"> {{__('Involvement at a glance')}} </h1>
                    <span class="line"></span>
                </div>
            </div>
            @if($involvements->count() == 0)
            <div class="col-lg-12 mt-3 wow zoomIn" data-wow-delay="0.1s">
                <div class="alert alert-info text-center" role="alert">
                    {{__('No Involvement Available')}}
                </div>
            </div>
            @else
            <div class="col-lg-12">
                <div class="timeline">
                    <ul>
                        @foreach ($involvements as $involvement)
                        @if ($loop->odd)
                        <li class="wow wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="top">{{ $involvement->{app()->getLocale() . '_designation'} }}</div>
                            <div class="title">{{ $involvement->{app()->getLocale() . '_company_name'} }}</div>
                            <div class="description">{{ $involvement->{app()->getLocale() . '_description'} }}</div>
                        </li>
                        @elseif ($loop->even)
                        <li class="wow wow fadeInRight" data-wow-delay="0.1s">
                            <div class="top">{{ $involvement->{app()->getLocale() . '_designation'} }}</div>
                            <div class="title">{{ $involvement->{app()->getLocale() . '_company_name'} }}</div>
                            <div class="description">{{ $involvement->{app()->getLocale() . '_description'} }}</div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="main_title" style="background: url('{{ asset('frontendAssets') }}/static_images/title_bg_box.png'); background-repeat: no-repeat">
                    <h1 class="title">{{__('Awards & Recognition')}}</h1>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            @if($awards->count() == 0)
            <div class="col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="alert alert-info text-center" role="alert">
                    {{__('No Award Available')}}
                </div>
            </div>
            @else
            @foreach($awards as $award)
            <div class="col-lg-4 col-md-6 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="award_card h-100">
                    <div class="award_icon_box">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image{{ $award->id }}">
                        <img class="main_img img-fluid" src="{{ asset($award->image) }}" alt="">
                        <h3>{{ $award->{app()->getLocale() . '_title'} }}</h3>
                        <p>{!! \Illuminate\Support\Str::words($award->{app()->getLocale() . '_description'}, 12, '...') !!}</p>
                        <div class="modal fade" id="show_big_image{{ $award->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content modal_custom_content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                            <i class="fa-solid fa-star"></i>
                                            {{ $award->{app()->getLocale() . '_title'} }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark text-white"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>{{ $award->{app()->getLocale() . '_description'} }}</p>
                                        <div class="show_big_image">
                                            <img src="{{ asset($award->image) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection