<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#030712] text-gray-100 p-6 flex items-center justify-center min-h-screen">
    <div class="max-w-2xl w-full bg-[#0a1628] p-8 rounded-xl border border-gray-800 shadow-2xl">
        <div class="flex items-center gap-2 mb-6 border-b border-gray-800 pb-3">
            <i class="fas fa-edit text-yellow-400 text-lg"></i>
            <h2 class="text-xl log-title font-bold font-mono text-yellow-400">update_project_data()</h2>
        </div>

        <form action="{{ route('admin.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Judul Proyek</label>
                <input type="text" name="title" value="{{ $project->title }}" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm focus:border-teal-400 text-gray-200 outline-none transition" required>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Deskripsi Proyek</label>
                <textarea name="description" rows="4" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm focus:border-teal-400 text-gray-200 outline-none transition" required>{{ $project->description }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Tags (Pisahkan dengan koma)</label>
                <input type="text" name="tags" value="{{ $project->tags }}" placeholder="Contoh: Laravel, Tailwind CSS, MySQL" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm focus:border-teal-400 text-gray-200 outline-none transition" required>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Link Proyek / GitHub / Play Store</label>
                <input type="url" name="link" value="{{ $project->link }}" placeholder="https://github.com/..." class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-sm focus:border-teal-400 text-gray-200 outline-none transition">
            </div>

            <div class="flex items-center gap-2 bg-[#030712]/40 p-3 rounded border border-gray-800">
                <input type="checkbox" name="is_featured" value="1" id="is_featured"
                       @checked($project->is_featured)
                       class="w-4 h-4 rounded text-teal-500 bg-[#030712] border-gray-700 focus:ring-0 cursor-pointer">
                <label for="is_featured" class="text-xs text-gray-400 font-mono cursor-pointer select-none flex items-center gap-1">
                    ⭐ Jadikan Proyek Unggulan (Tampilkan di Beranda Utama Halaman Depan)
                </label>
            </div>

            <div>
                <label class="block text-xs font-mono text-gray-400 mb-1">Gambar Proyek</label>

                @if($project->image)
                    <div class="mb-3 p-2 bg-[#030712]/50 inline-block rounded border border-gray-800">
                        <p class="text-[10px] font-mono text-gray-500 mb-1">current_mockup_image:</p>
                        <img src="{{ asset($project->image) }}" class="w-40 h-24 object-cover rounded border border-gray-700 shadow-md">
                    </div>
                @endif

                <div class="mt-1">
                    <input type="file" name="image" class="w-full text-xs text-gray-400 file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-mono file:bg-gray-800 file:text-teal-400 hover:file:bg-gray-700 cursor-pointer">
                    <span class="text-[10px] text-gray-500 font-mono mt-1 block">Biarkan kosong jika tidak ingin memperbarui aset gambar digital.</span>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                <a href="{{ route('admin.index') }}" class="text-xs font-mono bg-gray-800 border border-gray-700 px-4 py-2.5 rounded text-gray-300 hover:text-white hover:bg-gray-700 transition flex items-center">
                    <i class="fas fa-times mr-1"></i> cancel()
                </a>
                <button type="submit" class="text-xs font-mono bg-gradient-to-r from-yellow-500 to-amber-500 text-gray-900 font-bold px-4 py-2.5 rounded hover:opacity-90 transition flex items-center">
                    <i class="fas fa-save mr-1"></i> update_record()
                </button>
            </div>
        </form>
    </div>
</body>
</html>
