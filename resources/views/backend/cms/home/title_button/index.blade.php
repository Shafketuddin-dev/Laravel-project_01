@extends('backend.master')
@section('title')
CMS :: Home Title Button
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_title_button') }}">Title & Button Text</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_slider') }}">Slider</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_service') }}">Our Services</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_client') }}">Our Clients</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_testimonial') }}">Testimonial</a>
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
                Home Title Button
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.add_home_title_button') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Title</th>
                                <th class="bg-secondary text-white">Button Text</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>{{ $item->en_home_about_title }}</td>
                                <td>{{ $item->en_home_about_button_text }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Title</th>
                                <th class="bg-secondary text-white">Button Text</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>{{ $item->en_home_service_title }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Title</th>
                                <th class="bg-secondary text-white">Button Text</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>{{ $item->en_home_internet_title }}</td>
                                <td>{{ $item->en_home_internet_button_text }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Title</th>
                                <th class="bg-secondary text-white">Button Text</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>{{ $item->en_home_choose_us_title }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Title</th>
                                <th class="bg-secondary text-white">Button Text</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>{{ $item->en_home_faq_title }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Title</th>
                                <th class="bg-secondary text-white">Button Text</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>{{ $item->en_home_testimonial_title }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Title</th>
                                <th class="bg-secondary text-white">Button Text</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>{{ $item->en_home_coverage_title }}</td>
                                <td>{{ $item->en_home_coverage_button_text }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($home_title_button as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.edit_home_title_button', $item->id) }}" title="Edit Home Title Button"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
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