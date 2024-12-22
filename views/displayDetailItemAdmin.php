<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style/adminSide.css">
    <title>Display Item in Game</title>
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
                <a href="./views/formNewItem.php?gameID=<?= isset($_GET['gameID']) ? $_GET['gameID'] : ''?>" class="inline-block px-3 py-3 bg-violet-700 text-white font-semibold text-lg rounded-md hover:bg-violet-500 transition duration-300 ease-in-out">
                    Insert new item
                </a>
            </div>

            <div class="mt-5 flex flex-col items-center">
                <div class="game-cards-container my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    <?php if (empty($items)) : ?>
                        <p>Item not found</p>
                    <?php endif; ?>
                    <?php foreach ($items as $row) : ?>
                        <div class="relative group game-card bg-white shadow-lg rounded-lg p-4 flex flex-col">
                            <!-- Ikon Edit di Pojok Kanan Atas -->
                            <a href="./index.php?gameID=<?php echo $row['game_id']; ?>&modul=itemGame&fitur=requestUpdate&itemID=<?php echo $row['item_id']; ?>" 
                                class="absolute top-2 right-2 text-violet-500 opacity-0 transform scale-75 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 hover:text-violet-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 013.536 3.536L7.5 20.5H4v-3.5L16.732 3.732z" />
                                </svg>
                            </a>

                            <!-- Ikon Delete di Pojok Kiri Atas -->
                            <a href="./index.php?gameID=<?php echo $row['game_id']; ?>&modul=itemGame&fitur=requestDelete&itemID=<?php echo $row['item_id']; ?>" 
                            class="absolute top-2 left-2 text-red-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>

                            <!-- Gambar Item -->
                            <img 
                                src="./src/<?php echo htmlspecialchars($row['item_icon']); ?>" 
                                alt="<?php echo htmlspecialchars($row['item_name']); ?>" 
                                class="game-icon w-24 h-24 object-cover mb-4"
                            >

                            <!-- Informasi Item -->
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