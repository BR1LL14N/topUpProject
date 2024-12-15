<?php include './init.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="./style/clienSide.css">
    <title>Document</title>
</head>
<body>
    <?php include './views/includes/navClient.php'?>
    <main id="main-container">

    

    <div id="carousel-example" class="relative w-full perspective">
    <!-- Wrapper -->
        <div class="carousel-wrapper relative flex items-center justify-center mt-20">
            <!-- Items -->
            <div id="carousel-item-1" class="carousel-item transform opacity-0 scale-75 z-0 duration-700 ease-in-out" data-carousel-item>
                <img src="asset/arknights.jpg" class="carousel-img rounded-lg shadow-lg" alt="Item 1">
            </div>
            <div id="carousel-item-2" class="carousel-item transform opacity-0 scale-75 z-0 duration-700 ease-in-out" data-carousel-item>
                <img src="asset/mobilelegend.jpg" class="carousel-img rounded-lg shadow-lg" alt="Item 2">
            </div>
            <div id="carousel-item-3" class="carousel-item transform opacity-0 scale-75 z-0 duration-700 ease-in-out" data-carousel-item>
                <img src="asset/hsr.jpg" class="carousel-img rounded-lg shadow-lg" alt="Item 3">
            </div>
            <div id="carousel-item-4" class="carousel-item transform opacity-0 scale-75 z-0 duration-700 ease-in-out" data-carousel-item>
                <img src="asset/wuwa.jpg" class="carousel-img rounded-lg shadow-lg" alt="Item 4">
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </span>
        </button>
    </div>




<!-- DISPLAY KONTEN DATA GAME -->
<?php include './views/displayClient.php'; ?>


    </main>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="./script/ScClient.js"></script>
</body>
</html>