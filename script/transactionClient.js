document.addEventListener("DOMContentLoaded", () => {
    console.log("transactionClient.js berhasil terpanggil!");

    // Seleksi elemen yang relevan
    const items = document.querySelectorAll(".client-game-card");
    const paymentOptions = document.querySelectorAll(".payment-option");
    const itemQuantityInput = document.getElementById("item_quantity");
    const selectedItemInput = document.getElementById("selected_item_id");
    const selectedPaymentInput = document.getElementById("selected_payment_method");
    const form = document.querySelector("form");

    let selectedItem = null;
    let selectedPayment = null;

    // Fungsi untuk menangani pemilihan item
    const handleItemSelection = (item) => {
        if (selectedItem) selectedItem.classList.remove("border-blue-500");
        selectedItem = item;
        selectedItem.classList.add("border-blue-500");
        selectedItemInput.value = item.dataset.itemId;
    };

    // Fungsi untuk menangani pemilihan metode pembayaran
    const handlePaymentSelection = (option) => {
        if (selectedPayment) selectedPayment.classList.remove("border-blue-500");
        selectedPayment = option;
        selectedPayment.classList.add("border-blue-500");
        selectedPaymentInput.value = option.dataset.method;
    };

    // Tambahkan event listener ke setiap item
    items.forEach((item) => {
        item.addEventListener("click", () => handleItemSelection(item));
    });

    // Tambahkan event listener ke setiap metode pembayaran
    paymentOptions.forEach((option) => {
        option.addEventListener("click", () => handlePaymentSelection(option));
    });

    // Validasi form saat submit
    form.addEventListener("submit", (e) => {
        const itemQuantity = itemQuantityInput.value.trim();
        const itemId = selectedItemInput.value;
        const paymentMethod = selectedPaymentInput.value;

        if (!itemId) {
            e.preventDefault();
            alert("Pilih item terlebih dahulu!");
            return;
        }

        if (!paymentMethod) {
            e.preventDefault();
            alert("Pilih metode pembayaran terlebih dahulu!");
            return;
        }

        if (!itemQuantity || itemQuantity <= 0) {
            e.preventDefault();
            alert("Masukkan jumlah item yang valid!");
            return;
        }

        console.log("Form valid dan siap dikirim!");
    });
});
