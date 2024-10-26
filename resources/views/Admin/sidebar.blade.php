<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="{{ url('/') }}" title="">
                <!-- <img class="img-fluid for-white" src="{{ asset('user/img/logo.png') }}" style="height: 60px; width:60px; " alt="Logo" > -->
                <span style="color:white; font-weight:bold; font-size:4vh; " >FLAVOURS</span>

            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ url('/') }}">
                <img class="img-fluid for-white" src="{{ asset('user/img/logo.png') }}" style="height: 60px; width:60px; " alt="Logo" >

            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin/dashboard') }}">
                            <i class="ri-home-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ url('admin/users') }}">
                            <i class="ri-user-3-line"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-focus-3-line"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ url('admin/categories') }}">List Categories</a>
                            </li>
                        </ul>
                    </li>



                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-focus-3-line"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ url('admin/products') }}">All Products</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/products/photos') }}">All Products' Photos</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/products/ratings') }}">All Products' Ratings</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/products/create') }}">Add New Product</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-focus-3-line"></i>
                            <span>Gallery</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ url('admin/gallery') }}">All Gallery's Photos</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/gallery/add') }}">Add to Gallery</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ url('admin/checked_order/index') }}">
                            <i class="ri-store-3-line"></i>
                            <span>Checked Order</span>
                        </a>
                    </li>


                   
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
