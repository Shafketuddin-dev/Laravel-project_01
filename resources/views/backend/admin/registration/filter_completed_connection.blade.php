@extends('backend.master')
@section('title')
Admin :: Completed Search Result Online Registration
@endsection
@section('content')
<div class="row">
    @if (Session::has('message'))
    <div class="col-lg-12">
        <div class="alert alert-warning" role="alert">
            <strong> {{ Session::get('message') }} </strong>  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
            </button>
        </div>
    </div>
    @endif
    <div class="col-lg-12">
        <a href="{{ route('dashboard') }}" class="btn btn-success">
            <i class="zmdi zmdi-replay"></i> Back to Dashboard
        </a>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Online Registration Search Result List
            </div>
            <div class="card-body">
                <a href="{{ route('completed_connection') }}" class="btn btn-success mb-3">
                    <i class="zmdi zmdi-replay"></i> Back to Completed Connection
                </a>
                <form class="mb-3" action="/filter-completed-registration" method="GET">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for=""> <strong>Start Date*</strong> </label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="col-lg-2">
                            <label for=""> <strong>End Date*</strong> </label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        @php
                        $user = Auth::user();
                        $specific_area_ids = [1, 2, 5];
                        @endphp
                        @if ($user->role == '2' || in_array($user->area_id, $specific_area_ids))
                        <div class="col-lg-3 mb-3" style="margin-top: -3px;">
                            <label>Select Branch</label>
                            <select name="area_id" class="form-control show-tick ms search-select" data-placeholder="Choose one">
                                <option value="" disabled selected></option>
                                <option value="all">All</option>
                                @foreach ($branches as $item)
                                <option value="{{ $item->id }}">{{ $item->en_area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="col-lg-2 mt-1">
                            <button type="submit" class="btn btn-lg btn-neutral waves-effect waves-light-blue mt-4">Filter</button>
                        </div>
                    </div>
                </form>
                @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                    <strong>@foreach ($errors->all() as $error) {{ $error }} @endforeach</strong>  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                    </button>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>UserID</th>
                                <th>Phone</th>
                                <th>Package</th>
                                <th>Branch</th>
                                <th>Marketing</th>
                                <th>Status</th>
                                <th class="text-center bg-warning text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registration as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $user->created_at->format('d F Y') }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->en_mbps_value }} Mbps</td>
                                <td>{{ $user->area->en_area_name ?? 'Nothing Selected'}}</td>
                                <td>{{ $user->marketing_person_name }}</td>
                                <td>
                                    @if($user->status==0)
                                    <span class="badge badge-warning">Pending</span>
                                    @else
                                    <span class="badge badge-success">Success</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    @if(Auth::user()->role !== '4')
                                    @if($user->status==0)
                                    <a class="btn btn-sm btn-secondary" href="{{ route('status',['id'=>$user->id]) }}">Mark as Done</a>
                                    @else
                                    <a class="btn btn-sm btn-success" href="{{ route('status',['id'=>$user->id]) }}">Mark as Pending</a>
                                    @endif
                                    @endif
                                    <a class="btn btn-sm btn-secondary" href="{{ route('preview_buy_package', $user->id) }}"><i class="zmdi zmdi-eye"></i></a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('export_package_pdf', $user->id) }}"><i class="zmdi zmdi-download"></i></a>
                                    @if(Auth::user()->role == '2' || Auth::user()->role == '1' || Auth::user()->role == '3')
                                    <a class="btn btn-sm btn-success" href="{{ route('edit_buy_package', $user->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                    @if($user->email)
                                    <a class="btn btn-sm btn-success" onclick="return confirm('Are you sure to send email?');" href="{{ route('new_registration_send_mail', $user->id) }}"><i class="zmdi zmdi-email"></i></a>
                                    @endif
                                    @endif
                                    @if(Auth::user()->role !== '4' && Auth::user()->role !== '3')
                                    <form action="{{ route('delete_buy_package') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="registration_id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="zmdi zmdi-delete"></i></button>
                                    </form>
                                    @endif
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
