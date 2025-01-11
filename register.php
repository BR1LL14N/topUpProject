<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Register</h2>
        
        <form action="helper.php?modul=auth&fitur=register" method="POST">
        <input type="hidden" name="defaultIcon" value="default.jpg">
        <input type="hidden" name="role" value="user">
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

            <!-- Username Input -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    required 
                    class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                    placeholder="Enter your username">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full border border-blue-300 rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                        placeholder="Enter your password">
                    <button 
                        type="button" 
                        id="togglePassword"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="eyeSlash" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Verify Password -->
            <div class="mb-4">
                <label for="verifyPassword" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="verifyPassword" 
                        name="verifyPassword" 
                        required 
                        class="w-full border border-blue-300 rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition-all" 
                        placeholder="Confirm your password">
                    <button 
                        type="button" 
                        id="toggleVerifyPassword"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg id="eyeOpenVerify" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="eyeSlashVerify" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>


            

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-gradient-to-l focus:ring-4 focus:ring-blue-300 transition-all">
                Register
            </button>
        </form>

        <!-- Forgot Password & Sign Up Links -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600 mt-2">
                you already have a account? 
                <a href="loginForm.php" class="text-blue-600 hover:underline">Sign in</a>
            </p>
        </div>
    </div>

    <script src="./script/register.js"></script>
</body>
</html>
