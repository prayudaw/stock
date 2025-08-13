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
                    <h3 class="fw-bold mb-3">List Stock Opname</h3>
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
                            <a>List Stock</a>
                        </li>

                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="operator_table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Barcode</th>
                                                <th>Kd Buku</th>
                                                <th>Operator</th>
                                                <th>Waktu</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
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

<script>
    $(document).ready(function() {
        var table = $('#operator_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url(INDEX_URL . 'dashboard/stock/get_list_stock') ?>",
                "type": "POST",
                "data": function(d) {
                    // Kirim data filter ke server, termasuk tanggal
                    d.filters = {
                        // name: $('#name').val(),
                        // category: $('#category').val(),
                        // min_price: $('#min_price').val(),
                        // max_price: $('#max_price').val(),
                        // start_date: $('#start_date').val(), // Tambahkan ini
                        // end_date: $('#end_date').val() // Tambahkan ini
                    };
                }
            },
        });


    });
</script>