<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style/adminSide.css">
    <title>Display Transaction</title>
</head>
<body class="bg-gray-100">

    <!-- Main Container with Flex layout -->
    <div class="flex min-h-screen">

        <!-- SIDEBAR AREA -->
        <aside class="w-64 bg-gray-800 text-white fixed h-full">
            <?php include '/laragon/www/projectAkhir/views/includes/sidebar.php'; ?>
        </aside>
        <!-- END OF SIDEBAR AREA -->

        <!-- MAIN CONTENT AREA -->
        <div class="flex-1 ml-64 p-6">
            <!-- NAVBAR AREA -->
            <?php include '/laragon/www/projectAkhir/views/includes/navbar.php'; ?>
            <!-- END OF NAVBAR AREA -->

            <div class="flex justify-start mb-1 mt-2">
                <a href="./views/formNewPayment.php?paymentID=<?= isset($_GET['paymentID']) ? $_GET['paymentID'] : ''?>" class="inline-block px-3 py-3 bg-violet-700 text-white font-semibold text-lg rounded-md hover:bg-violet-500 transition duration-300 ease-in-out">
                    New Payment Method
                </a>
            </div>
            <!-- CONTENT AREA -->

            <!-- BAGIAN TAMBAH PAYMENT METHOD -->
            <div class="mt-5 flex flex-col items-center">
                <!-- Container Judul -->
                <div class="game-cards-container my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 items-center">
                <?php if (empty($result)): ?>
                    <p class="text-center text-gray-600">Item not found</p>
                <?php endif; ?>

                    <?php foreach ($result as $row) : ?>
                        <div class="relative group game-card bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
                            <!-- Ikon Delete di Pojok Kiri Atas -->
                            <a href="./index.php?paymentID=<?php echo $row['payment_id']; ?>&modul=paymentMethod&fitur=requestDelete" 
                            class="absolute top-2 left-2 text-red-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>

                            <!-- Ikon Edit di Pojok Kanan Atas -->
                            <a href="./index.php?paymentID=<?php echo $row['payment_id']; ?>&modul=paymentMethod&fitur=requestUpdate" 
                            class="absolute top-2 right-2 text-violet-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:text-violet-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 013.536 3.536L7.5 20.5H4v-3.5L16.732 3.732z" />
                                </svg>
                            </a>

                            <!-- Gambar Game -->
                            <a href="index.php?gameID=<?php echo $row['payment_id']; ?>&modul=itemGame&fitur=display">
                                <img 
                                    src="./src/<?php echo htmlspecialchars($row['payment_icon']); ?>" 
                                    alt="<?php echo htmlspecialchars($row['payment_name']); ?>" 
                                    class="game-icon w-24 h-24 object-cover mb-4"
                                >
                            </a>

                            <!-- Informasi Game -->
                            <div class="game-info text-center">
                                <h3 class="game-name text-lg font-semibold text-gray-800 mb-2">
                                    <?php echo htmlspecialchars($row['payment_name']); ?>
                                </h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- BAGIAN AKHIR TAMBAH PAYMENT METHOD -->

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                        <thead class="text-xs uppercase bg-violet-500 dark:bg-violet-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">Username</th>
                                <th scope="col" class="px-6 py-3">Produk yang Dipesan</th>
                                <th scope="col" class="px-6 py-3">Metode Pembayaran</th>
                                <th scope="col" class="px-6 py-3">Status Pesanan</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($resultTransaction)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-gray-600">Transaction not found</td>
                                </tr>
                            <?php endif; ?>

                            <?php foreach ($resultTransaction['data'] as $row): ?>
                                <form method="POST" action="index.php?modul=transaction&fitur=update">
                                    <tr class="bg-white border-b text-gray-900 border-gray-200">
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                                            <?php echo $row['username']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['item_name']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['payment_method']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <!-- Mengirimkan transaksi_id dan status untuk tiap baris -->
                                            <input type="hidden" name="transaksi_id" value="<?php echo $row['transaksi_id']; ?>">
                                            <select name="status" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5">
                                                <option value="diproses" <?php echo $row['status'] === 'diproses' ? 'selected' : ''; ?>>Diproses</option>
                                                <option value="berhasil" <?php echo $row['status'] === 'berhasil' ? 'selected' : ''; ?>>Berhasil</option>
                                                <option value="gagal" <?php echo $row['status'] === 'gagal' ? 'selected' : ''; ?>>Gagal</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 flex items-center gap-2">
                                            <!-- Tombol Update mengirimkan transaksi_id dan status yang relevan -->
                                            <button type="submit" name="update_row" value="update" class="text-white bg-violet-500 hover:bg-violet-600 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Update
                                            </button>
                                            <button type="button" class="text-white bg-violet-500 hover:bg-violet-600 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                data-modal-target="default-modal"
                                                data-modal-toggle="default-modal"
                                                data-email_game="<?php echo $row['email_game']; ?>"
                                                data-pass_game="<?php echo $row['pass_game']; ?>"
                                                data-id_game="<?php echo $row['id_game']; ?>"
                                                data-nickname_game="<?php echo $row['nickname_game']; ?>"
                                                data-level_game="<?php echo $row['level_game']; ?>"
                                                data-server="<?php echo $row['server']; ?>"
                                                data-envoice="<?php echo $row['envoice']; ?>">
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                
            </div>

            <!-- Modal -->
            <div id="default-modal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:size-10">
                                        <svg class="size-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold text-gray-900" id="modal-title">Detail Game User:</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to view the details of this game? Here is the detailed information.</p>
                                            <div class="mt-4">
                                                <p class="text-sm text-gray-500">Email Game: <span id="game-email">john.doe@example.com</span></p>
                                                <p class="text-sm text-gray-500">Password Game: <span id="game-pass">******</span></p>
                                                <p class="text-sm text-gray-500">ID Game: <span id="game-id">12345</span></p>
                                                <p class="text-sm text-gray-500">Nickname: <span id="game-nickname">JohnDoe123</span></p>
                                                <p class="text-sm text-gray-500">Level: <span id="game-level">10</span></p>
                                                <p class="text-sm text-gray-500">Server: <span id="game-server">Server 1</span></p>
                                                <p class="text-sm text-gray-500">Envoice: <span id="game-envoice">Paid</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto" data-modal-hide="default-modal">Close</button>
                                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" data-modal-hide="default-modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
        <!-- END OF MAIN CONTENT AREA -->
        
    <!-- END OF MAIN CONTAINER -->

    <!-- Flowbite JS -->
    <!-- <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script> -->
    <script src="./script/displayTransactionsModal.js"></script>
</body>
</html>