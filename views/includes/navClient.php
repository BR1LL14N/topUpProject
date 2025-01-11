<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopUpGim - Modern Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        #page-header-search {
            transition: transform 0.3s ease-in-out;
            transform: translateY(-100%);
        }
        #page-header-search.active {
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-blue-50">
    <header class="bg-white shadow-lg fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto px-4">
            <div class="navbar bg-white">
                <div class="navbar-start">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                        </label>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="indexClient.php?modul=dashboard">Home</a></li>
                            <li>
                                <a>Referral</a>
                                <ul class="p-2">
                                    <li><a href="/page/referral">Untuk Kamu</a></li>
                                    <li><a href="https://t.me/topupgimcom" target="_blank">Untuk Influencer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a>Pesanan</a>
                                <ul class="p-2">
                                    <li><a href="indexClient.php?modul=purchase&fitur=list">Riwayat Pesanan</a></li>
                                    <li><a href="indexClient.php?modul=purchase&fitur=status">Cek Status Pesanan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a>Akun Saya</a>
                                <ul class="p-2">
                                    <li><a href="indexClient.php?modul=auth&fitur=logout">Log Out</a></li>
                                    <li><a href="indexClient.php?modul=auth&fitur=profile">Profil</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <a href="/" class="btn btn-ghost normal-case text-xl">
                        <span class="text-primary">TopUp</span><span class="text-secondary">Gim</span>
                    </a>
                </div>
                <div class="navbar-end">
                    <button class="btn btn-ghost btn-circle" id="search-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div id="page-header-search" class="fixed top-0 left-0 w-full bg-white z-50 shadow-lg">
        <div class="container mx-auto p-4">
            <form class="flex" action="/search" method="GET">
                <input type="text" placeholder="Pencarian game..." class="input input-bordered w-full" minlength="4" id="product-search-keyword" name="keyword" required>
                <button type="button" class="btn btn-square btn-error ml-2" id="close-search">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </form>
        </div>
    </div>

    <script>
        const searchToggle = document.getElementById('search-toggle');
        const closeSearch = document.getElementById('close-search');
        const searchBar = document.getElementById('page-header-search');
        const searchInput = document.getElementById('product-search-keyword');

        searchToggle.addEventListener('click', () => {
            searchBar.classList.add('active');
            searchInput.focus();
        });

        closeSearch.addEventListener('click', () => {
            searchBar.classList.remove('active');
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                searchBar.classList.remove('active');
            }
        });
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#3B82F6',
                        'secondary': '#10B981',
                        'accent': '#F59E0B',
                    }
                }
            }
        }
    </script>
</body>
</html>
