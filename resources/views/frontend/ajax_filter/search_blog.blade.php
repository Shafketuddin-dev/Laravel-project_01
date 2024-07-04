@if($blog_search->count() == 0)
<div class="col-md-6 wow zoomIn" data-wow-delay="0.1s">
    <div class="alert alert-info text-center" role="alert">
        {{__('No Blog Available')}}
    </div>
</div>
@else
@foreach($blog_search as $blog)
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6 mb-3 wow zoomIn" data-wow-delay="0.1s">
    <div class="single-blog h-100">
        <div class="blog-image">
            <a href="{{ route('blog_details', $blog->id) }}">
                <img src="{{ asset($blog->image) }}" alt="blog">
            </a>
        </div>
        <div class="blog-content">
            <ul class="meta">
                <li><a href="javascript:void(0)"> {{ $blog->{app()->getLocale() . '_published_date'} }} </a></li>
            </ul>
            <h4 class="blog-title"><a href="{{ route('blog_details', $blog->id) }}"> {{ $blog->{app()->getLocale() . '_title'} }} </a></h4>
            <a href="{{ route('blog_details', $blog->id) }}" class="more"> {{__('Read more')}} <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>
@endforeach
@endif