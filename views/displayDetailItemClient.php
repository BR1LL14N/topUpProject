

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style/adminSide.css">
    <title>Dashboard</title>
</head>
<body class="bg-gray-100">
    <?php include './views/includes/navClient.php'?>

    <!-- Main Container with Flex layout -->
    <div class="mt-10 flex flex-col items-center">
    <h4 class="text-2xl font-bold mt-11">Items And Packages</h4>

                <div class="game-cards-container my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    <?php if(empty($result)):?>
                        <p>Item not found</p>
                    <?php endif;?>
                    <?php foreach ($result as $row) : ?>
                        <div class="game-card bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
                            <a href="index.php?gameID=<?php echo $row['game_id']; ?>&modul=itemGame&fitur=transaksi">
                                <img 
                                    src="./src/<?php echo htmlspecialchars($row['item_icon']); ?>" 
                                    alt="<?php echo htmlspecialchars($row['item_name']); ?>" 
                                    class="game-icon w-24 h-24 object-cover mb-4"
                                >
                            </a>
                            <div class="game-info text-center">
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
            </div>
    <!-- END OF MAIN CONTAINER -->

    <!-- Flowbite JS -->
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>