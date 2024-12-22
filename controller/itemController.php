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

    public function handleRequest($fitur,  $gameID = null, $itemID = null) {
        
        switch ($fitur) {
            case 'add':
                if($gameID != null){
                    $this->addItem($_POST);
                }
                break;
            case 'requestUpdate':
                $this->requestUpdate($itemID);
                break;
            case 'delete':
                $this->deleteItem($itemID);
                break;
            case 'update':
                $this->updateItem($_POST);
                break;
            case 'requestDelete':
                $this->confirmedDelete($itemID);
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
        // var_dump($data);
        // var_dump($gameID);

        // Validasi input
        // if (empty($data['item_name']) || empty($data['item_description']) || empty($data['item_icon']) || empty($data['game_id']) || empty($data['price'])) {
        //     echo "<script>alert('Semua field harus diisi!');</script>";
        //     header("Location: index.php?modul=itemGame&fitur=display");
        //     return;
        // }
        
        $namaItem = $data['item_name'];
        $deskripsiItem = $data['item_description'];
        $iconItem = $this->uploadimg();
        $gameID = $data['gameID'];
        $hargaItem = $data['price'];

        // Panggil model untuk menyimpan data
        $itemModel = new itemModel($this->conn);
        $insertId = $itemModel->addItemToDb($gameID,$namaItem,$hargaItem,$deskripsiItem,$iconItem);
    
        // Handle hasil dari model
        if ($insertId) {
            echo "<script>
                alert('Item Game berhasil ditambahkan!');
                window.location.href = 'index.php?modul=itemGame&fitur=display&gameID=$gameID';
            </script>";
            exit;
        } else {
            $err = mysqli_error($this->conn);
            header("Location: index.php?modul=itemGame&fitur=display");
            echo "<script>alert('Item Game gagal ditambahkan!');</script>";
            echo "<script>alert('$err');</script>";
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
            // echo "<script>
            //     alert('Silahkan Upload Gambar Terlebih Dahulu');
            // </script>";
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

    public function searchItemByID($itemID){
        $itemModel = new itemModel($this->conn);
        $result = $itemModel->searchItemById($itemID);
        return $result;
    }

    public function requestUpdate($itemID){
        $result = $this->searchItemByID($itemID);

        if ($result) {
            include './views/formUpdateItem.php';
        } else {
            echo "Item tidak ditemukan.";
        }
        
    }

    public function updateItem($data){
        $itemId = $data['itemID'];
        $itemName = $data['item_name'];
        $itemDescription = $data['item_description'];
        $itemIcon = $data['item_icon'];
        $gameID = $data['gameID'];
        $itemPrice = $data['price'];

        $itemModel = new itemModel($this->conn);
        $currentItem = $this->searchItemByID($itemId);
        $currentItemIcon = $currentItem['item_icon']; // Gambar lama dari database
        $itemIcon = $this->uploadimg();

        if ($itemIcon === false) {
            $itemIcon = $currentItemIcon;
        }

        $result = $itemModel->updateItem($itemId, $itemName, $itemDescription, $itemIcon, $gameID, $itemPrice);

        if (!$result) {
            echo "<script>
                alert('Item gagal diupdate!');
                window.location.href = 'index.php?modul=itemGame&fitur=display&gameID=$gameID';
            </script>";
            return;
        }
        echo "<script>
            alert('Item berhasil diupdate!');
            window.location.href = 'index.php?modul=itemGame&fitur=display&gameID=$gameID';
        </script>";
    }

    public function confirmedDelete($itemID) {
        echo "<script>
            var confirmed = confirm('Apakah Anda yakin ingin menghapus item ini?');
            if (confirmed) {
                window.location.href = 'index.php?modul=itemGame&fitur=delete&itemID=$itemID';
            } else {
                window.location.href = 'index.php?modul=itemGame&fitur=display';
            }
        </script>";
    }

    public function deleteItem($itemID) {
        $itemModel = new itemModel($this->conn);
        $result = $itemModel->deleteItem($itemID);
        
        if (!$result) {
            echo "<script>
                alert('Item gagal dihapus!');
                window.location.href = 'index.php?modul=itemGame&fitur=display';
            </script>";
            return;
        }
        
        echo "<script>
            alert('Item berhasil dihapus!');
            window.location.href = 'index.php?modul=itemGame&fitur=display';
        </script>";
    }

    public function __destruct() {
        mysqli_close($this->conn);
    }
    
}
?>
