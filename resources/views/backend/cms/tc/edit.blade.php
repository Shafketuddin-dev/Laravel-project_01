@extends('backend.master')
@section('title')
CMS :: Manage Terms & Conditions
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
    <a class="btn btn-sm btn-success" href="{{ route('admin.manage_tc') }}">Terms & Conditions</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Terms</strong>Conditions</h2>
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
                <a href="{{ route('admin.manage_tc') }}" class="btn btn-sm btn-success">
                    Manage Terms & Conditions
                </a>
                <form action="{{ route('admin.update_tc') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tc_id" value="{{$tc->id}}">
                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($tc->en_title) ? $tc->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($tc->bn_title) ? $tc->bn_title : '' }}">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_payment_mode') ? 'has-error' : '' }}">
                                <label for="en_payment_mode" class="control-label">{{ 'EN Payment Mode' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="en_payment_mode" id="en_payment_mode" placeholder="Please type what you want...">{{ isset($tc->en_payment_mode) ? $tc->en_payment_mode : '' }}</textarea>
                                {!! $errors->first('en_payment_mode', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_payment_mode') ? 'has-error' : '' }}">
                                <label for="bn_payment_mode" class="control-label">{{ 'BN Payment Mode' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="bn_payment_mode" id="bn_payment_mode" placeholder="Please type what you want...">{{ isset($tc->bn_payment_mode) ? $tc->bn_payment_mode : '' }}</textarea>
                                {!! $errors->first('bn_payment_mode', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_documentation') ? 'has-error' : '' }}">
                                <label for="en_documentation" class="control-label">{{ 'EN Documentation' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="en_documentation" id="en_documentation" placeholder="Please type what you want...">{{ isset($tc->en_documentation) ? $tc->en_documentation : '' }}</textarea>
                                {!! $errors->first('en_documentation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_documentation') ? 'has-error' : '' }}">
                                <label for="bn_documentation" class="control-label">{{ 'BN Documentation' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="bn_documentation" id="bn_documentation" placeholder="Please type what you want...">{{ isset($tc->bn_documentation) ? $tc->bn_documentation : '' }}</textarea>
                                {!! $errors->first('bn_documentation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_after_sales_service') ? 'has-error' : '' }}">
                                <label for="en_after_sales_service" class="control-label">{{ 'EN After Sales Service' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="en_after_sales_service" id="en_after_sales_service" placeholder="Please type what you want...">{{ isset($tc->en_after_sales_service) ? $tc->en_after_sales_service : '' }}</textarea>
                                {!! $errors->first('en_after_sales_service', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_after_sales_service') ? 'has-error' : '' }}">
                                <label for="bn_after_sales_service" class="control-label">{{ 'BN After Sales Service' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="bn_after_sales_service" id="bn_after_sales_service" placeholder="Please type what you want...">{{ isset($tc->bn_after_sales_service) ? $tc->bn_after_sales_service : '' }}</textarea>
                                {!! $errors->first('bn_after_sales_service', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_client_responsibility') ? 'has-error' : '' }}">
                                <label for="en_client_responsibility" class="control-label">{{ 'EN Client Responsibility' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="en_client_responsibility" id="en_client_responsibility" placeholder="Please type what you want...">{{ isset($tc->en_client_responsibility) ? $tc->en_client_responsibility : '' }}</textarea>
                                {!! $errors->first('en_client_responsibility', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_client_responsibility') ? 'has-error' : '' }}">
                                <label for="bn_client_responsibility" class="control-label">{{ 'BN Client Responsibility' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="bn_client_responsibility" id="bn_client_responsibility" placeholder="Please type what you want...">{{ isset($tc->bn_client_responsibility) ? $tc->bn_client_responsibility : '' }}</textarea>
                                {!! $errors->first('bn_client_responsibility', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_others') ? 'has-error' : '' }}">
                                <label for="en_others" class="control-label">{{ 'EN Others' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="en_others" id="en_others" placeholder="Please type what you want...">{{ isset($tc->en_others) ? $tc->en_others : '' }}</textarea>
                                {!! $errors->first('en_others', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_others') ? 'has-error' : '' }}">
                                <label for="bn_others" class="control-label">{{ 'BN Others' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="bn_others" id="bn_others" placeholder="Please type what you want...">{{ isset($tc->bn_others) ? $tc->bn_others : '' }}</textarea>
                                {!! $errors->first('bn_others', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_contact_termination') ? 'has-error' : '' }}">
                                <label for="en_contact_termination" class="control-label">{{ 'EN Contact Termination' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="en_contact_termination" id="en_contact_termination" placeholder="Please type what you want...">{{ isset($tc->en_contact_termination) ? $tc->en_contact_termination : '' }}</textarea>
                                {!! $errors->first('en_contact_termination', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_contact_termination') ? 'has-error' : '' }}">
                                <label for="bn_contact_termination" class="control-label">{{ 'BN Contact Termination' }}</label>
                                <textarea rows="4" class="summernote form-control no-resize" name="bn_contact_termination" id="bn_contact_termination" placeholder="Please type what you want...">{{ isset($tc->bn_contact_termination) ? $tc->bn_contact_termination : '' }}</textarea>
                                {!! $errors->first('bn_contact_termination', '<p class="help-block">:message</p>') !!}
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