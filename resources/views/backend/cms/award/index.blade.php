@extends('backend.master')
@section('title')
CMS :: Award
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
                Award
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_award') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($award as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->en_title }}</td>
                                <td>
                                    @if(strlen($item->en_description) > 200)
                                    {!! substr($item->en_description, 0, 200) !!} ...
                                    @else
                                    {!! $item->en_description !!}
                                    @endif
                                </td>

                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.edit_award', $item->id) }}" title="Edit Award"><button class="btn btn-primary"><i class="zmdi zmdi-edit" aria-hidden="true"></i></button></a>
                                    <form action="{{ route('admin.delete_award') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="award_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="zmdi zmdi-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection