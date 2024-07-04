@extends('backend.master')
@section('title')
CMS :: Coverage Page Menu
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_district') }}">District</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_thana') }}">Thana</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_office_information') }}">Office Information</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_coverage') }}">Coverage</a>
            </div>
        </div>
    </div>
</div>
@endsection