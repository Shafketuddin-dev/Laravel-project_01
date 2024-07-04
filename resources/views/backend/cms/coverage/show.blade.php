@extends('backend.master')
@section('title')
    CMS :: Coverage Set
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-success" href="{{ route('admin.manage_district') }}">District</a>
            <a class="btn btn-sm btn-success" href="{{ route('admin.manage_thana') }}">Thana</a>
            <a class="btn btn-sm btn-success" href="{{ route('admin.manage_office_information') }}">Office Information</a>
            <a class="btn btn-sm btn-success" href="{{ route('admin.manage_coverage') }}">Coverage</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Coverage Set</strong></h2>
                    @if (Session::has('message'))
                        <div class="col-lg-12">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="body">
                    <a href="{{ route('admin.manage_coverage') }}" class="btn btn-sm btn-success" title="Add New">
                        Manage Coverage
                    </a>
                    <form action="{{ route('admin.save_coverage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label>District</label>
                                <select name="district_id" id=""
                                    class="form-control show-tick ms search-select" data-placeholder="Select a District">
                                    <option value="" disabled selected></option>
                                    @foreach ($district as $item)
                                        <option value="{{ $item->id }}">{{ $item->en_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Thana</label>
                                <select name="thana_id" id=""
                                    class="form-control show-tick ms search-select" data-placeholder="Select a Thana">
                                    <option value="" disabled selected></option>
                                    @foreach ($thana as $item)
                                        <option value="{{ $item->id }}">{{ $item->en_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Office Information</label>
                                <select name="office_information_id" id=""
                                    class="form-control show-tick ms search-select" data-placeholder="Select a Office">
                                    <option value="" disabled selected></option>
                                    @foreach ($office_information as $item)
                                        <option value="{{ $item->id }}">{{ $item->en_office_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mt-3">
                                Status
                            </div>
                            <div class="col-md-9 mt-3">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="status" id="publish" class="with-gap" checked
                                            value="1">
                                        <label for="publish">Publish</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status" id="unpublish" class="with-gap" value="0">
                                        <label for="unpublish">Unpublish</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Add Coverage">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
