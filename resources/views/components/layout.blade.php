<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <title>{{ $judul ?? 'App' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">

<div class="min-h-full">
    <x-navbar />
    <x-header>{{ $judul }}</x-header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6">
            {{ $slot }}
        </div>
    </main>
</div>

<script type="module"
    src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1">
</script>

</body>
</html>
