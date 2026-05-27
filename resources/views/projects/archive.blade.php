<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Projects | Putra Harapan Tafonao</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        body {
            font-family: 'Syne', sans-serif;
        }
        .max-w-6xl {
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body class="bg-[#030712] text-gray-100 p-6 md:p-12 font-sans overflow-x-hidden relative">

    <canvas id="canvas-matrix" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; pointer-events: none;"></canvas>

    <div class="max-w-6xl mx-auto">

        <div class="mb-10 border-b border-gray-800 pb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-3xl md:text-4xl font-bold font-mono text-[#00f5d4]">&lt;project_archive /&gt;</h1>
                <p class="text-xs text-gray-400 mt-1 font-mono">// Daftar lengkap seluruh riwayat pengerjaan proyek sistem digital.</p>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000">
                <a href="/" class="text-xs border border-gray-700 px-4 py-2.5 rounded-full text-gray-400 hover:text-[#00f5d4] hover:border-[#00f5d4]/40 transition font-mono inline-flex items-center gap-2 group">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i> back_to_home()
                </a>
            </div>
        </div>

        <div class="projects-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
            @forelse($all_projects as $index => $p)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 110 }}" class="proj-card">
                    <a href="{{ $p->link ?? '#' }}" target="_blank" rel="noopener noreferrer">
                        <div class="proj-img-wrap">
                            <img src="{{ $p->image ? asset('storage/' . $p->image) : 'https://via.placeholder.com/400x250/0a1628/00f5d4?text=No+Image' }}" alt="{{ $p->title }}">
                            <div class="proj-overlay">
                                <span><i class="fas fa-external-link-alt" style="font-size:.7rem"></i> Lihat Proyek</span>
                            </div>
                        </div>
                    </a>
                    <div class="proj-body">
                        <a href="{{ $p->link ?? '#' }}" target="_blank" class="proj-title">{{ $p->title }}</a>
                        <p class="proj-desc">{{ $p->description }}</p>
                        <div class="proj-tags">
                            @foreach(explode(',', $p->tags) as $tag)
                                <span class="tag">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 font-mono text-xs text-gray-500 border border-dashed border-gray-800 rounded-xl bg-[#0a1628]/30">
                    <i class="fas fa-box-open text-3xl mb-3 text-gray-700 block"></i>
                    Belum ada proyek yang terarsipkan di database.
                </div>
            @endforelse
        </div>

    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
</body>
</html>
