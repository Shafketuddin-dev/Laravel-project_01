@extends('backend.master')
@section('title')
CMS :: Registration Area
@endsection
@section('content')
<div class="row">
    @if (Session::has('message'))
    <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
        </div>
    </div>
    @endif


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Registration Area Manage
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_area') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($area as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->en_area_name }}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_area', $item->id) }}" title="Edit Area"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_area') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="area_id" value="{{ $item->id }}">
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