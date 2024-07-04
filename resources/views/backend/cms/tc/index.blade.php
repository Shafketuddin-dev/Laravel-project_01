@extends('backend.master')
@section('title')
CMS :: Terms & Conditions
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
    <a class="btn btn-sm btn-success" href="{{ route('admin.manage_tc') }}">Terms & Conditions</a>
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
            Terms & Conditions
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.add_tc') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Payment</th>
                                <th>Documentation</th>
                                <th>After Sales</th>
                                <th>Client Responsibility</th>
                                <th>Others</th>
                                <th>Contact Termination</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tc as $item)
                            <tr>
                                <td>{{ $item->en_title }}</td>
                                <td>{!! $item->en_payment_mode !!}</td>
                                <td>{!! $item->en_documentation !!}</td>
                                <td>{!! $item->en_after_sales_service !!}</td>
                                <td>{!! $item->en_client_responsibility !!}</td>
                                <td>{!! $item->en_others !!}</td>
                                <td>{!! $item->en_contact_termination !!}</td>
                                <td>
                                    <a href="{{ route('admin.edit_tc', $item->id) }}" title="Edit Terms & Conditions"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
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