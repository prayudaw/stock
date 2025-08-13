    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">

                <a href="index.html" class="logo">
                    <span style="color: #000;  background: linear-gradient(to right, #ff7e5f, #feb47b);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;">
                        <h4><i class="fas fa-camera fa-lg"></i> StockOpname</h4>
                    </span>

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
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item">
                        <a href="<?php echo base_url(INDEX_URL . 'dashboard/home') ?>">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(INDEX_URL . 'dashboard/stock/scan_stock') ?>">
                            <i class="fas fa-barcode"></i>
                            <p>Scan Stock</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(INDEX_URL . 'dashboard/stock/operator') ?>">
                            <i class="fas fa-user-alt"></i>
                            <p>Operator StockOpname</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(INDEX_URL . 'dashboard/stock/list_stock') ?>">
                            <i class="fas fa-clipboard-list"></i>
                            <p>List Stock</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(INDEX_URL . 'dashboard/stock/list_stock') ?>">
                            <i class="fas fa-book"></i>
                            <p>Rekap</p>
                        </a>

                    </li>



                </ul>
            </div>
        </div>
    </div>