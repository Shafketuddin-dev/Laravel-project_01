@extends('backend.master')
@section('title')
CMS :: Top Social Bar
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_top_bar') }}">Top Bar</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_menu') }}">Menu</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_footer') }}">Footer</a>
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
                Top Social Bar
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.add_top_bar') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Registration Text</th>
                                <th>BTRC</th>
                                <th>BTRC Package</th>
                                <th>Hotline</th>
                                <th>Email</th>
                                <th>Facebook</th>
                                <th>Youtube</th>
                                <th>Instagram</th>
                                <th>Linkedin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topbar as $item)
                            <tr>
                                <td>{{ $item->en_registration_text }}</td>
                                <td>{{ $item->en_brtc }}</td>
                                <td><img src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->en_hotline ?? ''}}</td>
                                <td>{{ $item->query_email }}</td>
                                <td>{{ $item->fb_link }}</td>
                                <td>{{ $item->yt_link }}</td>
                                <td>{{ $item->instagram_link }}</td>
                                <td>{{ $item->linkedin_link }}</td>
                                <td>
                                    <a href="{{ route('admin.edit_top_bar', $item->id) }}" title="Edit Top Bar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Edit</button></a>
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