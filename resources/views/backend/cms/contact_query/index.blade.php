@extends('backend.master')
@section('title')
    Admin :: Contact Query
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


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Contact Queries
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Query</th>
                                    <th class="text-center bg-warning text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact_query as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->created_at->format('d F Y') }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->subject }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($user->query, 15,'...') }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-secondary"
                                                href="{{ route('admin.view_contact_message', $user->id) }}"><i
                                                    class="zmdi zmdi-eye"></i></a>
                                            <form action="{{ route('admin.delete_contact_message') }}" method="post"
                                                id="delete">
                                                @csrf
                                                <input type="hidden" name="contact_query_id" value="{{ $user->id }}">
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
