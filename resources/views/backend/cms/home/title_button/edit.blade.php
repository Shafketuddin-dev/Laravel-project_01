@extends('backend.master')
@section('title')
CMS :: Manage Title Button
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
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Home</strong> Title Button</h2>
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
                <a href="{{ route('admin.manage_home_title_button') }}" class="btn btn-sm btn-success">
                    Manage Home Title Button
                </a>
                <form action="{{ route('admin.update_home_title_button') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="home_title_button_id" value="{{$home_title_button->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_about_title') ? 'has-error' : '' }}">
                                <label for="en_home_about_title" class="control-label">{{ 'EN About Title' }}</label>
                                <input class="form-control" name="en_home_about_title" type="text" id="en_home_about_title" value="{{ isset($home_title_button->en_home_about_title) ? $home_title_button->en_home_about_title : '' }}">
                                {!! $errors->first('en_home_about_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_about_title') ? 'has-error' : '' }}">
                                <label for="bn_home_about_title" class="control-label">{{ 'BN About Title' }}</label>
                                <input class="form-control" name="bn_home_about_title" type="text" id="bn_home_about_title" value="{{ isset($home_title_button->bn_home_about_title) ? $home_title_button->bn_home_about_title : '' }}">
                                {!! $errors->first('bn_home_about_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_about_button_text') ? 'has-error' : '' }}">
                                <label for="en_home_about_button_text" class="control-label">{{ 'EN About Button Text' }}</label>
                                <input class="form-control" name="en_home_about_button_text" type="text" id="en_home_about_button_text" value="{{ isset($home_title_button->en_home_about_button_text) ? $home_title_button->en_home_about_button_text : '' }}">
                                {!! $errors->first('en_home_about_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_about_button_text') ? 'has-error' : '' }}">
                                <label for="bn_home_about_button_text" class="control-label">{{ 'BN About Button Text' }}</label>
                                <input class="form-control" name="bn_home_about_button_text" type="text" id="bn_home_about_button_text" value="{{ isset($home_title_button->bn_home_about_button_text) ? $home_title_button->bn_home_about_button_text : '' }}">
                                {!! $errors->first('bn_home_about_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_service_title') ? 'has-error' : '' }}">
                                <label for="en_home_service_title" class="control-label">{{ 'EN Service Title' }}</label>
                                <input class="form-control" name="en_home_service_title" type="text" id="en_home_service_title" value="{{ isset($home_title_button->en_home_service_title) ? $home_title_button->en_home_service_title : '' }}">
                                {!! $errors->first('en_home_service_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_service_title') ? 'has-error' : '' }}">
                                <label for="bn_home_service_title" class="control-label">{{ 'BN Service Title' }}</label>
                                <input class="form-control" name="bn_home_service_title" type="text" id="bn_home_service_title" value="{{ isset($home_title_button->bn_home_service_title) ? $home_title_button->bn_home_service_title : '' }}">
                                {!! $errors->first('bn_home_service_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_internet_title') ? 'has-error' : '' }}">
                                <label for="en_home_internet_title" class="control-label">{{ 'EN Internet Title' }}</label>
                                <input class="form-control" name="en_home_internet_title" type="text" id="en_home_internet_title" value="{{ isset($home_title_button->en_home_internet_title) ? $home_title_button->en_home_internet_title : '' }}">
                                {!! $errors->first('en_home_internet_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_internet_title') ? 'has-error' : '' }}">
                                <label for="bn_home_internet_title" class="control-label">{{ 'BN Internet Title' }}</label>
                                <input class="form-control" name="bn_home_internet_title" type="text" id="bn_home_internet_title" value="{{ isset($home_title_button->bn_home_internet_title) ? $home_title_button->bn_home_internet_title: '' }}">
                                {!! $errors->first('bn_home_internet_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_internet_button_text') ? 'has-error' : '' }}">
                                <label for="en_home_internet_button_text" class="control-label">{{ 'EN Internet Button Text' }}</label>
                                <input class="form-control" name="en_home_internet_button_text" type="text" id="en_home_internet_button_text" value="{{ isset($home_title_button->en_home_internet_button_text) ? $home_title_button->en_home_internet_button_text : '' }}">
                                {!! $errors->first('en_home_internet_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_internet_button_text') ? 'has-error' : '' }}">
                                <label for="bn_home_internet_button_text" class="control-label">{{ 'BN Internet Button Text' }}</label>
                                <input class="form-control" name="bn_home_internet_button_text" type="text" id="bn_home_internet_button_text" value="{{ isset($home_title_button->bn_home_internet_button_text) ? $home_title_button->bn_home_internet_button_text : '' }}">
                                {!! $errors->first('bn_home_internet_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_choose_us_title') ? 'has-error' : '' }}">
                                <label for="en_home_choose_us_title" class="control-label">{{ 'EN Choose Us Title' }}</label>
                                <input class="form-control" name="en_home_choose_us_title" type="text" id="en_home_choose_us_title" value="{{ isset($home_title_button->en_home_choose_us_title) ? $home_title_button->en_home_choose_us_title : '' }}">
                                {!! $errors->first('en_home_choose_us_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_choose_us_title') ? 'has-error' : '' }}">
                                <label for="bn_home_choose_us_title" class="control-label">{{ 'BN Choose Us Title' }}</label>
                                <input class="form-control" name="bn_home_choose_us_title" type="text" id="bn_home_choose_us_title" value="{{ isset($home_title_button->bn_home_choose_us_title) ? $home_title_button->bn_home_choose_us_title : '' }}">
                                {!! $errors->first('bn_home_choose_us_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_faq_title') ? 'has-error' : '' }}">
                                <label for="en_home_faq_title" class="control-label">{{ 'EN Faq Title' }}</label>
                                <input class="form-control" name="en_home_faq_title" type="text" id="en_home_faq_title" value="{{ isset($home_title_button->en_home_faq_title) ? $home_title_button->en_home_faq_title : '' }}">
                                {!! $errors->first('en_home_faq_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_faq_title') ? 'has-error' : '' }}">
                                <label for="bn_home_faq_title" class="control-label">{{ 'BN Faq Title' }}</label>
                                <input class="form-control" name="bn_home_faq_title" type="text" id="bn_home_faq_title" value="{{ isset($home_title_button->bn_home_faq_title) ? $home_title_button->bn_home_faq_title : '' }}">
                                {!! $errors->first('bn_home_faq_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_testimonial_title') ? 'has-error' : '' }}">
                                <label for="en_home_testimonial_title" class="control-label">{{ 'EN Testimonial Title' }}</label>
                                <input class="form-control" name="en_home_testimonial_title" type="text" id="en_home_testimonial_title" value="{{ isset($home_title_button->en_home_testimonial_title) ? $home_title_button->en_home_testimonial_title : '' }}">
                                {!! $errors->first('en_home_testimonial_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_testimonial_title') ? 'has-error' : '' }}">
                                <label for="bn_home_testimonial_title" class="control-label">{{ 'BN Testimonial Title' }}</label>
                                <input class="form-control" name="bn_home_testimonial_title" type="text" id="bn_home_testimonial_title" value="{{ isset($home_title_button->bn_home_testimonial_title) ? $home_title_button->bn_home_testimonial_title : '' }}">
                                {!! $errors->first('bn_home_testimonial_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_coverage_title') ? 'has-error' : '' }}">
                                <label for="en_home_coverage_title" class="control-label">{{ 'EN Coverage Title' }}</label>
                                <input class="form-control" name="en_home_coverage_title" type="text" id="en_home_coverage_title" value="{{ isset($home_title_button->en_home_coverage_title) ? $home_title_button->en_home_coverage_title : '' }}">
                                {!! $errors->first('en_home_coverage_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_coverage_title') ? 'has-error' : '' }}">
                                <label for="bn_home_coverage_title" class="control-label">{{ 'BN Coverage Title' }}</label>
                                <input class="form-control" name="bn_home_coverage_title" type="text" id="bn_home_coverage_title" value="{{ isset($home_title_button->bn_home_coverage_title) ? $home_title_button->bn_home_coverage_title : '' }}">
                                {!! $errors->first('bn_home_coverage_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_coverage_button_text') ? 'has-error' : '' }}">
                                <label for="en_home_coverage_button_text" class="control-label">{{ 'EN Coverage Button Text' }}</label>
                                <input class="form-control" name="en_home_coverage_button_text" type="text" id="en_home_coverage_button_text" value="{{ isset($home_title_button->en_home_coverage_button_text) ? $home_title_button->en_home_coverage_button_text : '' }}">
                                {!! $errors->first('en_home_coverage_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_coverage_button_text') ? 'has-error' : '' }}">
                                <label for="bn_home_coverage_button_text" class="control-label">{{ 'BN Coverage Button Text' }}</label>
                                <input class="form-control" name="bn_home_coverage_button_text" type="text" id="bn_home_coverage_button_text" value="{{ isset($home_title_button->bn_home_coverage_button_text) ? $home_title_button->bn_home_coverage_button_text : '' }}">
                                {!! $errors->first('bn_home_coverage_button_text', '<p class="help-block">:message</p>') !!}
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