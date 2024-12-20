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

            <!-- CONTENT AREA -->

            <div class="flex justify-start mb-1 mt-2">
                <a href="./views/formNewItem.php?gameID=<?= isset($_GET['gameID']) ? $_GET['gameID'] : ''?>" class="inline-block px-3 py-3 bg-blue-600 text-white font-semibold text-lg rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
                    Insert new item
                </a>
            </div>

            <div class="mt-5 flex flex-col items-center">
                <div class="game-cards-container my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    <?php if(empty($items)):?>
                        <p>Item not found</p>
                    <?php endif;?>
                    <?php foreach ($items as $row) : ?>
                        <div class="game-card bg-white shadow-lg rounded-lg p-4 flex flex-col items-center">
                            <a href="index.php?gameID=<?php echo $row['game_id']; ?>&modul=game&fitur=detail">
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

            </div>

            </div>
        </div>
        <!-- END OF MAIN CONTENT AREA -->
        
    </div>
    <!-- END OF MAIN CONTAINER -->

    <!-- Flowbite JS -->
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>