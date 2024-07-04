@extends('frontend.master')
@section('title')
Award & Achievement :: One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_awards'} }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="award_section bg1">
    <div class="container">
        <div class="row justify-content-center">
            @if($awards->count() == 0)
            <div class="col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="alert alert-info text-center" role="alert">
                    {{__('No Award or Achievement Available')}}
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
                    </a>
                    <h3> {{ $award->{app()->getLocale() . '_title'} }} </h3>
                    <p>
                        {!! \Illuminate\Support\Str::words($award->{app()->getLocale() . '_description'}, 12, '...') !!}
                    </p>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                </div>

                                <div class="modal-body">
                                    <p>{!! $award->{app()->getLocale() . '_description'} !!}</p>
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
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
                {{$awards->links()}}
            </div>
        </div>
    </div>
</section>
@endsection