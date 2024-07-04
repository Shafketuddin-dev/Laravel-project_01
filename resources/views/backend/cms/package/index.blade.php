@extends('backend.master')
@section('title')
CMS :: Package
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
    <a class="btn btn-sm btn-success" href="{{ route('admin.manage_package_category') }}">Package Category</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_package') }}">Packages</a>
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
                Package
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_package') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Package Name</th>
                                <th>Category</th>
                                <th>MBPS</th>
                                <th>Bill</th>
                                <th>Discount Bill</th>
                                <th>OTC</th>
                                <th>Discount OTC</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_package as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->en_package_name }}</td>
                                <td>{{ $item->packageCategory->en_title }}</td>
                                <td>{{ $item->en_mbps_value }}</td>
                                <td>{{ $item->en_amount }}</td>
                                <td>{{ $item->en_discount_monthly_fee }}</td>
                                <td>{{ $item->en_otc_amount }}</td>
                                <td>{{ $item->en_discount_otc }}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_package', $item->id) }}" title="Edit Package Category"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_package') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="zmdi zmdi-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Package Name</th>
                                <th>Category</th>
                                <th>MBPS</th>
                                <th>Bill</th>
                                <th>Discount Bill</th>
                                <th>OTC</th>
                                <th>Discount OTC</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sme_package as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->en_package_name }}</td>
                                <td>{{ $item->packageCategory->en_title }}</td>
                                <td>{{ $item->en_mbps_value }}</td>
                                <td>{{ $item->en_amount }}</td>
                                <td>{{ $item->en_discount_monthly_fee }}</td>
                                <td>{{ $item->en_otc_amount }}</td>
                                <td>{{ $item->en_discount_otc }}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_package', $item->id) }}" title="Edit Package Category"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_package') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="zmdi zmdi-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Package Name</th>
                                <th>Category</th>
                                <th>MBPS</th>
                                <th>Bill</th>
                                <th>Discount Bill</th>
                                <th>OTC</th>
                                <th>Discount OTC</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($corporate_package as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->en_package_name }}</td>
                                <td>{{ $item->packageCategory->en_title }}</td>
                                <td>{{ $item->en_mbps_value }}</td>
                                <td>{{ $item->en_amount }}</td>
                                <td>{{ $item->en_discount_monthly_fee }}</td>
                                <td>{{ $item->en_otc_amount }}</td>
                                <td>{{ $item->en_discount_otc }}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_package', $item->id) }}" title="Edit Package"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_package') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $item->id }}">
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