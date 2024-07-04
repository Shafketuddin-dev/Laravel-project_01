@extends('backend.master')
@section('title')
CMS :: Home Slider
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
                <h2><strong>Home</strong> Slider</h2>
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
                <a href="{{ route('admin.manage_slider') }}" class="btn btn-sm btn-success" title="Add New">
                    Manage Home Slider
                </a>
                <form action="{{ route('admin.save_slider') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Desktop Slider Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="desktop_image" class="dropify">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Mobile Slider Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="mobile_image" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                                <label for="en_description" class="control-label bg-warning">{{ 'EN Conditions / Descriptions' }}</label>
                                <textarea rows="4" class="form-control summernote" name="en_description" id="en_description"></textarea>
                                {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : '' }}">
                                <label for="bn_description" class="control-label bg-warning">{{ 'BN Conditions / Descriptions' }}</label>
                                <textarea rows="4" class="form-control summernote" name="bn_description" id="bn_description"></textarea>
                                {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                                <label for="position" class="control-label">{{ 'Slider Position' }}</label>
                                <input class="form-control" name="position" type="text">
                                {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="form-group {{ $errors->has('website_link') ? 'has-error' : ''}}">
                                <label for="website_link" class="control-label bg-warning">{{ 'Website Link' }}</label>
                                <input class="form-control" name="website_link" type="text">
                                {!! $errors->first('website_link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <div class="form-group {{ $errors->has('offer_last_date') ? 'has-error' : ''}}">
                                <label for="offer_last_date" class="control-label bg-warning">{{ 'Offer Last Date (for offer slider only)' }}</label>
                                <input class="form-control" name="offer_last_date" type="date">
                                {!! $errors->first('offer_last_date', '<p class="help-block">:message</p>') !!}
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
                                    <input type="radio" name="status" id="publish" class="with-gap" checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" value="0">
                                    <label for="unpublish">Unpublish</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection