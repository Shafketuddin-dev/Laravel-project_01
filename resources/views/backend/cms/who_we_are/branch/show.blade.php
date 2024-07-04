@extends('backend.master')
@section('title')
CMS :: Branch
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
                <h2><strong>Branch</strong></h2>
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
                <a href="{{ route('admin.manage_branch') }}" class="btn btn-sm btn-success" title="Add New">
                    Manage Branch
                </a>
                <form action="{{ route('admin.save_branch') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Branch Category</label>
                            <select name="branch_category_id" id="" class="form-control show-tick ms search-select" data-placeholder="Select a Category">
                                <option value="" disabled selected></option>
                                @foreach($category as $item)
                                <option value="{{$item->id}}">{{ $item->en_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_branch_name') ? 'has-error' : '' }}">
                                <label for="en_branch_name" class="control-label">{{ 'EN Branch Name' }}</label>
                                <input class="form-control" name="en_branch_name" type="text" id="en_branch_name">
                                {!! $errors->first('en_branch_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_branch_name') ? 'has-error' : '' }}">
                                <label for="bn_branch_name" class="control-label">{{ 'BN Branch Name' }}</label>
                                <input class="form-control" name="bn_branch_name" type="text" id="bn_branch_name">
                                {!! $errors->first('bn_branch_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_address') ? 'has-error' : '' }}">
                                <label for="en_address" class="control-label">{{ 'EN Address' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_address" id="en_address" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('en_address', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_address') ? 'has-error' : '' }}">
                                <label for="bn_address" class="control-label">{{ 'BN Address' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_address" id="bn_address" placeholder="Please type what you want..."></textarea>
                                {!! $errors->first('bn_address', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_phone') ? 'has-error' : '' }}">
                                <label for="en_phone" class="control-label">{{ 'EN Phone' }}</label>
                                <input class="form-control" name="en_phone" type="text" id="en_phone">
                                {!! $errors->first('en_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_phone') ? 'has-error' : '' }}">
                                <label for="bn_phone" class="control-label">{{ 'BN Phone' }}</label>
                                <input class="form-control" name="bn_phone" type="text" id="bn_phone">
                                {!! $errors->first('bn_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('call_phone') ? 'has-error' : '' }}">
                                <label for="call_phone" class="control-label">{{ 'Phone Number for Calling' }}</label>
                                <input class="form-control" name="call_phone" type="text" id="call_phone">
                                {!! $errors->first('call_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
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