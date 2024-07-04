@extends('backend.master')
@section('title')
CMS :: Coverage
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
                <h2><strong>Coverage</strong></h2>
                @if (Session::has('message'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
            </div>
            <div class="body">
                <a href="{{ route('admin.manage_coverage') }}" class="btn btn-sm btn-success">
                    Manage Coverage
                </a>
                <form action="{{ route('admin.update_coverage') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="coverage_id" value="{{$coverage->id}}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label>District</label>
                            <select name="district_id" id=""
                                class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a District</option>
                                @foreach ($district as $item)
                                    <option value=" {{ $item->id }}" {{ isset($coverage->district_id) ? ($coverage->district_id == $item->id ? 'selected' : '') : '' }}>
                                        {{ $item->en_title }}
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Thana</label>
                            <select name="thana_id" id=""
                                class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Thana</option>
                                @foreach ($thana as $item)
                                    <option value=" {{ $item->id }}" {{ isset($coverage->thana_id) ? ($coverage->thana_id == $item->id ? 'selected' : '') : '' }}>
                                        {{ $item->en_title }}
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label>Office Information</label>
                            <select name="office_information_id" id=""
                                class="form-control show-tick ms search-select">
                                <option value="" disabled selected>Select a Office</option>
                                @foreach ($office_information as $item)
                                    <option value=" {{ $item->id }}" {{ isset($coverage->office_information_id) ? ($coverage->office_information_id == $item->id ? 'selected' : '') : '' }}>
                                        {{ $item->en_office_name }}
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
                                    <input type="radio" name="status" id="publish" class="with-gap" {{ isset($coverage->status) && $coverage->status == 1 ? 'checked' : '' }} checked value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="unpublish" class="with-gap" {{ isset($coverage->status) && $coverage->status == 0 ? 'checked' : '' }} value="0">
                                    <label for="unpublish">Unpublish</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update Coverage">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection