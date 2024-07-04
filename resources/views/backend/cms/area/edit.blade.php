@extends('backend.master')
@section('title')
CMS :: Manage Registration Area
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Registration <strong> Area</strong></h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <a href="{{ route('admin.manage_area') }}" class="btn btn-sm btn-success">
                    Manage Registration Area
                </a>
                <form action="{{ route('admin.update_area') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="area_id" value="{{$area->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_area_name') ? 'has-error' : '' }}">
                                <label for="en_area_name" class="control-label">{{ 'EN Name' }}</label>
                                <input class="form-control" name="en_area_name" type="text" id="en_area_name" value="{{ isset($area->en_area_name) ? $area->en_area_name : '' }}">
                                {!! $errors->first('en_area_name', '<p class="help-block">:message</p>') !!}
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($area->status) && $area->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($area->status) && $area->status == 0 ? 'checked' : '' }} value="0">
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