@extends('backend.master')
@section('title')
CMS :: Contact Label & Title
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_contact_label') }}">Contact Title & Labels</a>
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
                Contact Label & Title
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_contact_label') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name Label</th>
                                <th>Email Label</th>
                                <th>Phone Label</th>
                                <th>Subject Label</th>
                                <th>Message Label</th>
                                <th>Button Text</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact_label as $item)
                            <tr>
                                <td>{{ $item->en_title }}</td>
                                <td>{{ $item->en_name_label }}</td>
                                <td>{{ $item->en_email_label }}</td>
                                <td>{{ $item->en_phone_label }}</td>
                                <td>{{ $item->en_subject_label }}</td>
                                <td>{{ $item->en_message_label }}</td>
                                <td>{{ $item->en_button_text }}</td>
                                <td>
                                    <a href="{{ route('admin.edit_contact_label', $item->id) }}" title="Edit Contact Label"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
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