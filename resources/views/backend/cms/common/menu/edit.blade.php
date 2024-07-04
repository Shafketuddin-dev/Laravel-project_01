@extends('backend.master')
@section('title')
CMS :: Manage Menu
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_top_bar') }}">Top Bar</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_menu') }}">Menu</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_footer') }}">Footer</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Menu</strong></h2>
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
                <a href="{{ route('admin.manage_menu') }}" class="btn btn-sm btn-success">
                    Manage Menu
                </a>
                <form action="{{ route('admin.update_menu') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{$menu->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_home') ? 'has-error' : '' }}">
                                <label for="en_menu_home" class="control-label">{{ 'EN Menu Home' }}</label>
                                <input class="form-control" name="en_menu_home" type="text" id="en_menu_home" value="{{ isset($menu->en_menu_home) ? $menu->en_menu_home : '' }}">
                                {!! $errors->first('en_menu_home', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_home') ? 'has-error' : '' }}">
                                <label for="bn_menu_home" class="control-label">{{ 'BN Menu Home' }}</label>
                                <input class="form-control" name="bn_menu_home" type="text" id="bn_menu_home" value="{{ isset($menu->bn_menu_home) ? $menu->bn_menu_home : '' }}">
                                {!! $errors->first('bn_menu_home', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_whoweare_title') ? 'has-error' : '' }}">
                                <label for="en_menu_whoweare_title" class="control-label">{{ 'EN Who We Are Title' }}</label>
                                <input class="form-control" name="en_menu_whoweare_title" type="text" id="en_menu_whoweare_title" value="{{ isset($menu->en_menu_whoweare_title) ? $menu->en_menu_whoweare_title : '' }}">
                                {!! $errors->first('en_menu_whoweare_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_whoweare_title') ? 'has-error' : '' }}">
                                <label for="bn_menu_whoweare_title" class="control-label">{{ 'BN Who We Are Title' }}</label>
                                <input class="form-control" name="bn_menu_whoweare_title" type="text" id="bn_menu_whoweare_title" value="{{ isset($menu->bn_menu_whoweare_title) ? $menu->bn_menu_whoweare_title : '' }}">
                                {!! $errors->first('bn_menu_whoweare_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_about_us') ? 'has-error' : '' }}">
                                <label for="en_menu_about_us" class="control-label">{{ 'EN Menu About Us' }}</label>
                                <input class="form-control" name="en_menu_about_us" type="text" id="en_menu_about_us" value="{{ isset($menu->en_menu_about_us) ? $menu->en_menu_about_us : '' }}">
                                {!! $errors->first('en_menu_about_us', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_about_us') ? 'has-error' : '' }}">
                                <label for="bn_menu_about_us" class="control-label">{{ 'BN Menu About Us' }}</label>
                                <input class="form-control" name="bn_menu_about_us" type="text" id="bn_menu_about_us" value="{{ isset($menu->bn_menu_about_us) ? $menu->bn_menu_about_us : '' }}">
                                {!! $errors->first('bn_menu_about_us', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_branches') ? 'has-error' : '' }}">
                                <label for="en_menu_branches" class="control-label">{{ 'EN Menu Branches' }}</label>
                                <input class="form-control" name="en_menu_branches" type="text" id="en_menu_branches" value="{{ isset($menu->en_menu_branches) ? $menu->en_menu_branches : '' }}">
                                {!! $errors->first('en_menu_branches', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_branches') ? 'has-error' : '' }}">
                                <label for="bn_menu_branches" class="control-label">{{ 'BN Menu Branches' }}</label>
                                <input class="form-control" name="bn_menu_branches" type="text" id="bn_menu_branches" value="{{ isset($menu->bn_menu_branches) ? $menu->bn_menu_branches : '' }}">
                                {!! $errors->first('bn_menu_branches', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_md_profile') ? 'has-error' : '' }}">
                                <label for="en_menu_md_profile" class="control-label">{{ 'EN Menu MD Profile' }}</label>
                                <input class="form-control" name="en_menu_md_profile" type="text" id="en_menu_md_profile" value="{{ isset($menu->en_menu_md_profile) ? $menu->en_menu_md_profile : '' }}">
                                {!! $errors->first('en_menu_md_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_md_profile') ? 'has-error' : '' }}">
                                <label for="bn_menu_md_profile" class="control-label">{{ 'EN Menu MD Profile' }}</label>
                                <input class="form-control" name="bn_menu_md_profile" type="text" id="bn_menu_md_profile" value="{{ isset($menu->bn_menu_md_profile) ? $menu->bn_menu_md_profile : '' }}">
                                {!! $errors->first('bn_menu_md_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_md_message') ? 'has-error' : '' }}">
                                <label for="en_menu_md_message" class="control-label">{{ 'EN Menu MD Message' }}</label>
                                <input class="form-control" name="en_menu_md_message" type="text" id="en_menu_md_message" value="{{ isset($menu->en_menu_md_message) ? $menu->en_menu_md_message : '' }}">
                                {!! $errors->first('en_menu_md_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_md_message') ? 'has-error' : '' }}">
                                <label for="bn_menu_md_message" class="control-label">{{ 'BN Menu MD Message' }}</label>
                                <input class="form-control" name="bn_menu_md_message" type="text" id="bn_menu_md_message" value="{{ isset($menu->bn_menu_md_message) ? $menu->bn_menu_md_message : '' }}">
                                {!! $errors->first('bn_menu_md_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_chairman_profile') ? 'has-error' : '' }}">
                                <label for="en_menu_chairman_profile" class="control-label">{{ 'EN Menu Chairman Profile' }}</label>
                                <input class="form-control" name="en_menu_chairman_profile" type="text" id="en_menu_chairman_profile" value="{{ isset($menu->en_menu_chairman_profile) ? $menu->en_menu_chairman_profile : '' }}">
                                {!! $errors->first('en_menu_chairman_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_chairman_profile') ? 'has-error' : '' }}">
                                <label for="bn_menu_chairman_profile" class="control-label">{{ 'EN Menu Chairman Profile' }}</label>
                                <input class="form-control" name="bn_menu_chairman_profile" type="text" id="bn_menu_chairman_profile" value="{{ isset($menu->bn_menu_chairman_profile) ? $menu->bn_menu_chairman_profile : '' }}">
                                {!! $errors->first('bn_menu_chairman_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_chairman_message') ? 'has-error' : '' }}">
                                <label for="en_menu_chairman_message" class="control-label">{{ 'EN Menu Chairman Message' }}</label>
                                <input class="form-control" name="en_menu_chairman_message" type="text" id="en_menu_chairman_message" value="{{ isset($menu->en_menu_chairman_message) ? $menu->en_menu_chairman_message : '' }}">
                                {!! $errors->first('en_menu_chairman_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_chairman_message') ? 'has-error' : '' }}">
                                <label for="bn_menu_chairman_message" class="control-label">{{ 'BN Menu Chairman Message' }}</label>
                                <input class="form-control" name="bn_menu_chairman_message" type="text" id="bn_menu_chairman_message" value="{{ isset($menu->bn_menu_chairman_message) ? $menu->bn_menu_chairman_message : '' }}">
                                {!! $errors->first('bn_menu_chairman_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_dmd_profile') ? 'has-error' : '' }}">
                                <label for="en_menu_dmd_profile" class="control-label">{{ 'EN Menu DMD Profile' }}</label>
                                <input class="form-control" name="en_menu_dmd_profile" type="text" id="en_menu_dmd_profile" value="{{ isset($menu->en_menu_dmd_profile) ? $menu->en_menu_dmd_profile : '' }}">
                                {!! $errors->first('en_menu_dmd_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_dmd_profile') ? 'has-error' : '' }}">
                                <label for="bn_menu_dmd_profile" class="control-label">{{ 'BN Menu DMD Profile' }}</label>
                                <input class="form-control" name="bn_menu_dmd_profile" type="text" id="bn_menu_dmd_profile" value="{{ isset($menu->bn_menu_dmd_profile) ? $menu->bn_menu_dmd_profile : '' }}">
                                {!! $errors->first('bn_menu_dmd_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_dmd_message') ? 'has-error' : '' }}">
                                <label for="en_menu_dmd_message" class="control-label">{{ 'EN Menu DMD Message' }}</label>
                                <input class="form-control" name="en_menu_dmd_message" type="text" id="en_menu_dmd_message" value="{{ isset($menu->en_menu_dmd_message) ? $menu->en_menu_dmd_message : '' }}">
                                {!! $errors->first('en_menu_dmd_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_dmd_message') ? 'has-error' : '' }}">
                                <label for="bn_menu_dmd_message" class="control-label">{{ 'BN Menu DMD Message' }}</label>
                                <input class="form-control" name="bn_menu_dmd_message" type="text" id="bn_menu_dmd_message" value="{{ isset($menu->bn_menu_dmd_message) ? $menu->bn_menu_dmd_message : '' }}">
                                {!! $errors->first('bn_menu_dmd_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_ed_profile') ? 'has-error' : '' }}">
                                <label for="en_menu_ed_profile" class="control-label">{{ 'EN Menu ED Profile' }}</label>
                                <input class="form-control" name="en_menu_ed_profile" type="text" id="en_menu_ed_profile" value="{{ isset($menu->en_menu_ed_profile) ? $menu->en_menu_ed_profile : '' }}">
                                {!! $errors->first('en_menu_ed_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_ed_profile') ? 'has-error' : '' }}">
                                <label for="bn_menu_ed_profile" class="control-label">{{ 'BN Menu ED Profile' }}</label>
                                <input class="form-control" name="bn_menu_ed_profile" type="text" id="bn_menu_ed_profile" value="{{ isset($menu->bn_menu_ed_profile) ? $menu->bn_menu_ed_profile : '' }}">
                                {!! $errors->first('bn_menu_ed_profile', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_ed_message') ? 'has-error' : '' }}">
                                <label for="en_menu_ed_message" class="control-label">{{ 'EN Menu ED Message' }}</label>
                                <input class="form-control" name="en_menu_ed_message" type="text" id="en_menu_ed_message" value="{{ isset($menu->en_menu_ed_message) ? $menu->en_menu_ed_message : '' }}">
                                {!! $errors->first('en_menu_ed_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_ed_message') ? 'has-error' : '' }}">
                                <label for="bn_menu_ed_message" class="control-label">{{ 'BN Menu ED Message' }}</label>
                                <input class="form-control" name="bn_menu_ed_message" type="text" id="bn_menu_ed_message" value="{{ isset($menu->bn_menu_ed_message) ? $menu->bn_menu_ed_message : '' }}">
                                {!! $errors->first('bn_menu_ed_message', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_bod') ? 'has-error' : '' }}">
                                <label for="en_menu_bod" class="control-label">{{ 'EN Menu Board of Directors' }}</label>
                                <input class="form-control" name="en_menu_bod" type="text" id="en_menu_bod" value="{{ isset($menu->en_menu_bod) ? $menu->en_menu_bod : '' }}">
                                {!! $errors->first('en_menu_bod', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_bod') ? 'has-error' : '' }}">
                                <label for="bn_menu_bod" class="control-label">{{ 'BN Menu Board of Directors' }}</label>
                                <input class="form-control" name="bn_menu_bod" type="text" id="bn_menu_bod" value="{{ isset($menu->bn_menu_bod) ? $menu->bn_menu_bod : '' }}">
                                {!! $errors->first('bn_menu_bod', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_employee') ? 'has-error' : '' }}">
                                <label for="en_menu_employee" class="control-label">{{ 'EN Menu Employee' }}</label>
                                <input class="form-control" name="en_menu_employee" type="text" id="en_menu_employee" value="{{ isset($menu->en_menu_employee) ? $menu->en_menu_employee : '' }}">
                                {!! $errors->first('en_menu_employee', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_employee') ? 'has-error' : '' }}">
                                <label for="bn_menu_employee" class="control-label">{{ 'EN Menu Employee' }}</label>
                                <input class="form-control" name="bn_menu_employee" type="text" id="bn_menu_employee" value="{{ isset($menu->bn_menu_employee) ? $menu->bn_menu_employee : '' }}">
                                {!! $errors->first('bn_menu_employee', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_internet_plan') ? 'has-error' : '' }}">
                                <label for="en_menu_internet_plan" class="control-label">{{ 'EN Menu Internet Plan' }}</label>
                                <input class="form-control" name="en_menu_internet_plan" type="text" id="en_menu_internet_plan" value="{{ isset($menu->en_menu_internet_plan) ? $menu->en_menu_internet_plan : '' }}">
                                {!! $errors->first('en_menu_internet_plan', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_internet_plan') ? 'has-error' : '' }}">
                                <label for="bn_menu_internet_plan" class="control-label">{{ 'BN Menu Internet Plan' }}</label>
                                <input class="form-control" name="bn_menu_internet_plan" type="text" id="bn_menu_internet_plan" value="{{ isset($menu->bn_menu_internet_plan) ? $menu->bn_menu_internet_plan : '' }}">
                                {!! $errors->first('bn_menu_internet_plan', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_service_title') ? 'has-error' : '' }}">
                                <label for="en_menu_service_title" class="control-label">{{ 'EN Menu Service Title' }}</label>
                                <input class="form-control" name="en_menu_service_title" type="text" id="en_menu_service_title" value="{{ isset($menu->en_menu_service_title) ? $menu->en_menu_service_title : '' }}">
                                {!! $errors->first('en_menu_service_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_service_title') ? 'has-error' : '' }}">
                                <label for="bn_menu_service_title" class="control-label">{{ 'BN Menu Service Title' }}</label>
                                <input class="form-control" name="bn_menu_service_title" type="text" id="bn_menu_service_title" value="{{ isset($menu->bn_menu_service_title) ? $menu->bn_menu_service_title : '' }}">
                                {!! $errors->first('bn_menu_service_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_internet') ? 'has-error' : '' }}">
                                <label for="en_menu_internet" class="control-label">{{ 'EN Menu Internet' }}</label>
                                <input class="form-control" name="en_menu_internet" type="text" id="en_menu_internet" value="{{ isset($menu->en_menu_internet) ? $menu->en_menu_internet : '' }}">
                                {!! $errors->first('en_menu_internet', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_internet') ? 'has-error' : '' }}">
                                <label for="bn_menu_internet" class="control-label">{{ 'BN Menu Internet' }}</label>
                                <input class="form-control" name="bn_menu_internet" type="text" id="bn_menu_internet" value="{{ isset($menu->bn_menu_internet) ? $menu->bn_menu_internet : '' }}">
                                {!! $errors->first('bn_menu_internet', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_vts') ? 'has-error' : '' }}">
                                <label for="en_menu_vts" class="control-label">{{ 'EN Menu VTS' }}</label>
                                <input class="form-control" name="en_menu_vts" type="text" id="en_menu_vts" value="{{ isset($menu->en_menu_vts) ? $menu->en_menu_vts : '' }}">
                                {!! $errors->first('en_menu_vts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_vts') ? 'has-error' : '' }}">
                                <label for="bn_menu_vts" class="control-label">{{ 'BN Menu VTS' }}</label>
                                <input class="form-control" name="bn_menu_vts" type="text" id="bn_menu_vts" value="{{ isset($menu->bn_menu_vts) ? $menu->bn_menu_vts : '' }}">
                                {!! $errors->first('bn_menu_vts', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_it') ? 'has-error' : '' }}">
                                <label for="en_menu_it" class="control-label">{{ 'EN Menu IT Training' }}</label>
                                <input class="form-control" name="en_menu_it" type="text" id="en_menu_it" value="{{ isset($menu->en_menu_it) ? $menu->en_menu_it : '' }}">
                                {!! $errors->first('en_menu_it', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_it') ? 'has-error' : '' }}">
                                <label for="bn_menu_it" class="control-label">{{ 'BN Menu IT Training' }}</label>
                                <input class="form-control" name="bn_menu_it" type="text" id="bn_menu_it" value="{{ isset($menu->bn_menu_it) ? $menu->bn_menu_it : '' }}">
                                {!! $errors->first('bn_menu_it', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_billpay') ? 'has-error' : '' }}">
                                <label for="en_menu_billpay" class="control-label">{{ 'EN Menu Bill Pay Title' }}</label>
                                <input class="form-control" name="en_menu_billpay" type="text" id="en_menu_billpay" value="{{ isset($menu->en_menu_billpay) ? $menu->en_menu_billpay : '' }}">
                                {!! $errors->first('en_menu_billpay', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_billpay') ? 'has-error' : '' }}">
                                <label for="bn_menu_billpay" class="control-label">{{ 'BN Menu Bill Pay Title' }}</label>
                                <input class="form-control" name="bn_menu_billpay" type="text" id="bn_menu_billpay" value="{{ isset($menu->bn_menu_billpay) ? $menu->bn_menu_billpay : '' }}">
                                {!! $errors->first('bn_menu_billpay', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_billing_system') ? 'has-error' : '' }}">
                                <label for="en_menu_billing_system" class="control-label">{{ 'EN Menu Billing System' }}</label>
                                <input class="form-control" name="en_menu_billing_system" type="text" id="en_menu_billing_system" value="{{ isset($menu->en_menu_billing_system) ? $menu->en_menu_billing_system : '' }}">
                                {!! $errors->first('en_menu_billing_system', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_billing_system') ? 'has-error' : '' }}">
                                <label for="bn_menu_billing_system" class="control-label">{{ 'BN Menu Billing System' }}</label>
                                <input class="form-control" name="bn_menu_billing_system" type="text" id="bn_menu_billing_system" value="{{ isset($menu->bn_menu_billing_system) ? $menu->bn_menu_billing_system : '' }}">
                                {!! $errors->first('bn_menu_billing_system', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_online_pay') ? 'has-error' : '' }}">
                                <label for="en_menu_online_pay" class="control-label">{{ 'EN Menu Online Payment' }}</label>
                                <input class="form-control" name="en_menu_online_pay" type="text" id="en_menu_online_pay" value="{{ isset($menu->en_menu_online_pay) ? $menu->en_menu_online_pay : '' }}">
                                {!! $errors->first('en_menu_online_pay', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_online_pay') ? 'has-error' : '' }}">
                                <label for="bn_menu_online_pay" class="control-label">{{ 'BN Menu Online Payment' }}</label>
                                <input class="form-control" name="bn_menu_online_pay" type="text" id="bn_menu_online_pay" value="{{ isset($menu->bn_menu_online_pay) ? $menu->bn_menu_online_pay : '' }}">
                                {!! $errors->first('bn_menu_online_pay', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_contact_us') ? 'has-error' : '' }}">
                                <label for="en_menu_contact_us" class="control-label">{{ 'EN Menu Contact Us' }}</label>
                                <input class="form-control" name="en_menu_contact_us" type="text" id="en_menu_contact_us" value="{{ isset($menu->en_menu_contact_us) ? $menu->en_menu_contact_us : '' }}">
                                {!! $errors->first('en_menu_contact_us', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_contact_us') ? 'has-error' : '' }}">
                                <label for="bn_menu_contact_us" class="control-label">{{ 'BN Menu Contact Us' }}</label>
                                <input class="form-control" name="bn_menu_contact_us" type="text" id="bn_menu_contact_us" value="{{ isset($menu->bn_menu_contact_us) ? $menu->bn_menu_contact_us : '' }}">
                                {!! $errors->first('bn_menu_contact_us', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_more_title') ? 'has-error' : '' }}">
                                <label for="en_menu_more_title" class="control-label">{{ 'EN Menu More Title' }}</label>
                                <input class="form-control" name="en_menu_more_title" type="text" id="en_menu_more_title" value="{{ isset($menu->en_menu_more_title) ? $menu->en_menu_more_title : '' }}">
                                {!! $errors->first('en_menu_more_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_more_title') ? 'has-error' : '' }}">
                                <label for="bn_menu_more_title" class="control-label">{{ 'BN Menu More Title' }}</label>
                                <input class="form-control" name="bn_menu_more_title" type="text" id="bn_menu_more_title" value="{{ isset($menu->bn_menu_more_title) ? $menu->bn_menu_more_title : '' }}">
                                {!! $errors->first('bn_menu_more_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_blog') ? 'has-error' : '' }}">
                                <label for="en_menu_blog" class="control-label">{{ 'EN Menu Blog' }}</label>
                                <input class="form-control" name="en_menu_blog" type="text" id="en_menu_blog" value="{{ isset($menu->en_menu_blog) ? $menu->en_menu_blog : '' }}">
                                {!! $errors->first('en_menu_blog', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_blog') ? 'has-error' : '' }}">
                                <label for="bn_menu_blog" class="control-label">{{ 'BN Menu Blog' }}</label>
                                <input class="form-control" name="bn_menu_blog" type="text" id="bn_menu_blog" value="{{ isset($menu->bn_menu_blog) ? $menu->bn_menu_blog : '' }}">
                                {!! $errors->first('bn_menu_blog', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_notice') ? 'has-error' : '' }}">
                                <label for="en_menu_notice" class="control-label">{{ 'EN Menu Notice' }}</label>
                                <input class="form-control" name="en_menu_notice" type="text" id="en_menu_notice" value="{{ isset($menu->en_menu_notice) ? $menu->en_menu_notice : '' }}">
                                {!! $errors->first('en_menu_notice', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_notice') ? 'has-error' : '' }}">
                                <label for="bn_menu_notice" class="control-label">{{ 'BN Menu Notice' }}</label>
                                <input class="form-control" name="bn_menu_notice" type="text" id="bn_menu_notice" value="{{ isset($menu->bn_menu_notice) ? $menu->bn_menu_notice : '' }}">
                                {!! $errors->first('bn_menu_notice', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_awards') ? 'has-error' : '' }}">
                                <label for="en_menu_awards" class="control-label">{{ 'EN Menu Achievement & Awards' }}</label>
                                <input class="form-control" name="en_menu_awards" type="text" id="en_menu_awards" value="{{ isset($menu->en_menu_awards) ? $menu->en_menu_awards : '' }}">
                                {!! $errors->first('en_menu_awards', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_awards') ? 'has-error' : '' }}">
                                <label for="bn_menu_awards" class="control-label">{{ 'BN Menu Achievement & Awards' }}</label>
                                <input class="form-control" name="bn_menu_awards" type="text" id="bn_menu_awards" value="{{ isset($menu->bn_menu_awards) ? $menu->bn_menu_awards : '' }}">
                                {!! $errors->first('bn_menu_awards', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_gallery') ? 'has-error' : '' }}">
                                <label for="en_menu_gallery" class="control-label">{{ 'EN Menu Gallery' }}</label>
                                <input class="form-control" name="en_menu_gallery" type="text" id="en_menu_gallery" value="{{ isset($menu->en_menu_gallery) ? $menu->en_menu_gallery : '' }}">
                                {!! $errors->first('en_menu_gallery', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_gallery') ? 'has-error' : '' }}">
                                <label for="bn_menu_gallery" class="control-label">{{ 'BN Menu Gallery' }}</label>
                                <input class="form-control" name="bn_menu_gallery" type="text" id="bn_menu_gallery" value="{{ isset($menu->bn_menu_gallery) ? $menu->bn_menu_gallery : '' }}">
                                {!! $errors->first('bn_menu_gallery', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_news_event') ? 'has-error' : '' }}">
                                <label for="en_menu_news_event" class="control-label">{{ 'EN Menu News Event' }}</label>
                                <input class="form-control" name="en_menu_news_event" type="text" id="en_menu_news_event" value="{{ isset($menu->en_menu_news_event) ? $menu->en_menu_news_event : '' }}">
                                {!! $errors->first('en_menu_news_event', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_news_event') ? 'has-error' : '' }}">
                                <label for="bn_menu_news_event" class="control-label">{{ 'BN Menu News Event' }}</label>
                                <input class="form-control" name="bn_menu_news_event" type="text" id="bn_menu_news_event" value="{{ isset($menu->bn_menu_news_event) ? $menu->bn_menu_news_event : '' }}">
                                {!! $errors->first('bn_menu_news_event', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_circular') ? 'has-error' : '' }}">
                                <label for="en_menu_circular" class="control-label">{{ 'EN Menu Circular' }}</label>
                                <input class="form-control" name="en_menu_circular" type="text" id="en_menu_circular" value="{{ isset($menu->en_menu_circular) ? $menu->en_menu_circular : '' }}">
                                {!! $errors->first('en_menu_circular', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_circular') ? 'has-error' : '' }}">
                                <label for="bn_menu_circular" class="control-label">{{ 'BN Menu Circular' }}</label>
                                <input class="form-control" name="bn_menu_circular" type="text" id="bn_menu_circular" value="{{ isset($menu->bn_menu_circular) ? $menu->bn_menu_circular : '' }}">
                                {!! $errors->first('bn_menu_circular', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_menu_admin') ? 'has-error' : '' }}">
                                <label for="en_menu_admin" class="control-label">{{ 'EN Menu Admin Panel' }}</label>
                                <input class="form-control" name="en_menu_admin" type="text" id="en_menu_admin" value="{{ isset($menu->en_menu_admin) ? $menu->en_menu_admin : '' }}">
                                {!! $errors->first('en_menu_admin', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_menu_admin') ? 'has-error' : '' }}">
                                <label for="bn_menu_admin" class="control-label">{{ 'BN Menu Admin Panel' }}</label>
                                <input class="form-control" name="bn_menu_admin" type="text" id="bn_menu_admin" value="{{ isset($menu->bn_menu_admin) ? $menu->bn_menu_admin : '' }}">
                                {!! $errors->first('bn_menu_admin', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_tutorial') ? 'has-error' : '' }}">
                                <label for="en_tutorial" class="control-label">{{ 'EN Menu Tutorial Text' }}</label>
                                <input class="form-control" name="en_tutorial" type="text" id="en_tutorial" value="{{ isset($menu->en_tutorial) ? $menu->en_tutorial : '' }}">
                                {!! $errors->first('en_tutorial', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_tutorial') ? 'has-error' : '' }}">
                                <label for="bn_tutorial" class="control-label">{{ 'BN Menu Tutorial Text' }}</label>
                                <input class="form-control" name="bn_tutorial" type="text" id="bn_tutorial" value="{{ isset($menu->bn_tutorial) ? $menu->bn_tutorial : '' }}">
                                {!! $errors->first('bn_tutorial', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group {{ $errors->has('tutorial_link') ? 'has-error' : '' }}">
                                <label for="tutorial_link" class="control-label">{{ 'Tutorial Link' }}</label>
                                <input class="form-control" name="tutorial_link" type="text" id="tutorial_link" value="{{ isset($menu->tutorial_link) ? $menu->tutorial_link : '' }}">
                                {!! $errors->first('tutorial_link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Logo Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($menu->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Logo Image</h2>
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