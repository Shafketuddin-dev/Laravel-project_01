@extends('backend.master')
@section('title')
CMS :: Menu
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_top_bar') }}">Top Bar</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_menu') }}">Menu</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_footer') }}">Footer</a>
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
                Menu
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.add_menu') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Home</th>
                                <th>Who We Are</th>
                                <th>About Us</th>
                                <th>Branches</th>
                                <th>Md Profile</th>
                                <th>Md Message</th>
                                <th>Chairman Profile</th>
                                <th>Chairman Message</th>
                                <th>DMD Profile</th>
                                <th>DMD Message</th>
                                <th>ED Profile</th>
                                <th>ED Message</th>
                                <th>Board of Director</th>
                                <th>Employee</th>
                                <th>Internet Plan</th>
                                <th>Services</th>
                                <th>Internet</th>
                                <th>VTS</th>
                                <th>IT Training</th>
                                <th>Bill Payment</th>
                                <th>Payment Process</th>
                                <th>Online Payment</th>
                                <th>Contact Us</th>
                                <th>More</th>
                                <th>Blog</th>
                                <th>Notice</th>
                                <th>Award & Achievement</th>
                                <th>Gallery</th>
                                <th>News Event</th>
                                <th>Circular</th>
                                <th>Admin Panel</th>
                                <th>Tutorial</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $item)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->en_menu_home }}</td>
                                <td>{{ $item->en_menu_whoweare_title }}</td>
                                <td>{{ $item->en_menu_about_us }}</td>
                                <td>{{ $item->en_menu_branches }}</td>
                                <td>{{ $item->en_menu_md_profile }}</td>
                                <td>{{ $item->en_menu_md_message }}</td>
                                <td>{{ $item->en_menu_chairman_profile }}</td>
                                <td>{{ $item->en_menu_chairman_message }}</td>
                                <td>{{ $item->en_menu_dmd_profile }}</td>
                                <td>{{ $item->en_menu_dmd_message }}</td>
                                <td>{{ $item->en_menu_ed_profile }}</td>
                                <td>{{ $item->en_menu_ed_message }}</td>
                                <td>{{ $item->en_menu_bod }}</td>
                                <td>{{ $item->en_menu_employee }}</td>
                                <td>{{ $item->en_menu_internet_plan }}</td>
                                <td>{{ $item->en_menu_service_title }}</td>
                                <td>{{ $item->en_menu_internet }}</td>
                                <td>{{ $item->en_menu_vts }}</td>
                                <td>{{ $item->en_menu_it }}</td>
                                <td>{{ $item->en_menu_billpay }}</td>
                                <td>{{ $item->en_menu_billing_system }}</td>
                                <td>{{ $item->en_menu_online_pay }}</td>
                                <td>{{ $item->en_menu_contact_us }}</td>
                                <td>{{ $item->en_menu_more_title }}</td>
                                <td>{{ $item->en_menu_blog }}</td>
                                <td>{{ $item->en_menu_awards }}</td>
                                <td>{{ $item->en_menu_gallery }}</td>
                                <td>{{ $item->en_menu_news_event }}</td>
                                <td>{{ $item->en_menu_circular }}</td>
                                <td>{{ $item->en_menu_admin }}</td>
                                <td>{{ $item->en_tutorial }}</td>
                                <td>
                                    <a href="{{ route('admin.edit_menu', $item->id) }}" title="Edit Menu"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Edit</button></a>
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