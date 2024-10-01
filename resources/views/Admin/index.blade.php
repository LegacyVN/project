<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('admin.css')

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('admin.header')
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('admin.sidebar')
            <!-- Page Sidebar Ends-->

            <!-- index body start -->
            @include('admin.body')
            <!-- index body end -->

        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- latest js -->
    <script src="{{ asset('Admin_template/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('Admin_template/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js -->
    <script src="{{ asset('Admin_template/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('Admin_template/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- scrollbar simplebar js -->
    <script src="{{ asset('Admin_template/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('Admin_template/js/scrollbar/custom.js') }}"></script>

    <!-- Sidebar jquery -->
    <script src="{{ asset('Admin_template/js/config.js') }}"></script>

    <!-- tooltip init js -->
    <script src="{{ asset('Admin_template/js/tooltip-init.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('Admin_template/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('Admin_template/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('Admin_template/js/notify/index.js') }}"></script>

    <!-- Apexchart js -->
    <script src="{{ asset('Admin_template/js/chart/apex-chart/apex-chart1.js') }}"></script>
    <script src="{{ asset('Admin_template/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('Admin_template/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('Admin_template/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('Admin_template/js/chart/apex-chart/chart-custom1.js') }}"></script>

    <!-- slick slider js -->
    <script src="{{ asset('Admin_template/js/slick.min.js') }}"></script>
    <script src="{{ asset('Admin_template/js/custom-slick.js') }}"></script>

    <!-- customizer js -->
    <script src="{{ asset('Admin_template/js/customizer.js') }}"></script>

    <!-- ratio js -->
    <script src="{{ asset('Admin_template/js/ratio.js') }}"></script>

    <!-- sidebar effect -->
    <script src="{{ asset('Admin_template/js/sidebareffect.js') }}"></script>

    <!-- Theme js -->
    <script src="{{ asset('Admin_template/js/script.js') }}"></script>
</body>

</html>
