@extends('backend.master')
@section('title')
CMS :: Manage Payment
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_payment_category') }}">Payment Category</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_payment') }}">Payment Name</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Payment</strong></h2>
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
                <a href="{{ route('admin.manage_payment') }}" class="btn btn-sm btn-success">
                    Manage Payment
                </a>
                <form action="{{ route('admin.update_payment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="payment_id" value="{{$payment->id}}">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Payment Category</label>
                            <select name="payment_category_id" id="" class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Category</option>
                                @foreach ($category as $item)
                                <option value=" {{ $item->id }}" {{ isset($payment->payment_category_id) ? ($payment->payment_category_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->en_title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_banner_text') ? 'has-error' : '' }}">
                                <label for="en_banner_text" class="control-label">{{ 'EN Banner Text' }}</label>
                                <input class="form-control" name="en_banner_text" type="text" id="en_banner_text" value="{{ isset($payment->en_banner_text) ? $payment->en_banner_text : '' }}">
                                {!! $errors->first('en_banner_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_banner_text') ? 'has-error' : '' }}">
                                <label for="bn_banner_text" class="control-label">{{ 'EN Banner Text' }}</label>
                                <input class="form-control" name="bn_banner_text" type="text" id="bn_banner_text" value="{{ isset($payment->bn_banner_text) ? $payment->bn_banner_text : '' }}">
                                {!! $errors->first('bn_banner_text', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_heading_one') ? 'has-error' : '' }}">
                                <label for="en_heading_one" class="control-label">{{ 'EN Heading Text 01' }}</label>
                                <input class="form-control" name="en_heading_one" type="text" id="en_heading_one" value="{{ isset($payment->en_heading_one) ? $payment->en_heading_one : '' }}">
                                {!! $errors->first('en_heading_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_heading_one') ? 'has-error' : '' }}">
                                <label for="bn_heading_one" class="control-label">{{ 'BN Heading Text 01' }}</label>
                                <input class="form-control" name="bn_heading_one" type="text" id="bn_heading_one" value="{{ isset($payment->bn_heading_one) ? $payment->bn_heading_one : '' }}">
                                {!! $errors->first('bn_heading_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description_one') ? 'has-error' : '' }}">
                                <label for="en_description_one" class="control-label">{{ 'EN Description 01' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description_one" id="en_description_one" placeholder="Please type what you want...">{{ isset($payment->en_description_one) ? $payment->en_description_one : '' }}</textarea>
                                {!! $errors->first('en_description_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description_one') ? 'has-error' : '' }}">
                                <label for="bn_description_one" class="control-label">{{ 'BN Description 01' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description_one" id="bn_description_one" placeholder="Please type what you want...">{{ isset($payment->bn_description_one) ? $payment->bn_description_one : '' }}</textarea>
                                {!! $errors->first('bn_description_one', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                        <div class="card">
                                <div class="header">
                                    <h2>Image One</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($payment->image_one) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image One</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image_one" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_heading_two') ? 'has-error' : '' }}">
                                <label for="en_heading_two" class="control-label">{{ 'EN Heading Text 02' }}</label>
                                <input class="form-control" name="en_heading_two" type="text" id="en_heading_two" value="{{ isset($payment->en_heading_two) ? $payment->en_heading_two : '' }}">
                                {!! $errors->first('en_heading_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_heading_two') ? 'has-error' : '' }}">
                                <label for="bn_heading_two" class="control-label">{{ 'BN Heading Text 02' }}</label>
                                <input class="form-control" name="bn_heading_two" type="text" id="bn_heading_two" value="{{ isset($payment->bn_heading_two) ? $payment->bn_heading_two : '' }}">
                                {!! $errors->first('bn_heading_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description_two') ? 'has-error' : '' }}">
                                <label for="en_description_two" class="control-label">{{ 'EN Description 02' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description_two" id="en_description_two" placeholder="Please type what you want...">{{ isset($payment->en_description_two) ? $payment->en_description_two : '' }}</textarea>
                                {!! $errors->first('en_description_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description_two') ? 'has-error' : '' }}">
                                <label for="bn_description_two" class="control-label">{{ 'BN Description 02' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description_two" id="bn_description_two" placeholder="Please type what you want...">{{ isset($payment->bn_description_two) ? $payment->bn_description_two : '' }}</textarea>
                                {!! $errors->first('bn_description_two', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                        <div class="card">
                                <div class="header">
                                    <h2>Image Two</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($payment->image_two) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image Two</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image_two" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_heading_three') ? 'has-error' : '' }}">
                                <label for="en_heading_three" class="control-label">{{ 'EN Heading Text 03' }}</label>
                                <input class="form-control" name="en_heading_three" type="text" id="en_heading_three" value="{{ isset($payment->en_heading_three) ? $payment->en_heading_three : '' }}">
                                {!! $errors->first('en_heading_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_heading_three') ? 'has-error' : '' }}">
                                <label for="bn_heading_three" class="control-label">{{ 'BN Heading Text 03' }}</label>
                                <input class="form-control" name="bn_heading_three" type="text" id="bn_heading_three" value="{{ isset($payment->bn_heading_three) ? $payment->bn_heading_three : '' }}">
                                {!! $errors->first('bn_heading_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description_three') ? 'has-error' : '' }}">
                                <label for="en_description_three" class="control-label">{{ 'EN Description 03' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description_three" id="en_description_three" placeholder="Please type what you want...">{{ isset($payment->en_description_three) ? $payment->en_description_three : '' }}</textarea>
                                {!! $errors->first('en_description_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description_three') ? 'has-error' : '' }}">
                                <label for="bn_description_three" class="control-label">{{ 'BN Description 03' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description_three" id="bn_description_three" placeholder="Please type what you want...">{{ isset($payment->bn_description_three) ? $payment->bn_description_three : '' }}</textarea>
                                {!! $errors->first('bn_description_three', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                        <div class="card">
                                <div class="header">
                                    <h2>Image Three</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($payment->image_three) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image Three</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image_three" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_heading_four') ? 'has-error' : '' }}">
                                <label for="en_heading_four" class="control-label">{{ 'EN Heading Text 04' }}</label>
                                <input class="form-control" name="en_heading_four" type="text" id="en_heading_four" value="{{ isset($payment->en_heading_four) ? $payment->en_heading_four : '' }}">
                                {!! $errors->first('en_heading_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_heading_four') ? 'has-error' : '' }}">
                                <label for="bn_heading_four" class="control-label">{{ 'BN Heading Text 04' }}</label>
                                <input class="form-control" name="bn_heading_four" type="text" id="bn_heading_four" value="{{ isset($payment->bn_heading_four) ? $payment->bn_heading_four : '' }}">
                                {!! $errors->first('bn_heading_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description_four') ? 'has-error' : '' }}">
                                <label for="en_description_four" class="control-label">{{ 'EN Description 04' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description_four" id="en_description_four" placeholder="Please type what you want...">{{ isset($payment->en_description_four) ? $payment->en_description_four : '' }}</textarea>
                                {!! $errors->first('en_description_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description_four') ? 'has-error' : '' }}">
                                <label for="bn_description_four" class="control-label">{{ 'BN Description 04' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description_four" id="bn_description_four" placeholder="Please type what you want...">{{ isset($payment->bn_description_four) ? $payment->bn_description_four : '' }}</textarea>
                                {!! $errors->first('bn_description_four', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                        <div class="card">
                                <div class="header">
                                    <h2>Image Four</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($payment->image_four) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image Four</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image_four" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_heading_five') ? 'has-error' : '' }}">
                                <label for="en_heading_five" class="control-label">{{ 'EN Heading Text 05' }}</label>
                                <input class="form-control" name="en_heading_five" type="text" id="en_heading_five" value="{{ isset($payment->en_heading_five) ? $payment->en_heading_five : '' }}">
                                {!! $errors->first('en_heading_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_heading_five') ? 'has-error' : '' }}">
                                <label for="bn_heading_five" class="control-label">{{ 'BN Heading Text 05' }}</label>
                                <input class="form-control" name="bn_heading_five" type="text" id="bn_heading_five" value="{{ isset($payment->bn_heading_five) ? $payment->bn_heading_five : '' }}">
                                {!! $errors->first('bn_heading_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description_five') ? 'has-error' : '' }}">
                                <label for="en_description_five" class="control-label">{{ 'EN Description 05' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description_five" id="en_description_five" placeholder="Please type what you want...">{{ isset($payment->en_description_five) ? $payment->en_description_five : '' }}</textarea>
                                {!! $errors->first('en_description_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description_five') ? 'has-error' : '' }}">
                                <label for="bn_description_five" class="control-label">{{ 'BN Description 05' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description_five" id="bn_description_five" placeholder="Please type what you want...">{{ isset($payment->bn_description_five) ? $payment->bn_description_five : '' }}</textarea>
                                {!! $errors->first('bn_description_five', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                        <div class="card">
                                <div class="header">
                                    <h2>Image Five</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($payment->image_five) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image Five</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image_five" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_heading_six') ? 'has-error' : '' }}">
                                <label for="en_heading_six" class="control-label">{{ 'EN Heading Text 06' }}</label>
                                <input class="form-control" name="en_heading_six" type="text" id="en_heading_six" value="{{ isset($payment->en_heading_six) ? $payment->en_heading_six : '' }}">
                                {!! $errors->first('en_heading_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_heading_six') ? 'has-error' : '' }}">
                                <label for="bn_heading_six" class="control-label">{{ 'BN Heading Text 06' }}</label>
                                <input class="form-control" name="bn_heading_six" type="text" id="bn_heading_six" value="{{ isset($payment->bn_heading_six) ? $payment->bn_heading_six : '' }}">
                                {!! $errors->first('bn_heading_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description_six') ? 'has-error' : '' }}">
                                <label for="en_description_six" class="control-label">{{ 'EN Description 06' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="en_description_six" id="en_description_six" placeholder="Please type what you want...">{{ isset($payment->en_description_six) ? $payment->en_description_six : '' }}</textarea>
                                {!! $errors->first('en_description_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description_six') ? 'has-error' : '' }}">
                                <label for="bn_description_six" class="control-label">{{ 'BN Description 06' }}</label>
                                <textarea rows="4" class="form-control no-resize" name="bn_description_six" id="bn_description_six" placeholder="Please type what you want...">{{ isset($payment->bn_description_six) ? $payment->bn_description_six : '' }}</textarea>
                                {!! $errors->first('bn_description_six', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Image Six</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($payment->image_six) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image Six</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image_six" class="dropify">
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($payment->status) && $payment->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($payment->status) && $payment->status == 0 ? 'checked' : '' }} value="0">
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