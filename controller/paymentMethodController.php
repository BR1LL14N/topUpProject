<?php
require_once './model/paymentMethodModel.php';
    class paymentMethodController{
        private $conn;

        public function handleRequest($fitur) {
            $paymentID = $_GET['paymentID'] ?? null;
            switch ($fitur) {
                case 'add':
                    $this->addPayment($_POST);
                    break;
                case 'display':
                    $this->displayPayment();
                    break;
                case 'requestUpdate':
                    $this->requestUpdate($paymentID);
                    break;
                case 'update':
                    $this->updatePayment($_POST);
                    break;
                case 'requestDelete':
                    $this->requestDelete($paymentID);
                    break;
                case 'delete':
                    $this->deletePayment($paymentID);
                    break;
                    default:
                    echo "Fitur tidak valid.";
                    break;
            }
        }



        public function __construct() {
            $this->conn = mysqli_connect("localhost", "root", "", "webgame");
            if (!$this->conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }


        public function uploadimg() {
            // Ambil Semua Elemen Yang Diperlukan Dari $_FILES
            $namafile = $_FILES['payment_icon']['name'];
            $ukuran = $_FILES['payment_icon']['size'];
            $error = $_FILES['payment_icon']['error'];
            $tmpimg = $_FILES['payment_icon']['tmp_name'];
    
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

        public function addPayment($data) {
            $paymentName = $data['payment_name'];
            $paymentIcon = $this->uploadimg();
        
            if (!$paymentIcon) {
                echo "Error: Gambar tidak valid atau gagal diupload.";
                return;
            }
        
            $paymentModel = new paymentMethodModel($this->conn);
            $result = $paymentModel->addPaymentToDb($paymentName, $paymentIcon);
        
            if ($result['success']) {
                header("Location: ./index.php?modul=paymentMethod&fitur=display");
                echo "<script>alert('Payment berhasil ditambahkan!');</script>";
            } else {
                echo "Error: " . $result['error'];
            }
        }

        public function displayPayment() {
            echo "<script>
                console.log('Display Payment');
                </script>";
            $paymentModel = new paymentMethodModel($this->conn);
            $result = $paymentModel->displayPayment();
            // return $result;
            include './views/displayTransactionAdmin.php';


        }

        public function searchPaymentByID($paymentId) {
            $paymentModel = new paymentMethodModel($this->conn);
            $result = $paymentModel->searchPaymentByID($paymentId);
            return $result;
        }

        public function requestUpdate($paymentId) {
            $result = $this->searchPaymentByID($paymentId);

            if ($result) {
                include './views/formUpdatePayment.php';
            } else {
                echo "<script>
                        alert('Data tidak ditemukan');
                    </script>";
            }
        }

        public function updatePayment($data) {
            $paymentId = $data['paymentID'];
            $paymentName = $data['payment_name'];
            $paymentIcon = $this->uploadimg();
            $paymentModel = new paymentMethodModel($this->conn);
            $currentPayment = $this->searchPaymentByID($paymentId);
            $currentPaymentIcon = $currentPayment['payment_icon']; // Gambar lama dari database
        
            if (!$paymentIcon) {
                $paymentIcon = $currentPaymentIcon; // Gambar lama dari database
            }
        
            // $paymentModel = new paymentMethodModel($this->conn);
            $result = $paymentModel->updatePayment($paymentId, $paymentName, $paymentIcon);
        
            if(!$result){
                echo "
                <script>
                    alert('Payment Gagal diupdate!');
                    window.location.href = 'index.php?modul=paymentMethod&fitur=display';
                </script>";
            }
        
            echo "
                <script>
                    alert('Payment berhasil diupdate!');
                    window.location.href = 'index.php?modul=paymentMethod&fitur=display';
                </script>";
        }

        public function requestDelete($paymentId) {
            echo "<script>
                var confirmed = confirm('Apakah Anda yakin ingin menghapus payment ini?');
                if (confirmed) {
                    window.location.href = 'index.php?modul=paymentMethod&fitur=delete&paymentID=$paymentId';
                } else {
                    window.location.href = 'index.php?modul=paymentMethod&fitur=display';
                }";
        }

        public function deletePayment($paymentId) {
            $paymentModel = new paymentMethodModel($this->conn);
            $result = $paymentModel->deletePayment($paymentId);
        
            if ($result) {
                echo "
                <script>
                    alert('Payment berhasil dihapus!');
                    window.location.href = 'index.php?modul=paymentMethod&fitur=display';
                </script>";
            } else {
                echo "
                <script>
                    alert('Payment gagal dihapus!');
                    window.location.href = 'index.php?modul=paymentMethod&fitur=display';
                </script>";
            }
        }

        public function __destruct() {
            if ($this->conn) {
                mysqli_close($this->conn);
            }
        }

    }

?>