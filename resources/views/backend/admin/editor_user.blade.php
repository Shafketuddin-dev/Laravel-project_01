@extends('backend.master')
@section('title')
Admin :: Editor User List
@endsection
@section('content')
<div class="row">
    @if (Session::has('message'))
    <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="col-lg-12">
        <a class="btn btn-sm btn-success" href="{{ route('dashboard') }}"><i class="zmdi zmdi-replay"></i> Back to Dasgboard</a>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Admin :: Editor User List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Branch</th>
                                <th>ID</th>
                                <th>Role</th>
                                <th class="text-center bg-warning text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($editor_user as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->area->en_area_name ?? ''}}</td>
                                <td>{{ $user->employee_id }}</td>
                                <td>
                                    @if($user->role == 2)
                                    Super Admin
                                    @elseif($user->role == 1)
                                    Admin
                                    @elseif($user->role == 3)
                                    Editor
                                    @elseif($user->role == 4)
                                    Viewer
                                    @else
                                    Not Admin
                                    @endif
                                </td>
                                <td class="d-flex">
                                    @if($user->role == 0)
                                    <a class="btn btn-sm btn-success" href="{{ route('role', ['id' => $user->id, 'newRole' => 1]) }}"><i class="zmdi zmdi-check"></i> Admin</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('role', ['id' => $user->id, 'newRole' => 2]) }}"><i class="zmdi zmdi-check"></i> Super Admin</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ route('role', ['id' => $user->id, 'newRole' => 3]) }}"><i class="zmdi zmdi-check"></i> Editor</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('role', ['id' => $user->id, 'newRole' => 4]) }}"><i class="zmdi zmdi-check"></i> Viewer</a>
                                    @elseif($user->role == 1)
                                    <a class="btn btn-sm btn-secondary" href="{{ route('role', ['id' => $user->id, 'newRole' => 0]) }}"><i class="zmdi zmdi-close"></i> Admin</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('role', ['id' => $user->id, 'newRole' => 2]) }}"><i class="zmdi zmdi-check"></i> Super Admin</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ route('role', ['id' => $user->id, 'newRole' => 3]) }}"><i class="zmdi zmdi-check"></i> Editor</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('role', ['id' => $user->id, 'newRole' => 4]) }}"><i class="zmdi zmdi-check"></i> Viewer</a>
                                    @elseif($user->role == 2)
                                    <a class="btn btn-sm btn-danger" href="{{ route('role', ['id' => $user->id, 'newRole' => 0]) }}"><i class="zmdi zmdi-close"></i> Super Admin</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('role', ['id' => $user->id, 'newRole' => 1]) }}"><i class="zmdi zmdi-check"></i> Admin</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ route('role', ['id' => $user->id, 'newRole' => 3]) }}"><i class="zmdi zmdi-check"></i> Editor</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('role', ['id' => $user->id, 'newRole' => 4]) }}"><i class="zmdi zmdi-check"></i> Viewer</a>
                                    @elseif($user->role == 3)
                                    <a class="btn btn-sm btn-danger" href="{{ route('role', ['id' => $user->id, 'newRole' => 0]) }}"><i class="zmdi zmdi-close"></i> Editor</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('role', ['id' => $user->id, 'newRole' => 1]) }}"><i class="zmdi zmdi-check"></i> Admin</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('role', ['id' => $user->id, 'newRole' => 2]) }}"><i class="zmdi zmdi-check"></i> Super Admin</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('role', ['id' => $user->id, 'newRole' => 4]) }}"><i class="zmdi zmdi-check"></i> Viewer</a>
                                    @elseif($user->role == 4)
                                    <a class="btn btn-sm btn-danger" href="{{ route('role', ['id' => $user->id, 'newRole' => 0]) }}"><i class="zmdi zmdi-close"></i> Viewer</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('role', ['id' => $user->id, 'newRole' => 1]) }}"><i class="zmdi zmdi-check"></i> Admin</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('role', ['id' => $user->id, 'newRole' => 2]) }}"><i class="zmdi zmdi-check"></i> Super Admin</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('role', ['id' => $user->id, 'newRole' => 3]) }}"><i class="zmdi zmdi-check"></i> Editor</a>
                                    @endif
                                    <form action="{{ route('delete_admin',['id'=>$user->id]) }}" method="post">
                                        <button class="btn btn-danger text-white" onclick="return confirm('Are you sure?');" type="submit"><i class="zmdi zmdi-delete"></i> Admin</button>
                                        @csrf
                                        @method('delete')
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