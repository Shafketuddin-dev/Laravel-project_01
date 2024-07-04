@extends('frontend.master')
@section('title')
Circular Details :: One Sky Communications Limited
@endsection
@section('content')
<!-- Circular Details start -->
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                    <a href="{{ route('circular') }}"> {{ $menu->{app()->getLocale() . '_menu_circular'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{__('Circular Details')}} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="circular_details_section bg2">
    @if (pathinfo($circular_details->document, PATHINFO_EXTENSION) == 'pdf')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pdf_view_area">
                    <div class="top_area">
                        <h3 class=" wow slideInLeft" data-wow-delay="0.1s">{{ $circular_details->{app()->getLocale() . '_title'} }}</h3>
                        <!--<span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>-->
                        <!--<span> <strong> {{__('Deadline')}}:</strong> {{ $circular_details->{app()->getLocale() . '_published_date'} }}</span>-->
                        <a class="download_btn wow slideInRight" data-wow-delay="0.1s" href="{{ asset($circular_details->document)}}"> {{__('Download')}} <img src="{{ asset('frontendAssets') }}/static_images/download_icon.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12 wow zoomIn" data-wow-delay="0.1s">
                <div class="pdf_preview">
                    <iframe src="{{ asset($circular_details->document)}}"></iframe>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pdf_view_area">
                    <div class="top_area">
                        <h3 class="wow slideInLeft" data-wow-delay="0.1s">{{ $circular_details->{app()->getLocale() . '_title'} }}</h3>
                        <!--<span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>-->
                        <!--<span> <strong> {{__('Deadline')}}:</strong> {{ $circular_details->{app()->getLocale() . '_published_date'} }}</span>-->
                        <a class="download_btn wow slideInRight" data-wow-delay="0.1s" href="{{ asset($circular_details->document)}}"> {{__('Download')}} <img src="{{ asset('frontendAssets') }}/static_images/download_icon.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center wow zoomIn" data-wow-delay="0.1s">
                <img class="img-fluid" src="{{ asset($circular_details->document)}}" alt="">
            </div>
        </div>
    </div>
    @endif
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <h1> {{__('Apply for this position')}} </h1>
            </div>
        </div>
        <form action="{{ route('save_job_apply') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" name="job_id" value="{{ $circular_details->id }}">
                <div class="col-md-12 mb-3">
                    <label for="name">{{__('Full Name')}} *</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Full Name')}}" required>
                    @error('name')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone"> {{__('Phone')}} *</label>
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="{{__('Phone')}}" required>
                    @error('phone')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email"> {{__('Email')}} *</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="{{__('Email')}}" required>
                    @error('email')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label> {{__('Cover Letter Should be Minimum 200 Words')}} *</label>
                    <div class="input-group">
                        <span class="input-group-text"> {{__('Cover Letter')}} *</span>
                        <textarea class="form-control" name="cover_letter" rows="15" aria-label="{{__('Cover Letter')}}"></textarea>
                    </div>
                    @error('cover_letter')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"> {{__('Upload CV')}} *</span>
                        <input class="form-control form-control-lg" id="formFileLg" name="document" type="file" accept=".pdf, .doc, .docx">
                    </div>
                    @error('document')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input is-invalid" type="checkbox" name="agree" value="agreed" id="invalidCheck3" required>
                            <label class="form-check-label" for="invalidCheck3">
                               {{__('By using this form you agree with the storage and handling of your data by this website')}} *
                            </label>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success" type="submit"> {{__('Submit')}} <i class="fa-regular fa-paper-plane text-white"></i> </button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Circular Details end -->
@endsection