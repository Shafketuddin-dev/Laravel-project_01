@extends('backend.master')
@section('title')
CMS :: Manage Skills
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
                <h2><strong>Skills </strong></h2>
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
                <a href="{{ route('admin.manage_skill') }}" class="btn btn-sm btn-success">
                    Manage Skills
                </a>
                <form action="{{ route('admin.update_skill') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="skill_id" value="{{$skill->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($skill->en_title) ? $skill->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($skill->bn_title) ? $skill->bn_title : '' }}">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_corporate_internet') ? 'has-error' : '' }}">
                                <label for="en_corporate_internet" class="control-label">{{ 'EN Corporate Internet' }}</label>
                                <input class="form-control" name="en_corporate_internet" type="text" id="en_corporate_internet" value="{{ isset($skill->en_corporate_internet) ? $skill->en_corporate_internet : '' }}">
                                {!! $errors->first('en_corporate_internet', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_corporate_internet') ? 'has-error' : '' }}">
                                <label for="bn_corporate_internet" class="control-label">{{ 'BN Corporate Internet' }}</label>
                                <input class="form-control" name="bn_corporate_internet" type="text" id="bn_corporate_internet" value="{{ isset($skill->bn_corporate_internet) ? $skill->bn_corporate_internet : '' }}">
                                {!! $errors->first('bn_corporate_internet', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_corporate_internet_percentage') ? 'has-error' : '' }}">
                                <label for="en_corporate_internet_percentage" class="control-label">{{ 'EN Corporate Internet Percentage' }}</label>
                                <input class="form-control" name="en_corporate_internet_percentage" type="text" id="en_corporate_internet_percentage" value="{{ isset($skill->en_corporate_internet_percentage) ? $skill->en_corporate_internet_percentage : '' }}">
                                {!! $errors->first('en_corporate_internet_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_corporate_internet_percentage') ? 'has-error' : '' }}">
                                <label for="bn_corporate_internet_percentage" class="control-label">{{ 'BN Corporate Internet Percentage' }}</label>
                                <input class="form-control" name="bn_corporate_internet_percentage" type="text" id="bn_corporate_internet_percentage" value="{{ isset($skill->bn_corporate_internet_percentage) ? $skill->bn_corporate_internet_percentage : '' }}">
                                {!! $errors->first('bn_corporate_internet_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_internet') ? 'has-error' : '' }}">
                                <label for="en_home_internet" class="control-label">{{ 'EN Home Internet' }}</label>
                                <input class="form-control" name="en_home_internet" type="text" id="en_home_internet" value="{{ isset($skill->en_home_internet) ? $skill->en_home_internet : '' }}">
                                {!! $errors->first('en_home_internet', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_internet') ? 'has-error' : '' }}">
                                <label for="bn_home_internet" class="control-label">{{ 'BN Home Internet' }}</label>
                                <input class="form-control" name="bn_home_internet" type="text" id="bn_home_internet" value="{{ isset($skill->bn_home_internet) ? $skill->bn_home_internet : '' }}">
                                {!! $errors->first('bn_home_internet', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_home_internet_percentage') ? 'has-error' : '' }}">
                                <label for="en_home_internet_percentage" class="control-label">{{ 'EN Home Internet Percentage' }}</label>
                                <input class="form-control" name="en_home_internet_percentage" type="text" id="en_home_internet_percentage" value="{{ isset($skill->en_home_internet_percentage) ? $skill->en_home_internet_percentage : '' }}">
                                {!! $errors->first('en_home_internet_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_home_internet_percentage') ? 'has-error' : '' }}">
                                <label for="bn_home_internet_percentage" class="control-label">{{ 'BN Home Internet Percentage' }}</label>
                                <input class="form-control" name="bn_home_internet_percentage" type="text" id="bn_home_internet_percentage" value="{{ isset($skill->bn_home_internet_percentage) ? $skill->bn_home_internet_percentage : '' }}">
                                {!! $errors->first('bn_home_internet_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_customer_support') ? 'has-error' : '' }}">
                                <label for="en_customer_support" class="control-label">{{ 'EN Customer Support' }}</label>
                                <input class="form-control" name="en_customer_support" type="text" id="en_customer_support" value="{{ isset($skill->en_customer_support) ? $skill->en_customer_support : '' }}">
                                {!! $errors->first('en_customer_support', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_customer_support') ? 'has-error' : '' }}">
                                <label for="bn_customer_support" class="control-label">{{ 'BN Customer Support' }}</label>
                                <input class="form-control" name="bn_customer_support" type="text" id="bn_customer_support" value="{{ isset($skill->bn_customer_support) ? $skill->bn_customer_support : '' }}">
                                {!! $errors->first('bn_customer_support', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_customer_support_percentage') ? 'has-error' : '' }}">
                                <label for="en_customer_support_percentage" class="control-label">{{ 'EN Customer Support Percentage' }}</label>
                                <input class="form-control" name="en_customer_support_percentage" type="text" id="en_customer_support_percentage" value="{{ isset($skill->en_customer_support_percentage) ? $skill->en_customer_support_percentage : '' }}">
                                {!! $errors->first('en_customer_support_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_customer_support_percentage') ? 'has-error' : '' }}">
                                <label for="bn_customer_support_percentage" class="control-label">{{ 'BN Customer Support Percentage' }}</label>
                                <input class="form-control" name="bn_customer_support_percentage" type="text" id="bn_customer_support_percentage" value="{{ isset($skill->bn_customer_support_percentage) ? $skill->bn_customer_support_percentage : '' }}">
                                {!! $errors->first('bn_customer_support_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_vts') ? 'has-error' : '' }}">
                                <label for="en_vts" class="control-label">{{ 'EN VTS' }}</label>
                                <input class="form-control" name="en_vts" type="text" id="en_vts" value="{{ isset($skill->en_vts) ? $skill->en_vts : '' }}">
                                {!! $errors->first('en_vts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_vts') ? 'has-error' : '' }}">
                                <label for="bn_vts" class="control-label">{{ 'BN VTS' }}</label>
                                <input class="form-control" name="bn_vts" type="text" id="bn_vts" value="{{ isset($skill->bn_vts) ? $skill->bn_vts : '' }}">
                                {!! $errors->first('bn_vts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_vts_percentage') ? 'has-error' : '' }}">
                                <label for="en_vts_percentage" class="control-label">{{ 'EN VTS Percentage' }}</label>
                                <input class="form-control" name="en_vts_percentage" type="text" id="en_vts_percentage" value="{{ isset($skill->en_vts_percentage) ? $skill->en_vts_percentage : '' }}">
                                {!! $errors->first('en_vts_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_vts_percentage') ? 'has-error' : '' }}">
                                <label for="bn_vts_percentage" class="control-label">{{ 'BN VTS Percentage' }}</label>
                                <input class="form-control" name="bn_vts_percentage" type="text" id="bn_vts_percentage" value="{{ isset($skill->bn_vts_percentage) ? $skill->bn_vts_percentage : '' }}">
                                {!! $errors->first('bn_vts_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_training') ? 'has-error' : '' }}">
                                <label for="en_training" class="control-label">{{ 'EN IT Training' }}</label>
                                <input class="form-control" name="en_training" type="text" id="en_training" value="{{ isset($skill->en_training) ? $skill->en_training : '' }}">
                                {!! $errors->first('en_training', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_training') ? 'has-error' : '' }}">
                                <label for="bn_training" class="control-label">{{ 'BN IT Training' }}</label>
                                <input class="form-control" name="bn_training" type="text" id="bn_training" value="{{ isset($skill->bn_training) ? $skill->bn_training : '' }}">
                                {!! $errors->first('bn_training', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_training_percentage') ? 'has-error' : '' }}">
                                <label for="en_training_percentage" class="control-label">{{ 'EN IT Training Percentage' }}</label>
                                <input class="form-control" name="en_training_percentage" type="text" id="en_training_percentage" value="{{ isset($skill->en_training_percentage) ? $skill->en_training_percentage : '' }}">
                                {!! $errors->first('en_training_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_training_percentage') ? 'has-error' : '' }}">
                                <label for="bn_training_percentage" class="control-label">{{ 'BN IT Training Percentage' }}</label>
                                <input class="form-control" name="bn_training_percentage" type="text" id="bn_training_percentage" value="{{ isset($skill->bn_training_percentage) ? $skill->bn_training_percentage : '' }}">
                                {!! $errors->first('bn_training_percentage', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <img src="{{ asset($skill->image) }}" alt="">
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
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection