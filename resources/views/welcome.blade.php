<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LEMS - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center space-y-6">
        <h1 class="text-4xl font-bold text-gray-700">Welcome to LEMS</h1>
        <div class="space-x-4">
            @guest
                <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Login</a>
            @endguest

            <a href="{{ route('register.form') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Register</a>
        </div>
    </div>
</body>
</html>

