@extends('frontend.master')
@section('title')
    Branches :: One Sky Communications Limited
@endsection
@section('content')
    <section class="single_page_top_section bg_rules"
        style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb flat">
                        <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                        <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_branches'} }} </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="branch_section bg3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-8 col-12 event_search_panel wow fadeInLeft">
                    <div class="input_field">
                        <input type="search" name="branch_search" id="branch_search" class="form-control"
                            placeholder="{{ __('Search Branch...') }}" aria-label="Username"
                            data-url="{{ route('ajax.search_branch') }}">
                        <img src="{{ asset('frontendAssets') }}/static_images/search_black.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-4 col-12 wow fadeInRight">
                    <a class="btn btn-info sort_btn float_end text-white" role="button" href="#"
                        data-bs-toggle="dropdown">
                        <span>{{ __('Sort By') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0);"
                                onclick="getBranchByLocation(this, '{{ route('ajax.sort_branch', 'all') }}')">
                                {{ __('All') }} </a>
                        </li>
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="javascript:void(0);"
                                    onclick="getBranchByLocation(this, '{{ route('ajax.sort_branch', $category->id) }}')">{{ $category->{app()->getLocale() . '_title'} }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row mt-2 branch_result justify-content-center">
                @foreach ($branches as $branch)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 wow fadeInUp">
                    <div class="branch_card h-100">
                        <div class="branch_image_div">
                            @if ($branch->image)
                            <img class="img-fluid" src="{{ asset($branch->image) }}" alt="Branch Image">
                            @else
                            <img class="img-fluid" src="{{ asset('frontendAssets/img/branch_2.jpg') }}" alt="Branch Image">
                            @endif
                        </div>
                        <h5 class="text-center">{{ $branch->{app()->getLocale() . '_branch_name'} }}</h5>
                        <div class="address_div">
                            <div class="row">
                                <div class="col-lg-2 col-2">
                                    <img class="img-fluid" src="{{ asset('frontendAssets/img/address.png') }}" alt="Address Icon">
                                </div>
                                <div class="col-lg-10 col-10">
                                    <p>{{ $branch->{app()->getLocale() . '_address'} }}</p>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="number_div">
                            <div class="row">
                                <div class="col-lg-2 col-2">
                                    <img class="img-fluid" src="{{ asset('frontendAssets/img/call.png') }}" alt="Address Icon">
                                </div>
                                <div class="col-lg-10 col-10">
                                    <p>{{ $branch->{app()->getLocale() . '_phone'} }}</p>
                                </div>
                            </div>  
                        </div>
                        <div class="branch_button_div d-flex justify-content-center">
                            <a class="package_btn mt-3 mb-2" href="tel:{{ $branch->call_phone }}">{{ __('Call Now') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
