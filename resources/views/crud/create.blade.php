<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .create-card {
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body class="bg-[#030712] text-gray-100 p-6 flex items-center justify-center min-h-screen overflow-x-hidden relative">

    <canvas id="canvas-matrix" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; pointer-events: none;"></canvas>

    <div class="create-card max-w-2xl w-full bg-[#0a1628]/95 backdrop-blur-sm p-8 rounded-xl border border-gray-800 shadow-2xl mx-4">
        <div class="flex items-center gap-2 mb-6 border-b border-gray-800 pb-3">
            <i class="fas fa-folder-plus text-[#00f5d4] text-lg"></i>
            <h2 class="text-xl log-title font-bold font-mono text-[#00f5d4]">add_new_project()</h2>
        </div>

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Judul Proyek</label>
                <input type="text" name="title" placeholder="Contoh: ODRIN.id — Digital Delivery Service" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm text-gray-200 focus:border-teal-400 outline-none transition" required>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Deskripsi Proyek</label>
                <textarea name="description" rows="4" placeholder="Tuliskan spesifikasi, fitur utama, dan tujuan dari pembangunan sistem digital ini..." class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm text-gray-200 focus:border-teal-400 outline-none transition" required></textarea>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Tags (Pisahkan dengan tanda koma)</label>
                <input type="text" name="tags" placeholder="Contoh: Laravel, Tailwind CSS, Flutter, Gemini API" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm text-gray-200 focus:border-teal-400 outline-none transition" required>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Link Proyek / GitHub / Play Store (Opsional)</label>
                <input type="url" name="link" placeholder="https://github.com/putraharapantafonao/..." class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm text-gray-200 focus:border-teal-400 outline-none transition">
            </div>

            <div class="flex items-center gap-2 bg-[#030712]/40 p-3 rounded border border-gray-800">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" class="w-4 h-4 rounded text-teal-500 bg-[#030712] border-gray-700 focus:ring-0 cursor-pointer">
                <label for="is_featured" class="text-xs text-gray-400 font-mono cursor-pointer select-none flex items-center gap-1">
                    ⭐ Tandai Sebagai Proyek Unggulan (Tampilkan di 3 Besar Beranda Utama)
                </label>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Gambar Mockup Proyek (Max 2MB)</label>
                <div class="mt-1">
                    <input type="file" name="image" class="w-full text-xs text-gray-400 file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-mono file:bg-gray-800 file:text-teal-400 hover:file:bg-gray-700 cursor-pointer">
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                <a href="{{ route('admin.index') }}" class="text-xs font-mono bg-gray-800 border border-gray-700 px-4 py-2.5 rounded text-gray-300 hover:text-white hover:bg-gray-700 transition flex items-center">
                    <i class="fas fa-times mr-1"></i> cancel()
                </a>
                <button type="submit" class="text-xs font-mono bg-gradient-to-r from-teal-400 to-emerald-500 text-gray-900 font-bold px-4 py-2.5 rounded hover:opacity-90 transition flex items-center">
                    <i class="fas fa-plus mr-1"></i> inject_record()
                </button>
            </div>
        </form>
    </div>

    <script src="{{ asset('assets/js/script.js') }}" defer></script>
</body>
</html>
