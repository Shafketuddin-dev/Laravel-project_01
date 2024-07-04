@extends('backend.master')
@section('title')
CMS :: Manage Blogs
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
                <h2><strong>Blogs</strong></h2>
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
                <a href="{{ route('admin.manage_blog') }}" class="btn btn-sm btn-success">
                    Manage Blogs
                </a>
                <form action="{{ route('admin.update_blog') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                    <input type="hidden" name="admin_id" value="{{auth()->user()->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label>Blog Tag</label>
                            <select name="blog_tag_id" id="" class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Tag</option>
                                @foreach ($tag as $item)
                                <option value=" {{ $item->id }}" {{ isset($blog->blog_tag_id) ? ($blog->blog_tag_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->en_title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Blog Category</label>
                            <select name="blog_category_id" id="" class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Category</option>
                                @foreach ($category as $item)
                                <option value=" {{ $item->id }}" {{ isset($blog->blog_category_id) ? ($blog->blog_category_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->en_title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
                                <label for="en_title" class="control-label">{{ 'EN Title' }}</label>
                                <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($blog->en_title) ? $blog->en_title : '' }}">
                                {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
                                <label for="bn_title" class="control-label">{{ 'BN Title' }}</label>
                                <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($blog->bn_title) ? $blog->bn_title : '' }}">
                                {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_description') ? 'has-error' : '' }}">
                                <label for="en_description" class="control-label">{{ 'EN Description' }}</label>
                                <textarea rows="4" class=" summernote" name="en_description" placeholder="Please type what you want...">{{ isset($blog->en_description) ? $blog->en_description : '' }}</textarea>
                                {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : '' }}">
                                <label for="bn_description" class="control-label">{{ 'BN Description' }}</label>
                                <textarea rows="4" class=" summernote" name="bn_description" placeholder="Please type what you want...">{{ isset($blog->bn_description) ? $blog->bn_description : '' }}</textarea>
                                {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('en_published_date') ? 'has-error' : '' }}">
                                <label for="en_published_date" class="control-label">{{ 'EN Published Date' }}</label>
                                <input class="form-control" name="en_published_date" type="text" id="en_published_date" value="{{ isset($blog->en_published_date) ? $blog->en_published_date : '' }}">
                                {!! $errors->first('en_published_date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group {{ $errors->has('bn_published_date') ? 'has-error' : '' }}">
                                <label for="bn_published_date" class="control-label">{{ 'BN Published Date' }}</label>
                                <input class="form-control" name="bn_published_date" type="text" id="bn_published_date" value="{{ isset($blog->bn_published_date) ? $blog->bn_published_date : '' }}">
                                {!! $errors->first('bn_published_date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($blog->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h2>Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($blog->status) && $blog->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($blog->status) && $blog->status == 0 ? 'checked' : '' }} value="0">
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