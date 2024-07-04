@extends('backend.master')
@section('title')
CMS :: Magic IP
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
                Magic IP
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_magic_ip') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Hero Image</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($magic_ip as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->en_title }}</td>
                                <td class="text-center"><img src="{{ asset($item->image) }}" alt="Image"></td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_magic_ip', $item->id) }}" title="Edit Choose Us"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
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