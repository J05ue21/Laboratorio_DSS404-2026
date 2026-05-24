<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica UDB - Iniciar Sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-100 h-screen flex items-center justify-center font-sans antialiased">

    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <span class="text-4xl">🏥</span>
            <h2 class="text-2xl font-bold text-slate-800 mt-3">Portal Médico UDB</h2>
            <p class="text-sm text-slate-400 mt-1">Ingresa tus credenciales para acceder al control de citas</p>
        </div>

        <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Correo Institucional / Clínico</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@clinica.com" class="w-full p-2.5 text-sm border rounded-xl outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 border-slate-200">
                @error('email') <p class="text-red-500 text-xs mt-1 font-medium">⚠️ {{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Contraseña</label>
                <input type="password" name="password" placeholder="••••••••" class="w-full p-2.5 text-sm border rounded-xl outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 border-slate-200">
                @error('password') <p class="text-red-500 text-xs mt-1 font-medium">⚠️ {{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white p-2.5 rounded-xl text-sm font-bold shadow-md transition duration-150">
                Acceder al Sistema
            </button>
        </form>

    </div>

</body>
</html>