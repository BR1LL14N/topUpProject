<?php
require_once './model/gameModel.php';

class gameController {
    private $conn;


    public function handleRequest($fitur){
        $gameID = $_GET['gameID'] ?? null;

        switch ($fitur) {
            case 'add':
                $this->addGame($_POST);
                break;
            case 'update':
                $this->updateGame($_POST);
                break;
            case 'deleteRequest':
                $this->confirmedDelete($gameID);
                break;
            case 'delete':
                $this->deleteGame($gameID);
                break;
            case 'requestUpdate':
                $this->requestUpdate($gameID);
                break;
            case 'display':
                // DIKARENAKAN LANGSUNG DIBUANG DI DISPLAY MAKKA METHOD
                // DISPLAY LAHH YANG AKAN MENG REDIRECT NYA KE LAMAN VIEWS DISPLAY 
                $this->displayGame();
                break;
            default:
                echo "Fitur tidak valid.";

                break;
        }
    }
    // Konstruktor untuk membuat koneksi ke database
    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "webgame");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Method untuk menambah game
    public function addGame($data) {
        $gameName = $data['game_name'];
        $gameDescription = $data['game_description'];
        $releaseDate = $data['release_date'];
        $gameIcon = $this->uploadimg();
    
        if (!$gameIcon) {
            echo "Error: Gambar tidak valid atau gagal diupload.";
            return;
        }
    
        $gameModel = new gameModel($this->conn);
        $result = $gameModel->addGameToDb($gameName, $gameDescription, $releaseDate, $gameIcon);
    
        // Chek nilai yang dikembailikan
        if ($result['success']) {
            header("Location: index.php?modul=gameAndItem&fitur=display");
            echo "<script>alert('Game berhasil ditambahkan!');</script>";
        } else {
            echo "Error: " . $result['error'];
        }
    }

    // Method untuk meng-handle upload gambar
    public function uploadimg() {
        // Ambil Semua Elemen Yang Diperlukan Dari $_FILES
        $namafile = $_FILES['game_icon']['name'];
        $ukuran = $_FILES['game_icon']['size'];
        $error = $_FILES['game_icon']['error'];
        $tmpimg = $_FILES['game_icon']['tmp_name'];

        // Pengecekan Apakah User Sudah Memasukkan Gambar Atau Tidak
        if ($error === 4) {
            // echo "<script>
            //     alert('Silahkan Upload Gambar Terlebih Dahulu');
            // </script>";
            return null;
        }

        // Pengecakan Apakah File Yang Upload Oleh User Merupakan File Gambar
        $kategoriIMGvalid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // Cek apakah ekstensi gambar valid
        if (!in_array($ekstensiGambar, $kategoriIMGvalid)) {
            echo "<script>
                    alert('File Yang Anda Upload Bukan Gambar');
                </script>";
            return false;
        }

        // Cek ukuran gambar
        if ($ukuran > 1000000) {
            echo "<script>
                    alert('Ukuran File Gambar Yang Anda Masukkan Terlalu Besar MAX 1 MB');
                </script>";
            return false;
        }

        // Jika Lolos Semua Seleksi, buat nama file baru
        $namaFilebaru = uniqid();
        $namaFilebaru .= '.' . $ekstensiGambar;

        // Upload gambar
        if (move_uploaded_file($tmpimg, 'src/' . $namaFilebaru)) {
            return $namaFilebaru;
        } else {
            echo "<script>
                    alert('Gagal mengupload gambar');
                </script>";
            return false;
        }
    }

    public function displayGame() {
        $gameModel = new gameModel($this->conn);
        $result = $gameModel->displayGame();
        // return $result;
        include './views/displayItemAdmin.php';
    }

    public function searchGameByID($gameId) {
        $gameModel = new gameModel($this->conn);
        $result = $gameModel->searchGameByID($gameId);
        return $result;
    }


    public function updateGame($data) {
        $gameId = $data['gameID'];
        $gameName = $data['game_name'];
        $gameDescription = $data['game_description'];
        $releaseDate = $data['release_date'];
        $gameModel = new gameModel($this->conn);
        $currentGame = $this->searchGameByID($gameId);
        $currentGameIcon = $currentGame['game_icon']; // Gambar lama dari database
        $gameIcon = $this->uploadimg();
    
        if (!$gameIcon) {
            $gameIcon = $currentGameIcon;
        }
    
        $gameModel = new gameModel($this->conn);
        $result = $gameModel->updateGame($gameId, $gameName, $gameDescription, $releaseDate, $gameIcon);
    
        // Chek nilai yang dikembailikan
        if(!$result){
            echo "
            <script>
                alert('Game Gagal diupdate!');
                window.location.href = 'index.php?modul=gameAndItem&fitur=display';
            </script>";
        }
    
        echo "
            <script>
                alert('Game berhasil diupdate!');
                window.location.href = 'index.php?modul=gameAndItem&fitur=display';
            </script>";
    }

    public function requestUpdate($gameId) {
        $result = $this->searchGameByID($gameId);
    
        if ($result) {
            // Kirimkan data game ke formUpdateGame.php
            include './views/formUpdateGame.php';
        } else {
            // Jika game tidak ditemukan, tampilkan pesan error
            echo "Game not found.";
        }
    }

    public function confirmedDelete($gameId) {
        echo "
            <script>
                var confirmed = confirm('Apakah Anda yakin ingin menghapus game ini?');
                if (confirmed) {
                    window.location.href = 'index.php?modul=gameAndItem&fitur=delete&gameID=$gameId';
                } else {
                    window.location.href = 'index.php?modul=gameAndItem&fitur=display';
                }
            </script>";
    }

    public function deleteGame($gameId) {
        $gameModel = new gameModel($this->conn);
        $result = $gameModel->deleteGame($gameId);
        
        if (!$result) {
            echo "<script>
                alert('Game gagal dihapus!');
                window.location.href = 'index.php?modul=gameAndItem&fitur=display';
            </script>";
            return;
        }
        
        echo "<script>
            alert('Game berhasil dihapus!');
            window.location.href = 'index.php?modul=gameAndItem&fitur=display';
        </script>";
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}
?>
