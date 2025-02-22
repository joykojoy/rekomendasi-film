<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #000000;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8 w-full max-w-md">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-300 text-center mb-6">CineMatch</h1>
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    value="{{ old('email') }}"
                    required 
                    class="block w-full mt-1 p-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    required 
                    class="block w-full mt-1 p-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                <button type="button" 
                    onclick="togglePasswordVisibility('password', this)" 
                    class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg id="password-icon" xmlns="http://www.w3.org/2000/svg" 
                        class="h-5 w-5 text-gray-500 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </button>
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Forgot your password?</a>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 focus:ring focus:ring-indigo-500 transition duration-300">Log in</button>
        </form>
        <p class="mt-4 text-sm text-center text-gray-600 dark:text-gray-400">
            Don’t have an account? <a href="{{ route('register') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Register here</a>
        </p>
    </div>

    <script>
        function togglePasswordVisibility(passwordId, button) {
            const passwordField = document.getElementById(passwordId);
            const passwordIcon = button.querySelector('svg');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>`;
            } else {
                passwordField.type = 'password';
                passwordIcon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>`;
            }
        }
    </script>
</body>
</html>
