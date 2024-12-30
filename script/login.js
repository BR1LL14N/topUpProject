document.addEventListener("DOMContentLoaded", () => {
    const dynamicImage = document.getElementById("dynamicImage");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    const defaultImage = "./image/cek2.jpg"; // Gambar awal
    const typingImage = "./image/cek.gif"; // Gambar ketika mengetik

    let typingTimer; // Timer untuk mendeteksi saat berhenti mengetik
    const doneTypingInterval = 320; // Delay setelah pengguna berhenti mengetik (0.2 detik)
    let isTyping = false; // Menandakan apakah pengguna sedang mengetik

    function updateImage() {
        // Jika belum pernah mengganti gambar menjadi gif
        if (!isTyping) {
            dynamicImage.src = typingImage;
            isTyping = true; // Tandai bahwa gambar sudah diubah
        }

        // Clear timer sebelumnya
        clearTimeout(typingTimer);

        // Set timer baru, yang akan mengembalikan gambar setelah delay
        typingTimer = setTimeout(() => {
            dynamicImage.src = defaultImage; // Kembalikan gambar ke defaultImage setelah berhenti mengetik
            isTyping = false; // Reset status mengetik
        }, doneTypingInterval);
    }

    // Event listener untuk keyup pada kedua input
    emailInput.addEventListener("keyup", updateImage);
    passwordInput.addEventListener("keyup", updateImage);

    console.log("ready");
    document.getElementById("togglePassword").addEventListener("click", function () {
        const passwordField = document.getElementById("password");
        const eyeOpen = document.getElementById("eyeOpen");
        const eyeSlash = document.getElementById("eyeSlash");

        if (passwordField.type === "password") {
            passwordField.type = "text";  // Show the password
            eyeOpen.classList.remove("hidden"); // Show open eye
            eyeSlash.classList.add("hidden"); // Hide closed eye
        } else {
            passwordField.type = "password";  // Hide the password
            eyeOpen.classList.add("hidden"); // Hide open eye
            eyeSlash.classList.remove("hidden"); // Show closed eye
        }
    });
});




