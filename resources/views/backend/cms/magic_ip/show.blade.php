@extends('backend.master')
@section('title')
CMS :: Magic IP
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Magic</strong> IP</h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <form action="{{ route('admin.save_magic_ip') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Hero Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_head_para') ? 'has-error' : '' }}">
                                <label for="en_head_para" class="control-label">{{ 'EN Head Paragraph' }}</label>
                                <textarea class="form-control no-resize" name="en_head_para" id="en_head_para" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_head_para', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_head_para') ? 'has-error' : '' }}">
                                <label for="bn_head_para" class="control-label">{{ 'BN Head Paragraph' }}</label>
                                <textarea class="form-control no-resize" name="bn_head_para" id="bn_head_para" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_head_para', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_body_text') ? 'has-error' : '' }}">
                                <label for="en_body_text" class="control-label">{{ 'EN Body Desscription' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_body_text" id="en_body_text" cols="30" rows="5"></textarea>
                                {!! $errors->first('en_body_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_body_text') ? 'has-error' : '' }}">
                                <label for="bn_body_text" class="control-label">{{ 'BN Body Desscription' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_body_text" id="bn_body_text" cols="30" rows="5"></textarea>
                                {!! $errors->first('bn_body_text', '<p class="help-block">:message</p>') !!}
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