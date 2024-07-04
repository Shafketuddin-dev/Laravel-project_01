@extends('backend.master')
@section('title')
CMS :: Common
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_top_bar') }}">Top Bar</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_menu') }}">Menu</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_footer') }}">Footer</a>
    </div>
</div>
@endsection