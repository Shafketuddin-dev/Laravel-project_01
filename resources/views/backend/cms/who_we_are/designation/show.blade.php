@extends('backend.master')
@section('title')
CMS :: Designation
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
                <h2><strong>Designation</strong></h2>
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
                <a href="{{ route('admin.manage_designation') }}" class="btn btn-sm btn-success" title="Add New">
                    Manage Designation
                </a>
                <form action="{{ route('admin.save_designation') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_name') ? 'has-error' : '' }}">
                                <label for="en_name" class="control-label">{{ 'EN Name' }}</label>
                                <input class="form-control" name="en_name" type="text" id="en_name">
                                {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_name') ? 'has-error' : '' }}">
                                <label for="bn_name" class="control-label">{{ 'BN Name' }}</label>
                                <input class="form-control" name="bn_name" type="text" id="bn_name">
                                {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
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