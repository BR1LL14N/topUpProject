<!-- component -->

<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Add New Item</h1>
        <!-- Form -->
        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="../index.php?modul=itemGame&fitur=add&gameID=<?= $_GET['gameID']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="gameID" value="<?= $_GET['gameID'] ?>">
        <!-- Game Name -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="item_name">Item Name</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="item_name" name="item_name" placeholder="Enter game item" required>
        </div>

        <!-- Game Description -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="item_description">Item Description</label>
            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            id="item_description" name="item_description" placeholder="Enter item description" required></textarea>
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
            <input 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                type="number" 
                id="price" 
                name="price" 
                step="0.01" 
                min="0" 
                placeholder="Enter the price"
                required>
        </div>

        <!-- Item Icon Upload -->
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="game_icon">Item Image</label>
        <div class="flex items-center">
            <!-- Hidden File Input -->
            <input
            type="file"
            id="item_icon"
            name="item_icon"
            accept="image/*"
            class="hidden"
            onchange="updateFileName(this)"
            required
            />
            <!-- Custom Button -->
            <label
            for="item_icon"
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
        </div>


        <!-- Submit Button -->
        <button
            
            class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
            type="submit">
            Add Item
        </button>
        </form>
    </div>
</body>
<script src="../script/ScAdmin.js"></script>
