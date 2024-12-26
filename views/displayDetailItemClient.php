<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../style/clientSide.css">
    <script src="./script/ScClient.js" defer></script>   

    <title>Dashboard</title>
</head>
<body class="bg-gray-100">
    <?php include './views/includes/navClient.php' ?>

    <!-- Main Container -->
    <div class="container mx-auto px-4 py-6">
        <h4 class="text-2xl font-bold text-center mb-8">Items And Packages</h4>

        <!-- Items and Packages Section -->
        <div class="game-cards-container my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <?php if (empty($result)): ?>
                <p class="text-center text-gray-600">Item not found</p>
            <?php endif; ?>
            <?php foreach ($result as $row): ?>
                <div 
                    class="game-card border border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500" 
                    data-item-id="<?php echo $row['item_id']; ?>">
                    <img 
                        src="./src/<?php echo htmlspecialchars($row['item_icon']); ?>" 
                        alt="<?php echo htmlspecialchars($row['item_name']); ?>" 
                        class="game-icon w-24 h-24 object-cover mx-auto mb-4"
                    >
                    <div class="game-info">
                        <h3 class="game-name text-lg font-semibold text-gray-800 mb-2">
                            <?php echo htmlspecialchars($row['item_name']); ?>
                        </h3>
                        <div class="game-price text-sm font-medium text-gray-600">
                            <?php echo 'Rp ' . number_format($row['item_price'], 0, ',', '.'); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Jumlah Item -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Jumlah Item</h2>
            <div>
                <label for="item_quantity" class="block text-gray-600 mb-2">Masukkan jumlah item yang ingin dibeli:</label>
                <input 
                    type="number" 
                    id="item_quantity" 
                    name="item_quantity" 
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Masukkan jumlah item" 
                    min="1" 
                    required>
            </div>
        </section>

        <!-- Metode Pembayaran -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilih Metode Pembayaran</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Metode Pembayaran -->
                <div 
                    class="payment-option border border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500" 
                    data-method="gopay">
                    <img src="path/to/gopay_logo.png" alt="GoPay" class="w-12 h-12 mx-auto mb-2">
                    <span class="text-gray-700 font-medium">GoPay</span>
                </div>
                <div 
                    class="payment-option border border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500" 
                    data-method="dana">
                    <img src="path/to/dana_logo.png" alt="Dana" class="w-12 h-12 mx-auto mb-2">
                    <span class="text-gray-700 font-medium">Dana</span>
                </div>
                <div 
                    class="payment-option border border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500" 
                    data-method="ovo">
                    <img src="path/to/ovo_logo.png" alt="OVO" class="w-12 h-12 mx-auto mb-2">
                    <span class="text-gray-700 font-medium">OVO</span>
                </div>
                <div 
                    class="payment-option border border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500" 
                    data-method="bank_transfer">
                    <img src="path/to/bank_logo.png" alt="Bank Transfer" class="w-12 h-12 mx-auto mb-2">
                    <span class="text-gray-700 font-medium">Transfer Bank</span>
                </div>
            </div>
            <input type="hidden" id="selected_payment_method" name="payment_method">
        </section>

        <!-- Detail Akun -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Akun Top-Up</h2>
            <form action="process_transaction.php" method="POST">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-gray-600 mb-2">Email:</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            placeholder="Masukkan email" 
                            required>
                    </div>
                    <div>
                        <label for="password" class="block text-gray-600 mb-2">Password:</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            placeholder="Masukkan password" 
                            required>
                    </div>
                </div>
                <!-- Tombol Submit -->
                <button 
                    type="submit" 
                    class="mt-6 w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                    Submit Transaksi
                </button>
            </form>
        </section>
    </div>

    <!-- Flowbite JS -->
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
