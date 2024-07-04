@extends('backend.master')
@section('title')
CMS :: Client's Review
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
                Client's Review
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_clients_review') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients_review as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($item->image) }}" alt=""></td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_clients_review', $item->id) }}" title="Edit Client's Review"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_clients_review') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="clients_review_id" value="{{ $item->id }}">
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