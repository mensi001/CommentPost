<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Blog')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- TailwindCSS CDN for simple styling --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto">
            <a href="/" class="text-xl font-bold text-blue-600">My Blog</a>
        </div>
    </nav>

    <main class="container mx-auto py-6 px-4">
        @yield('content')
    </main>

    <footer class="text-center text-sm py-4 text-gray-500">
        &copy; {{ date('Y') }} My Blog
    </footer>
</body>
</html>
