// Ambil semua tombol yang memiliki atribut data-modal-toggle
document.querySelectorAll('button[data-modal-toggle="default-modal"]').forEach(button => {
    button.addEventListener('click', function() {
        // Ambil data dari atribut data-*
        const emailGame = this.getAttribute('data-email_game');
        const passGame = this.getAttribute('data-pass_game');
        const idGame = this.getAttribute('data-id_game');
        const nicknameGame = this.getAttribute('data-nickname_game');
        const levelGame = this.getAttribute('data-level_game');
        const server = this.getAttribute('data-server');
        const envoice = this.getAttribute('data-envoice');
    
        // Isi data ke dalam modal
        document.getElementById('game-email').textContent = emailGame;
        document.getElementById('game-pass').textContent = passGame;
        document.getElementById('game-id').textContent = idGame;
        document.getElementById('game-nickname').textContent = nicknameGame;
        document.getElementById('game-level').textContent = levelGame;
        document.getElementById('game-server').textContent = server;
        document.getElementById('game-envoice').textContent = envoice;
    
        // Tampilkan modal
        document.getElementById('default-modal').classList.remove('hidden');
    });
});

// Ambil tombol Close dan Cancel untuk menutup modal
document.querySelectorAll('[data-modal-hide="default-modal"]').forEach(button => {
    button.addEventListener('click', function() {
        // Sembunyikan modal
        document.getElementById('default-modal').classList.add('hidden');
    });
});
