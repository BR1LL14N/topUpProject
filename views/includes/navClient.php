<header class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-4 flex items-center justify-between py-4">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img src="path-to-logo.png" alt="Logo Topupgim" class="w-10 h-10">
            <a href="/" class="text-xl font-bold text-gray-900">
                <span class="text-blue-600">TopUp</span><span class="text-green-500">Gim</span>
            </a>
        </div>
        <!-- END Logo -->

        <!-- Navigation Menu -->
        <nav class="hidden lg:flex space-x-4">
            <a href="/featured/pricings" class="text-gray-600 hover:text-blue-600 hover:bg-indigo-100 hover:rounded p-2 flex items-center">Daftar Harga</a>
            
            <!-- Dropdown Referral -->
            <div class="relative">
                <button data-dropdown="referral-menu" class="dropdown-button flex items-center text-gray-600 hover:text-blue-600 hover:bg-indigo-100 hover:rounded focus:outline-none p-2">
                    <span>Referral</span>
                    <i class="fa fa-chevron-down"></i>
                </button>
                <ul id="referral-menu" class="dropdown-menu hidden absolute bg-white border rounded-md shadow-md mt-2 z-50">
                    <li><a href="/page/referral" class="block px-4 py-2 hover:bg-gray-100 whitespace-nowrap">Untuk Kamu</a></li>
                    <li><a href="https://t.me/topupgimcom" target="_blank" class="block px-4 py-2 hover:bg-gray-100 whitespace-nowrap">Untuk Influencer</a></li>
                </ul>
            </div>

            <!-- Dropdown Pesanan -->
            <div class="relative">
                <button data-dropdown="pesanan-menu" class="dropdown-button flex items-center text-gray-600 hover:text-blue-600 hover:bg-indigo-100 hover:rounded focus:outline-none p-2">
                    <span>Pesanan</span>
                    <i class="fa fa-chevron-down"></i>
                </button>
                <ul id="pesanan-menu" class="dropdown-menu hidden absolute bg-white border rounded-md shadow-md mt-2 z-50">
                    <li><a href="/purchase/order-history" class="block px-4 py-2 hover:bg-gray-100 whitespace-nowrap">Belum Bayar</a></li>
                    <li><a href="/purchase/recents" class="block px-4 py-2 hover:bg-gray-100 whitespace-nowrap">Riwayat Pesanan</a></li>
                    <li><a href="/purchase/order-status" class="block px-4 py-2 hover:bg-gray-100 whitespace-nowrap">Cek Status Pesanan</a></li>
                </ul>
            </div>

            <!-- Dropdown Akun Saya -->
            <div class="relative">
                <button data-dropdown="akun-menu" class="dropdown-button flex items-center text-gray-600 hover:text-blue-600 hover:bg-indigo-100 hover:rounded focus:outline-none p-2">
                    <span>Akun Saya</span>
                    <i class="fa fa-chevron-down"></i>
                </button>
                <ul id="akun-menu" class="dropdown-menu hidden absolute bg-white border rounded-md shadow-md mt-2 z-50">
                    <li><a href="/auth/sign-in" class="block px-4 py-2 hover:bg-gray-100 whitespace-nowrap">Login</a></li>
                    <li><a href="/auth/register" class="block px-4 py-2 hover:bg-gray-100 whitespace-nowrap">Regiter</a></li>
                    <li><a href="/member/account/details" class="block px-4 py-2 hover:bg-gray-100">Profil</a></li>
                </ul>
            </div>

            <!-- Search -->
            <!-- Tombol Search -->
            <button 
                type="button" 
                class="btn btn-alt-secondary flex items-center justify-center p-2 rounded-md hover:bg-gray-200" 
                id="search-toggle"
            >
                <!-- Ikon SVG untuk Pencarian -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>

            <!-- Search Bar (Awalnya tersembunyi) -->
            <div id="page-header-search" class="hidden fixed top-0 left-0 w-full bg-white z-50 shadow-md">
                <div class="container mx-auto p-4">
                    <form class="w-full flex items-center" action="/search" method="GET">
                        <input 
                            type="text" 
                            class="flex-grow px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            minlength="4" 
                            placeholder="Pencarian game..." 
                            id="product-search-keyword" 
                            name="keyword" 
                            required>
                        <button 
                            type="button" 
                            class="px-4 py-2 bg-red-500 text-white rounded-r-md hover:bg-red-600 focus:outline-none" 
                            id="close-search"
                        >
                            <!-- Ikon Tutup dengan SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>


        </nav>
        <!-- END Navigation Menu -->

        <!-- Mobile Menu Button -->
        <button class="lg:hidden flex items-center text-gray-600 hover:text-blue-600">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
</header>
