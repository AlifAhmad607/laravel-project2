<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <nav class="bg-gray-800 text-white p-4 mb-5">
        <div class="container mx-auto flex justify-between">
            <h1 class="font-bold">Admin Panel</h1>
            <a href="{{ url('/admin/student') }}" class="hover:underline">Student</a>
        </div>
    </nav>

    <div class="container mx-auto">
        @yield('content')
    </div>

</body>
</html>
