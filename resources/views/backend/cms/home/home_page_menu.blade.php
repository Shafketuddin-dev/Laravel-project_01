@extends('backend.master')
@section('title')
CMS :: Home Page
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_title_button') }}">Title & Button Text</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_slider') }}">Slider</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_about') }}">About Us</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_counter') }}">Counter</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_service') }}">Our Services</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_client') }}">Our Clients</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_choose_us') }}">Why Choose Us</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_faq') }}">Faq</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_testimonial') }}">Testimonial</a>
            </div>
        </div>
    </div>
</div>
@endsection