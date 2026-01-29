<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>
<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-admin.navbar />

        <x-admin.sidebar />

        <main class="p-4 md:ml-64 h-auto pt-20 bg-gray-50 dark:bg-gray-900 min-h-screen">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                {{ $slot }}
                
            </div>
        </main>

    </div>

    legion 
</body>
</html>
