@extends('backend.master')
@section('title')
Admin :: Home
@endsection
@section('content')
@php
$userLimit = 100;
@endphp
@php
$total_department = App\Models\Department::where('status', '1')->get();
$department_count = $total_department->count();
@endphp
@php
$total_designation = App\Models\Designation::where('status', '1')->get();
$designation_count = $total_designation->count();
@endphp
@php
$total_admin = App\Models\User::get();
$total_admin_count = $total_admin->count();

$total_normal_admin = App\Models\User::where('role', '1')->get();
$total_normal_admin_count = $total_normal_admin->count();

$total_super_admin = App\Models\User::where('role', '2')->get();
$total_super_admin_count = $total_super_admin->count();

$total_editor = App\Models\User::where('role', '3')->get();
$total_editor_count = $total_editor->count();

$total_viewer = App\Models\User::where('role', '4')->get();
$total_viewer_count = $total_viewer->count();

$total_pending = App\Models\User::where('role', '0')->get();
$total_pending_count = $total_pending->count();

$total_online_registration = App\Models\BuyPackage::get();
$total_online_registration_count = $total_online_registration->count();
$total_online_registration_pending = App\Models\BuyPackage::where('status', '0')->get();
$total_online_registration_pending_count = $total_online_registration_pending->count();
$total_online_registration_completed = App\Models\BuyPackage::where('status', '1')->get();
$total_online_registration_completed_count = $total_online_registration_completed->count();

$total_job_opening = App\Models\Circular::where('status', '1')->get();
$total_job_opening_count = $total_job_opening->count();

$total_job_applied = App\Models\JobApply::get();
$total_job_applied_count = $total_job_applied->count();

$total_contact_us = App\Models\ContactUs::get();
$total_contact_us_count = $total_contact_us->count();

$total_bod = App\Models\BOD::where('status', '1')->get();
$total_bod_count = $total_bod->count();

$total_department = App\Models\Department::where('status', '1')->get();
$total_department_count = $total_department->count();

$total_designation = App\Models\Designation::where('status', '1')->get();
$total_designation_count = $total_designation->count();

$user = Auth::user();

$specific_area_ids = [1, 2, 5];

if (in_array($user->area_id, $specific_area_ids)) {
// Get all records if the en_area_name is one of the specified values
$registrations = App\Models\BuyPackage::orderBy('id', 'desc')->get();
$registrations_count = $registrations->count();
// Get all pending records if the en_area_name is one of the specified values
$pending_registrations = App\Models\BuyPackage::where('status', '0')->orderBy('id', 'desc')->get();
$pending_registrations_count = $pending_registrations->count();
// Get all success records if the en_area_name is one of the specified values
$success_registrations = App\Models\BuyPackage::where('status', '1')->orderBy('id', 'desc')->get();
$success_registrations_count = $success_registrations->count();
// last 10 query print
$latest_registration = App\Models\BuyPackage::orderBy('id','desc')->take('10')->get();
} else {
// Get all records based on area / branch
$registrations = App\Models\BuyPackage::where('area_id', $user->area_id)->orderBy('id', 'desc')->get();
$registrations_count = $registrations->count();
// Get all pending records based on area / branch
$pending_registrations = App\Models\BuyPackage::where('area_id', $user->area_id)->where('status', '0')->orderBy('id', 'desc')->get();
$pending_registrations_count = $pending_registrations->count();
// Get all success records based on area / branch
$success_registrations = App\Models\BuyPackage::where('area_id', $user->area_id)->where('status', '1')->orderBy('id', 'desc')->get();
$success_registrations_count = $success_registrations->count();
// last 10 query print based on area / branch
$latest_registration = App\Models\BuyPackage::where('area_id', $user->area_id)->orderBy('id','desc')->take('10')->get();
}
@endphp
<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Dashboard</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="zmdi zmdi-home"></i> OSCL</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
        </div>
    </div>
