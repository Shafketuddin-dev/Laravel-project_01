@extends('frontend.master')
@section('title')
    Circular :: One Sky Communications Limited
@endsection
@section('content')
    <!-- Circular start -->
    <section class="single_page_top_section bg_rules"
        style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb flat">
                        <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                        <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                        <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_circular'} }} </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="circular_section bg3">
        <div class="container">
            <div class="row justify-content-center">
                @if (\App\Models\Circular::count() > 0)
                    @foreach ($circulars as $circular)
                        @if (pathinfo($circular->document, PATHINFO_EXTENSION) == 'pdf')
                            <div class="col-lg-4 col-md-6 col-12 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card circular_card h-100">
                                    <div class="circular_card_head">
                                        <a href="{{ route('circular_details', $circular->id) }}"><img class="img-fluid"
                                                src="{{ asset('frontendAssets') }}/static_images/job.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="circular_card_body">
                                        {{-- <span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>
                        <span> <strong> {{__('Deadline')}}:</strong> {{ $circular->{app()->getLocale() . '_published_date'} }}</span> --}}
                                        <h4 class="circular_card_title"><a
                                                href="{{ route('circular_details', $circular->id) }}">
                                                {{ $circular->{app()->getLocale() . '_title'} }} </a></h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="circular_card_link">
                                            <div class="animation_btn">
                                                <a href="{{ route('circular_details', $circular->id) }}">{{ __('Apply Now') }}</a>
                                            </div>
                                            <a class="mt-1"
                                                href="{{ route('circular_details', $circular->id) }}">{{ __('View Circular') }}
                                                <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-6 col-12 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card circular_card h-100">
                                    <div class="circular_card_head">
                                        <a href="{{ route('circular_details', $circular->id) }}"><img class="img-fluid"
                                                src="{{ asset($circular->document) }}" alt=""></a>
                                    </div>
                                    <div class="circular_card_body">
                                        {{-- <span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>
                        <span> <strong> {{__('Deadline')}}:</strong> {{ $circular->{app()->getLocale() . '_published_date'} }}</span> --}}
                                        <h4 class="circular_card_title"><a
                                                href="{{ route('circular_details', $circular->id) }}">
                                                {{ $circular->{app()->getLocale() . '_title'} }} </a></h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="circular_card_link">
                                            <div class="animation_btn">
                                                <a href="{{ route('circular_details', $circular->id) }}">{{ __('Apply Now') }}</a>
                                            </div>
                                            <a class="mt-1"
                                                href="{{ route('circular_details', $circular->id) }}">{{ __('View Circular') }}
                                                <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-lg-6 mt-3 wow fadeInDown" data-wow-delay="0.1s">
                        <div class="alert alert-info text-center" role="alert">
                            {{ __('No Circular Available') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-end">
                    {{ $circulars->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Circular end -->
@endsection
