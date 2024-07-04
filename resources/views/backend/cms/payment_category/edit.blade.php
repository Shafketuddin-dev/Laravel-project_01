@extends('backend.master')
@section('title')
CMS :: Manage Payment Category
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
                <h2><strong>Payment</strong>Category</h2>
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
                <a href="{{ route('admin.manage_payment_category') }}" class="btn btn-sm btn-success">
                    Manage Payment Category
                </a>
                <form action="{{ route('admin.update_payment_category') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="payment_category_id" value="{{$payment_category->id}}">
                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($payment_category->en_title) ? $payment_category->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($payment_category->bn_title) ? $payment_category->bn_title : '' }}">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($payment_category->status) && $payment_category->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($payment_category->status) && $payment_category->status == 0 ? 'checked' : '' }} value="0">
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