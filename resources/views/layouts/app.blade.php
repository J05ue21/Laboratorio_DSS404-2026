<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica UDB - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-slate-50 font-sans antialiased">

    <nav class="bg-blue-600 shadow-md text-white">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('appointments.index') }}" class="text-xl font-bold tracking-wide flex items-center gap-2">
                🏥 Sistema Médico - Clínica UDB
            </a>
            <div class="flex items-center gap-4">
                <span class="text-sm bg-blue-700 px-3 py-1.5 rounded-xl font-medium">
                    👤 {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})
                </span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg font-bold transition">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8 max-w-6xl">
             
        @yield('content')
        
    </main>

    <footer class="text-center py-6 text-slate-400 text-xs border-t border-slate-200 mt-12">
        &copy; {{ date('Y') }} Universidad Don Bosco - Clinica Universitaria
    </footer>

</body>
</html>