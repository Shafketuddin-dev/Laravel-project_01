@extends('backend.master')
@section('title')
CMS :: Edit Footer
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
                <h2><strong>Footer</strong></h2>
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
                <a href="{{ route('admin.manage_footer') }}" class="btn btn-sm btn-success">
                    Edit Footer
                </a>
                <form action="{{ route('admin.update_footer') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="footer_id" value="{{$footer->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_contact_title') ? 'has-error' : '' }}">
                                <label for="en_footer_contact_title" class="control-label">{{ 'EN Get In Touch' }}</label>
                                <input class="form-control" name="en_footer_contact_title" type="text" id="en_footer_contact_title" value="{{ isset($footer->en_footer_contact_title) ? $footer->en_footer_contact_title : '' }}">
                                {!! $errors->first('en_footer_contact_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_contact_title') ? 'has-error' : '' }}">
                                <label for="bn_footer_contact_title" class="control-label">{{ 'BN Get In Touch' }}</label>
                                <input class="form-control" name="bn_footer_contact_title" type="text" id="bn_footer_contact_title" value="{{ isset($footer->bn_footer_contact_title) ? $footer->bn_footer_contact_title : '' }}">
                                {!! $errors->first('bn_footer_contact_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_address') ? 'has-error' : '' }}">
                                <label for="en_footer_address" class="control-label">{{ 'EN Footer Address' }}</label>
                                <input class="form-control" name="en_footer_address" type="text" id="en_footer_address" value="{{ isset($footer->en_footer_address) ? $footer->en_footer_address : '' }}">
                                {!! $errors->first('en_footer_address', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_address') ? 'has-error' : '' }}">
                                <label for="bn_footer_address" class="control-label">{{ 'BN Footer Address' }}</label>
                                <input class="form-control" name="bn_footer_address" type="text" id="bn_footer_address" value="{{ isset($footer->bn_footer_address) ? $footer->bn_footer_address : '' }}">
                                {!! $errors->first('bn_footer_address', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_phone') ? 'has-error' : '' }}">
                                <label for="en_footer_phone" class="control-label">{{ 'EN Footer Phone' }}</label>
                                <input class="form-control" name="en_footer_phone" type="text" id="en_footer_phone" value="{{ isset($footer->en_footer_phone) ? $footer->en_footer_phone : '' }}">
                                {!! $errors->first('en_footer_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_phone') ? 'has-error' : '' }}">
                                <label for="bn_footer_phone" class="control-label">{{ 'BN Footer Phone' }}</label>
                                <input class="form-control" name="bn_footer_phone" type="text" id="bn_footer_phone" value="{{ isset($footer->bn_footer_phone) ? $footer->bn_footer_phone : '' }}">
                                {!! $errors->first('bn_footer_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('footer_email') ? 'has-error' : '' }}">
                                <label for="footer_email" class="control-label">{{ 'EN Footer Email' }}</label>
                                <input class="form-control" name="footer_email" type="text" id="footer_email" value="{{ isset($footer->footer_email) ? $footer->footer_email : '' }}">
                                {!! $errors->first('footer_email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>App Link Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($footer->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>App Link Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>App Upload</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="app_url" class="dropify" accept=".apk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_quick_link_title') ? 'has-error' : '' }}">
                                <label for="en_footer_quick_link_title" class="control-label">{{ 'EN Footer Quick Link Title' }}</label>
                                <input class="form-control" name="en_footer_quick_link_title" type="text" id="en_footer_quick_link_title" value="{{ isset($footer->en_footer_quick_link_title) ? $footer->en_footer_quick_link_title : '' }}">
                                {!! $errors->first('en_footer_quick_link_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_quick_link_title') ? 'has-error' : '' }}">
                                <label for="bn_footer_quick_link_title" class="control-label">{{ 'BN Footer Quick Link Title' }}</label>
                                <input class="form-control" name="bn_footer_quick_link_title" type="text" id="bn_footer_quick_link_title" value="{{ isset($footer->bn_footer_quick_link_title) ? $footer->bn_footer_quick_link_title : '' }}">
                                {!! $errors->first('bn_footer_quick_link_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_map_title') ? 'has-error' : '' }}">
                                <label for="en_footer_map_title" class="control-label">{{ 'EN Footer Map Title' }}</label>
                                <input class="form-control" name="en_footer_map_title" type="text" id="en_footer_map_title" value="{{ isset($footer->en_footer_map_title) ? $footer->en_footer_map_title : '' }}">
                                {!! $errors->first('en_footer_map_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_map_title') ? 'has-error' : '' }}">
                                <label for="bn_footer_map_title" class="control-label">{{ 'BN Footer Map Title' }}</label>
                                <input class="form-control" name="bn_footer_map_title" type="text" id="bn_footer_map_title" value="{{ isset($footer->bn_footer_map_title) ? $footer->bn_footer_map_title : '' }}">
                                {!! $errors->first('bn_footer_map_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('footer_map_link') ? 'has-error' : '' }}">
                                <label for="footer_map_link" class="control-label">{{ 'EN Footer Map Link' }}</label>
                                <input class="form-control" name="footer_map_link" type="text" id="footer_map_link" value="{{ isset($footer->footer_map_link) ? $footer->footer_map_link : '' }}">
                                {!! $errors->first('footer_map_link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_tc') ? 'has-error' : '' }}">
                                <label for="en_footer_tc" class="control-label">{{ 'EN Footer Terms & Condition' }}</label>
                                <input class="form-control" name="en_footer_tc" type="text" id="en_footer_tc" value="{{ isset($footer->en_footer_tc) ? $footer->en_footer_tc : '' }}">
                                {!! $errors->first('en_footer_tc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_tc') ? 'has-error' : '' }}">
                                <label for="bn_footer_tc" class="control-label">{{ 'BN Footer Terms & Condition' }}</label>
                                <input class="form-control" name="bn_footer_tc" type="text" id="bn_footer_tc" value="{{ isset($footer->bn_footer_tc) ? $footer->bn_footer_tc : '' }}">
                                {!! $errors->first('bn_footer_tc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_footer_copyright') ? 'has-error' : '' }}">
                                <label for="en_footer_copyright"
                                    class="control-label">{{ 'EN Footer Copyright' }}</label>
                                <input class="form-control" name="en_footer_copyright" type="text" id="en_footer_copyright" value="{{ isset($footer->en_footer_copyright) ? $footer->en_footer_copyright : '' }}">
                                {!! $errors->first('en_footer_copyright', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_footer_copyright') ? 'has-error' : '' }}">
                                <label for="bn_footer_copyright"
                                    class="control-label">{{ 'BN Footer Copyright' }}</label>
                                <input class="form-control" name="bn_footer_copyright" type="text" id="bn_footer_copyright" value="{{ isset($footer->bn_footer_copyright) ? $footer->bn_footer_copyright : '' }}">
                                {!! $errors->first('bn_footer_copyright', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div
                                class="form-group {{ $errors->has('en_footer_company_profile_title') ? 'has-error' : '' }}">
                                <label for="en_footer_company_profile_title"
                                    class="control-label">{{ 'EN Footer Company Profile Title' }}</label>
                                <input class="form-control" name="en_footer_company_profile_title" type="text"
                                    id="en_footer_company_profile_title" value="{{ isset($footer->en_footer_company_profile_title) ? $footer->en_footer_company_profile_title : '' }}">
                                {!! $errors->first('en_footer_company_profile_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div
                                class="form-group {{ $errors->has('bn_footer_company_profile_title') ? 'has-error' : '' }}">
                                <label for="bn_footer_company_profile_title"
                                    class="control-label">{{ 'BN Footer Company Profile Title' }}</label>
                                <input class="form-control" name="bn_footer_company_profile_title" type="text"
                                    id="bn_footer_company_profile_title" value="{{ isset($footer->bn_footer_company_profile_title) ? $footer->bn_footer_company_profile_title : '' }}">
                                {!! $errors->first('bn_footer_company_profile_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Company Profile</h2>
                                </div>
                                <div class="body">
                                    <iframe height="100%" width="100%" src="{{ asset($footer->company_profile_url) }}"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Company Profile</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="company_profile_url" class="dropify"
                                        accept=".pdf, .doc, .docx">
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