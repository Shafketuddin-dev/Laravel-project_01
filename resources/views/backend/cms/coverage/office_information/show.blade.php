@extends('backend.master')
@section('title')
CMS :: Office Information
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_district') }}">District</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_thana') }}">Thana</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_office_information') }}">Office Information</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Office</strong>Information</h2>
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
                <a href="{{ route('admin.manage_office_information') }}" class="btn btn-sm btn-success" title="Add New">
                    Manage Office Information
                </a>
                <form action="{{ route('admin.save_office_information') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_office_name') ? 'has-error' : '' }}">
                                <label for="en_office_name" class="control-label">{{ 'EN Office Name' }}</label>
                                <input class="form-control" name="en_office_name" type="text" id="en_office_name">
                                {!! $errors->first('en_office_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_office_name') ? 'has-error' : '' }}">
                                <label for="bn_office_name" class="control-label">{{ 'BN Office Name' }}</label>
                                <input class="form-control" name="bn_office_name" type="text" id="bn_office_name">
                                {!! $errors->first('bn_office_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_address') ? 'has-error' : '' }}">
                                <label for="en_address" class="control-label">{{ 'EN Address' }}</label>
                                <textarea rows="4" class="form-control" name="en_address"  id="en_address" placeholder="Type Address..."></textarea>
                                {!! $errors->first('en_address', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_address') ? 'has-error' : '' }}">
                                <label for="bn_address" class="control-label">{{ 'BN Address' }}</label>
                                <textarea rows="4" class="form-control" name="bn_address"  id="bn_address" placeholder="Type Address..."></textarea>
                                {!! $errors->first('bn_address', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_person_number') ? 'has-error' : '' }}">
                                <label for="en_person_number" class="control-label">{{ 'EN Person Contact' }}</label>
                                <input class="form-control" name="en_person_number" type="text" id="en_person_number">
                                {!! $errors->first('en_person_number', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_person_number') ? 'has-error' : '' }}">
                                <label for="bn_person_number" class="control-label">{{ 'BN Person Contact' }}</label>
                                <input class="form-control" name="bn_person_number" type="text" id="bn_person_number">
                                {!! $errors->first('bn_person_number', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_hotline_number') ? 'has-error' : '' }}">
                                <label for="en_hotline_number" class="control-label">{{ 'EN Hotline Number' }}</label>
                                <input class="form-control" name="en_hotline_number" type="text" id="en_hotline_number">
                                {!! $errors->first('en_hotline_number', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_hotline_number') ? 'has-error' : '' }}">
                                <label for="bn_hotline_number" class="control-label">{{ 'BN Hotline Number' }}</label>
                                <input class="form-control" name="bn_hotline_number" type="text" id="bn_hotline_number">
                                {!! $errors->first('bn_hotline_number', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="control-label">{{ 'Person Email' }}</label>
                                <input class="form-control" name="email" type="text" id="email">
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
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