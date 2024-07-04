@extends('backend.master')
@section('title')
CMS :: Skills
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
                Skills
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.add_skill') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>H. Internet</th>
                                <th>C. Internet</th>
                                <th>C. Support</th>
                                <th>VTS</th>
                                <th>IT Training</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skill as $item)
                            <tr>
                                <td>{{ $item->en_title }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="" style="max-width: 300px;"></td>
                                <td>{{ $item->en_corporate_internet }} {{ $item->en_corporate_internet_percentage }} %</td>
                                <td>{{ $item->en_home_internet }} {{ $item->en_home_internet_percentage }} %</td>
                                <td>{{ $item->en_customer_support }} {{ $item->en_customer_support_percentage }} %</td>
                                <td>{{ $item->en_vts }} {{ $item->en_vts_percentage }} %</td>
                                <td>{{ $item->en_training }} {{ $item->en_training_percentage }} %</td>

                                <td>
                                    <a href="{{ route('admin.edit_skill', $item->id) }}" title="Edit Skills"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
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