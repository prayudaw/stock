<!-- header -->
<?php $this->load->view('dashboard/templete/header') ?>
<!-- End header -->

<div class="wrapper">
    <!-- Sidebar -->
    <?php $this->load->view('dashboard/templete/sidebar') ?>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">

                    <a href="index.html" class="logo">
                        <img src="<?php echo base_url() ?>assets/img/kaiadmin/logo_light.svg" alt="navbar brand"
                            class="navbar-brand" height="20">
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>

                </div>
                <!-- End Logo Header -->
            </div>

            <!-- Navbar Header -->
            <?php $this->load->view('dashboard/templete/navbar'); ?>
            <!-- End Navbar -->
        </div>

        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div>
                        <h3 class="fw-bold mb-3">Dashboard</h3>
                        <h6 class="op-7 mb-2"></h6>
                    </div>

                </div>

            </div>
        </div>

        <!-- footer -->
        <?php $this->load->view('dashboard/templete/footer') ?>
        <!-- End footer -->
    </div>
</div>


<!-- js -->
<?php $this->load->view('dashboard/templete/js') ?>
<!-- End js -->