<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/clienSide.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
            colors: {
                'accent': '#3b82f6',
            }
            }
        }
        }
    </script>
    </head>
    <body class="bg-gray-100 min-h-screen p-4">
    <?php include 'includes/navClient.php'?>
    <div class="container mx-auto">
        
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
            <!-- Order Cards (Berhasil dan Gagal) -->
            <?php foreach ($resultTransactions as $row): ?>
                <?php if ($row['status'] === 'berhasil' || $row['status'] === 'gagal'): ?>
                    <div class="card bg-white shadow-xl mt-20 hover:shadow-2xl transition-shadow duration-300">
                        <figure class="px-4 pt-4">
                            <div class="w-full h-32 bg-gray-300 rounded-lg overflow-hidden flex items-center justify-center">
                                <!-- Gambar icon mengikuti radius container -->
                                <img src="./src/<?php echo $row['game_icon']; ?>" alt="" class="w-full h-full object-cover">
                            </div>
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-accent">Envoice #<?php echo $row['envoice']; ?></h2>
                            <p>Game: <?php echo $row['game_name']; ?></p>
                            <p>Item: <?php echo $row['item_name']; ?></p>
                            <p>Item Quantity: <?php echo $row['item_quantity']; ?></p>
                            <p>Total Amount: 
                                <span class="font-semibold">Rp.<?php echo number_format($row['item_quantity'] * $row['item_price'], 0, ',', '.'); ?></span>
                            </p>
                            <div class="card-actions justify-end mt-2">
                                <?php if ($row['status'] === 'berhasil'): ?>
                                    <span class="px-3 py-1 text-sm font-medium text-white bg-green-500 rounded-full">
                                        <?php echo $row['status']; ?>
                                    </span>
                                <?php elseif ($row['status'] === 'gagal'): ?>
                                    <span class="px-3 py-1 text-sm font-medium text-white bg-red-500 rounded-full">
                                        <?php echo $row['status']; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

<script src="script/ScClient.js"></script>
</body>
</html>
