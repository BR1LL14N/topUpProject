<!-- component -->

<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Update Game</h1>
    <!-- Form -->
    <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="./index.php?modul=gameAndItem&fitur=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="gameID" value="<?php echo $_GET['gameID'] ?>">
        <!-- Game Name -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="game_name">Update Game Name</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="game_name" name="game_name" value="<?php echo $result['game_name'] ?>" required>
        </div>

        <!-- Game Description -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="game_description">Update Game Description</label>
            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            id="game_description" name="game_description" required><?php echo $result['game_description'] ?></textarea>
        </div>

        <!-- Release Date -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="release_date">Update Release Date</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="date" id="release_date" name="release_date" value = "<?php echo $result['release_date'] ?>" required>
        </div>

        <!-- Game Icon Upload -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="game_icon">Update Game Icon</label>
            <div class="flex items-center">
                <!-- Hidden File Input -->
                <input
                    type="file"
                    id="game_icon"
                    name="game_icon"
                    accept="image/*"
                    class="hidden"
                    onchange="updateFileName(this)"
                />
                <!-- Custom Button -->
                <label
                    for="game_icon"
                    class="cursor-pointer bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                >
                    Choose File
                </label>
                <!-- Display File Name -->
                <span
                    id="file_name"
                    class="ml-3 text-gray-600 italic text-sm"
                >
                    No file chosen
                </span>
            </div>

            <!-- Display Existing Image -->
            <?php if (!empty($result['game_icon'])): ?>
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Current Game Icon</label>
                    <img src="./src/<?php echo $result['game_icon']; ?>" alt="Current Game Icon" class="w-32 h-32 object-cover rounded-md" />
                </div>
            <?php endif; ?>
        </div>


        <!-- Submit Button -->
        <button
        class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
        type="submit">Update Game</button>
    </form>
    </div>
</body>
<script src="./script/ScAdmin.js"></script>
