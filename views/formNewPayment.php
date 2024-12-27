<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Add New Payment</h1>
        <!-- Form -->
        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="../index.php?modul=paymentMethod&fitur=add&paymentID=<?= $_GET['paymentID']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="paymentID" value="<?= $_GET['paymentID'] ?>">
        <!-- Game Name -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="item_name">Payment Name</label>
            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
            type="text" id="payment_name" name="payment_name" placeholder="Enter Payment" required>
        </div>


        <!-- Item Icon Upload -->
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="game_icon">Payment Image</label>
        <div class="flex items-center">
            <!-- Hidden File Input -->
            <input
            type="file"
            id="payment_icon"
            name="payment_icon"
            accept="image/*"
            class="hidden"
            onchange="updateFileName(this)"
            required
            />
            <!-- Custom Button -->
            <label
            for="payment_icon"
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
            Add Payment
        </button>
        </form>
    </div>
</body>
<script src="../script/ScAdmin.js"></script>
