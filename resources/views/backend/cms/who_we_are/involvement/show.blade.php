@extends('backend.master')
@section('title')
CMS :: Involvement
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
                <a href="{{ route('admin.manage_involvement') }}" class="btn btn-sm btn-success" title="Add New">
                    Manage Involvement
                </a>
                <form action="{{ route('admin.save_involvement') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Select Board of Directors</label>
                            <select name="bod_id" id="" class="form-control show-tick ms search-select" data-placeholder="Select a Director">
                                <option value="" disabled selected></option>
                                @foreach($bod as $item)
                                <option value="{{$item->id}}">{{ $item->en_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_company_name') ? 'has-error' : '' }}">
                                <label for="en_company_name" class="control-label">{{ 'EN Company Name' }}</label>
                                <input class="form-control" name="en_company_name" type="text" id="en_company_name">
                                {!! $errors->first('en_company_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_company_name') ? 'has-error' : '' }}">
                                <label for="bn_company_name" class="control-label">{{ 'BN Company Name' }}</label>
                                <input class="form-control" name="bn_company_name" type="text" id="bn_company_name">
                                {!! $errors->first('bn_company_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_designation') ? 'has-error' : '' }}">
                                <label for="en_designation" class="control-label">{{ 'EN Designation' }}</label>
                                <input class="form-control" name="en_designation" type="text" id="en_designation">
                                {!! $errors->first('en_designation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_designation') ? 'has-error' : '' }}">
                                <label for="bn_designation" class="control-label">{{ 'BN Designation' }}</label>
                                <input class="form-control" name="bn_designation" type="text" id="bn_designation">
                                {!! $errors->first('bn_designation', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                                <label for="en_description" class="control-label">{{ 'EN Company Working Description' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description" id="en_description" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : '' }}">
                                <label for="bn_description" class="control-label">{{ 'BN Company Working Description' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description" id="bn_description" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_year_from') ? 'has-error' : '' }}">
                                <label for="en_year_from" class="control-label">{{ 'EN Year From' }}</label>
                                <input class="form-control" name="en_year_from" type="text" id="en_year_from">
                                {!! $errors->first('en_year_from', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_year_from') ? 'has-error' : '' }}">
                                <label for="bn_year_from" class="control-label">{{ 'BN Year From' }}</label>
                                <input class="form-control" name="bn_year_from" type="text" id="bn_year_from">
                                {!! $errors->first('bn_year_from', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_year_to') ? 'has-error' : '' }}">
                                <label for="en_year_to" class="control-label">{{ 'EN Year To' }}</label>
                                <input class="form-control" name="en_year_to" type="text" id="en_year_to">
                                {!! $errors->first('en_year_to', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_year_to') ? 'has-error' : '' }}">
                                <label for="bn_year_to" class="control-label">{{ 'BN Year To' }}</label>
                                <input class="form-control" name="bn_year_to" type="text" id="bn_year_to">
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