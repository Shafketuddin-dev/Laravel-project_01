@extends('backend.master')
@section('title')
CMS :: Manage Blog Tag
@endsection
@section('content')
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Blog</strong>Tag</h2>
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
                <a href="{{ route('admin.manage_blog_tag') }}" class="btn btn-sm btn-success">
                    Manage Blog Tag
                </a>
                <form action="{{ route('admin.update_blog_tag') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="blog_tag_id" value="{{$blog_tag->id}}">
                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($blog_tag->en_title) ? $blog_tag->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($blog_tag->bn_title) ? $blog_tag->bn_title : '' }}">
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($blog_tag->status) && $blog_tag->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($blog_tag->status) && $blog_tag->status == 0 ? 'checked' : '' }} value="0">
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