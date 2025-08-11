    <aside id="sidebar"
        class="fixed z-50 lg:relative lg:flex h-screen w-64 bg-gray-800 text-white flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="p-6 border-b border-gray-700">
            <div class="flex items-center space-x-2 text-white">
                <i class="fa-solid fa-qrcode  text-3xl"></i>
                <h1 class="text-2xl font-bold">StockOpname</h1>
            </div>
        </div>
        <nav class="flex-1 px-4 py-6">
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                <div class="flex items-center">
                    <i class="fa-solid fa-house-chimney h-5 w-5 mr-3"></i>
                    <span>Beranda</span>
                </div>
            </a>

            <a href="<?php echo base_url(INDEX_URL . 'dashboard/stock/scan_stock') ?>"
                class="block py-2.5 px-4 rounded mt-2 transition duration-200 hover:bg-gray-700 hover:text-white">
                <div class="flex items-center">
                    <i class="fa-solid fa-qrcode h-5 w-5 mr-3"></i>
                    <span>Scan Stock</span>
                </div>
            </a>
            <?php if ($this->session->userdata('role') == 'admin'): ?>
            <?php endif; ?>
            <a href="page/form_validation.html"
                class="block py-2.5 px-4 rounded mt-2 transition duration-200 hover:bg-gray-700 hover:text-white">
                <div class="flex items-center">
                    <i class="fa-solid fa-chart-line h-5 w-5 mr-3"></i>
                    <span>Stock </span>
                </div>
            </a>
            <a href="<?php echo base_url(INDEX_URL . 'dashboard/stock/operator') ?>"
                class="block py-2.5 px-4 rounded mt-2 transition duration-200 hover:bg-gray-700 hover:text-white">
                <div class="flex items-center">
                    <i class="fa-solid fa-user h-5 w-5 mr-3"></i>
                    <span>Operator Stock Opname</span>
                </div>
            </a>
            <a href="#"
                class="block py-2.5 px-4 rounded mt-2 transition duration-200 hover:bg-gray-700 hover:text-white">
                <div class="flex items-center">
                    <i class="fa-solid fa-gear h-5 w-5 mr-3"></i>
                    <span>Pengaturan</span>
                </div>
            </a>
        </nav>
        <div class="p-4 border-t border-gray-700 mt-auto">
            <a href="<?php echo base_url(INDEX_URL . 'auth/logout') ?>"
                class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                <div class="flex items-center">
                    <i class="fa-solid fa-right-from-bracket h-5 w-5 mr-3"></i>
                    <span>Keluar</span>
                </div>
            </a>
        </div>
    </aside>