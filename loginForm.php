<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white flex items-center justify-center min-h-screen">

    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8">
        <!-- Image Section -->
        <div class="flex justify-center mb-6">
            <img 
                id="dynamicImage" 
                src="./image/cek2.jpg" 
                alt="Logo" 
                class="w-48 h-48 object-cover rounded-full shadow-md">
        </div>

        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Login</h2>
        
        <form action="process_login.php" method="POST">
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                    placeholder="Enter your email">
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                    placeholder="Enter your password">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input 
                    type="checkbox" 
                    id="remember" 
                    name="remember" 
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="remember" class="ml-2 block text-sm text-gray-600">Remember Me</label>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-gradient-to-l focus:ring-4 focus:ring-blue-300 transition-all">
                Login
            </button>
        </form>

        <!-- Forgot Password & Sign Up Links -->
        <div class="mt-4 text-center">
            <a href="forgot_password.php" class="text-sm text-blue-600 hover:underline">Forgot your password?</a>
            <p class="text-sm text-gray-600 mt-2">
                Don't have an account? 
                <a href="register.php" class="text-blue-600 hover:underline">Sign up</a>
            </p>
        </div>
    </div>

    <script src="./script/login.js"></script>
</body>
</html>
