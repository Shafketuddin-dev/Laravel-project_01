@extends('backend.master')
@section('title')
CMS :: Office Information
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_district') }}">District</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_thana') }}">Thana</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_office_information') }}">Office Information</a>
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
                Office Information
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_office_information') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Office Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Hotline</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($office_information as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->en_office_name }}</td>
                                <td>{{ $item->en_address }}</td>
                                <td>{{ $item->en_person_number }}</td>
                                <td>{{ $item->en_hotline_number }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_office_information', $item->id) }}" title="Edit Office Information"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_office_information') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="office_information_id" value="{{ $item->id }}">
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