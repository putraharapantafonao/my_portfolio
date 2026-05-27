<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .max-w-6xl {
            position: relative;
            z-index: 10;
        }
        select option {
            background-color: #0a1628;
            color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-[#030712] text-gray-100 p-6 font-sans overflow-x-hidden relative">

    <canvas id="canvas-matrix" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; pointer-events: none;"></canvas>

    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-8 border-b border-gray-800 pb-4">
            <div>
                <h1 class="text-2xl font-bold font-mono text-[#00f5d4]">system_root_dashboard()</h1>
                <p class="text-xs text-gray-400">Selamat datang kembali, Putra Harapan Tafonao</p>
            </div>
            <div class="flex gap-3">
                <a href="/" class="text-xs border border-gray-700 px-3 py-2 rounded text-gray-400 hover:text-white transition flex items-center gap-1 font-mono">
                    <i class="fas fa-eye"></i> view_site()
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs bg-red-600/20 border border-red-600/40 text-red-400 px-3 py-2 rounded hover:bg-red-600/40 transition font-mono">
                        logout()
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-teal-500/10 border border-teal-500/30 text-teal-400 text-xs p-3 rounded-lg mb-6 font-mono">
                ✔ {{ session('success') }}
            </div>
        @endif

        <div class="bg-[#0a1628]/90 backdrop-blur-sm p-6 rounded-xl border border-gray-800 mb-8 shadow-xl">
            <h3 class="text-sm font-mono text-[#00f5d4] mb-4">// 1. configure_hero_and_about_me()</h3>

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div class="flex flex-col md:flex-row items-center gap-4 p-4 bg-[#030712]/50 rounded-lg border border-gray-800">
                    <div class="w-16 h-16 rounded-full overflow-hidden border border-[#00f5d4] flex-shrink-0 bg-gray-900 flex items-center justify-center">
                        <img src="{{ ($profile && $profile->profile_image) ? asset('storage/' . $profile->profile_image) : asset('assets/img/foto-formal.jpg') }}"
                             class="w-full h-full rounded-full object-cover"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/150/0a1628/00f5d4?text=Avatar';">
                    </div>
                    <div class="w-full">
                        <label class="block text-xs text-gray-400 mb-1 font-mono">update_profile_image (JPG/PNG, Max 2MB)</label>
                        <input type="file" name="profile_image" class="w-full text-xs text-gray-400 file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-mono file:bg-gray-800 file:text-teal-400 hover:file:bg-gray-700 cursor-pointer">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">title_name</label>
                        <input type="text" name="title_name" value="{{ $profile->title_name ?? '' }}" placeholder="Contoh: Putra Harapan" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-200 focus:border-[#00f5d4] outline-none transition" required>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">sub_title_role</label>
                        <input type="text" name="sub_title" value="{{ $profile->sub_title ?? '' }}" placeholder="Contoh: IT Student & Web Developer" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-200 focus:border-[#00f5d4] outline-none transition" required>
                    </div>
                </div>
                <div>
                    <label class="block text-xs text-gray-400 mb-1 font-mono">about_biography_text</label>
                    <textarea name="about_text" rows="4" placeholder="Tulis biografi lengkap kamu untuk halaman About Me..." class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-200 focus:border-[#00f5d4] outline-none transition" required>{{ $profile->about_text ?? '' }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">github_link</label>
                        <input type="url" name="github_link" value="{{ $profile->github_link ?? '' }}" placeholder="https://github.com/..." class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-400 focus:border-[#00f5d4] outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">linkedin_link</label>
                        <input type="url" name="linkedin_link" value="{{ $profile->linkedin_link ?? '' }}" placeholder="https://linkedin.com/in/..." class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-400 focus:border-[#00f5d4] outline-none transition">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">instagram_link</label>
                        <input type="url" name="instagram_link" value="{{ $profile->instagram_link ?? '' }}" placeholder="https://instagram.com/..." class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-400 focus:border-[#00f5d4] outline-none transition">
                    </div>
                </div>
                <button type="submit" class="bg-teal-600 hover:bg-teal-500 text-white font-mono text-xs px-4 py-2.5 rounded transition shadow-md">
                    _save_profile_changes()
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

            <div class="bg-[#0a1628]/90 backdrop-blur-sm p-6 rounded-xl border border-gray-800 shadow-xl h-fit">
                <h3 class="text-sm font-mono text-[#00f5d4] mb-4">// 2a. inject_new_skill()</h3>
                <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">tech_name</label>
                        <input type="text" name="name" placeholder="Contoh: Laravel, Flutter, Kotlin" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-200 outline-none focus:border-[#00f5d4] transition" required>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">icon_css_class</label>
                        <input type="text" name="icon_class" placeholder="Contoh: devicon-laravel-plain colored" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-200 outline-none focus:border-[#00f5d4] transition" required>
                        <span class="text-[10px] text-gray-500 mt-1 block font-mono">Saran: Tambahkan kata 'colored' di akhir class.</span>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 mb-1 font-mono">stack_category</label>
                        <select name="category" class="w-full bg-[#030712] border border-gray-700 rounded p-2 text-xs text-gray-200 outline-none focus:border-[#00f5d4] transition cursor-pointer">
                            <option value="Languages">Languages</option>
                            <option value="Frameworks">Frameworks</option>
                            <option value="Tools & Design">Tools & Design</option>
                            <option value="Soft Skills">Soft Skills</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-sky-600 hover:bg-sky-500 text-white font-mono text-xs py-2 rounded transition shadow-md">
                        + push_stack_to_db()
                    </button>
                </form>
            </div>

            <div class="bg-[#0a1628]/90 backdrop-blur-sm p-6 rounded-xl border border-gray-800 shadow-xl lg:col-span-2">
                <h3 class="text-sm font-mono text-[#00f5d4] mb-4">// 2b. active_skills_cache()</h3>
                <div class="overflow-x-auto max-h-[310px] overflow-y-auto pr-2">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead class="bg-[#030712] text-[#00f5d4] font-mono border-b border-gray-800 sticky top-0 z-10">
                            <tr>
                                <th class="p-3">Icon</th>
                                <th class="p-3">Nama Teknologi</th>
                                <th class="p-3">Kategori</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800/60">
                            @forelse($skills as $sk)
                            <tr class="hover:bg-white/[0.01] transition">
                                <td class="p-3 text-lg text-sky-400"><i class="{{ $sk->icon_class }}"></i></td>
                                <td class="p-3 font-bold text-gray-200">{{ $sk->name }}</td>
                                <td class="p-3 font-mono text-[11px] text-gray-400">{{ $sk->category }}</td>
                                <td class="p-3 text-center">
                                    <form action="{{ route('admin.skills.destroy', $sk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus teknologi ini dari list?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:bg-red-400/10 px-2 py-1 rounded text-xs transition font-mono">[delete]</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-6 text-center text-gray-500 font-mono">Belum ada data skill dimasukkan ke basis data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mb-4 flex justify-between items-center mt-10">
            <h2 class="text-lg font-semibold font-mono text-[#00f5d4]">// 3. manage_featured_projects()</h2>
            <a href="{{ route('crud.create') }}" class="bg-gradient-to-r from-[#00f5d4] to-[#0ea5e9] text-gray-900 font-bold text-xs px-4 py-2 rounded shadow-lg hover:opacity-90 transition flex items-center gap-1 font-mono">
                <i class="fas fa-plus"></i> +add_new_project()
            </a>
        </div>

        <div class="bg-[#0a1628]/90 backdrop-blur-sm rounded-xl border border-gray-800 overflow-hidden shadow-xl mb-12">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 bg-[#030712]/50 font-mono text-xs text-teal-400">
                        <th class="p-4">Gambar</th>
                        <th class="p-4">Judul Proyek</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4">Tags</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-800">
                    @forelse($projects as $p)
                    <tr class="hover:bg-white/[0.02] transition">
                        <td class="p-4">
                            <img src="{{ $p->image ? asset('storage/' . $p->image) : 'https://via.placeholder.com/150x90/0a1628/00f5d4?text=Mockup' }}" class="w-20 h-12 object-cover rounded border border-gray-700">
                        </td>
                        <td class="p-4 font-bold text-gray-200">{{ $p->title }}</td>
                        <td class="p-4 text-gray-400 max-w-xs truncate">{{ $p->description }}</td>
                        <td class="p-4 font-mono text-xs text-sky-400">{{ $p->tags }}</td>

                        <td class="p-4 text-center font-mono text-xs">
                            @if(isset($p->is_featured) && $p->is_featured)
                                <span class="text-yellow-400 bg-yellow-400/10 px-2 py-0.5 rounded border border-yellow-400/20">⭐ Featured</span>
                            @else
                                <span class="text-gray-500 bg-gray-800/40 px-2 py-0.5 rounded border border-gray-700/30">📦 Archived</span>
                            @endif
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('crud.edit', $p->id) }}" class="text-yellow-400 hover:bg-yellow-400/10 px-2 py-1 rounded text-xs transition flex items-center gap-1 font-mono">
                                    <i class="fas fa-edit"></i> [edit]
                                </a>
                                <form action="{{ route('crud.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:bg-red-400/10 px-2 py-1 rounded text-xs transition flex items-center gap-1 font-mono">
                                        <i class="fas fa-trash"></i> [delete]
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500 font-mono text-xs">Belum ada proyek yang tersimpan di database.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <script src="{{ asset('assets/js/script.js') }}" defer></script>
</body>
</html>
