@extends('backend.master')
@section('title')
CMS :: Manage Client's Review
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Client's<strong> Review</strong></h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <a href="{{ route('admin.manage_clients_review') }}" class="btn btn-sm btn-success">
                    Manage Client's Review
                </a>
                <form action="{{ route('admin.update_clients_review') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="clients_review_id" value="{{$clients_review->id}}">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                        <div class="card">
                                <div class="header">
                                    <h2>Preview Image</h2>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($clients_review->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h2>Choose New Image</h2>
                                </div>
                                <div class="body">
                                    <input type="file" name="image" class="dropify" accept=".jpg, .png, .jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection