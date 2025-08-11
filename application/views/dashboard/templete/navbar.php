        <header class="bg-white shadow-md p-6 flex justify-between items-center">
            <button id="mobile-menu-button" class="lg:hidden text-gray-800 focus:outline-none">
                <i class="fa-solid fa-bars h-6 w-6"></i>
            </button>
            <h2 class="text-2xl font-bold text-gray-800"></h2>
            <div class="flex items-center">
                <span class="text-gray-600 hidden md:block mr-4"></span>
                <a href="#" class="flex items-center text-gray-800 hover:text-blue-500">
                    <img src="https://i.pravatar.cc/300" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                    <span class="hidden sm:block"><?php echo $this->session->userdata('nama') ?></span>
                </a>
            </div>
        </header>