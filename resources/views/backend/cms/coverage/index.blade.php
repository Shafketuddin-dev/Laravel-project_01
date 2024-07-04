@extends('backend.master')
@section('title')
CMS :: Coverage
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_district') }}">District</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_thana') }}">Thana</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_office_information') }}">Office Information</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_coverage') }}">Coverage</a>
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
                Coverage
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_coverage') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>District</th>
                                <th>Thana</th>
                                <th>Office Name</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coverage as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->district->en_title ?? ''}}</td>
                                <td>{{ $item->thana->en_title ?? ''}}</td>
                                <td>{{ $item->officeInformation->en_office_name ?? '' }}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_coverage', $item->id) }}" title="Edit Coverage"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_coverage') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="coverage_id" value="{{ $item->id }}">
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