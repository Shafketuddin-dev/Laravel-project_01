@extends('frontend.master')
@section('title')
Gallery || One Sky Communications Limited
@endsection
@section('content')
<section class="single_page_top_section bg_rules" style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb flat">
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                    <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_more_title'} }} </a>
                    <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_gallery'} }} </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery_section bg1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="glowing_btn_div">
                    <button class="learn_more_btn active wow fadeInUp" data-wow-delay="0.1s" onclick="showPanel('panel1')" data-panel="panel1"> {{__('Image Gallery')}} </button>
                    <button class="learn_more_btn wow fadeInDown" data-wow-delay="0.1s" onclick="showPanel('panel2')" data-panel="panel2"> {{__('Video Gallery')}} </button>
                </div>
                <div class="panel_show wow zoomIn" data-wow-delay="0.1s">
                    <div class="panel1 image_gallery_section">
                        <div class="gallery">
                            <ul class="controls">
                                <li class="buttons active" data-filter="{{ $image_category_all->en_title }}">{{ $image_category_all->{app()->getLocale() . '_title'} }}</li>
                                @foreach($categories as $category)
                                @php
                                $enTitle = str_replace(' ', '_', $category->en_title);
                                @endphp
                                <li class="buttons" data-filter="{{ $enTitle }}">{{ $category->{app()->getLocale() . '_title'} }}</li>
                                @endforeach
                            </ul>

                            <div class="image-container">
                                @foreach($categories as $category)
                                @foreach($images as $image)
                                @if($image->image_category_id == $category->id)
                                <div class="img_box">
                                    <a href="{{ asset($image->image) }}" class="image {{ $category->en_title }}">
                                        <img src="{{ asset($image->image) }}" alt="">
                                        <div class="left_overly"></div>
                                        <div class="right_overly"></div>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="panel2 hidden">
                        <div class="row justify-content-center">
                            @foreach($videos as $video)
                            <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                                <div class="media_card" data-bs-toggle="modal" data-bs-target="#videoplayermodal{{ $video->id }}">
                                    <img class="thumnail_img" src="{{ asset($video->image) }}" alt="">
                                    <div class="media_title_panel">
                                        <h6>{{ $video->{app()->getLocale() . '_title'} }}</h6>
                                        <span class="media_date"> <img class="date_img" src="{{ asset('frontendAssets') }}/static_images/calendar_icon.png" alt=""> {{ $video->{app()->getLocale() . '_date'} }}</span>
                                    </div>
                                </div>
                                <!--Video Popup Modal -->
                                <div class="modal fade" id="videoplayermodal{{ $video->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content modal_custom_content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $video->{app()->getLocale() . '_title'} }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <video width="100%" height="auto" controls>
                                                    <source src="{{ asset($video->video) }}" type="video/mp4">
                                                    <source src="{{ asset($video->video) }}" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row mt-5 justify-content-center">
                            @foreach($youtube_videos as $youtube_video)
                            <div class="col-lg-4 mt-3">
                                <div class="youtube_video_wrapper">
                                    <iframe width="420" height="315" src="{{ $youtube_video->url }}"></iframe>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection