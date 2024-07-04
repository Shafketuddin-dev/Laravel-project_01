@extends('backend.master')
@section('title')
CMS :: Payment
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
    <a class="btn btn-sm btn-success" href="{{ route('admin.manage_payment_category') }}">Payment Category</a>
    <a class="btn btn-sm btn-success" href="{{ route('admin.manage_payment') }}">Payment Name</a>
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
            Payment
            </div>
            <div class="card-body">
                <a href="{{ route('admin.add_payment') }}" class="btn btn-success btn-sm" title="Add New">
                    <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bkash_payment as $item)
                            <tr>
                                <td>{{ $item->paymentCategory->en_title }}</td>
                                <td><img src="{{ asset($item->image_one) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_two) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_three) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_four) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_five) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_six) }}" alt=""></td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_payment', $item->id) }}" title="Edit Payment"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_payment') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="payment_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="zmdi zmdi-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rocket_payment as $item)
                            <tr>
                                <td>{{ $item->paymentCategory->en_title }}</td>
                                <td><img src="{{ asset($item->image_one) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_two) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_three) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_four) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_five) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_six) }}" alt=""></td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_payment', $item->id) }}" title="Edit Payment"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_payment') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="payment_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="zmdi zmdi-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-center bg-warning">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nagad_payment as $item)
                            <tr>
                                <td>{{ $item->paymentCategory->en_title }}</td>
                                <td><img src="{{ asset($item->image_one) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_two) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_three) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_four) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_five) }}" alt=""></td>
                                <td><img src="{{ asset($item->image_six) }}" alt=""></td>
                                <td>{{$item->status==0? 'Unpublished':'Published'}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.edit_payment', $item->id) }}" title="Edit Payment"><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                    <form action="{{ route('admin.delete_payment') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="payment_id" value="{{ $item->id }}">
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