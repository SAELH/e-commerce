<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>معرض السيارات</title>


    <style>
    .hero {
        background: url('https://images.unsplash.com/photo-1511919884226-fd3cad34687c') center/cover;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    </style>

</head>

<body>

    <header>
            <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">🚗 معرض السيارات</a>
            <span class="text-white">{{ session('x') }}</span>
        </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3">
    جميع الحقوق محفوظة © 2026
    </footer>

</body>
</html>