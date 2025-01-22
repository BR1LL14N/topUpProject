<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style/adminSide.css">
    <title>Display Admins</title>
</head>
<body class="bg-gray-100">

    <!-- Main Container with Flex layout -->
    <div class="flex min-h-screen">

        <!-- SIDEBAR AREA -->
        <aside class="w-64 bg-gray-800 text-white fixed h-full">
            <?php include 'includes/sidebar.php'; ?>
        </aside>
        <!-- END OF SIDEBAR AREA -->

        <!-- MAIN CONTENT AREA -->
        <div class="flex-1 ml-64 p-6">
            <!-- NAVBAR AREA -->
            <?php include 'includes/navbar.php'; ?>
            <!-- END OF NAVBAR AREA -->

            <!-- CONTENT AREA -->

            <div class="flex justify-start mb-1 mt-2">
                <a href="./views/registerAdmins.php" 
                class="inline-block px-3 py-3 bg-violet-700 text-white font-semibold text-lg rounded-md hover:bg-violet-500 transition duration-300 ease-in-out">
                    Insert new Admin
                </a>
            </div>

            <div class="mt-5 flex flex-col items-center">
                <!-- Container Judul -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                        <thead class="text-xs uppercase bg-violet-500 dark:bg-violet-600 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">Username Admin</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Create at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($admins)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-gray-600">Admins not found</td>
                                </tr>
                            <?php endif; ?>

                            <?php foreach ($admins as $row): ?>
                            
                                    <tr class="bg-white border-b text-gray-900 border-gray-200">
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">
                                            <?php echo $row['username']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['created_at']; ?>
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                
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