<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #000000;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-300 text-center mb-6">Register</h1>
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    placeholder="Enter your name"
                    class="block w-full mt-1 p-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                @error('name')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    placeholder="Enter your email"
                    class="block w-full mt-1 p-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                @error('email')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="Enter your password"
                    class="block w-full mt-1 p-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                @error('password')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    placeholder="Confirm your password"
                    class="block w-full mt-1 p-3 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                @error('password_confirmation')
                    <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Already Registered -->
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Already registered? <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Login here</a>
                </p>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 focus:ring focus:ring-indigo-500 transition duration-300">Register</button>
        </form>
    </div>
</body>
</html>
