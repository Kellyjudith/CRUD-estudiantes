<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD Estudiantes')</title>
    <!-- Google Fonts: Poppins para títulos y cuerpo -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-[#faf6f0] min-h-screen">

    {{-- Navbar minimalista --}}
    <nav class="bg-white shadow-sm border-b border-amber-100">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('estudiantes.index') }}" class="text-xl font-semibold text-stone-700 hover:text-stone-900 transition">
                📚 Gestión Académica
            </a>
            <div class="flex gap-8 text-stone-600 font-medium">
                <a href="{{ route('estudiantes.index') }}" class="hover:text-amber-600 transition">Estudiantes</a>
                <a href="{{ route('carreras.index') }}" class="hover:text-amber-600 transition">Carreras</a>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="max-w-6xl mx-auto px-6 py-10">

        {{-- Mensajes flash --}}
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 px-5 py-3 rounded-md shadow-sm mb-8 flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.style.display='none'" class="text-emerald-500 hover:text-emerald-700">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-700 px-5 py-3 rounded-md shadow-sm mb-8 flex items-center justify-between">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.style.display='none'" class="text-rose-500 hover:text-rose-700">&times;</button>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-700 px-5 py-3 rounded-md shadow-sm mb-8">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

    <script>
        // Pequeño script para cerrar mensajes manualmente
        document.querySelectorAll('.bg-emerald-50 button, .bg-rose-50 button').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.parentElement.style.display = 'none';
            });
        });
    </script>
</body>
</html>