@extends('backend.master')
@section('title')
CMS :: Manage Image
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
                <h2><strong>Image</strong></h2>
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
                <a href="{{ route('admin.manage_image') }}" class="btn btn-sm btn-success">
                    Manage Image
                </a>
                <form action="{{ route('admin.update_image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="image_id" value="{{$image->id}}">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label>Image Category</label>
                            <select name="image_category_id" id="" class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Category</option>
                                @foreach ($category as $item)
                                <option value=" {{ $item->id }}" {{ isset($image->image_category_id) ? ($image->image_category_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->en_title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <img src="{{ asset($image->image) }}" alt="">
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($image->status) && $image->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($image->status) && $image->status == 0 ? 'checked' : '' }} value="0">
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