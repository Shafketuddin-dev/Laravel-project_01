@extends('backend.master')
@section('title')
CMS :: Manage Involvement
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_branch') }}">Branch</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_branch_category') }}">Branch Category</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_department') }}">Department</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_designation') }}">Designation</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_bod') }}">Board of Director</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_involvement') }}">Involvement</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_personal_award') }}">Personal Award</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_mission') }}">Our Mission</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_vision') }}">Our Vision</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_skill') }}">Our Skill</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_choose_us') }}">Why Choose Us</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_faq') }}">Faq</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Involvement</strong></h2>
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
                <a href="{{ route('admin.manage_involvement') }}" class="btn btn-sm btn-success">
                    Involvement
                </a>
                <form action="{{ route('admin.update_involvement') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="involvement_id" value="{{$involvement->id}}">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Select Board of Directors</label>
                            <select name="bod_id" id="" class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Board of Directors</option>
                                @foreach ($bod as $item)
                                <option value=" {{ $item->id }}" {{ isset($involvement->bod_id) ? ($involvement->bod_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->en_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_company_name') ? 'has-error' : '' }}">
                                <label for="en_company_name" class="control-label">{{ 'EN Company Name' }}</label>
                                <input class="form-control" name="en_company_name" type="text" id="en_company_name" value="{{ isset($involvement->en_company_name) ? $involvement->en_company_name : '' }}">
                                {!! $errors->first('en_company_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_company_name') ? 'has-error' : '' }}">
                                <label for="bn_company_name" class="control-label">{{ 'BN Company Name' }}</label>
                                <input class="form-control" name="bn_company_name" type="text" id="bn_company_name" value="{{ isset($involvement->bn_company_name) ? $involvement->bn_company_name : '' }}">
                                {!! $errors->first('bn_company_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_designation') ? 'has-error' : '' }}">
                                <label for="en_designation" class="control-label">{{ 'EN Designation' }}</label>
                                <input class="form-control" name="en_designation" type="text" id="en_designation" value="{{ isset($involvement->en_designation) ? $involvement->en_designation : '' }}">
                                {!! $errors->first('en_designation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_designation') ? 'has-error' : '' }}">
                                <label for="bn_designation" class="control-label">{{ 'BN Designation' }}</label>
                                <input class="form-control" name="bn_designation" type="text" id="bn_designation" value="{{ isset($involvement->bn_designation) ? $involvement->bn_designation : '' }}">
                                {!! $errors->first('bn_designation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                                <label for="en_description" class="control-label">{{ 'EN Description' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description" id="en_description" placeholder="Please type what you want...">{{ isset($involvement->en_description) ? $involvement->en_description : '' }}</textarea>
                                {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : '' }}">
                                <label for="bn_description" class="control-label">{{ 'BN Description' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description" id="bn_description" placeholder="Please type what you want...">{{ isset($involvement->bn_description) ? $involvement->bn_description : '' }}</textarea>
                                {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_year_from') ? 'has-error' : '' }}">
                                <label for="en_year_from" class="control-label">{{ 'EN Year From' }}</label>
                                <input class="form-control" name="en_year_from" type="text" id="en_year_from" value="{{ isset($involvement->en_year_from) ? $involvement->en_year_from : '' }}">
                                {!! $errors->first('en_year_from', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_year_from') ? 'has-error' : '' }}">
                                <label for="bn_year_from" class="control-label">{{ 'BN Year From' }}</label>
                                <input class="form-control" name="bn_year_from" type="text" id="bn_year_from" value="{{ isset($involvement->bn_year_from) ? $involvement->bn_year_from : '' }}">
                                {!! $errors->first('bn_year_from', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_year_to') ? 'has-error' : '' }}">
                                <label for="en_year_to" class="control-label">{{ 'EN Year To' }}</label>
                                <input class="form-control" name="en_year_to" type="text" id="en_year_to" value="{{ isset($involvement->en_year_to) ? $involvement->en_year_to : '' }}">
                                {!! $errors->first('en_year_to', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_year_to') ? 'has-error' : '' }}">
                                <label for="bn_year_to" class="control-label">{{ 'BN Year To' }}</label>
                                <input class="form-control" name="bn_year_to" type="text" id="bn_year_to" value="{{ isset($involvement->bn_year_to) ? $involvement->bn_year_to : '' }}">
                                {!! $errors->first('bn_year_to', '<p class="help-block">:message</p>') !!}
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($involvement->status) && $involvement->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($involvement->status) && $involvement->status == 0 ? 'checked' : '' }} value="0">
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