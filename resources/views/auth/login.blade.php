<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Putra</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Mengamankan urutan penumpukan agar form input tetap dapat diklik dengan normal di atas canvas */
        .auth-card {
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body class="bg-[#030712] text-gray-100 flex items-center justify-center min-h-screen overflow-x-hidden relative">

    <canvas id="canvas-matrix" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; pointer-events: none;"></canvas>

    <div class="auth-card bg-[#0a1628]/90 backdrop-blur-sm p-8 rounded-xl border border-teal-500/20 max-w-md w-full shadow-2xl mx-4">
        <h2 class="text-2xl font-bold text-center mb-2 text-transparent bg-clip-text bg-gradient-to-r from-[#00f5d4] to-[#0ea5e9] font-mono">&lt;Admin_Access /&gt;</h2>
        <p class="text-xs text-gray-400 text-center mb-6">Silakan masukkan kredensial enkripsi khusus</p>

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-xs p-3 rounded mb-4 font-mono">
                ⚠ {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-mono text-teal-400 mb-1">email_address</label>
                <input type="email" name="email" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm text-gray-200 focus:border-teal-400 outline-none transition" required>
            </div>
            <div>
                <label class="block text-xs font-mono text-teal-400 mb-1">security_password</label>
                <input type="password" name="password" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm text-gray-200 focus:border-teal-400 outline-none transition" required>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-[#00f5d4] to-[#0ea5e9] text-gray-900 font-bold p-2.5 rounded text-sm hover:opacity-90 transition font-mono">
                Initialize_Login()
            </button>
        </form>
    </div>

    <script src="{{ asset('assets/js/script.js') }}" defer></script>
</body>
</html>
