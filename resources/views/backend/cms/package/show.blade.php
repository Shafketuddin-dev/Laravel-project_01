@extends('backend.master')
@section('title')
CMS :: Package
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_package_category') }}">Package Category</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_package') }}">Packages</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Package</strong></h2>
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
                <a href="{{ route('admin.manage_package') }}" class="btn btn-sm btn-success" title="Add New">
                    Manage Package
                </a>
                <form action="{{ route('admin.save_package') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Package Category</label>
                            <select name="package_category_id" id="" class="form-control show-tick ms search-select" data-placeholder="Select a Category">
                                <option value="" disabled selected></option>
                                @foreach($category as $item)
                                <option value="{{$item->id}}">{{ $item->en_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_package_name') ? 'has-error' : '' }}">
                                <label for="en_package_name" class="control-label">{{ 'EN Package Name' }}</label>
                                <input class="form-control" name="en_package_name" type="text" id="en_package_name">
                                {!! $errors->first('en_package_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_package_name') ? 'has-error' : '' }}">
                                <label for="bn_package_name" class="control-label">{{ 'EN Package Name' }}</label>
                                <input class="form-control" name="bn_package_name" type="text" id="bn_package_name">
                                {!! $errors->first('bn_package_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_mbps_value') ? 'has-error' : '' }}">
                                <label for="en_mbps_value" class="control-label">{{ 'EN MBPS Value' }}</label>
                                <input class="form-control" name="en_mbps_value" type="text" id="en_mbps_value">
                                {!! $errors->first('en_mbps_value', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_mbps_value') ? 'has-error' : '' }}">
                                <label for="bn_mbps_value" class="control-label">{{ 'BN MBPS Value' }}</label>
                                <input class="form-control" name="bn_mbps_value" type="text" id="bn_mbps_value">
                                {!! $errors->first('bn_mbps_value', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_amount_label') ? 'has-error' : '' }}">
                                <label for="en_amount_label" class="control-label">{{ 'EN Amount Label' }}</label>
                                <input class="form-control" name="en_amount_label" type="text" id="en_amount_label">
                                {!! $errors->first('en_amount_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_amount_label') ? 'has-error' : '' }}">
                                <label for="bn_amount_label" class="control-label">{{ 'BN Amount Label' }}</label>
                                <input class="form-control" name="bn_amount_label" type="text" id="bn_amount_label">
                                {!! $errors->first('bn_amount_label', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_amount') ? 'has-error' : '' }}">
                                <label for="en_amount" class="control-label">{{ 'EN Bill Amount' }}</label>
                                <input class="form-control" name="en_amount" type="text" id="en_amount">
                                {!! $errors->first('en_amount', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_amount') ? 'has-error' : '' }}">
                                <label for="bn_amount" class="control-label">{{ 'BN Bill Amount' }}</label>
                                <input class="form-control" name="bn_amount" type="text" id="bn_amount">
                                {!! $errors->first('bn_amount', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_discount_monthly_fee') ? 'has-error' : '' }}">
                                <label for="en_discount_monthly_fee" class="control-label">{{ 'EN Monthly Bill Discount' }}</label>
                                <input class="form-control" name="en_discount_monthly_fee" type="text" id="en_discount_monthly_fee">
                                {!! $errors->first('en_discount_monthly_fee', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_discount_monthly_fee') ? 'has-error' : '' }}">
                                <label for="bn_discount_monthly_fee" class="control-label">{{ 'BN Monthly Bill Discount' }}</label>
                                <input class="form-control" name="bn_discount_monthly_fee" type="text" id="bn_discount_monthly_fee">
                                {!! $errors->first('bn_discount_monthly_fee', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_otc_amount') ? 'has-error' : '' }}">
                                <label for="en_otc_amount" class="control-label">{{ 'EN OTC' }}</label>
                                <input class="form-control" name="en_otc_amount" type="text" id="en_otc_amount">
                                {!! $errors->first('en_otc_amount', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_otc_amount') ? 'has-error' : '' }}">
                                <label for="bn_otc_amount" class="control-label">{{ 'BN OTC' }}</label>
                                <input class="form-control" name="bn_otc_amount" type="text" id="bn_otc_amount">
                                {!! $errors->first('bn_otc_amount', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_discount_otc') ? 'has-error' : '' }}">
                                <label for="en_discount_otc" class="control-label">{{ 'EN OTC Discount' }}</label>
                                <input class="form-control" name="en_discount_otc" type="text" id="en_discount_otc">
                                {!! $errors->first('en_discount_otc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_discount_otc') ? 'has-error' : '' }}">
                                <label for="bn_discount_otc" class="control-label">{{ 'BN OTC Discount' }}</label>
                                <input class="form-control" name="bn_discount_otc" type="text" id="bn_discount_otc">
                                {!! $errors->first('bn_discount_otc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_one') ? 'has-error' : '' }}">
                                <label for="en_short_info_one" class="control-label">{{ 'EN Short Information 01' }}</label>
                                <input class="form-control" name="en_short_info_one" type="text" id="en_short_info_one">
                                {!! $errors->first('en_short_info_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_one') ? 'has-error' : '' }}">
                                <label for="bn_short_info_one" class="control-label">{{ 'BN Short Information 01' }}</label>
                                <input class="form-control" name="bn_short_info_one" type="text" id="bn_short_info_one">
                                {!! $errors->first('bn_short_info_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_two') ? 'has-error' : '' }}">
                                <label for="en_short_info_two" class="control-label">{{ 'EN Short Information 02' }}</label>
                                <input class="form-control" name="en_short_info_two" type="text" id="en_short_info_two">
                                {!! $errors->first('en_short_info_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_two') ? 'has-error' : '' }}">
                                <label for="bn_short_info_two" class="control-label">{{ 'BN Short Information 02' }}</label>
                                <input class="form-control" name="bn_short_info_two" type="text" id="bn_short_info_two">
                                {!! $errors->first('bn_short_info_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_three') ? 'has-error' : '' }}">
                                <label for="en_short_info_three" class="control-label">{{ 'EN Short Information 03' }}</label>
                                <input class="form-control" name="en_short_info_three" type="text" id="en_short_info_three">
                                {!! $errors->first('en_short_info_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_three') ? 'has-error' : '' }}">
                                <label for="bn_short_info_three" class="control-label">{{ 'BN Short Information 03' }}</label>
                                <input class="form-control" name="bn_short_info_three" type="text" id="bn_short_info_three">
                                {!! $errors->first('bn_short_info_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_four') ? 'has-error' : '' }}">
                                <label for="en_short_info_four" class="control-label">{{ 'EN Short Information 04' }}</label>
                                <input class="form-control" name="en_short_info_four" type="text" id="en_short_info_four">
                                {!! $errors->first('en_short_info_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_four') ? 'has-error' : '' }}">
                                <label for="bn_short_info_four" class="control-label">{{ 'BN Short Information 04' }}</label>
                                <input class="form-control" name="bn_short_info_four" type="text" id="bn_short_info_four">
                                {!! $errors->first('bn_short_info_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_five') ? 'has-error' : '' }}">
                                <label for="en_short_info_five" class="control-label">{{ 'EN Short Information 05' }}</label>
                                <input class="form-control" name="en_short_info_five" type="text" id="en_short_info_five">
                                {!! $errors->first('en_short_info_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_five') ? 'has-error' : '' }}">
                                <label for="bn_short_info_five" class="control-label">{{ 'BN Short Information 05' }}</label>
                                <input class="form-control" name="bn_short_info_five" type="text" id="bn_short_info_five">
                                {!! $errors->first('bn_short_info_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_six') ? 'has-error' : '' }}">
                                <label for="en_short_info_six" class="control-label">{{ 'EN Short Information 06' }}</label>
                                <input class="form-control" name="en_short_info_six" type="text" id="en_short_info_six">
                                {!! $errors->first('en_short_info_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_six') ? 'has-error' : '' }}">
                                <label for="bn_short_info_six" class="control-label">{{ 'BN Short Information 06' }}</label>
                                <input class="form-control" name="bn_short_info_six" type="text" id="bn_short_info_six">
                                {!! $errors->first('bn_short_info_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_seven') ? 'has-error' : '' }}">
                                <label for="en_short_info_seven" class="control-label">{{ 'EN Short Information 07' }}</label>
                                <input class="form-control" name="en_short_info_seven" type="text" id="en_short_info_seven">
                                {!! $errors->first('en_short_info_seven', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_seven') ? 'has-error' : '' }}">
                                <label for="bn_short_info_seven" class="control-label">{{ 'BN Short Information 07' }}</label>
                                <input class="form-control" name="bn_short_info_seven" type="text" id="bn_short_info_seven">
                                {!! $errors->first('bn_short_info_seven', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_eight') ? 'has-error' : '' }}">
                                <label for="en_short_info_eight" class="control-label">{{ 'EN Short Information 08' }}</label>
                                <input class="form-control" name="en_short_info_eight" type="text" id="en_short_info_eight">
                                {!! $errors->first('en_short_info_eight', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_eight') ? 'has-error' : '' }}">
                                <label for="bn_short_info_eight" class="control-label">{{ 'BN Short Information 08' }}</label>
                                <input class="form-control" name="bn_short_info_eight" type="text" id="bn_short_info_eight">
                                {!! $errors->first('bn_short_info_eight', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_nine') ? 'has-error' : '' }}">
                                <label for="en_short_info_nine" class="control-label">{{ 'EN Short Information 09' }}</label>
                                <input class="form-control" name="en_short_info_nine" type="text" id="en_short_info_nine">
                                {!! $errors->first('en_short_info_nine', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_nine') ? 'has-error' : '' }}">
                                <label for="bn_short_info_nine" class="control-label">{{ 'BN Short Information 09' }}</label>
                                <input class="form-control" name="bn_short_info_nine" type="text" id="bn_short_info_nine">
                                {!! $errors->first('bn_short_info_nine', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_short_info_ten') ? 'has-error' : '' }}">
                                <label for="en_short_info_ten" class="control-label">{{ 'EN Short Information 10' }}</label>
                                <input class="form-control" name="en_short_info_ten" type="text" id="en_short_info_ten">
                                {!! $errors->first('en_short_info_ten', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_short_info_ten') ? 'has-error' : '' }}">
                                <label for="bn_short_info_ten" class="control-label">{{ 'BN Short Information 10' }}</label>
                                <input class="form-control" name="bn_short_info_ten" type="text" id="bn_short_info_ten">
                                {!! $errors->first('bn_short_info_ten', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_button_text') ? 'has-error' : '' }}">
                                <label for="en_button_text" class="control-label">{{ 'EN Button Text' }}</label>
                                <input class="form-control" name="en_button_text" type="text" id="en_button_text">
                                {!! $errors->first('en_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_button_text') ? 'has-error' : '' }}">
                                <label for="bn_button_text" class="control-label">{{ 'BN Button Text' }}</label>
                                <input class="form-control" name="bn_button_text" type="text" id="bn_button_text">
                                {!! $errors->first('bn_button_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            Top Package
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="top_package" id="yes" class="with-gap" value="1">
                                    <label for="publish">Yes</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="top_package" id="no" class="with-gap" checked value="0">
                                    <label for="unpublish">No</label>
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