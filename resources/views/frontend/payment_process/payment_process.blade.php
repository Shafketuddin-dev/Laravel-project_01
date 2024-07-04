@extends('frontend.master')
@section('title')
Payment Process || One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_billpay'} }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="payment_process_section wow fadeInUp" data-wow-delay="0.1s">
    <div class="tab_wrapper">
        <input class="radio" id="one" name="group" type="radio" checked>
        <input class="radio" id="two" name="group" type="radio">
        <input class="radio" id="three" name="group" type="radio">
        <input class="radio" id="four" name="group" type="radio">

        <div class="tabs">
            <label class="tab" id="one-tab" for="one" style="color: #dc136c;">{{ $category[0]->{app()->getLocale() . '_title'} }}</label>
            <label class="tab" id="two-tab" for="two" style="color: #8a288f;">{{ $category[1]->{app()->getLocale() . '_title'} }}</label>
            <label class="tab" id="three-tab" for="three" style="color: #d0392c">{{ $category[2]->{app()->getLocale() . '_title'} }}</label>
            <label class="tab" id="four-tab" for="four" style="color: #198754">{{ $category[3]->{app()->getLocale() . '_title'} }}</label>

        </div>

        <div class="panels">
            <div class="panel" id="one-panel">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="key_point">
                            <h5> <i class="fa-solid fa-flag"></i> {{ $bkash_payment->{app()->getLocale() . '_banner_text'} }} </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_one'} : '' }} </h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image1">
                                    <img class="main_img img-fluid" src="{{ asset($bkash_payment->image_one) }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image1" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_one'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ asset($bkash_payment->image_one) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_one'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_one'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_two'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image2">
                                    <img class="main_img img-fluid" src="{{ asset($bkash_payment->image_two) }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image2" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_two'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ asset($bkash_payment->image_two) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_two'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_two'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_three'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image3">
                                    <img class="main_img img-fluid" src="{{ asset($bkash_payment->image_three) }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image3" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_three'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ asset($bkash_payment->image_three) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_three'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_three'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_four'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image4">
                                    <img class="main_img img-fluid" src="{{ asset($bkash_payment->image_four) }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image4" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_four'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ asset($bkash_payment->image_four) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_four'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_four'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_five'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image5">
                                    <img class="main_img img-fluid" src="{{ asset($bkash_payment->image_five) }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image5" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_five'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ asset($bkash_payment->image_five) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_five'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <p> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_five'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_six'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image6">
                                    <img class="main_img img-fluid" src="{{ asset($bkash_payment->image_six) }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image6" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_heading_six'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ asset($bkash_payment->image_six) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_six'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $bkash_payment ? $bkash_payment->{app()->getLocale() . '_description_six'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" id="two-panel">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="key_point">
                            <h5> <i class="fa-solid fa-flag"></i> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_banner_text'} : '' }} </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_one'} : '' }} </h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image7">
                                    <img class="main_img img-fluid" src="{{ $rocket_payment ? asset($rocket_payment->image_one) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image7" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_one'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $rocket_payment ? asset($rocket_payment->image_one) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_one'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_one'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_two'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image8">
                                    <img class="main_img img-fluid" src="{{ $rocket_payment ? asset($rocket_payment->image_two) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image8" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_two'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $rocket_payment ? asset($rocket_payment->image_two) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_two'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_two'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_three'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image9">
                                    <img class="main_img img-fluid" src="{{ $rocket_payment ? asset($rocket_payment->image_three) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image9" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_three'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $rocket_payment ? asset($rocket_payment->image_three) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_three'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_three'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_four'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image10">
                                    <img class="main_img img-fluid" src="{{ $rocket_payment ? asset($rocket_payment->image_four) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image10" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_four'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $rocket_payment ? asset($rocket_payment->image_four) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_four'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_four'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_five'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image11">
                                    <img class="main_img img-fluid" src="{{ $rocket_payment ? asset($rocket_payment->image_five) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image11" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_five'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $rocket_payment ? asset($rocket_payment->image_five) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_five'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <p> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_five'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_six'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image12">
                                    <img class="main_img img-fluid" src="{{ $rocket_payment ? asset($rocket_payment->image_six) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image12" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_heading_six'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                <img src="{{ $rocket_payment ? asset($rocket_payment->image_six) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_six'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $rocket_payment ? $rocket_payment->{app()->getLocale() . '_description_six'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" id="three-panel">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="key_point">
                            <h5> <i class="fa-solid fa-flag"></i> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_banner_text'} : '' }} </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_one'} : '' }} </h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image13">
                                    <img class="main_img img-fluid" src="{{ $nagad_payment ? asset($nagad_payment->image_one) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image13" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_one'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $nagad_payment ? asset($nagad_payment->image_one) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_one'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_one'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_two'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image14">
                                    <img class="main_img img-fluid" src="{{ $nagad_payment ? asset($nagad_payment->image_two) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image14" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_two'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $nagad_payment ? asset($nagad_payment->image_two) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_two'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_two'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_three'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image15">
                                    <img class="main_img img-fluid" src="{{ $nagad_payment ? asset($nagad_payment->image_three) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image15" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_three'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $nagad_payment ? asset($nagad_payment->image_three) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_three'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_three'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_four'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image16">
                                    <img class="main_img img-fluid" src="{{ $nagad_payment ? asset($nagad_payment->image_four) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image16" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_four'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $nagad_payment ? asset($nagad_payment->image_four) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_four'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_four'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_five'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image17">
                                    <img class="main_img img-fluid" src="{{ $nagad_payment ? asset($nagad_payment->image_five) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image17" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_five'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                    <img src="{{ $nagad_payment ? asset($nagad_payment->image_five) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_five'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <p> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_five'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12 mb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_six'} : '' }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image18">
                                    <img class="main_img img-fluid" src="{{ $nagad_payment ? asset($nagad_payment->image_six) : '' }}" alt="">
                                </a>
                                <div class="modal fade" id="show_big_image18" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_heading_six'} : '' }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="show_big_image">
                                                <img src="{{ $nagad_payment ? asset($nagad_payment->image_six) : '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p> {{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_six'} : '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>{{ $nagad_payment ? $nagad_payment->{app()->getLocale() . '_description_six'} : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" id="four-panel">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-12 text-center">
                        <a class="btn btn-success" href="{{ route('online_payment') }}"><i class="fa fa-credit-card-alt"></i> Debit / Credit Card Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection