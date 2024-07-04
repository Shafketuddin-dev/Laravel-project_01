@if($sort_result->count() == 0)
<div class="col-md-6 wow zoomIn" data-wow-delay="0.1s">
    <div class="alert alert-info text-center" role="alert">
        {{__('No News or Event Available')}}
    </div>
</div>
@else
@foreach($sort_result as $news_event)
<div class="col-lg-4 col-sm-6 col-12 mb-20 wow fadeInUp" data-wow-delay="0.1s">
    <div class="news_event_card h-100">
        <img class="news_event_img" src="{{ asset($news_event->image) }}" alt="">
        <span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>
        <span>{{ $news_event->{app()->getLocale() . '_published_date'} }}</span>
        <a href="{{ route('news_event_details', $news_event->id) }}">
            <h4>{{ $news_event->{app()->getLocale() . '_title'} }}</h4>
        </a>
        <a class="read_more_btn" href="{{ route('news_event_details', $news_event->id) }}">
            {{__('Read more')}} </a>
    </div>
</div>
@endforeach
@endif