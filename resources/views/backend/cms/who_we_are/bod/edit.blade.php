@extends('backend.master')
@section('title')
CMS :: Manage Board of Director
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
                <h2><strong>Board of</strong>Director</h2>
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
                <a href="{{ route('admin.manage_bod') }}" class="btn btn-sm btn-success">
                    Manage Board of Director
                </a>
                <form action="{{ route('admin.update_bod') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="bod_id" value="{{$bod->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_name') ? 'has-error' : '' }}">
                                <label for="en_name" class="control-label">{{ 'EN Name' }}</label>
                                <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($bod->en_name) ? $bod->en_name : '' }}">
                                {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_name') ? 'has-error' : '' }}">
                                <label for="bn_name" class="control-label">{{ 'BN Name' }}</label>
                                <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($bod->bn_name) ? $bod->bn_name : '' }}">
                                {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Department</label>
                            <select name="department_id" id="" class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Department</option>
                                @foreach ($department as $item)
                                <option value=" {{ $item->id }}" {{ isset($bod->department_id) ? ($bod->department_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->en_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Designation</label>
                            <select name="designation_id" id="" class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Designation</option>
                                @foreach ($designation as $item)
                                <option value=" {{ $item->id }}" {{ isset($bod->designation_id) ? ($bod->designation_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->en_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                                <label for="en_description" class="control-label">{{ 'EN Description' }}</label>
                                <textarea rows="8" class="form-control no-resize" name="en_description" id="en_description" placeholder="Please type what you want...">{{ isset($bod->en_description) ? $bod->en_description : '' }}</textarea>
                                {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : '' }}">
                                <label for="bn_description" class="control-label">{{ 'BN Description' }}</label>
                                <textarea rows="8" class="form-control no-resize" name="bn_description" id="bn_description" placeholder="Please type what you want...">{{ isset($bod->bn_description) ? $bod->bn_description : '' }}</textarea>
                                {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($bod->image) }}" alt="">
                                </div>
                            </div>
                        </div>
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($bod->status) && $bod->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($bod->status) && $bod->status == 0 ? 'checked' : '' }} value="0">
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