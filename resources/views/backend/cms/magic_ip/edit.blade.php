@extends('backend.master')
@section('title')
CMS :: Edit Magic IP
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Magic</strong>IP</h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <form action="{{ route('admin.update_magic_ip') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="magic_ip_id" value="{{$magic_ip->id}}">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Preview Hero Image</h2>
                                </div>
                                <div class="body bg-dark">
                                    <img src="{{ asset($magic_ip->image) }}" alt="Icon">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Choose New Hero Image</h2>
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
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($magic_ip->en_title) ? $magic_ip->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($magic_ip->bn_title) ? $magic_ip->bn_title : '' }}">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_head_para') ? 'has-error' : '' }}">
                                <label for="en_head_para" class="control-label">{{ 'EN Head Paragraph' }}</label>
                                <textarea class="form-control no-resize" name="en_head_para" id="en_head_para" cols="30" rows="5">{{ isset($magic_ip->en_head_para) ? $magic_ip->en_head_para : '' }}</textarea>
                                {!! $errors->first('en_head_para', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_head_para') ? 'has-error' : '' }}">
                                <label for="bn_head_para" class="control-label">{{ 'BN Head Paragraph' }}</label>
                                <textarea class="form-control no-resize" name="bn_head_para" id="bn_head_para" cols="30" rows="5">{{ isset($magic_ip->bn_head_para) ? $magic_ip->bn_head_para : '' }}</textarea>
                                {!! $errors->first('bn_head_para', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_body_text') ? 'has-error' : '' }}">
                                <label for="en_body_text" class="control-label">{{ 'EN Body Desscription' }}</label>
                                <textarea class="summernote form-control no-resize" name="en_body_text" id="en_body_text" cols="30" rows="5">{{ isset($magic_ip->en_body_text) ? $magic_ip->en_body_text : '' }}</textarea>
                                {!! $errors->first('en_body_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_body_text') ? 'has-error' : '' }}">
                                <label for="bn_body_text" class="control-label">{{ 'BN Body Desscription' }}</label>
                                <textarea class="summernote form-control no-resize" name="bn_body_text" id="bn_body_text" cols="30" rows="5">{{ isset($magic_ip->bn_body_text) ? $magic_ip->bn_body_text : '' }}</textarea>
                                {!! $errors->first('bn_body_text', '<p class="help-block">:message</p>') !!}
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
