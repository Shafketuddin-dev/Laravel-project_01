@extends('backend.master')
@section('title')
CMS :: Manage Testimonial
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
                <h2><strong>Testimonial</strong></h2>
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
                <a href="{{ route('admin.manage_testimonial') }}" class="btn btn-sm btn-success">
                    Manage Testimonial
                </a>
                <form action="{{ route('admin.update_testimonial') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_name') ? 'has-error' : '' }}">
                                <label for="en_name" class="control-label">{{ 'EN Name' }}</label>
                                <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($testimonial->en_name) ? $testimonial->en_name : '' }}">
                                {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_name') ? 'has-error' : '' }}">
                                <label for="bn_name" class="control-label">{{ 'BN Name' }}</label>
                                <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($testimonial->bn_name) ? $testimonial->bn_name : '' }}">
                                {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_designation') ? 'has-error' : '' }}">
                                <label for="en_designation" class="control-label">{{ 'EN Designation' }}</label>
                                <input class="form-control" name="en_designation" type="text" id="en_designation" value="{{ isset($testimonial->en_designation) ? $testimonial->en_designation : '' }}">
                                {!! $errors->first('en_designation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_designation') ? 'has-error' : '' }}">
                                <label for="bn_designation" class="control-label">{{ 'BN Designation' }}</label>
                                <input class="form-control" name="bn_designation" type="text" id="bn_designation" value="{{ isset($testimonial->bn_designation) ? $testimonial->bn_designation : '' }}">
                                {!! $errors->first('bn_designation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                                <label for="en_description" class="control-label">{{ 'EN Description' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description" id="en_description" placeholder="Please type what you want...">{{ isset($testimonial->en_description) ? $testimonial->en_description : '' }}</textarea>
                                {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : '' }}">
                                <label for="bn_description" class="control-label">{{ 'BN Description' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description" id="bn_description" placeholder="Please type what you want...">{{ isset($testimonial->bn_description) ? $testimonial->bn_description : '' }}</textarea>
                                {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                        <div class="card">
                                <div class="header">
                                    <h2>Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($testimonial->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($testimonial->status) && $testimonial->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($testimonial->status) && $testimonial->status == 0 ? 'checked' : '' }} value="0">
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