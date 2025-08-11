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
            <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto mt-10">
                <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">SCAN BUKU</h1>
                <p class="text-sm text-gray-600 mb-6 text-center">Gunakan pemindai atau masukkan nomor barcode
                    secara manual.</p>

                <form action="#" method="post">
                    <div class="mb-4">
                        <label for="barcode" class="block text-gray-700 text-sm font-bold mb-2">Nomor
                            Barcode</label>
                        <input type="text" id="barcode" name="barcode"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Arahkan scanner ke sini..." required autofocus>
                    </div>
                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Proses
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </main>
</div>



<!-- Footer -->
<?php $this->load->view('dashboard/templete/footer') ?>
<!-- End Footer -->