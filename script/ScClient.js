// TAMPILAN <DROPDOWN></DROPDOWN>
document.addEventListener("DOMContentLoaded", () => {
    const dropdownButtons = document.querySelectorAll(".dropdown-button");
    const dropdownMenus = document.querySelectorAll(".dropdown-menu");

    // Function to toggle the dropdown menu
    const toggleDropdown = (menuId) => {
        dropdownMenus.forEach((menu) => {
            if (menu.id === menuId) {
                menu.classList.toggle("hidden");
            } else {
                menu.classList.add("hidden"); // Close other dropdowns
            }
        });
    };

    // Add click event to all dropdown buttons
    dropdownButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const menuId = button.getAttribute("data-dropdown");
            toggleDropdown(menuId);
        });
    });

    // Close dropdown if clicked outside
    document.addEventListener("click", (event) => {
        if (!event.target.closest(".relative")) {
            dropdownMenus.forEach((menu) => menu.classList.add("hidden"));
        }
    });
});

// TAMPILAN SEARCH
document.addEventListener("DOMContentLoaded", function () {
    const searchToggle = document.getElementById("search-toggle");
    const searchBar = document.getElementById("page-header-search");
    const closeSearch = document.getElementById("close-search");

    // Tampilkan atau sembunyikan search bar ketika ikon search diklik
    searchToggle.addEventListener("click", function () {
        searchBar.classList.toggle("hidden"); // Toggle visibility dari search bar
    });

    // Menutup search bar ketika tombol close diklik
    closeSearch.addEventListener("click", function () {
        searchBar.classList.add("hidden");
    });
});

// SLIDER KANG
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.carousel-item');
    let currentIndex = 0; // Indeks gambar aktif saat ini
    const totalItems = items.length; // Jumlah total gambar dalam carousel

    // Fungsi untuk memperbarui status gambar
    function updateCarousel() {
        // Reset semua gambar
        items.forEach((item, index) => {
            item.classList.remove('active', 'next', 'prev');
            if (index === currentIndex) {
                item.classList.add('active'); // Gambar aktif
            } else if (index === (currentIndex + 1) % totalItems) {
                item.classList.add('next'); // Gambar berikutnya
            } else if (index === (currentIndex - 1 + totalItems) % totalItems) {
                item.classList.add('prev'); // Gambar sebelumnya
            }
        });
    }

    // Fungsi untuk pindah ke gambar berikutnya
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems; // Perhitungan looping
        updateCarousel();
    }

    // Fungsi untuk pindah ke gambar sebelumnya
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems; // Perhitungan looping
        updateCarousel();
    }

    // Tombol navigasi
    const prevButton = document.querySelector('[data-carousel-prev]');
    const nextButton = document.querySelector('[data-carousel-next]');

    if (prevButton && nextButton) {
        prevButton.addEventListener('click', prevSlide);
        nextButton.addEventListener('click', nextSlide);
    }

    // Atur interval otomatis (opsional)
    const autoSlideInterval = setInterval(nextSlide, 5000); // Pindah setiap 5 detik

    // Hentikan carousel jika user mengklik tombol
    [prevButton, nextButton].forEach((button) => {
        button.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
    });

    // Update carousel untuk pertama kali
    updateCarousel();
});