</div>
@if( Auth::user()->role == '2')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('manage_admin') }}">
            <div class="card domains">
                <div class="body bg-info text-white">
                    <h6>Total Users</h6>
                    <h2> {{ $total_admin_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('super_admin_user') }}">
            <div class="card domains">
                <div class="body bg-warning text-white">
                    <h6>Total Super Admin</h6>
                    <h2> {{ $total_super_admin_count }} / {{ $total_admin_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        @if ($total_super_admin_count > 0)
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $total_super_admin_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_super_admin_count / $total_admin_count) * 100 }}%;"></div>
                        @else
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('admin_user') }}">
            <div class="card domains">
                <div class="body bg-secondary text-white">
                    <h6>Total Admin</h6>
                    <h2> {{ $total_normal_admin_count }} / {{ $total_admin_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        @if ($total_normal_admin_count > 0)
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $total_normal_admin_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_normal_admin_count / $total_admin_count) * 100 }}%;"></div>
                        @else
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('editor_user') }}">
            <div class="card domains">
                <div class="body bg-secondary text-white">
                    <h6>Total Editor</h6>
                    <h2> {{ $total_editor_count }} / {{ $total_admin_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        @if ($total_editor_count > 0)
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $total_editor_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_editor_count / $total_admin_count) * 100 }}%;"></div>
                        @else
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('viewer_user') }}">
            <div class="card domains">
                <div class="body bg-secondary text-white">
                    <h6>Total Viewer</h6>
                    <h2> {{ $total_viewer_count }} / {{ $total_admin_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        @if ($total_viewer_count > 0)
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $total_viewer_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_viewer_count / $total_admin_count) * 100 }}%;"></div>
                        @else
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('pending_user') }}">
            <div class="card domains">
                <div class="body bg-danger text-white">
                    <h6>Total Pending User</h6>
                    <h2> {{ $total_pending_count }} / {{ $total_admin_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        @if ($total_pending_count > 0)
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $total_pending_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_pending_count / $total_admin_count) * 100 }}%;"></div>
                        @else
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('manage_buy_package') }}">
            <div class="card domains">
                <div class="body bg-secondary text-white">
                    <h6>Total Online Registration</h6>
                    <h2> {{ $total_online_registration_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('pending_connection') }}">
            <div class="card domains">
                <div class="body bg-danger text-white">
                    <h6>Pending Connection</h6>
                    <h2> {{ $total_online_registration_pending_count }} / {{ $total_online_registration_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        @if ($total_online_registration_pending_count > 0)
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $total_online_registration_pending_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_online_registration_pending_count / $total_online_registration_count) * 100 }}%;"></div>
                        @else
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('completed_connection') }}">
            <div class="card domains">
                <div class="body bg-primary text-white">
                    <h6>Completed Connection</h6>
                    <h2> {{ $total_online_registration_completed_count }} / {{ $total_online_registration_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        @if ($total_online_registration_completed_count > 0)
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $total_online_registration_completed_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_online_registration_completed_count / $total_online_registration_count) * 100 }}%;"></div>
                        @else
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('admin.manage_circular') }}">
            <div class="card domains">
                <div class="body bg-secondary text-white">
                    <h6>Total Job Opening</h6>
                    <h2> {{ $total_job_opening_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('manage_job_apply') }}">
            <div class="card domains">
                <div class="body bg-info text-white">
                    <h6>Total Applied Candidates</h6>
                    <h2> {{ $total_job_applied_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('admin.manage_contact_message') }}">
            <div class="card domains">
                <div class="body bg-warning text-white">
                    <h6>Total Contact / Complain</h6>
                    <h2> {{ $total_contact_us_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('admin.manage_bod') }}">
            <div class="card domains">
                <div class="body bg-info text-white">
                    <h6>Total Board of Directors</h6>
                    <h2> {{ $total_bod_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('admin.manage_department') }}">
            <div class="card domains">
                <div class="body bg-secondary text-white">
                    <h6>Total Department</h6>
                    <h2> {{ $total_department_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="{{ route('admin.manage_designation') }}">
            <div class="card domains">
                <div class="body bg-primary text-white">
                    <h6>Total Designation</h6>
                    <h2> {{ $total_designation_count }}</h2>
                    <small>Progress Status</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@elseif(Auth::user()->role == '1' || Auth::user()->role == '3' || Auth::user()->role == '4')
<div class="row">
    <div class="card bg-success py-3 px-3 text-white">
        Hii <strong class="fw-bold text-uppercase">{{Auth::user()->name}}</strong>, Welcome Back to One Sky Communications Limited Admin Panel.
    </div>
</div>
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
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('manage_buy_package') }}">
                            <div class="card domains">
                                <div class="body bg-secondary text-white">
                                    <h6>Total Online Registration</h6>
                                    <h2> {{ $registrations_count }}</h2>
                                    <small>Progress Status</small>
                                    <div class="progress">
                                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('pending_connection') }}">
                            <div class="card domains">
                                <div class="body bg-danger text-white">
                                    <h6>Pending Connection</h6>
                                    <h2> {{ $pending_registrations_count }} / {{ $registrations_count }}</h2>
                                    <small>Progress Status</small>
                                    <div class="progress">
                                        @if ($pending_registrations_count > 0)
                                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $pending_registrations_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($pending_registrations_count / $registrations_count) * 100 }}%;"></div>
                                        @else
                                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('completed_connection') }}">
                            <div class="card domains">
                                <div class="body bg-primary text-white">
                                    <h6>Completed Connection</h6>
                                    <h2> {{ $success_registrations_count }} / {{ $registrations_count }}</h2>
                                    <small>Progress Status</small>
                                    <div class="progress">
                                        @if ($success_registrations_count > 0)
                                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="{{ $success_registrations_count }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($total_online_registration_completed_count / $registrations_count) * 100 }}%;"></div>
                                        @else
                                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <h3>Recent Online Registration List</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Package</th>
                                <th>Branch</th>
                                <th>Marketing</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest_registration as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $user->created_at->format('d F Y') }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->en_package_name }} - {{ $user->en_mbps_value }} Mbps</td>
                                <td>{{ $user->area->en_area_name ?? '' }}</td>
                                <td>{{ $user->marketing_person_name }}</td>
                                <td>
                                    @if($user->status==0)
                                    <span class="badge badge-warning">Pending</span>
                                    @else
                                    <span class="badge badge-success">Success</span>
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
@else
<div class="row">
    <div class="card bg-warning py-5 px-3">
        Hii <strong class="fw-bold text-uppercase">{{Auth::user()->name}}</strong>, you are reqested to be an admin, it's need authorized approval. Please wait till then & in the mean time you can visit our <a href="{{ route('/') }}">One Sky Communications Limited</a>
    </div>
</div>
@endif
@endsection