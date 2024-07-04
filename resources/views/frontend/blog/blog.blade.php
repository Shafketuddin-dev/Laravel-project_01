@extends('frontend.master')
@section('title')
Blog || One Sky Communications Limited
@endsection
@section('content')
<!-- Blog start -->
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="javascript:void(0)"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                    <a href="{{ route('blog') }}" class="active"> {{ $menu->{app()->getLocale() . '_menu_blog'} }} </a>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <div class="search_box mt-2 wow jackInTheBox" data-wow-delay="0.3s">
                    <form action="">
                        <div class="search_inside">
                            <input type="search" name="blog_search" id="blog_search" placeholder="{{__('Search blog...')}}" data-url="{{ route('ajax.search_blog') }}">
                            <button type="submit">
                                <img src="{{ asset('frontendAssets') }}/static_images/search.png" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-page bg2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row blog_result justify-content-center">
                    @if($blogs->count() == 0)
                    <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                        <div class="alert alert-info text-center" role="alert">
                            {{__('No Blog Available')}}
                        </div>
                    </div>
                    @else
                    @foreach($blogs as $blog)
                    <div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6 mb-3 wow zoomIn" data-wow-delay="0.1s">
                        <div class="single-blog h-100">
                            <div class="blog-image">
                                <a href="{{ route('blog_details', $blog->id) }}">
                                    <img src="{{ asset($blog->image) }}" alt="blog">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta">
                                    <span><img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""></span>
                                    <li><a href="javascript:void(0)"> {{ $blog->{app()->getLocale() . '_published_date'} }} </a></li>
                                </ul>
                                <h4 class="blog-title"><a href="{{ route('blog_details', $blog->id) }}"> {{ $blog->{app()->getLocale() . '_title'} }} </a></h4>
                                <a href="{{ route('blog_details', $blog->id) }}" class="more"> {{__('Read more')}} <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-flex justify-content-end">
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-sidebar right-sidebar">
                    <div class="blog-sidebar-category wow zoomInUp" data-wow-delay="0.1s">
                        <div class="sidebar-title">
                            <h4 class="title"> {{__('Categories')}} </h4>
                        </div>
                        <ul class="category-items">
                            <li>
                                <div class="form-radio">
                                    <input type="radio" name="categoryRadio" id="categoryRadioAll">
                                    <label for="categoryRadioAll" onclick="sortBlogByCategory(this, '{{ route('ajax.sort_blog_by_category', 'all') }}')"> <span></span> {{__('All')}} <strong></strong></label>
                                </div>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <div class="form-radio">
                                    <input type="radio" name="categoryRadio" id="categoryRadio{{$category->id}}">
                                    <label for="categoryRadio{{$category->id}}" onclick="sortBlogByCategory(this, '{{ route('ajax.sort_blog_by_category', $category->id) }}')"> <span></span> {{ $category->{app()->getLocale() . '_title'} }} <strong></strong></label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="blog-sidebar-post mt-30 wow zoomInUp" data-wow-delay="0.1s">
                        <div class="sidebar-title">
                            <h4 class="title"> {{__('Recent Post')}} </h4>
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

                    <div class="blog-sidebar-tags mt-30 wow zoomInUp" data-wow-delay="0.1s">
                        <div class="sidebar-title">
                            <h4 class="title"> {{__('Tags')}} </h4>
                        </div>
                        <div class="tags-items">
                            <a href="javascript:void(0)" onclick="sortBlogByTag(this, '{{ route('ajax.sort_blog_by_tag', 'all') }}')">{{__('All')}}</a>
                            @foreach($tags as $tag)
                            <a href="javascript:void(0)" onclick="sortBlogByTag(this, '{{ route('ajax.sort_blog_by_tag', $tag->id) }}')">{{ $tag->{app()->getLocale() . '_title'} }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog end -->
@endsection