<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Game Top Up</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <style>
        .card-3d {
            transition: transform 0.1s;
            transform-style: preserve-3d;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">
<?php 
include 'includes/navClient.php'
?>
    <div class="card-3d w-96 bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="bg-blue-500 h-32 flex items-center justify-center">
            <img src="./src/<?php echo $user['user_icon']; ?>" alt="User Avatar" class="w-24 h-24 rounded-full border-4 border-white">
        </div>
        <div class="p-6 space-y-4">
            <h2 class="text-2xl font-bold text-center text-blue-800">User Profile</h2>
            <div class="space-y-2">
                <p class="text-gray-600"><span class="font-semibold">Username:</span> <?php echo $user['username']; ?></p>
                <p class="text-gray-600"><span class="font-semibold">Email:</span> <?php echo $user['email']; ?></p>
                <p class="text-gray-600">
                    <span class="font-semibold">Joined:</span> 
                    <?php echo date('d F Y', strtotime($user['created_at'])); ?>
                </p>  
            </div>
            <a href="indexClient.php?modul=auth&fitur=edit">
                <button class="btn btn-primary w-full">
                    Edit Profile
                </button>
            </a>
            
        </div>
    </div>

    <script>
        VanillaTilt.init(document.querySelector(".card-3d"), {
            max: 15,
            speed: 400,
            glare: true,
            "max-glare": 0.2,
        });
    </script>
</body>
</html>
