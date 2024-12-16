<?php
require_once './model/itemModel.php';

class itemController {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "webgame");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function handleRequest($fitur) {
        switch ($fitur) {
            case 'add':
                // $this->addItem($_POST);
                break;
            case 'update':
                // $this->updateItem($_POST);
                break;
            case 'delete':
                // $this->deleteItem($_POST);
                break;
            case 'display':
                $this->displayItem($_GET['gameID'] ?? null);
                break;
            default:
                echo "Fitur tidak valid.";
                break;
        }
    }

    public function displayItem($gameID = null) {
        $itemModel = new itemModel($this->conn);
        $result = $itemModel->displayItem($gameID);

        if (!$result) {
            // Tampilkan pesan error jika query gagal
            echo "Error: " . mysqli_error($this->conn);
            return;
        }

        // Ambil data hasil query ke dalam array
        $items = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }


        // Sertakan view untuk menampilkan data
        include './views/displayDetailItemAdmin.php';
    }

    public function addItem($data) {
        // Validasi input
        if (empty($data['itemName']) || empty($data['itemDescription']) || empty($data['itemIcon']) || empty($data['gameID']) || empty($data['itemPrice'])) {
            echo "Error: Semua data harus diisi.";
            return;
        }
    
        // Panggil model untuk menyimpan data
        $itemModel = new itemModel($this->conn);
        $insertId = $itemModel->addItemToDb(
            $data['itemName'],
            $data['itemDescription'],
            $data['itemIcon'],
            $data['gameID'],
            $data['itemPrice']
        );
    
        // Handle hasil dari model
        if ($insertId) {
            echo "Item berhasil ditambahkan dengan ID: $insertId";
        } else {
            echo "Error: Gagal menambahkan item. " . mysqli_error($this->conn);
        }
    }

    public function uploadimg() {
        // Ambil Semua Elemen Yang Diperlukan Dari $_FILES
        $namafile = $_FILES['item_icon']['name'];
        $ukuran = $_FILES['item_icon']['size'];
        $error = $_FILES['item_icon']['error'];
        $tmpimg = $_FILES['item_icon']['tmp_name'];

        // Pengecekan Apakah User Sudah Memasukkan Gambar Atau Tidak
        if ($error === 4) {
            echo "<script>
                alert('Silahkan Upload Gambar Terlebih Dahulu');
            </script>";
            return false;
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
    
}
?>
