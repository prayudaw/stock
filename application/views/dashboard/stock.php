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
                <div class="page-header">
                    <h3 class="fw-bold mb-3">SCAN STOCK</h3>
                    <ul class="breadcrumbs mb-3">
                        <li class="nav-home">
                            <a href="#">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">SCAN STOCK</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <div class="card-title"></div>
                            </div> -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12">
                                        <div class="form-group">
                                            <label for="scan">Scan Barcode</label>
                                            <input type="scan" class="form-control" id="scan"
                                                placeholder="Scan Barcode" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success"><i class="fas fa-barcode"></i> Scan</button>
                            </div>
                        </div>
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