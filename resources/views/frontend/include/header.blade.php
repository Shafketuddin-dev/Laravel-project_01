        <!-- header  start-->
        <!-- desktop menu start -->
        <section class="top_header_menu_section sticky-top">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-2 col-xl-2 col-lg-12 col-md-12">
                        <a class="logo" href="{{ route('/') }}">
                            <img src="{{ asset($menu->image) }}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-xxl-10 col-xl-10 col-lg-12 col-md-12">
                        <div class="main_menu_list">
                            <ul class="desktop_menu">
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }}
                                    </a>
                                </li>
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="javascript:void(0)">{{ $menu->{app()->getLocale() . '_menu_whoweare_title'} }}
                                    </a><i class='bx bx-chevron-down bx-flashing rotate-icon'></i>

                                    <ul class="desktop_sub_menu1">
                                        <li>
                                            <a href="{{ route('about_us') }}">{{ $menu->{app()->getLocale() . '_menu_about_us'} }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('board_of_directors') }}">{{ $menu->{app()->getLocale() . '_menu_bod'} }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="{{ route('packages') }}">{{ $menu->{app()->getLocale() . '_menu_internet_plan'} }}
                                    </a>
                                </li>
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="{{ route('corporate_internet') }}"> {{ __('Corporate Internet') }}
                                    </a>
                                </li>
                                <!-- <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="javascript:void(0)">{{ $menu->{app()->getLocale() . '_menu_service_title'} }}
                                    </a><i class='bx bx-chevron-down bx-flashing rotate-icon'></i>

                                    <ul class="desktop_sub_menu1">
                                        <li>
                                            <a href="{{ route('packages') }}">{{ $menu->{app()->getLocale() . '_menu_internet'} }}</a>
                                        </li>
                                        <li>
                                            <a href="https://skytrackerbd.com" target="_blank">{{ $menu->{app()->getLocale() . '_menu_vts'} }}</a>
                                        </li>
                                        <li>
                                            <a href="https://ositbd.com" target="_blank">{{ $menu->{app()->getLocale() . '_menu_it'} }}</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="{{ route('payment_process') }}">{{ $menu->{app()->getLocale() . '_menu_billpay'} }}
                                    </a>
                                    {{-- <i class='bx bx-chevron-down bx-flashing rotate-icon'></i> --}}
                                    {{-- <ul class="desktop_sub_menu1 ">
                                        <li>
                                            <a href="{{ route('payment_process') }}">{{ $menu->{app()->getLocale() . '_menu_billing_system'} }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('online_payment') }}">{{ $menu->{app()->getLocale() . '_menu_online_pay'} }}</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="{{ route('branches') }}">{{ $menu->{app()->getLocale() . '_menu_branches'} }}
                                    </a>
                                </li>
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="{{ route('contact_us') }}">{{ $menu->{app()->getLocale() . '_menu_contact_us'} }}
                                    </a>
                                </li>
                                <li class="show_sub_menu">
                                    <a class="main_menu pl-0 empty_sub" href="javascript:void(0)">{{ $menu->{app()->getLocale() . '_menu_more_title'} }}
                                    </a><i class='bx bx-chevron-down bx-flashing rotate-icon'></i>

                                    <ul class="desktop_sub_menu1 ">
                                        <li class="show_sub_menu">
                                            <a class="main_menu pl-0 empty_sub" href="{{ route('blog') }}">{{ $menu->{app()->getLocale() . '_menu_blog'} }}
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a href="{{ route('awards') }}">{{ $menu->{app()->getLocale() . '_menu_awards'} }}</a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('gallery') }}">{{ $menu->{app()->getLocale() . '_menu_gallery'} }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('news_event') }}">{{ $menu->{app()->getLocale() . '_menu_news_event'} }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('circular') }}">{{ $menu->{app()->getLocale() . '_menu_circular'} }}</a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{ route('login') }}">{{ $menu->{app()->getLocale() . '_menu_admin'} }}</a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- <li class="show_sub_menu mt-2">
                                    <a href="{{$menu->tutorial_link}}" target="_blank" class="tutorial_button">{{ $menu->{app()->getLocale() . '_tutorial'} }} <i class="fa-brands fa-youtube"></i></a>
                                </li> --}}
                            </ul>
                            <div class="lang_change">
                                @php
                                $currentLocale = app()->getLocale();
                                $englishLink = $currentLocale == 'en' ? url()->current() : str_replace('/bn', '', url()->current());
                                $banglaLink = $currentLocale == 'en' ? (request()->path() == '/' ? '/bn' : '/bn/' . request()->path()) : url()->current();
                                @endphp

                                <a class="lang_item{{ $currentLocale == 'en' ? ' lang_item_active' : '' }} text-dark" href="{{ $englishLink }}">Eng</a>
                                <a class="lang_item{{ $currentLocale == 'bn' ? ' lang_item_active' : '' }} text-dark" href="{{ $banglaLink }}">বাংলা</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- desktop menu end -->

        <!-- mobile menu start -->
        <section class="mobile_menu wow fadeInDown">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 col-sm-4">
                        <a class="logo" href="{{ route('/') }}">
                            <img src="{{ asset($menu->image) }}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 d-flex justify-content-end plr0">
                        <div class="btn-group mobile_dropdown_lang">
                            <button type="button" class="language_btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bxs-analyse'></i> {{ app()->getLocale() == 'bn' ? 'বাংলা' : 'Eng' }}
                            </button>
                            <ul class="dropdown-menu lang_dropdown bg-secondary">
                                <li>
                                    @if(app()->getLocale() == 'bn')
                                    <a href="{{ app()->getLocale() == 'en' ? url()->current() : str_replace('/bn', '', url()->current()) }}">English</a>
                                    @else
                                    <a href="{{ app()->getLocale() == 'en' ? (request()->path() == '/' ? '/bn' : '/bn/' . request()->path()) : url()->current() }}">বাংলা</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2 col-sm-2">
                        <a data-bs-toggle="offcanvas" href="#offcanvasExample" class="hamburger">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </a>

                        <div class="offcanvas custom_offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasExampleLabel"> {{ __('One Sky Communications Limited') }} </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="mobile_menu_header align-items-center">
                                    <img class="logo" src="{{ asset($menu->image) }}" alt="">
                                    <a href="{{$menu->tutorial_link}}" target="_blank" class="tutorial_button"><span>{{ $menu->{app()->getLocale() . '_tutorial'} }}</span><i class="fa-brands fa-youtube"></i></a>
                                </div>
                                <nav>
                                    <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="{{ route('/') }}">{{ $menu->{app()->getLocale() . '_menu_home'} }}</a>
                                        </li>
                                    </ul>
                                    <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="javascript:void()">{{ $menu->{app()->getLocale() . '_menu_whoweare_title'} }} <i class='bx bx-chevron-down bx-flashing'></i> </a>
                                            <ul class="mobile_side_sub_menu_section">
                                                <li>
                                                    <a href="{{ route('about_us') }}">{{ $menu->{app()->getLocale() . '_menu_about_us'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('board_of_directors') }}">{{ $menu->{app()->getLocale() . '_menu_bod'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('branches') }}">{{ $menu->{app()->getLocale() . '_menu_branches'} }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="{{ route('packages') }}">{{ $menu->{app()->getLocale() . '_menu_internet_plan'} }} </a>
                                        </li>
                                    </ul>
                                    <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="{{ route('corporate_internet') }}">{{ __('Corporate Internet') }} </a>
                                        </li>
                                    </ul>
                                    <!-- <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="javascript:void()">{{ $menu->{app()->getLocale() . '_menu_service_title'} }} <i class='bx bx-chevron-down bx-flashing'></i> </a>
                                            <ul class="mobile_side_sub_menu_section">
                                                <li>
                                                    <a href="{{ route('packages') }}">{{ $menu->{app()->getLocale() . '_menu_internet'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="https://skytrackerbd.com" target="_blank">{{ $menu->{app()->getLocale() . '_menu_vts'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="https://ositbd.com" target="_blank">{{ $menu->{app()->getLocale() . '_menu_it'} }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> -->
                                    <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="{{ route('payment_process') }}">{{ $menu->{app()->getLocale() . '_menu_billpay'} }} </a>
                                            {{-- <ul class="mobile_side_sub_menu_section">
                                                <li>
                                                    <a href="{{ route('payment_process') }}">{{ $menu->{app()->getLocale() . '_menu_billing_system'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('online_payment') }}">{{ $menu->{app()->getLocale() . '_menu_online_pay'} }}</a>
                                                </li>
                                            </ul> --}}
                                        </li>
                                    </ul>
                                    <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="{{ route('contact_us') }}">{{ $menu->{app()->getLocale() . '_menu_contact_us'} }}</a>
                                        </li>
                                    </ul>
                                    <ul class="mobile_side_menu_section">
                                        <li>
                                            <a href="javascript:void()">{{ $menu->{app()->getLocale() . '_menu_more_title'} }} <i class='bx bx-chevron-down bx-flashing'></i>
                                            </a>
                                            <ul class="mobile_side_sub_menu_section">
                                                <li>
                                                    <a href="{{ route('blog') }}">{{ $menu->{app()->getLocale() . '_menu_blog'} }}</a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{ route('awards') }}">{{ $menu->{app()->getLocale() . '_menu_awards'} }}</a>
                                                </li> --}}
                                                <li>
                                                    <a href="{{ route('gallery') }}">{{ $menu->{app()->getLocale() . '_menu_gallery'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('news_event') }}">{{ $menu->{app()->getLocale() . '_menu_news_event'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('circular') }}">{{ $menu->{app()->getLocale() . '_menu_circular'} }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('login') }}">{{ $menu->{app()->getLocale() . '_menu_admin'} }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- mobile menu end -->
        <!-- header  end-->