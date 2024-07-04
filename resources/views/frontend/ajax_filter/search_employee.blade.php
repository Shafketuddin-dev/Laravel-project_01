@foreach($employee_search as $employee)
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