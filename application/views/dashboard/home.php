<!-- header -->
<?php $this->load->view('dashboard/templete/header') ?>
<!-- end header -->

<div class="flex h-screen overflow-hidden">

    <div id="backdrop"
        class="fixed inset-0 bg-black opacity-0 transition-opacity duration-300 ease-in-out z-40 hidden lg:hidden">
    </div>

    <!-- Sidebar -->
    <?php $this->load->view('dashboard/templete/sidebar') ?>
    <!-- End Sidebar -->

    <main class="flex-1 flex flex-col overflow-hidden">
        <!-- Sidebar -->
        <?php $this->load->view('dashboard/templete/navbar') ?>
        <!-- End Sidebar -->


        <div class="p-6 flex-1 overflow-y-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-500">Total Pengguna</p>
                    <p class="text-3xl font-bold mt-2 text-gray-800">1.234</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-500">Pendapatan Hari Ini</p>
                    <p class="text-3xl font-bold mt-2 text-gray-800">Rp 5.678.000</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-500">Pesanan Baru</p>
                    <p class="text-3xl font-bold mt-2 text-gray-800">56</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-500">Kunjungan</p>
                    <p class="text-3xl font-bold mt-2 text-gray-800">89.101</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Daftar Pengguna Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Nama</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">John Doe</td>
                                <td class="py-3 px-6 text-left">john.doe@email.com</td>
                                <td class="py-3 px-6 text-left">
                                    <span
                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Aktif</span>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">Jane Smith</td>
                                <td class="py-3 px-6 text-left">jane.smith@email.com</td>
                                <td class="py-3 px-6 text-left">
                                    <span
                                        class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Menunggu</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>



<!-- Footer -->
<?php $this->load->view('dashboard/templete/footer') ?>
<!-- End Footer -->