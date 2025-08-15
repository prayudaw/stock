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
                    <h3 class="fw-bold mb-3">Hasil Rekap</h3>
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
                            <a>Hasil Rekap</a>
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
                                <!-- Button -->
                                <div class="d-flex">
                                    <button id="rekap_semua" class="btn btn-primary btn-round ml-auto mb-3" data-bs-toggle="modal" data-bs-target="#RekapHasil">
                                        <i class="fa fa-edit"></i>
                                        Hasil Rekap Semua
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Koleksi</th>
                                                <th>Jumlah</th>
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

<!-- Button modal message -->


<!-- Modal message -->
<div
    class="modal fade"
    id="RekapHasil"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">

                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label">Total data valid:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="total-data-valid" readonly />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Total koleksi di database:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="total-koleksi" readonly />
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Maka, selisihnya (data rusak) :</label>
                        <input
                            type="text"
                            class="form-control"
                            id="selisih" readonly />
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>

            </div>
        </div>
    </div>
</div>


<!-- js -->
<?php $this->load->view('dashboard/templete/js') ?>
<!-- End js -->

<script type="text/javascript">
    $(document).ready(function() {

        //hasil rekap berdasarkan rekap semua
        $('body').on('click', '#rekap_semua', function() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(INDEX_URL . 'dashboard/rekap/rekap_semua') ?>",
                dataType: "JSON",
                success: function(data) {
                    $('#RekapHasil').modal('show');
                    $('#exampleModalLabel').html(' Hasil Rekap Semua')
                    $('#total-data-valid').val(data.total_scan_valid + ' eksemplar (' + data.persen_total_scan_valid + ' %)');
                    $('#total-koleksi').val(data.total_koleksi + ' eksemplar');
                    $('#selisih').val(data.selesih + ' eksemplar (' + data.persen_selisih + '%)');
                }
            });
            // return false;
        });


        //hasil rekap berdasarkan jenis koleksi
        $('body').on('click', '#proses_rekap', function() {
            var jenis_koleksi = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(INDEX_URL . 'dashboard/rekap/proses_rekap') ?>",
                dataType: "JSON",
                data: {
                    jenis_koleksi: jenis_koleksi
                },
                success: function(data) {
                    console.log(data);
                    $('#RekapHasil').modal('show');
                    $('#exampleModalLabel').html(' Hasil Rekap ' + data.jenis_koleksi)
                    $('#total-data-valid').val(data.total_scan_valid + ' eksemplar (' + data.persen_total_scan_valid + ' %)');
                    $('#total-koleksi').val(data.total_koleksi + ' eksemplar');
                    $('#selisih').val(data.selesih + ' eksemplar (' + data.persen_selisih + '%)');
                }
            });
            // return false;
        });

        var table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url(INDEX_URL . 'dashboard/rekap/get_list_rekap') ?>",
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