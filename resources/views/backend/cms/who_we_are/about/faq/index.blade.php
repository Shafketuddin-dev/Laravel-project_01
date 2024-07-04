@extends('backend.master')
@section('title')
CMS :: Faq
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_title_button') }}">Title & Button Text</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_slider') }}">Slider</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_about') }}">About Us</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_counter') }}">Counter</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_service') }}">Our Services</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_client') }}">Our Clients</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_home_choose_us') }}">Why Choose Us</a>
        <a class="btn btn-sm btn-success" href="{{ route('admin.manage_faq') }}">Faq</a>
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
                Faq
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.add_faq') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Faq Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" alt=""></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Question</th>
                                <th class="bg-secondary text-white">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                            <tr>
                                <td>{{ $item->en_question_one }}</td>
                                <td>{{ $item->en_answer_one }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Question</th>
                                <th class="bg-secondary text-white">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                            <tr>
                                <td>{{ $item->en_question_two }}</td>
                                <td>{{ $item->en_answer_two }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Question</th>
                                <th class="bg-secondary text-white">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                            <tr>
                                <td>{{ $item->en_question_three }}</td>
                                <td>{{ $item->en_answer_three }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Question</th>
                                <th class="bg-secondary text-white">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                            <tr>
                                <td>{{ $item->en_question_four }}</td>
                                <td>{{ $item->en_answer_four }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-secondary text-white">Question</th>
                                <th class="bg-secondary text-white">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                            <tr>
                                <td>{{ $item->en_question_five }}</td>
                                <td>{{ $item->en_answer_five }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center bg-success">Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $item)
                            <tr>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_faq', $item->id) }}" title="Edit Faq"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                </td>
                                <!-- <td>
                                    <form action="{{ route('admin.delete_faq') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="faq_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> -->
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