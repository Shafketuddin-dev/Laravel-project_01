@extends('backend.master')
@section('title')
CMS :: Manage Contact Label & Title
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_contact_label') }}">Contact Title & Labels</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Contact </strong>Label & Title</h2>
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
                <a href="{{ route('admin.manage_contact_label') }}" class="btn btn-sm btn-success">
                    Manage Contact Label & Title
                </a>
                <form action="{{ route('admin.update_contact_label') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="contact_label_id" value="{{$contact_label->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($contact_label->en_title) ? $contact_label->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($contact_label->bn_title) ? $contact_label->bn_title : '' }}">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_name_label') ? 'has-error' : '' }}">
                                <label for="en_name_label" class="control-label">{{ 'EN Name Label' }}</label>
                                <input class="form-control" name="en_name_label" type="text" id="en_name_label" value="{{ isset($contact_label->en_name_label) ? $contact_label->en_name_label : '' }}">
                                {!! $errors->first('en_name_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_name_label') ? 'has-error' : '' }}">
                                <label for="bn_name_label" class="control-label">{{ 'BN Name Label' }}</label>
                                <input class="form-control" name="bn_name_label" type="text" id="bn_name_label" value="{{ isset($contact_label->bn_name_label) ? $contact_label->bn_name_label : '' }}">
                                {!! $errors->first('bn_name_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_email_label') ? 'has-error' : '' }}">
                                <label for="en_email_label" class="control-label">{{ 'EN Email Label' }}</label>
                                <input class="form-control" name="en_email_label" type="text" id="en_email_label" value="{{ isset($contact_label->en_email_label) ? $contact_label->en_email_label : '' }}">
                                {!! $errors->first('en_email_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_email_label') ? 'has-error' : '' }}">
                                <label for="bn_email_label" class="control-label">{{ 'BN Email Label' }}</label>
                                <input class="form-control" name="bn_email_label" type="text" id="bn_email_label" value="{{ isset($contact_label->bn_email_label) ? $contact_label->bn_email_label : '' }}">
                                {!! $errors->first('bn_email_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_phone_label') ? 'has-error' : '' }}">
                                <label for="en_phone_label" class="control-label">{{ 'EN Phone Label' }}</label>
                                <input class="form-control" name="en_phone_label" type="text" id="en_phone_label" value="{{ isset($contact_label->en_phone_label) ? $contact_label->en_phone_label : '' }}">
                                {!! $errors->first('en_phone_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_phone_label') ? 'has-error' : '' }}">
                                <label for="bn_phone_label" class="control-label">{{ 'BN Phone Label' }}</label>
                                <input class="form-control" name="bn_phone_label" type="text" id="bn_phone_label" value="{{ isset($contact_label->bn_phone_label) ? $contact_label->bn_phone_label : '' }}">
                                {!! $errors->first('bn_phone_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_subject_label') ? 'has-error' : '' }}">
                                <label for="en_subject_label" class="control-label">{{ 'EN Subject Label' }}</label>
                                <input class="form-control" name="en_subject_label" type="text" id="en_subject_label" value="{{ isset($contact_label->en_subject_label) ? $contact_label->en_subject_label : '' }}">
                                {!! $errors->first('en_subject_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_subject_label') ? 'has-error' : '' }}">
                                <label for="bn_subject_label" class="control-label">{{ 'BN Subject Label' }}</label>
                                <input class="form-control" name="bn_subject_label" type="text" id="bn_subject_label" value="{{ isset($contact_label->bn_subject_label) ? $contact_label->bn_subject_label : '' }}">
                                {!! $errors->first('bn_subject_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_message_label') ? 'has-error' : '' }}">
                                <label for="en_message_label" class="control-label">{{ 'EN Message Label' }}</label>
                                <input class="form-control" name="en_message_label" type="text" id="en_message_label" value="{{ isset($contact_label->en_message_label) ? $contact_label->en_message_label : '' }}">
                                {!! $errors->first('en_message_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_message_label') ? 'has-error' : '' }}">
                                <label for="bn_message_label" class="control-label">{{ 'BN Message Label' }}</label>
                                <input class="form-control" name="bn_message_label" type="text" id="bn_message_label" value="{{ isset($contact_label->bn_message_label) ? $contact_label->bn_message_label : '' }}">
                                {!! $errors->first('bn_message_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_button_text') ? 'has-error' : '' }}">
                                <label for="en_button_text" class="control-label">{{ 'EN Button Text' }}</label>
                                <input class="form-control" name="en_button_text" type="text" id="en_button_text" value="{{ isset($contact_label->en_button_text) ? $contact_label->en_button_text : '' }}">
                                {!! $errors->first('en_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_button_text') ? 'has-error' : '' }}">
                                <label for="bn_button_text" class="control-label">{{ 'BN Button Text' }}</label>
                                <input class="form-control" name="bn_button_text" type="text" id="bn_button_text" value="{{ isset($contact_label->bn_button_text) ? $contact_label->bn_button_text : '' }}">
                                {!! $errors->first('bn_button_text', '<p class="help-block">:message</p>') !!}
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