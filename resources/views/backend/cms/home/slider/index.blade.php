@extends('backend.master')
@section('title')
    CMS :: Slider
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
                    Slider Manage
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.add_slider') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Desktop Image</th>
                                    <th>Mobile Image</th>
                                    <th>Conditions</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th class="bg-warning text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset($item->desktop_image) }}" alt=""
                                                style="max-width: 150px;"></td>
                                        <td><img src="{{ asset($item->mobile_image) }}" alt=""
                                                style="max-width: 150px;"></td>
                                        <td>{!! \Illuminate\Support\Str::limit(strip_tags($item->en_description), 800, '...') !!}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>{{ $item->status == 0 ? 'Unpublished' : 'Published' }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('admin.edit_slider', $item->id) }}"
                                                title="Edit Slider Info"><button class="btn btn-primary"><i
                                                        class="zmdi zmdi-edit"></i>
                                                </button></a>
                                            <form action="{{ route('admin.delete_slider') }}" method="post"
                                                id="delete">
                                                @csrf
                                                <input type="hidden" name="slider_id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="zmdi zmdi-delete"></i></button>
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
