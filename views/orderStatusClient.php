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
        <!-- Order Card -->
        <?php foreach ($resultTransactions as $row): ?>
            <?php if ($row['status'] === 'diproses'): ?>
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
                        <!-- Baris untuk Tombol Cetak dan Status -->
                        <div class="flex justify-between items-center mt-4">
                            <button 
                              class="px-3 py-1 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600"
                              onclick="printCard(<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>)">
                              Cetak
                            </button>
                            <span class="px-3 py-1 text-sm font-medium text-white bg-yellow-500 rounded-full">
                                <?php echo $row['status']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
  </div>

<script>
  // Fungsi untuk mencetak kartu tertentu
  function printCard(data) {
    const printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write(`
      <html>
      <head>
        <title>Cetak</title>
        <style>
          body {
            font-family: Arial, sans-serif;
          }
          .card {
            border: 1px solid #ccc;
            padding: 16px;
            margin: 20px auto;
            width: 80%;
          }
          .card img {
            max-width: 100%;
          }
        </style>
      </head>
      <body>
        <div class="card">
          <h2>Envoice #${data.envoice}</h2>
          <p>Game: ${data.game_name}</p>
          <p>Item: ${data.item_name}</p>
          <p>Item Quantity: ${data.item_quantity}</p>
          <p>Total Amount: Rp.${(data.item_quantity * data.item_price).toLocaleString('id-ID')}</p>
          <p>Date: ${data.date}</p>
          <span>Status: ${data.status}</span>
        </div>
      </body>
      </html>
    `);
    printWindow.document.close();
    printWindow.print();
  }
</script>
<script src="script/ScClient.js"></script>
</body>
</html>
