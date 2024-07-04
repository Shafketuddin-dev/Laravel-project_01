<aside id="leftsidebar" class="sidebar">
    @php
    $logo = App\Models\Menu::first();
    @endphp
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{ url('/dashboard') }}"><img src="{{ asset($logo->image) }}" width="100" alt="Aero"><span class="m-l-10"></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    @if (Auth::user()->profile_photo_path)
                    <a class="image" href="{{ route('profile_admin') }}"><img src="{{ asset(Auth::user()->profile_photo_path) }}" alt="User"></a>
                    @else
                    <a class="image" href="{{ route('profile_admin') }}"><img src="{{ asset('adminAssets') }}/images/profile_av.png" alt="User"></a>
                    @endif
                    <div class="detail">
                        <h6>{{ Auth::user()->name }}</h6> <img style="height: 20px; width:20px;" src="{{ asset('adminAssets') }}/images/badge.png" alt="User">
                        @if (Auth::user()->role == '2')
                        <small> <strong> Super Admin </strong> </small>
                        @elseif(Auth::user()->role == '1')
                        <small> <strong> Admin </strong> </small>
                        @elseif(Auth::user()->role == '3')
                        <small> <strong> Editor </strong> </small>
                        @elseif(Auth::user()->role == '4')
                        <small> <strong> Viewer </strong> </small>
                        @else
                        <small>Not Verified</small>
                        @endif
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{ url('/') }}"><i class="zmdi zmdi-home"></i><span>OSCL
                        Home</span></a>
            </li>
            @if (Auth::user()->role == '1' || Auth::user()->role == '2')
            @if (Auth::user()->role == '2')
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-account"></i><span>Admin</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('manage_admin') }}" class=" waves-effect waves-block">Manage Admin</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-inbox"></i><span>Contact / Complain</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('admin.manage_contact_message') }}" class=" waves-effect waves-block">Manage Contact</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-assignment"></i><span>Job Apply</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('manage_job_apply') }}" class=" waves-effect waves-block">Manage
                            Candidate</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-money"></i></i><span>Payment Check</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('admin.manage_online_payment') }}" class=" waves-effect waves-block">Payment Check</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-book"></i></i><span>Home Package Request</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('admin.manage_home_package_request') }}" class=" waves-effect waves-block">Request Check</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-apps"></i><span>CMS</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('admin.common') }}" class=" waves-effect waves-block">Common</a></li>
                    <li><a href="{{ route('admin.home_page_menu') }}" class=" waves-effect waves-block">Home
                            Page</a></li>
                    <li><a href="{{ route('admin.who_we_are_menu') }}" class=" waves-effect waves-block">Who We
                            Are</a></li>
                    <li><a href="{{ route('admin.coverage_check_menu') }}" class=" waves-effect waves-block">Coverage Check</a></li>
                    <li><a href="{{ route('admin.internet_package') }}" class=" waves-effect waves-block">Internet Plans</a></li>
                    <li><a href="{{ route('admin.pay_bill') }}" class=" waves-effect waves-block">Bill
                            Payment</a></li>
                    <li><a href="{{ route('admin.manage_contact_label') }}" class=" waves-effect waves-block">Contact Us Page</a></li>
                    <li><a href="{{ route('admin.more_page') }}" class=" waves-effect waves-block">More</a>
                    </li>
                    <li><a href="{{ route('admin.manage_tc') }}" class=" waves-effect waves-block">Terms &
                            Conditions</a></li>
                    <li><a href="{{ route('admin.manage_area') }}" class=" waves-effect waves-block">Registration Area</a></li>
                    <li><a href="{{ route('admin.manage_clients_review') }}" class=" waves-effect waves-block">Clients Review</a></li>
                    <li><a href="{{ route('admin.manage_corporate_internet') }}" class=" waves-effect waves-block">Corporate Internet</a></li>
                    <li><a href="{{ route('admin.manage_magic_ip') }}" class=" waves-effect waves-block">Magic IP</a></li>
                </ul>
            </li>
            @endif
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-book"></i><span>Registration</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('manage_buy_package') }}" class=" waves-effect waves-block">Manage
                            Registration</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-account"></i><span>My Profile</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ url('admin/profile-admin') }}" class=" waves-effect waves-block">Manage
                            Profile</a></li>
                </ul>
            </li>
            @elseif (Auth::user()->role == '3' || Auth::user()->role == '4')
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-account"></i><span>My Profile</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ url('admin/profile-admin') }}" class=" waves-effect waves-block">Manage
                            Profile</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-book"></i><span>Registration</span></a>
                <ul class="ml-menu" style="display: none;">
                    <li><a href="{{ route('manage_buy_package') }}" class=" waves-effect waves-block">Manage
                            Registration</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</aside>
