<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/clienSide.css">

    <title>Dashboard</title>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white">
    <div class="container mx-auto px-4 py-6">
        <h4 class="text-3xl font-bold text-center text-blue-700 mb-8">Items and Packages</h4>

        <!-- Items and Packages Section -->
        <div class="client-game-cards-container my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <?php if (empty($result)): ?>
                <p class="text-center text-gray-600">Item not found</p>
            <?php endif; ?>
            <?php foreach ($result as $row): ?>
                <div 
                    class="client-game-card border border-blue-300 shadow-lg rounded-lg p-4 text-center cursor-pointer hover:shadow-xl hover:border-blue-500 transition-all duration-300 transform hover:scale-105"
                    data-item-id="<?php echo $row['item_id']; ?>">
                    <img 
                        src="./src/<?php echo htmlspecialchars($row['item_icon']); ?>" 
                        alt="<?php echo htmlspecialchars($row['item_name']); ?>" 
                        class="client-game-icon w-24 h-24 object-cover mx-auto mb-4"
                    >
                    <div class="client-game-info">
                        <h3 class="client-game-name text-lg font-semibold text-gray-800 mb-2">
                            <?php echo htmlspecialchars($row['item_name']); ?>
                        </h3>
                        <div class="client-game-price text-sm font-medium text-gray-600">
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
                <input 
                    type="number" 
                    id="item_quantity" 
                    name="item_quantity" 
                    class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                    placeholder="Masukkan jumlah item" 
                    min="1" 
                    required>
            </div>
        </section>

        <!-- Metode Pembayaran -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilih Metode Pembayaran</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <?php if(empty($payment)): ?>
                    <p class="text-center text-gray-600">Payment not found</p>
                <?php else: ?>
                    <?php foreach ($payment as $row): ?>
                        <div 
                            class="payment-option border border-blue-300 shadow-lg rounded-lg p-4 text-center cursor-pointer hover:shadow-xl hover:border-blue-500 transition-all transform hover:scale-105"
                            data-method="<?php echo $row['payment_name']; ?>">
                            <img 
                                src="./src/<?php echo $row['payment_icon']; ?>" 
                                alt="<?php echo $row['payment_name']; ?>" 
                                class="w-12 h-12 mx-auto mb-2"
                            >
                            <span class="text-gray-700 font-medium"><?php echo $row['payment_name']; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <!-- Detail Akun -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Akun Top-Up</h2>
            <form action="process_transaction.php" method="POST">
                <!-- Hidden input for selected payment method -->
                <input type="hidden" id="selected_payment_method" name="payment_method">            
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                            placeholder="Masukkan email" 
                            required>
                    </div>
                    <div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                            placeholder="Masukkan password" 
                            required>
                    </div>
                </div>
                <button 
                    type="submit" 
                    class="mt-6 w-full bg-gradient-to-r from-blue-400 to-blue-600 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-gradient-to-l focus:ring-4 focus:ring-blue-300">
                    Submit Transaksi
                </button>
            </form>
        </section>
    </div>

<!-- Flowbite JS -->
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="./script/transactionClient.js"></script>   

</body>

</html>
