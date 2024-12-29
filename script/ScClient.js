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

// // console.log("transaksi.js dipanggil langsung!"); 
// document.addEventListener("DOMContentLoaded", () => {
//     console.log("transaksi.js berhasil terpanggil!"); // Debug untuk memastikan file JS terpanggil

//     const items = document.querySelectorAll(".client-game-card");
//     const paymentOptions = document.querySelectorAll(".payment-option");
//     const submitButton = document.querySelector("button[type='submit']");
//     const selectedPaymentInput = document.getElementById("selected_payment_method");

//     let selectedItem = null;
//     let selectedPayment = null;

//     // Debugging jumlah elemen yang ditemukan
//     console.log(`Jumlah item ditemukan: ${items.length}`);
//     console.log(`Jumlah metode pembayaran ditemukan: ${paymentOptions.length}`);

//     // Item selection logic
//     items.forEach((item, index) => {
//         console.log(`Item ke-${index + 1}:`, item); // Debugging setiap item
//         item.addEventListener("click", () => {
//             // Jika item sudah dipilih sebelumnya, hilangkan highlight
//             if (selectedItem) selectedItem.classList.remove("border-blue-500");
//             selectedItem = item;
//             selectedItem.classList.add("border-blue-500");
//             console.log(`Item yang dipilih: ${selectedItem.textContent.trim()}`); // Debug pilihan item

//             // Pastikan form hanya bisa disubmit jika item dan metode pembayaran sudah dipilih
//             checkFormValidity();
//         });
//     });

//     // Payment selection logic
//     paymentOptions.forEach((option, index) => {
//         console.log(`Metode pembayaran ke-${index + 1}:`, option); // Debugging setiap metode pembayaran
//         option.addEventListener("click", () => {
//             // Jika metode pembayaran sudah dipilih sebelumnya, hilangkan highlight
//             if (selectedPayment) selectedPayment.classList.remove("border-blue-500");
//             selectedPayment = option;
//             selectedPayment.classList.add("border-blue-500");
//             console.log(`Metode pembayaran yang dipilih: ${selectedPayment.dataset.method}`); // Debug pilihan metode pembayaran
//             selectedPaymentInput.value = selectedPayment.dataset.method;

//             // Pastikan form hanya bisa disubmit jika item dan metode pembayaran sudah dipilih
//             checkFormValidity();
//         });
//     });

//     // Fungsi untuk mengecek apakah form dapat disubmit
//     function checkFormValidity() {
//         if (selectedItem && selectedPayment) {
//             submitButton.disabled = false; // Aktifkan tombol submit jika keduanya dipilih
//         } else {
//             submitButton.disabled = true; // Nonaktifkan tombol submit jika salah satu belum dipilih
//         }
//     }
// });







