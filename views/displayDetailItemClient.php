<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-blue-200 to-white min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h4 class="text-4xl font-bold text-center text-blue-800 mb-10 animate-fadeIn">Items and Packages</h4>

        <form action="index.php?modul=transaction&fitur=addTransaction" method="POST" id="transaction-form" class="space-y-8">
            <input type="hidden" name="userID" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="gameID" value="<?php echo $_GET['gameID']; ?>">
            <input type="hidden" name="status" value="diproses">

            <!-- Items and Packages Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 animate-fadeIn">
                <?php if (empty($result)): ?>
                    <p class="text-center text-gray-600">Item not found</p>
                <?php else: ?>
                    <?php foreach ($result as $row): ?>
                        <label class="relative">
                            <input type="radio" name="item_id" value="<?php echo $row['item_id']; ?>" class="peer hidden" required>
                            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 peer-checked:ring-4 peer-checked:ring-blue-500 cursor-pointer">
                                <figure class="px-6 pt-6">
                                    <img src="./src/<?php echo htmlspecialchars($row['item_icon']); ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>" class="rounded-xl w-24 h-24 object-cover mx-auto" />
                                </figure>
                                <div class="card-body items-center text-center">
                                    <h3 class="card-title text-blue-700"><?php echo htmlspecialchars($row['item_name']); ?></h3>
                                    <p class="text-blue-600 font-semibold"><?php echo 'Rp ' . number_format($row['item_price'], 0, ',', '.'); ?></p>
                                </div>
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Jumlah Item -->
            <div class="form-control w-full max-w-xs mx-auto animate-fadeIn">
                <label class="label">
                    <span class="label-text text-xl font-semibold text-blue-800">Jumlah Item</span>
                </label>
                <input type="number" name="item_quantity" placeholder="Masukkan jumlah item" class="input input-bordered input-primary w-full" min="1" required />
            </div>

            <!-- Metode Pembayaran -->
            <div class="animate-fadeIn">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Pilih Metode Pembayaran</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php if (empty($payment)): ?>
                        <p class="text-center text-gray-600">Payment not found</p>
                    <?php else: ?>
                        <?php foreach ($payment as $row): ?>
                            <label class="relative">
                                <input type="radio" name="payment_method" value="<?php echo $row['payment_name']; ?>" class="peer hidden" required>
                                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 peer-checked:ring-4 peer-checked:ring-blue-500 cursor-pointer">
                                    <figure class="px-4 pt-4">
                                        <img src="./src/<?php echo $row['payment_icon']; ?>" alt="<?php echo $row['payment_name']; ?>" class="w-16 h-16 object-contain" />
                                    </figure>
                                    <div class="card-body items-center text-center p-4">
                                        <p class="font-medium text-blue-700"><?php echo $row['payment_name']; ?></p>
                                    </div>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Detail Akun -->
            <div class="animate-fadeIn">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Detail Akun Top-Up</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="email" name="email" placeholder="Masukkan email" class="input input-bordered input-primary w-full" required>
                    <input type="text" name="password" placeholder="Masukkan password" class="input input-bordered input-primary w-full" required>
                    <input type="text" name="idGame" placeholder="Masukkan ID Game" class="input input-bordered input-primary w-full" required>
                    <input type="text" name="nicknameGame" placeholder="Masukkan nickname game" class="input input-bordered input-primary w-full" required>
                    <input type="text" name="levelGame" placeholder="Masukkan level game" class="input input-bordered input-primary w-full" required>
                    <select name="server" class="select select-primary w-full" required>
                        <option disabled selected>Pilih server</option>
                        <option>Global</option>
                        <option>SEA</option>
                        <option>NA</option>
                        <option>EU</option>
                        <option>LATAM</option>
                        <option>RU</option>
                        <option>CN</option>
                        <option>JP</option>
                        <option>KR</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block text-xl font-bold mt-8 animate-fadeIn hover:animate-pulse">
                Submit Transaksi
            </button>
        </form>
    </div>
</body>
</html>
