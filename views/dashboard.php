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
            <div class="mt-8">
                <?php include './views/display.php'; ?>
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