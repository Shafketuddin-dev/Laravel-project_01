@extends('backend.master')
@section('title')
CMS :: More Page
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_notice') }}">Notice</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_image_category') }}">Image Category</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_image') }}">Image</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_video') }}">Video</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_youtube_video') }}">Youtube Video</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_blog_tag') }}">Blog Tag</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_blog_category') }}">Blog Category</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_blog') }}">Blogs</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_award') }}">Award</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_news_event') }}">News Event</a>
                <a class="btn btn-sm btn-success" href="{{ route('admin.manage_circular') }}">Circular</a>
            </div>
        </div>
    </div>
</div>
@endsection