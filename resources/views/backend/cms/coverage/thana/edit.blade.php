@extends('backend.master')
@section('title')
CMS :: Thana
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
                <h2><strong>Thana</strong></h2>
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
                <a href="{{ route('admin.manage_thana') }}" class="btn btn-sm btn-success">
                    Manage Thana
                </a>
                <form action="{{ route('admin.update_thana') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="thana_id" value="{{$thana->id}}">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>District</label>
                            <select name="district_id" id=""
                                class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a District</option>
                                @foreach ($district as $item)
                                    <option value=" {{ $item->id }}" {{ isset($thana->district_id) ? ($thana->district_id == $item->id ? 'selected' : '') : '' }}>
                                        {{ $item->en_title }}
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($thana->en_title) ? $thana->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($thana->bn_title) ? $thana->bn_title : '' }}">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($thana->status) && $thana->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($thana->status) && $thana->status == 0 ? 'checked' : '' }} value="0">
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