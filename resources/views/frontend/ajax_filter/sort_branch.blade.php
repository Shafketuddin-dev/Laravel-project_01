@foreach($branch_list as $branch)
<div class="col-xl-3 col-lg-4 col-md-6 mb-3 wow fadeInUp">
    <div class="branch_card h-100">
        <div class="branch_image_div">
            @if ($branch->image)
            <img class="img-fluid" src="{{ asset($branch->image) }}" alt="Branch Image">
            @else
            <img class="img-fluid" src="{{ asset('frontendAssets/img/branch_2.jpg') }}" alt="Branch Image">
            @endif
        </div>
        <h5 class="text-center">{{ $branch->{app()->getLocale() . '_branch_name'} }}</h5>
        <div class="address_div">
            <div class="row">
                <div class="col-lg-2 col-2">
                    <img class="img-fluid" src="{{ asset('frontendAssets/img/address.png') }}" alt="Address Icon">
                </div>
                <div class="col-lg-10 col-10">
                    <p>{{ $branch->{app()->getLocale() . '_address'} }}</p>
                </div>
            </div>  
        </div>
        
        <div class="number_div">
            <div class="row">
                <div class="col-lg-2 col-2">
                    <img class="img-fluid" src="{{ asset('frontendAssets/img/call.png') }}" alt="Address Icon">
                </div>
                <div class="col-lg-10 col-10">
                    <p>{{ $branch->{app()->getLocale() . '_phone'} }}</p>
                </div>
            </div>  
        </div>
        <div class="branch_button_div d-flex justify-content-center">
            <a class="package_btn mt-3 mb-2" href="tel:{{ $branch->call_phone }}">{{ __('Call Now') }}</a>
        </div>
    </div>
</div>
@endforeach