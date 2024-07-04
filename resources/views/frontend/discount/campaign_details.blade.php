@extends('frontend.master')
@section('title')
    Campaign Details :: One Sky Communications Limited
@endsection
@section('content')
    <section class="single_page_top_section bg_rules"
        style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb flat">
                        <a href="{{ route('/') }}"> {{ __('Home') }} </a>
                        <a href="javascript:void(0)" class="active"> {{ __('Campaign Offer Details') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="offer_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <img class="discount_image img-fluid desktop_slider"
                                src="{{ asset($campaign_details->desktop_image) }}" alt="">
                            <img class="discount_image img-fluid mobile_slider"
                                src="{{ asset($campaign_details->mobile_image) }}" alt="">
                        </div>
                        <div class="card-body">
                            @if ($campaign_details->offer_last_date)
                                <div class="offer_time">
                                    <h2 class="text-center" id="headline"><span> {{ __('Hurry Up') }}!</span>
                                        {{ __('This offer ends in') }}:</h2>

                                    <div class="coundown_area">
                                        <div id="countdown">
                                            <ul>
                                                <li><span id="days"></span> {{ __('days') }} </li>
                                                <li><span id="hours"></span> {{ __('Hours') }} </li>
                                                <li><span id="minutes"></span> {{ __('Minutes') }} </li>
                                                <li><span id="seconds"></span> {{ __('Seconds') }} </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <p class="mt-3">{!! $campaign_details->{app()->getLocale() . '_description'} !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
    // Assuming $sliderId contains the ID of the slider clicked
    $slider = DB::table('sliders')->where('id', $campaign_details->id)->first();
    if ($slider) {
        $formattedTimer =
            \Carbon\Carbon::parse($slider->offer_last_date)
                ->setTimezone('Asia/Dhaka')
                ->format('Y-m-d') . ' 00:00:00';
    } else {
        // Handle the case when slider with the provided ID is not found
        $formattedTimer = null;
    }
@endphp
@endsection
@section('script')
    <script>
        (function() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            const offer_last_date = new Date("{{ $formattedTimer }}");

            const countDown = offer_last_date.getTime(),
                x = setInterval(function() {
                    const now = new Date().getTime(),
                        distance = countDown - now;

                    document.getElementById("days").innerText = Math.floor(distance / (day));
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour));
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute));
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                    var lang = '{{ app()->getLocale() }}';

                    if (distance < 0) {
                        var headlineText = lang === 'bn' ? 'অফারটি শেষ হয়ে গেছে!' : 'Offer has expired!';
                        document.getElementById("headline").innerText = headlineText;
                        document.getElementById("countdown").style.display = "none";
                        document.getElementById("content").style.display = "block";
                        clearInterval(x);
                    }
                }, 1000);
        })();
    </script>
@endsection
