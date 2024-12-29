document.addEventListener("DOMContentLoaded", () => {
    console.log("transactionClient.js berhasil terpanggil!"); // Debug untuk memastikan file JS terpanggil

    const items = document.querySelectorAll(".client-game-card");
    const paymentOptions = document.querySelectorAll(".payment-option");

    let selectedItem = null;
    let selectedPayment = null;

    // Debugging jumlah elemen yang ditemukan
    console.log(`Jumlah item ditemukan: ${items.length}`);
    console.log(`Jumlah metode pembayaran ditemukan: ${paymentOptions.length}`);

    // Item selection logic
    items.forEach((item, index) => {
        console.log(`Item ke-${index + 1}:`, item); // Debugging setiap item
        item.addEventListener("click", () => {
            if (selectedItem) selectedItem.classList.remove("border-blue-500");
            selectedItem = item;
            selectedItem.classList.add("border-blue-500");
            console.log(`Item yang dipilih: ${selectedItem.textContent.trim()}`); // Debug pilihan item
        });
    });

    // Payment selection logic
    paymentOptions.forEach((option, index) => {
        console.log(`Metode pembayaran ke-${index + 1}:`, option); // Debugging setiap metode pembayaran
        option.addEventListener("click", () => {
            if (selectedPayment) selectedPayment.classList.remove("border-blue-500");
            selectedPayment = option;
            selectedPayment.classList.add("border-blue-500");
            console.log(`Metode pembayaran yang dipilih: ${selectedPayment.dataset.method}`); // Debug pilihan metode pembayaran
            document.getElementById("selected_payment_method").value = selectedPayment.dataset.method;
        });
    });
});
