<div class="sticky top-0 z-10 bg-slate-100 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <nav class="flex items-center justify-between py-3">
            <!-- Logo dan Menu lainnya di sini jika perlu -->

            <!-- Search Bar untuk Mode Desktop dan Mobile -->
            <div class="flex items-center space-x-4 ml-auto relative">
                <!-- Ikon Search (Tampilan Mobile) -->
                <button id="search-icon" class="md:hidden text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>

                <!-- Search Field untuk Tampilan Mobile -->
                <div id="search-bar-mobile" class="hidden relative top-0 left-0 mt-1 flex items-center bg-white border border-gray-300 rounded-lg shadow-md z-20 w-64 ml-2">
                    <input type="text" id="search-field-mobile" placeholder="Search..."
                        class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full pl-10 p-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                </div>

                <!-- Search Field untuk Tampilan Desktop -->
                <div class="hidden md:block ml-auto relative">
                    <div class="relative">
                        <input type="text" id="search-field" placeholder="Search..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-64 pl-10 p-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>





<!-- Search Bar Mobile Toggle JavaScript -->
<script>
   document.getElementById('search-icon').addEventListener('click', function() {
    // Menangkap elemen search field untuk mobile
    const searchFieldMobile = document.getElementById('search-bar-mobile');
    
    // Toggle class hidden untuk search field mobile
    searchFieldMobile.classList.toggle('hidden');
    
    // Pastikan search field desktop tetap tersembunyi saat di mobile
    const searchFieldDesktop = document.getElementById('search-field');
    if (!searchFieldMobile.classList.contains('hidden')) {
        // Jika search bar mobile tampil, sembunyikan search field desktop
        searchFieldDesktop.classList.add('hidden');
    } else {
        // Jika search bar mobile tidak tampil, pastikan search field desktop tampil
        searchFieldDesktop.classList.remove('hidden');
    }

    // Jika search field muncul di mobile, beri fokus pada inputnya
    if (!searchFieldMobile.classList.contains('hidden')) {
        const searchFieldInput = document.getElementById('search-field-mobile');
        searchFieldInput.focus();  // Memberikan fokus pada input ketika ditampilkan
    }
});






</script>
