@extends('frontend.master')
@section('title')
Employee || One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_whoweare_title'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_employee'} }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="staff_profile_section bg1">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-4 col-md-5 col-sm-8 col-12 event_search_panel wow slideInLeft" data-wow-delay="0.1s">
                <div class="input_field">
                    <input type="search" name="employee_search" id="employee_search" class="form-control" placeholder="{{__('Search By Name or Blood Group...')}}" aria-label="Username" data-url="{{ route('ajax.search_employee') }}">
                    <img src="{{ asset('frontendAssets') }}/static_images/search_black.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-4 col-12 wow slideInRight" data-wow-delay="0.1s">
                <a class="btn btn-info sort_btn float_end text-white" role="button" href="#" data-bs-toggle="dropdown">
                    <span>{{ __('Sort By') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="getEmployeeByDepartment(this, '{{ route('ajax.sort_employee', 'all') }}')"> {{__('All')}} </a>
                    </li>
                    @foreach ($departments as $department)
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="getEmployeeByDepartment(this, '{{ route('ajax.sort_employee', $department->id) }}')">{{ $department->{app()->getLocale() . '_name'} }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row employee_result justify-content-center">
            @foreach($employees as $employee)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card staff_box staff_shadow h-100">
                    <span class="shape"></span>
                    @if($employee->image)
                    <img class="card-img-top" src="{{ asset($employee->image) }}" alt="">
                    @else
                    <img class="card-img-top" src="{{ asset('frontendAssets') }}/static_images/man.jpg" alt="">
                    @endif
                    <div class="card-body">
                        <strong>{{ $employee->department->{app()->getLocale() . '_name'} }}</strong> <br>
                        <strong class="text-muted">{{ $employee->designation->{app()->getLocale() . '_name'} }}</strong>
                        <h4>{{ $employee->{app()->getLocale() . '_name'} }}</h4>
                        <span>{{__('Joining Date:')}} {{ $employee->{app()->getLocale() . '_joining_date'} }}</span>
                        <p>{{__('DOB:')}} {{ $employee->{app()->getLocale() . '_dob'} }}</p>
                        <strong>{{__('Blood Group')}}: {{ $employee->bloodGroup->{app()->getLocale() . '_title'} }}</strong>
                    </div>
                    <div class="card-footer">
                        <ul class="social">
                            @if($employee->image)
                            <li><a href="javascript:void(0)"><i class="fa-regular fa-envelope"></i> {{ $employee->email }}</a></li>
                            @else
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection