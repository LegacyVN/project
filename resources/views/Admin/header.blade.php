<div class="page-header">
    <div class="header-wrapper m-0">
        <div class="header-logo-wrapper p-0">
            <div class="logo-wrapper">
                <a href="{{ url('/') }}">
                    <img class="img-fluid main-logo" src="{{ asset('admin/images/logo/1.png') }}" alt="logo">
                    <img class="img-fluid white-logo" src="{{ asset('admin/images/logo/1-white.png') }}" alt="logo">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                <a href="{{ url('index.html') }}">
                    <img src="{{ asset('admin/images/logo/1.png') }}" class="img-fluid" alt="">
                </a>
            </div>
        </div>

        <form class="form-inline search-full" action="javascript:void(0)" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Search Fastkart .." name="q" title="" autofocus>
                        <i class="close-search" data-feather="x"></i>
                        <div class="spinner-border Typeahead-spinner" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <span class="header-search">
                        <i class="ri-search-line"></i>
                    </span>
                </li>
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <i class="ri-notification-line"></i>
                        <span class="badge rounded-pill badge-theme">4</span>
                    </div>
                    <ul class="notification-dropdown onhover-show-div">
                        <li>
                            <i class="ri-notification-line"></i>
                            <h6 class="f-18 mb-0">Notifications</h6>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                    class="pull-right">10 min.</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                    class="pull-right">1 hr</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                    class="pull-right">3 hr</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                    class="pull-right">6 hr</span>
                            </p>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="javascript:void(0)">Check all notifications</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <div class="mode">
                        <i class="ri-moon-line"></i>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 me-0">
                    <div class="media profile-media">
                        <div class="user-name-hide media-body">
                            <span>{{ Auth::user()->name }}</span>
                            <p class="mb-0 font-roboto">{{ Auth::user()->usertype }}<i class="middle ri-arrow-down-s-line"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ url('admin/users') }}">
                                <i data-feather="users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/categories') }}">
                                <i class="ri-focus-3-line"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/products') }}">
                                <i class="ri-focus-3-line"></i>
                                <span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <i data-feather="phone"></i>
                                <span>{{ __('Profile') }}</span>
                            </a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-feather="log-out"></i>
                                <span>{{ __('Log Out') }}</span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>