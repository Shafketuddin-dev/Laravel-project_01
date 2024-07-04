@extends('backend.master')
@section('title')
CMS :: Internet Package
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_package_category') }}">Package Category</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_package') }}">Packages</a>
            </div>
        </div>
    </div>
</div>
@endsection