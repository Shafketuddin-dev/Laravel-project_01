@extends('backend.master')
@section('title')
CMS :: Manage Top Social Bar
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_top_bar') }}">Top Bar</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_menu') }}">Menu</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_footer') }}">Footer</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Promo</strong> Offer</h2>
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
                <a href="{{ route('admin.manage_top_bar') }}" class="btn btn-sm btn-success">
                    Manage Top Social Bar
                </a>
                <form action="{{ route('admin.update_top_bar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="topbar_id" value="{{$topbar->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_registration_text') ? 'has-error' : '' }}">
                                <label for="en_registration_text" class="control-label">{{ 'EN Registration Text' }}</label>
                                <input class="form-control" name="en_registration_text" type="text" id="en_registration_text" value="{{ isset($topbar->en_registration_text) ? $topbar->en_registration_text : '' }}">
                                {!! $errors->first('en_registration_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_registration_text') ? 'has-error' : '' }}">
                                <label for="bn_registration_text" class="control-label">{{ 'BN Registration Text' }}</label>
                                <input class="form-control" name="bn_registration_text" type="text" id="bn_registration_text" value="{{ isset($topbar->bn_registration_text) ? $topbar->bn_registration_text : '' }}">
                                {!! $errors->first('bn_registration_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_brtc') ? 'has-error' : '' }}">
                                <label for="en_brtc" class="control-label">{{ 'EN BRTC' }}</label>
                                <input class="form-control" name="en_brtc" type="text" id="en_brtc" value="{{ isset($topbar->en_brtc) ? $topbar->en_brtc : '' }}">
                                {!! $errors->first('en_brtc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_brtc') ? 'has-error' : '' }}">
                                <label for="bn_brtc" class="control-label">{{ 'BN BRTC' }}</label>
                                <input class="form-control" name="bn_brtc" type="text" id="bn_brtc" value="{{ isset($topbar->bn_brtc) ? $topbar->bn_brtc : '' }}">
                                {!! $errors->first('bn_brtc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <img src="{{ asset($topbar->image) }}" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>BRTC Approved Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_hotline') ? 'has-error' : '' }}">
                                <label for="en_hotline" class="control-label">{{ 'EN Hotline' }}</label>
                                <input class="form-control" name="en_hotline" type="text" id="en_hotline" value="{{ isset($topbar->en_hotline) ? $topbar->en_hotline : '' }}">
                                {!! $errors->first('en_hotline', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_hotline') ? 'has-error' : '' }}">
                                <label for="bn_hotline" class="control-label">{{ 'BN Hotline' }}</label>
                                <input class="form-control" name="bn_hotline" type="text" id="bn_hotline" value="{{ isset($topbar->bn_hotline) ? $topbar->bn_hotline : '' }}">
                                {!! $errors->first('bn_hotline', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('query_email') ? 'has-error' : '' }}">
                                <label for="query_email" class="control-label">{{ 'Top Email' }}</label>
                                <input class="form-control" name="query_email" type="text" id="query_email" value="{{ isset($topbar->query_email) ? $topbar->query_email : '' }}">
                                {!! $errors->first('query_email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('fb_link') ? 'has-error' : '' }}">
                                <label for="fb_link" class="control-label">{{ 'Facebook Link' }}</label>
                                <input class="form-control" name="fb_link" type="text" id="fb_link" value="{{ isset($topbar->fb_link) ? $topbar->fb_link : '' }}">
                                {!! $errors->first('fb_link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('yt_link') ? 'has-error' : '' }}">
                                <label for="yt_link" class="control-label">{{ 'Youtube Link' }}</label>
                                <input class="form-control" name="yt_link" type="text" id="yt_link" value="{{ isset($topbar->yt_link) ? $topbar->yt_link : '' }}">
                                {!! $errors->first('yt_link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('instagram_link') ? 'has-error' : '' }}">
                                <label for="instagram_link" class="control-label">{{ 'Instagram Link' }}</label>
                                <input class="form-control" name="instagram_link" type="text" id="instagram_link" value="{{ isset($topbar->instagram_link) ? $topbar->instagram_link : '' }}">
                                {!! $errors->first('instagram_link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('linkedin_link') ? 'has-error' : '' }}">
                                <label for="linkedin_link" class="control-label">{{ 'Linkedin Link' }}</label>
                                <input class="form-control" name="linkedin_link" type="text" id="linkedin_link" value="{{ isset($topbar->linkedin_link) ? $topbar->linkedin_link : '' }}">
                                {!! $errors->first('linkedin_link', '<p class="help-block">:message</p>') !!}
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