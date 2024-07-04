@extends('backend.master')
@section('title')
    CMS :: Who We Are Page
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
@endsection
