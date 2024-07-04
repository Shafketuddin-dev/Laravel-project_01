@extends('frontend.master')
@section('title')
Blog Details || One Sky Communications Limited
@endsection
@section('content')
<!-- Blog Details start -->
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                    <a href="{{ route('blog') }}"> {{ $menu->{app()->getLocale() . '_menu_blog'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{__('Blog Details')}} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-page bg3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="single-blog mt-30">
                    <div class="blog-image">
                        <a href="javascript:void(0)">
                            <img src="{{ asset($blog_details->image) }}" alt="blog">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="meta">
                        <span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>
                            <li><a href="javascript:void(0)"> {{ $blog_details->{app()->getLocale() . '_published_date'} }}</a></li>
                        </ul>
                        <h4 class="blog-title"><a href="javascript:void(0)"> {{ $blog_details->{app()->getLocale() . '_title'} }}</a></h4>
                        <p>  {!! $blog_details->{app()->getLocale() . '_description'} !!} </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <div class="blog-sidebar-post mt-30 wow zoomInUp" data-wow-delay="0.1s">
                        <div class="sidebar-title">
                            <h4 class="title text-danger fw-bold"> {{__('Recent Post')}} </h4>
                        </div>
                        <ul class="post-items">
                            @foreach($recents as $recent)
                            <li>
                                <div class="single-post">
                                    <div class="post-thumb">
                                        <a href="{{ route('blog_details', $recent->id) }}"><img src="{{ asset($recent->image) }}" alt=""></a>
                                    </div>
                                    <div class="post-content">
                                        <h4 class="post-title"><a href="{{ route('blog_details', $recent->id) }}">{{ $recent->{app()->getLocale() . '_title'} }}</a></h4>
                                        <a href="{{ route('blog_details', $recent->id) }}" class="more"> {{__('Read more')}} <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details end -->
@endsection