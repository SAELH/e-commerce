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
            
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="#">السيارات</a></li>
                <li class="nav-item"><a class="nav-link" href="#">تواصل</a></li>
            </ul>
            </div>
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