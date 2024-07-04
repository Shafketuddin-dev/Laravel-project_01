@extends('frontend.master')
@section('title')
    Best Internet Service Provider in Bangladesh | One Sky Communications Limited
@endsection
@section('content')
    <!-- slider start -->
    <header>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="featured-carousel owl-carousel">
                            @foreach ($sliders as $slider)
                                <div class="item">
                                    <div class="container-fluid">
                                        @if ($slider->website_link)
                                            <a href="{{ $slider->website_link }}" class="desktop_slider">
                                                <img class="img-fluid" src="{{ asset($slider->desktop_image) }}"
                                                    alt="">
                                                    <a class="learn_more_btn" href="{{ $slider->website_link }}"> {{ __('See Details') }} <i class="fa-solid fa-arrow-right"></i></a>
                                            </a>
                                            <a href="{{ route('campaign_details', $slider->id) }}" class="mobile_slider">
                                                <img class="img-fluid" src="{{ asset($slider->mobile_image) }}"
                                                    alt="">
                                            </a>
                                        @else
                                            <a href="{{ route('campaign_details', $slider->id) }}" class="desktop_slider">
                                                <img class="img-fluid" src="{{ asset($slider->desktop_image) }}"
                                                    alt="">
                                                    <a class="learn_more_btn" href="{{ route('campaign_details', $slider->id) }}"> {{ __('See Details') }} <i class="fa-solid fa-arrow-right"></i></a>
                                            </a>
                                            <a href="{{ route('campaign_details', $slider->id) }}" class="mobile_slider">
                                                <img class="img-fluid" src="{{ asset($slider->mobile_image) }}"
                                                    alt="">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- slider end -->
    <!-- service start -->
    <section class="service_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="main_title">
                        <h1 class="title">{{ $home_button_title->{app()->getLocale() . '_home_service_title'} }}</h1>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($home_services as $home_service)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="{{ $home_service->url }}">
                            <div class="card service_card h-100">
                                <div class="card-body text-center">
                                    <div class="icon">
                                        <img src="{{ asset($home_service->image) }}" alt="">
                                    </div>
                                    <h4> {{ $home_service->{app()->getLocale() . '_title'} }} </h4>
                                    <p>{{ $home_service->{app()->getLocale() . '_description'} }}</p>
                                    <div class="text-button"><a href="{{ $home_service->url }}">
                                            {{ $home_service->{app()->getLocale() . '_button_text'} }} <i
                                                class="fa fa-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- service end -->
    <!-- top package start -->
    <section class="top_package">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 mb-3">
                    <div class="main_title">
                        <h1 class="title">{{ $home_button_title->{app()->getLocale() . '_home_internet_title'} }}</h1>
                        <span class="line" style="display: inline-block"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($top_packages as $package)
                    <div class="col-lg-4 mb-3">
                        <div class="top_package_div wow zoomIn" data-wow-delay="0.3s">
                            <div class="left">
                                <p class="top_package_mbps text-white">{{ $package->{app()->getLocale() . '_mbps_value'} }}
                                </p>
                                <p class="text-white fw-bold mbps_label">{{ __('Mbps') }}</p>
                            </div>
                            <div class="right">
                                <p class="top_package_price mb-2">{{ $package->{app()->getLocale() . '_amount'} }}
                                    {{ $package->{app()->getLocale() . '_amount_label'} }}</p>
                                <a class="btn"
                                    href="#getnewconnection">{{ $package->{app()->getLocale() . '_button_text'} }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <a class="learn_more_btn float_end"
                        href="{{ route('packages') }}">{{ $home_button_title->{app()->getLocale() . '_home_internet_button_text'} }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- package end -->

    <!-- check coverage start -->
    {{-- @if (Auth::check())
        <section class="coverage_check_section">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12 mb-3">
                        <div class="main_title">
                            <h1 class="title">{{ $home_button_title->{app()->getLocale() . '_home_coverage_title'} }}</h1>
                            <span class="line" style="display: inline-block"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="check_coverage_description mt-2 fw-bold">
                            {{ __('Please enter your District and Thana to check coverage') }}.</p>
                    </div>
                </div>
                <form id="coverageForm" action="{{ route('check-area') }}" method="post">
                    @csrf
                    <div class="row justify-content-center mt-2">

                        <div class="col-xl-3 col-lg-4 col-sm-6 mt-3">
                            <label class="form-label" for="">{{ __('Select District') }}</label>
                            <select id="district-dropdown" class="form-control" name="district">
                                <option value="">{{ __('-- Select District --') }}</option>
                                @foreach ($districts as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->{app()->getLocale() . '_title'} }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6 mt-3">
                            <label class="form-label" for="">{{ __('Select Thana') }}</label>
                            <select id="thana-dropdown" class="form-control" name="thana">

                            </select>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center mt-5">
                            <a href="javascript:void(0)" class="learn_more_btn mb-3" id="checkAreaButton">
                                {{ $home_button_title->{app()->getLocale() . '_home_coverage_button_text'} }} </a>
                        </div>
                    </div>
                </form>

                <div class="row justify-content-center" id="showAreaCoverage" style="display: none;">

                    <div class="col-xl-4 col-lg-5 col-md-8 col-12">

                    </div>
                </div>

            </div>
        </section>
    @else
    @endif --}}
    <!-- check coverage end -->
    <!-- client slick start -->
    <section class="client_slick_section wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row client_slick">
                @foreach ($clients as $client)
                    <div class="item">
                        <img class="img-fluid" src="{{ asset($client->image) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- client slick end -->

    <!-- get new connection start -->
    <section class="mt-5 mb-5" id="getnewconnection">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12 text-center">
                    <div class="main_title">
                        <h1 class="title">{{ __('Get New Connection') }}?</h1>
                        <span class="line" style="display: inline-block"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                    <form action="{{ route('save_home_connection_request') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="fullname">{{ __('Name') }}*</label>
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                placeholder="{{ __('Write Full Name') }}" required>
                            @if ($errors->has('fullname'))
                                <p class="text-danger">{{ $errors->first('fullname') }}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="Phone">{{ __('Phone') }}*</label>
                            <input type="text" class="form-control" name="phone" id="Phone"
                                placeholder="{{ __('Write Contact Number') }}" required>
                            @if ($errors->has('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="Email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" name="email" id="Email"
                                placeholder="{{ __('Write Email') }}">
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">{{ __('Details Address') }}*</label>
                            <textarea class="form-control none-resize" id="address" name="address" rows="3" required style="resize: none;" placeholder="{{ __('Write Address') }}"></textarea>
                            @if ($errors->has('address'))
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="package_id">{{ __('Packages') }}*</label>
                            <select class="form-control" id="package_id" name="package_id" required>
                                <option value="">{{ __('-- Select Package --') }}</option>
                                @foreach ($home_packages as $data)
                                    <option
                                        value="{{ $data->en_package_name . ' ' . '-' . ' ' . $data->en_mbps_value . ' ' . 'MBPS' }}">
                                        {{ $data->{app()->getLocale() . '_package_name'} }} -
                                        {{ $data->{app()->getLocale() . '_mbps_value'} }} {{ __('MBPS') }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('package_id'))
                                <p class="text-danger">{{ $errors->first('package_id') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="learn_more_btn">{{ __('Submit') }} <i class="fa-regular fa-paper-plane text-warning"></i></button>
                    </form>
                </div>
                <div class="col-lg-6 text-center wow zoomIn" data-wow-delay="0.3s">
                    <img class="img-fluid" src="{{ 'frontendAssets' }}/static_images/map.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- get new connection end -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.circlechart').circlechart({
                duration: 2000
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var localJQuery = jQuery.noConflict(true);
            $('#district-dropdown').on('change', function() {
                var idDistrict = this.value;
                var currentPath = window.location.pathname;

                var isBangla = currentPath.includes('/bn');

                $("#thana-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-thanas') }}",
                    type: "POST",
                    data: {
                        district_id: idDistrict,
                        language: isBangla ? 'bn' : 'en',
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#thana-dropdown').html(
                            '<option value="">{{ __('-- Select Thana --') }}</option>');
                        $.each(result.thanas, function(key, value) {
                            var thanaTitle = isBangla ? value.bn_title : value.en_title;
                            $("#thana-dropdown").append('<option value="' + value.id +
                                '">' + thanaTitle + '</option>');
                        });
                    }
                });
            });

            $('#checkAreaButton').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('check-area') }}',
                    data: $('#coverageForm').serialize(),
                    success: function(data) {
                        var currentPath = window.location.pathname;
                        var isBangla = currentPath.includes('/bn');

                        if (data.status === 'success') {
                            var dynamicContent = `
                    <div class="row justify-content-center" id="showAreaCoverage">
                        <div class="col-lg-12">
                            <h5 class="success_description fw-bold text-center text-success">{{ __('Hurrah! One Sky Communications Limited is available at your location') }}</h5>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-8 col-12">
                            <address class="office_information mt-3">
                                <p class="office_name text-center fw-bold"><i class="fa-solid fa-address"></i> ${isBangla ? data.bn_office_name : data.en_office_name}</p>
                                <p class=""><i class="fa-solid fa-map-location-dot"></i> ${isBangla ? data.bn_address : data.en_address}</p>
                                <p class=""><i class="fa-solid fa-phone-volume"></i> ${isBangla ? data.bn_phone : data.en_phone}</p>
                                <p class=""><i class="fa-solid fa-headset"></i> ${isBangla ? data.bn_hotline : data.en_hotline}</p>
                                <p class=""><i class="fa-solid fa-envelope"></i> ${data.email}</p>
                            </address>
                        </div>
                    </div>`;

                            $('#showAreaCoverage').html(dynamicContent).show();
                        } else {
                            $('#showAreaCoverage').html(
                                `<h5 class="error_description fw-bold text-center text-danger">{{ __('Whoops! One Sky Communications Limited is unvailable at your location') }}</h5>`
                            ).show();
                        }
                    }
                });
            });
        });
    </script>
@endsection
