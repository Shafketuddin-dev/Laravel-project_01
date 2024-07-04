@extends('backend.master')
@section('title')
Admin :: User Management
@endsection
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> <strong>{{ Auth::user()->name }}</strong>'s Personal Information
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
        <div class="col-lg-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
            </div>
        </div>
        @endif
    </div>
    @php
    $areas = App\Models\Area::where('status', '1')->orderBy('en_area_name','asc')->get();
    @endphp
    <div class="row clearfix">
        <div class="col-xl-4">
            <div class="card mcard_3">
                <form action="{{ route('update_user_photo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="body">
                        @if (Auth::user()->profile_photo_path)
                        <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="rounded-circle" alt="profile-image" style="height: 100px; width: 100px;">
                        @else
                        <img src="{{ asset('adminAssets') }}/images/profile_av.png" class="rounded-circle" alt="profile-image" style="height: 100px; width: 100px;">
                        @endif
                        <h4 class="m-t-10">{{ Auth::user()->name }}</h4>
                        @if (Auth::user()->role == '2')
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">Super Admin</p>
                        @elseif(Auth::user()->role == '1')
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">Admin</p>
                        @elseif(Auth::user()->role == '3')
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">Editor</p>
                        @elseif(Auth::user()->role == '4')
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">Viewer</p>
                        @else
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">Not Verified</p>
                        @endif
                        <div class="mt-3">
                            <input type="file" class="dropify" name="profile_photo_path" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-info mt-3"> <i class="fa fa-check"></i> Change
                            Photo</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <form action="{{ route('update_user_password') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="body">
                        <div class="row">
                            @if ($errors->has('password'))
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <li>{{ $errors->first('password') }}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputnddame">New Password</label>
                                    <input type="text" class="form-control" name="password" id="exampleInputnddame">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInsasputname">Confirm New Password</label>
                                    <input type="text" class="form-control" name="password_confirmation" id="exampleInsasputname">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning"> Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <li>{{ $errors->first('name') }}</li>
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('update_user_name') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label for="en_title" class="control-label">Name</label>
                                            <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Name Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        @if ($errors->has('employee_id'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <li>{{ $errors->first('employee_id') }}</li>
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('update_user_employee_id') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label for="en_title" class="control-label">Employee ID</label>
                                            <input class="form-control" name="employee_id" type="text" value="{{ Auth::user()->employee_id }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary">Employee ID Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <li>{{ $errors->first('email') }}</li>
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('update_user_email') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label for="en_title" class="control-label">Email</label>
                                            <input class="form-control" name="email" type="text" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning">Email Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <li>{{ $errors->first('name') }}</li>
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('update_user_phone') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label for="en_title" class="control-label">Phone</label>
                                            <input class="form-control" name="phone" type="text" value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark">Phone Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <li>{{ $errors->first('name') }}</li>
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('update_branch_name') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label>Selected Branch</label>
                                        <select name="area_id" id="" class="form-control show-tick ms search-select">
                                            <option value="" disabled selected>Select a Branch</option>
                                            @foreach ($areas as $item)
                                            <option value="{{ $item->id }}" {{ isset(Auth::user()->area_id) ? (Auth::user()->area_id == $item->id ? 'selected' : '') : '' }}>
                                                {{ $item->en_area_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark">Branch Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="body">
                            <h2>Others Information</h2>
                            <div class="table-responsive">
                                <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                    <tbody>
                                        <tr>
                                            <th>Account Created</th>
                                            <td>{{ Auth::user()->created_at->format('d M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Your Role</th>
                                            <td>
                                                @if (Auth::user()->role == 2)
                                                Super Admin
                                                @elseif(Auth::user()->role == 1)
                                                Admin
                                                @elseif(Auth::user()->role == 3)
                                                Editor
                                                @elseif(Auth::user()->role == 4)
                                                Viewer
                                                @else
                                                Not Verified
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="body">
                            <p>Please note, if you delete your account all of your data will be erased.</p>

                            <form action="{{ route('delete_admin', ['id' => Auth::user()->id]) }}" method="post">
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?');" type="submit">
                                    <span class="fe fe-trash-2"> </span> Delete Account</button>
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
