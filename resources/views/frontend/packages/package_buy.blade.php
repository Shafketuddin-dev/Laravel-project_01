@extends('frontend.master')
@section('title')
Buy Package :: One Sky Communications Limited
@endsection

@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{ __('Package Buy') }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
@php
$formattedTotal = $package_buy->en_amount + $package_buy->en_otc_amount;
@endphp

<section class="py-5">
    <div class="container">
        <form action="{{ route('save_buy_package') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (Auth::check())
            <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h3 class="bg-success py-2 text-center text-white fw-bold">Package Details</h3>
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>Category</td>
                                <td>{{ $package_buy->packageCategory->en_title }}</td>
                                <input type="hidden" name="category" value="{{ $package_buy->packageCategory->en_title ?? 0 }}">
                            </tr>
                            <tr>
                                <td>Package Name</td>
                                <td>{{ $package_buy->en_package_name }}</td>
                                <input type="hidden" name="en_package_name" value="{{ $package_buy->en_package_name ?? 0 }}">
                            </tr>
                            <tr>
                                <td>Bandwidth</td>
                                <td>{{ $package_buy->en_mbps_value }} Mbps</td>
                                <input type="hidden" name="en_mbps_value" value="{{ $package_buy->en_mbps_value ?? 0 }}">
                            </tr>
                            <tr>
                                <td>Monthly Fee</td>
                                <td>{{ $package_buy->en_amount }} {{ $package_buy->en_amount_label }}</td>
                                <input type="hidden" name="en_amount" value="{{ $package_buy->en_amount ?? 0 }}">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 mb-3 full_name">
                    <label for="name">Full Name*</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                    @error('name')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-3">
                    <label for="phone">Contact Number*</label>
                    <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Contact Number" required>
                    @error('phone')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                    @error('email')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <label for="nid_have">Register with</label>
                <div class="radio">
                    <input type="radio" name="nid_have" id="radio1" value="yes" checked>
                    <label for="radio1">NID</label>
                </div>
                <div class="radio">
                    <input type="radio" name="nid_have" id="radio2" value="no">
                    <label for="radio2">Birth Certificate / Passport</label>
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-3">
                    <label for="photo">Photo* (Passport Size)</label>
                    <div class="card mb-2 text-center">
                        <p class="bg-warning">User Pic should be as below, if not please crop and rotate before uploading</p>
                        <img src="{{ asset('frontendAssets') }}/static_images/user.jpeg" alt="Sample of User's Pic" style="height: 250px; width: 200px; margin: 0 auto;">
                    </div>
                    <div class="card">
                        <div class="body">
                            <input type="file" name="photo" class="dropify" id="inputGroupFile02" accept=".jpg, .png, .jpeg">
                        </div>
                    </div>
                    @error('photo')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-3" id="nid-1">
                    <label for="nid_front">NID Front Side*</label>
                    <div class="card mb-2 text-center">
                        <p class="bg-warning">NID Front Side Pic should be as below, if not please crop and rotate before uploading</p>
                        <img src="{{ asset('frontendAssets') }}/static_images/nid_front.jpg" alt="Sample of User's NID Front Side">
                    </div>
                    <div class="card">
                        <div class="body">
                            <input type="file" name="nid_front" class="dropify" id="inputGroupFile02" accept=".jpg, .png, .jpeg">
                        </div>
                    </div>
                    @error('nid_front')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-3" id="nid-2">
                    <label for="nid_front">NID Back Side*</label>
                    <div class="card mb-2 text-center">
                        <p class="bg-warning">NID Back Side Pic should be as below, if not please crop and rotate before uploading</p>
                        <img src="{{ asset('frontendAssets') }}/static_images/nid_back.jpg" alt="Sample of User's NID Back Side">
                    </div>
                    <div class="card">
                        <div class="body">
                            <input type="file" name="nid_back" class="dropify" id="inputGroupFile02" accept=".jpg, .png, .jpeg">
                        </div>
                    </div>
                    @error('nid_back')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-4 col-12 mb-3" id="birth-1">
                    <label for="nid_front">Birth Certificate / Passport*</label>
                    <div class="card mb-2 text-center d-flex align-items-center">
                        <p class="bg-warning">Birth Certificate / Passport Pic should be as below, if not please crop and rotate before uploading</p>
                        <img src="{{ asset('frontendAssets') }}/static_images/Birth Certificate.webp" style="height: 240px; width: 200px;" alt="Sample of User's Birth Certificate">
                    </div>
                    <div class="card">
                        <div class="body">
                            <input type="file" name="birth_certificate" class="dropify" id="inputGroupFile02" accept=".jpg, .png, .jpeg">
                        </div>
                    </div>
                    @error('birth_certificate')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nid_number">NID / Birth Certificate / Passport Number*</label>
                    <input type="phone" name="nid_number" class="form-control" id="nid_number" value="{{ old('nid_number') }}" placeholder="Write Number" required>
                    @error('nid_number')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <div class="input-group">
                        <span class="input-group-text">Address*</span>
                        <textarea class="form-control" name="address" aria-label="Address" required>{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="input-group">
                        <span class="input-group-text">Remarks</span>
                        <textarea class="form-control" name="remarks" aria-label="Remarks (if any)">{{ old('remarks') }}</textarea>
                    </div>
                    @error('remarks')
                    <strong class="error_form">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" name="agree" value="1" id="invalidCheck3" required>
                    <label class="form-check-label" for="invalidCheck3">
                        Agree to <a class="text-dark fw-bold" href="{{ route('terms_condition') }}" style="text-decoration: underline;"> terms and
                            conditions (Click to see)</a>
                    </label>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 mb-3">
                    <label> <strong>Select Branch / Area*</strong> </label>
                    <select name="area_id" class="form-control branch_selection" data-placeholder="Select a Branch / Area" required>
                        <option value="" disabled selected></option>
                        @foreach ($areas as $item)
                        <option value="{{ $item->id }}">{{ $item->en_area_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-12">
                    <div class="mb-3">
                        <label for="marketing_person_name" class="form-label">Marketing Person Name (if any):</label>
                        <input type="text" name="marketing_person_name" value="{{ old('marketing_person_name') }}" class="form-control">
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Confirm Registration</button>
        </form>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // Initially, hide birth certificate fields
        $('#birth-1').hide();

        // Show/hide fields based on radio button selection
        $('input[name="nid_have"]').change(function(){
            if($(this).val() === 'yes'){
                $('#nid-1').show();
                $('#nid-2').show();
                $('#birth-1').hide();
            } else if($(this).val() === 'no') {
                $('#nid-1').hide();
                $('#nid-2').hide();
                $('#birth-1').show();
            }
        });
    });
</script>
@endsection
