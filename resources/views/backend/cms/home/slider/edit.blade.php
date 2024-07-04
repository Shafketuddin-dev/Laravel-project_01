@extends('backend.master')
@section('title')
CMS :: Edit Slider Info
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_title_button') }}">Title & Button Text</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_slider') }}">Slider</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_service') }}">Our Services</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_client') }}">Our Clients</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_testimonial') }}">Testimonial</a>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Slider</strong></h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <a href="{{ route('admin.manage_slider') }}" class="btn btn-sm btn-success">
                    Manage Slider Info
                </a>
                <form action="{{ route('admin.update_slider') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="slider_id" value="{{$slider->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                                <label for="en_description" class="control-label">{{ 'EN Conditions / Descriptions' }}</label>
                                <textarea rows="4" class="form-control summernote" name="en_description" id="en_description">{{ isset($slider->en_description) ? $slider->en_description : '' }}</textarea>
                                {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : '' }}">
                                <label for="bn_description" class="control-label">{{ 'BN Conditions / Descriptions' }}</label>
                                <textarea rows="4" class="form-control summernote" name="bn_description" id="bn_description">{{ isset($slider->bn_description) ? $slider->bn_description : '' }}</textarea>
                                {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                                <label for="position" class="control-label">{{ 'Slider Position' }}</label>
                                <input class="form-control" name="position" type="text" value="{{ isset($slider->position) ? $slider->position : '' }}">
                                {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="form-group {{ $errors->has('website_link') ? 'has-error' : ''}}">
                                <label for="website_link" class="control-label bg-warning">{{ 'Website Link' }}</label>
                                <input class="form-control" name="website_link" type="text" value="{{ isset($slider->website_link) ? $slider->website_link : '' }}">
                                {!! $errors->first('website_link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <div class="form-group {{ $errors->has('offer_last_date') ? 'has-error' : ''}}">
                                <label for="offer_last_date" class="control-label">{{ 'Offer Last Date' }}</label>
                                <input class="form-control" name="offer_last_date" type="date" value="{{ isset($slider->offer_last_date) ? $slider->offer_last_date : '' }}">
                                {!! $errors->first('offer_last_date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Desktop Slider Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($slider->desktop_image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Choose Desktop Slider Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="desktop_image" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Mobile Slider Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($slider->mobile_image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Choose Mobile Slider Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="mobile_image" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($slider->status) && $slider->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($slider->status) && $slider->status == 0 ? 'checked' : '' }} value="0">
                                    <label for="unpublish">Unpublish</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection