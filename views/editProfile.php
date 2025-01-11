<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Game Top Up</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center p-4">
    <div class="card w-full max-w-md bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="bg-blue-500 p-6 text-white">
            <h2 class="text-2xl font-bold text-center">Edit Profile</h2>
        </div>
        <form class="p-6 space-y-4">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" placeholder="Enter your username" class="input input-bordered" value="GameMaster123">
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" placeholder="Enter your email" class="input input-bordered" value="gamemaster@example.com">
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">New Password</span>
                </label>
                <input type="password" placeholder="Enter new password" class="input input-bordered">
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Confirm New Password</span>
                </label>
                <input type="password" placeholder="Confirm new password" class="input input-bordered">
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary">Save Changes</button>
            </div>
            <div class="text-center">
                <a href="#" class="link link-hover text-blue-600">Back to Profile</a>
            </div>
        </form>
    </div>
</body>
</html>
