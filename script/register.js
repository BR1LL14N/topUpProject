document.addEventListener("DOMContentLoaded", () => {
    const dynamicImage = document.getElementById("dynamicImage");
    const emailInput = document.getElementById("email");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const verifyPasswordInput = document.getElementById("verifyPassword");

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

        // Set timer baru, yang akan mengembalikan gambar setelah berhenti mengetik
        typingTimer = setTimeout(() => {
            dynamicImage.src = defaultImage; // Kembalikan gambar ke defaultImage setelah berhenti mengetik
            isTyping = false; // Reset status mengetik
        }, doneTypingInterval);
    }

    // Event listener untuk keyup pada email, password, dan verifyPassword
    emailInput.addEventListener("keyup", updateImage);
    passwordInput.addEventListener("keyup", updateImage);
    verifyPasswordInput.addEventListener("keyup", updateImage);
    usernameInput.addEventListener("keyup", updateImage);

    // BAGIAN HIDDEN DAN SHOW PASSWORD
    document.getElementById("togglePassword").addEventListener("click", function () {
        const passwordField = document.getElementById("password");
        const eyeOpen = document.getElementById("eyeOpen");
        const eyeSlash = document.getElementById("eyeSlash");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeOpen.classList.remove("hidden");
            eyeSlash.classList.add("hidden");
        } else {
            passwordField.type = "password";
            eyeOpen.classList.add("hidden");
            eyeSlash.classList.remove("hidden");
        }
    });

    document.getElementById("toggleVerifyPassword").addEventListener("click", function () {
        const verifyPasswordField = document.getElementById("verifyPassword");
        const eyeOpenVerify = document.getElementById("eyeOpenVerify");
        const eyeSlashVerify = document.getElementById("eyeSlashVerify");

        if (verifyPasswordField.type === "password") {
            verifyPasswordField.type = "text";
            eyeOpenVerify.classList.remove("hidden");
            eyeSlashVerify.classList.add("hidden");
        } else {
            verifyPasswordField.type = "password";
            eyeOpenVerify.classList.add("hidden");
            eyeSlashVerify.classList.remove("hidden");
        }
    });

    // Validasi Password dan Verify Password
    document.getElementById("registerForm").addEventListener("submit", function (e) {
        if (passwordInput.value !== verifyPasswordInput.value) {
            alert("Password dan Konfirmasi Password tidak cocok!");
            e.preventDefault(); // Mencegah form untuk dikirim
        }
    });
});
