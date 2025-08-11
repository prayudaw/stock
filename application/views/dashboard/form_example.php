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


        <div class="container mx-auto p-6">
            <h2 class="text-3xl font-bold mb-6">Daftar Operator Stock Opname</h2>

            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <form id="filterForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="no_barcode" class="block text-gray-700 text-sm font-bold mb-2">No
                                Barcode</label>
                            <input type="text" id="no_barcode" name="no_barcode"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700" placeholder="no barcode">
                        </div>
                        <div>
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                            <select id="category" name="category"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700">
                                <option value="">Semua</option>
                                <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="min_price" class="block text-gray-700 text-sm font-bold mb-2">Harga
                                Minimum</label>
                            <input type="number" id="min_price" name="min_price"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                        <div>
                            <label for="max_price" class="block text-gray-700 text-sm font-bold mb-2">Harga
                                Maksimum</label>
                            <input type="number" id="max_price" name="max_price"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                    </div>
                    <div class="mt-6 text-right">
                        <button type="button" id="filterButton"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Terapkan Filter
                        </button>
                        <button type="reset" id="resetButton"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Reset
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <table id="productTable" class="display w-full text-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Dibuat Pada</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>


    </main>
</div>



<!-- Footer -->
<?php $this->load->view('dashboard/templete/footer') ?>
<!-- End Footer -->

<script>
$(document).ready(function() {
    // Inisialisasi Datepicker
    $('#start_date').datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(selectedDate) {
            $('#end_date').datepicker('option', 'minDate', selectedDate);
        }
    });
    $('#end_date').datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(selectedDate) {
            $('#start_date').datepicker('option', 'maxDate', selectedDate);
        }
    });

    var productTable = $('#productTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo site_url('products/get_data'); ?>",
            "type": "POST",
            "data": function(d) {
                // Kirim data filter ke server, termasuk tanggal
                d.filters = {
                    name: $('#name').val(),
                    category: $('#category').val(),
                    min_price: $('#min_price').val(),
                    max_price: $('#max_price').val(),
                    start_date: $('#start_date').val(), // Tambahkan ini
                    end_date: $('#end_date').val() // Tambahkan ini
                };
            }
        },
    });

    // Event listener untuk tombol filter
    $('#filterButton').click(function() {
        productTable.ajax.reload();
    });

    // Event listener untuk tombol reset
    $('#resetButton').click(function() {
        $('#filterForm')[0].reset();
        productTable.ajax.reload();
    });
});
</script>