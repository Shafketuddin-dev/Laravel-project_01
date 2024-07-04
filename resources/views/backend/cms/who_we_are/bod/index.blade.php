@extends('backend.master')
@section('title')
CMS :: Board of Director
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_branch') }}">Branch</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_branch_category') }}">Branch Category</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_department') }}">Department</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_designation') }}">Designation</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_bod') }}">Board of Director</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_involvement') }}">Involvement</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_personal_award') }}">Personal Award</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_mission') }}">Our Mission</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_vision') }}">Our Vision</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_skill') }}">Our Skill</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_choose_us') }}">Why Choose Us</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_faq') }}">Faq</a>
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
                Board of Director
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_bod') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bod as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->en_name }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="" style="max-width: 200px;"></td>
                                <td>{{ $item->department->en_name ?? '' }}</td>
                                <td>{{ $item->designation->en_name ?? ''}}</td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.edit_bod', $item->id) }}" title="Edit BOD"><button class="btn btn-primary"><i class="zmdi zmdi-edit" aria-hidden="true"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_bod') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="bod_id" value="{{ $item->id }}">
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