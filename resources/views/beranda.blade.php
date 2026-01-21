<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">
    <div class="container text-center py-5">
        <h1 class="h3 fw-bold mb-3">Website Profil Diri Sederhana</h1>
        <p class="lead mb-4">Banyu Bening Tegar Pangestu.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('/profile') }}" class="btn btn-primary">Profil</a>
            <a href="{{ url('/kontak') }}" class="btn btn-success">Kontak</a>
        </div>
    </div>
</body>
</html>
