@extends('backend.master')
@section('title')
CMS :: Pay Bill
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_payment_category') }}">Payment Category</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_payment') }}">Payment Name</a>
            </div>
        </div>
    </div>
</div>
@endsection