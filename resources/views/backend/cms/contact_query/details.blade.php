@extends('backend.master')
@section('title')
Admin :: Contact Query Details
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_contact_message') }}">Back to Manage Contact</a>
    </div>
</div>
<div class="row">
    @if (Session::has('message'))
    <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                {{ $contact_details->query }}
            </div>
            <div class="card-footer">
                <h3>Name: {{ $contact_details->name }}</h3>
                <p>Email: {{ $contact_details->email }}</p>
                <p>Phone: {{ $contact_details->phone }}</p>
                <p>Subject: {{ $contact_details->subject }}</p>
            </div>
        </div>
    </div>
</div>
@endsection