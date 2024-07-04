@extends('backend.master')
@section('title')
CMS :: Home Service
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_title_button') }}">Title & Button Text</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_slider') }}">Slider</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_service') }}">Our Services</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_client') }}">Our Clients</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_testimonial') }}">Testimonial</a>
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
                Home Service
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_home_service') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Icon Image</th>
                                <th>Description</th>
                                <th>Button Text</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_service as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->en_title }}</td>
                                <td class="bg-dark"><img src="{{ asset($item->image) }}" alt=""></td>
                                <td>{!! $item->en_description !!}</td>
                                <td>{{ $item->en_button_text }}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_home_service', $item->id) }}" title="Edit Home Service"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_home_service') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="home_service_id" value="{{ $item->id }}">
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