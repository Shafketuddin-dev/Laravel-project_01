@foreach ($sort_result as $item)
<div class="col-lg-6 col-md-6 mb-2 wow fadeInUp" data-wow-delay="0.1s">
    <div class="notice_box h-100">
        <div class="notice_icon_box">
            <i class="fa-solid fa-bullhorn"></i>
        </div>
        <div class="right_notice_box">
            <span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>
            <a href="{{ route('notice_details',$item->id) }}">
                <span>{{ $item->{app()->getLocale() . '_published_date'} }}</span>
                <h5>{{ $item->{app()->getLocale() . '_title'} }}</h5>
            </a>
        </div>
    </div>
</div>
@endforeach