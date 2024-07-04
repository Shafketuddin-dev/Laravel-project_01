@extends('frontend.master')
@section('title')
    News Event :: One Sky Communications Limited
@endsection
@section('content')
    <!-- news event start -->
    <section class="single_page_top_section bg_rules"
        style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb flat">
                        <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                        <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                        <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_news_event'} }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news_event_section bg2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-8 col-12 event_search_panel wow slideInLeft" data-wow-delay="0.1s">
                    <div class="input_field">
                        <input type="search" name="news_event_search" id="news_event_search" class="form-control"
                            placeholder="{{ __('Search News or Event...') }}" aria-label="Username"
                            data-url="{{ route('ajax.search_news_events') }}">
                        <img src="{{ asset('frontendAssets') }}/static_images/search_black.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-4 col-12 wow slideInRight" data-wow-delay="0.1s">
                    <div class="filter_btn float-end">
                        <select class="form-select" name="news_event_sort" id="news_event_sort"
                            aria-label="Default select example" data-url="{{ route('ajax.sort_news_events') }}">
                            <option selected=""> {{ __('Sort By') }} </option>
                            <option value="newest_news_events"> {{ __('Newest to Oldest') }} </option>
                            <option value="oldest_news_events"> {{ __('Oldest to Newest') }} </option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row news_events_result justify-content-center">
                @if ($news_events->count() == 0)
                    <div class="col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="alert alert-info text-center" role="alert">
                            {{ __('No News or Event Available') }}
                        </div>
                    </div>
                @else
                    @foreach ($news_events as $news_event)
                        <div class="col-lg-4 col-sm-6 col-12 mb-20 wow fadeInUp mt-2" data-wow-delay="0.1s">
                            <div class="news_event_card h-100">
                                <img class="news_event_img" src="{{ asset($news_event->image) }}" alt="">
                                <span><img class="date_img"
                                        src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png"
                                        alt=""></span>
                                <span>{{ $news_event->{app()->getLocale() . '_published_date'} }}</span>
                                <a href="{{ route('news_event_details', $news_event->id) }}">
                                    <h4>{{ $news_event->{app()->getLocale() . '_title'} }}</h4>
                                </a>
                                <a class="read_more_btn" href="{{ route('news_event_details', $news_event->id) }}">
                                    {{ __('Read more') }} </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-end">
                    {{ $news_events->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- news event end -->
@endsection
