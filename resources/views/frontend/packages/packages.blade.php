@extends('frontend.master')
@section('title')
Packages :: One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{__('Internet Packages')}} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="package_section">
    <div class="container">
        <div class="tab-class">
            <div class="tab_header text-center mt-3 wow fadeInDown" data-wow-delay="0.1s">
                <ul
                    class="nav nav-pills d-inline-flex justify-content-center bg-white package_tab text-uppercase rounded-pill">
                    <li class="nav-item">
                        <a class="nav-link rounded-pill text-dark active" data-bs-toggle="pill"
                            href="#tab-1">{{ $package_category[0]->{app()->getLocale() . '_title'} }}</a>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link rounded-pill text-dark" data-bs-toggle="pill"
                            href="#tab-2">{{ $package_category[1]->{app()->getLocale() . '_title'} }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-pill text-dark" data-bs-toggle="pill"
                            href="#tab-3">{{ $package_category[2]->{app()->getLocale() . '_title'} }}</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-3 wow fadeInUp" data-wow-delay="0.1s">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row justify-content-center">
                        @foreach ($home_packages as $package)
                            <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-6 col-12 mt-3 mb-2">
                                <div class="pricing_item">
                                    <h4>{{ $package->{app()->getLocale() . '_package_name'} }}</h4>
                                    <div class="box text-center">
                                        <div class="package_chart">
                                            {{-- <p class="mbps_label_2">{{ __('UP TO') }}</p> --}}
                                            <h4>{{ $package->{app()->getLocale() . '_mbps_value'} }}</h4>
                                            <p class="mbps_label">{{ __('Mbps') }}</p>
                                        </div>
                                        <div class="circlechart" data-percentage="{{ $package->en_mbps_value }}">
                                        </div>
                                    </div>
                                    <span class="currency_label">
                                        {{ $package->{app()->getLocale() . '_amount_label'} }} </span>
                                    <span class="price"> {{ $package->{app()->getLocale() . '_amount'} }} </span>
                                    <span class="currency_label"> {{ __('/ month') }} </span>
                                    <ul class="feature">
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_one || $package->bn_short_info_one)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_one'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_two || $package->bn_short_info_two)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_two'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_three || $package->bn_short_info_three)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_three'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_four || $package->bn_short_info_four)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_four'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_five || $package->bn_short_info_five)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_five'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_six || $package->bn_short_info_six)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_six'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_seven || $package->bn_short_info_seven)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_seven'} }}
                                        </li>
                                    </ul>
                                    <a class="package_btn"
                                        href="{{ route('buy_package', $package->id) }}">{{ $package->{app()->getLocale() . '_button_text'} }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade p-0">
                    <div class="row justify-content-center">
                        @foreach ($sme_package as $package)
                            <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-6 col-12 mt-3 mb-2">
                                <div class="pricing_item">
                                    <h4>{{ $package->{app()->getLocale() . '_package_name'} }}</h4>
                                    <div class="box text-center">
                                        <div class="package_chart">
                                            {{-- <p class="mbps_label_2">{{ __('UP TO') }}</p> --}}
                                            <h4>{{ $package->{app()->getLocale() . '_mbps_value'} }}</h4>
                                            <p class="mbps_label">{{ __('Mbps') }}</p>
                                        </div>
                                        <div class="circlechart" data-percentage="{{ $package->en_mbps_value }}">
                                        </div>
                                    </div>
                                    <span class="currency_label">
                                        {{ $package->{app()->getLocale() . '_amount_label'} }} </span>
                                    <span class="price"> {{ $package->{app()->getLocale() . '_amount'} }} </span>
                                    <span class="currency_label"> {{ __('/ month') }} </span>
                                    <ul class="feature">
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_one || $package->bn_short_info_one)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_one'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_two || $package->bn_short_info_two)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_two'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_three || $package->bn_short_info_three)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_three'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_four || $package->bn_short_info_four)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_four'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_five || $package->bn_short_info_five)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_five'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_six || $package->bn_short_info_six)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_six'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_seven || $package->bn_short_info_seven)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_seven'} }}
                                        </li>
                                    </ul>
                                    <a class="package_btn"
                                        href="{{ route('buy_package', $package->id) }}">{{ $package->{app()->getLocale() . '_button_text'} }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade p-0">
                    <div class="row justify-content-center">
                        @foreach ($corporate_package as $package)
                            <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-6 col-12 mt-3 mb-2">
                                <div class="pricing_item">
                                    <h4>{{ $package->{app()->getLocale() . '_package_name'} }}</h4>
                                    <div class="box text-center">
                                        <div class="package_chart">
                                            {{-- <p class="mbps_label_2">{{ __('UP TO') }}</p> --}}
                                            <h4>{{ $package->{app()->getLocale() . '_mbps_value'} }}</h4>
                                            <p class="mbps_label">{{ __('Mbps') }}</p>
                                        </div>
                                        <div class="circlechart" data-percentage="{{ $package->en_mbps_value }}">
                                        </div>
                                    </div>
                                    <span class="currency_label">
                                        {{ $package->{app()->getLocale() . '_amount_label'} }}: </span>
                                    <span class="price" style="font-size: 22px;"> {{ $package->{app()->getLocale() . '_amount'} }} </span>
                                    {{-- <span class="currency_label"> {{ __('/ month') }} </span> --}}
                                    <ul class="feature">
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_one || $package->bn_short_info_one)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_one'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_two || $package->bn_short_info_two)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_two'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_three || $package->bn_short_info_three)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_three'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_four || $package->bn_short_info_four)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_four'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_five || $package->bn_short_info_five)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_five'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_six || $package->bn_short_info_six)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_six'} }}
                                        </li>
                                        <li class="d-flex justify-content-space-between">
                                            @if ($package->en_short_info_seven || $package->bn_short_info_seven)
                                                <i class="fa-solid fa-circle-check"></i>
                                            @else
                                            @endif
                                            {{ $package->{app()->getLocale() . '_short_info_seven'} }}
                                        </li>
                                    </ul>
                                    <a class="package_btn" href="javascript:void(0)"
                                        onclick="toggleCorporateAlert()">{{ $package->{app()->getLocale() . '_button_text'} }}</a>
                                </div>
                            </div>
                        @endforeach
                        <div class="corporate_alert" id="corporateAlert" style="display: none;">
                            <div class="corporate_alert-content">
                                <h3>For Corporate Please contact with Mr Kamrul Hasan 📞 01980011577</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('.circlechart').circlechart({
            duration: 2000
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection