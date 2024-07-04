@extends('backend.master')
@section('title')
CMS :: Footer
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
                Footer
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.add_footer') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>App Link Image</th>
                                <th>Get In Touch Title</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Quick Link</th>
                                <th>Map Title</th>
                                <th>Terms Condition</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($footer as $item)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->en_footer_contact_title }}</td>
                                <td>{{ $item->en_footer_address }}</td>
                                <td>{{ $item->en_footer_phone }}</td>
                                <td>{{ $item->footer_email }}</td>
                                <td>{{ $item->en_footer_quick_link_title }}</td>
                                <td>{{ $item->en_footer_map_title }}</td>
                                <td>{{ $item->en_footer_tc }}</td>
                                <td>
                                    <a href="{{ route('admin.edit_footer', $item->id) }}" title="Edit Footer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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