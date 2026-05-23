<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->title_name ?? 'Putra Harapan Tafonao' }} | Portofolio</title>
    <meta name="description" content="Portofolio Personal {{ $profile->title_name ?? 'Putra Harapan Tafonao' }}, Mahasiswa Teknik Informatika yang berfokus pada Web Development dan UI/UX Design.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://unpkg.com" crossorigin>
    <link class="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link class="dns-prefetch" href="https://unpkg.com">
    <link class="dns-prefetch" href="https://cdn.jsdelivr.net">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;600&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css" media="print" onload="this.media='all'">

    <link class="dns-prefetch" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="preload" as="image" href="{{ asset('assets/img/foto-formal.jpg') }}">
</head>
<body class="bg-[#030712] text-gray-100 overflow-x-hidden transition-colors duration-300">

<canvas id="hero-canvas"></canvas>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>
<div class="orb orb-3"></div>

<nav>
    <div class="nav-inner">
        <a href="#" class="logo" aria-label="Beranda Putra">&lt;Putra /&gt;</a>
        <div class="nav-links">
            <a href="#about" class="nav-link">about</a>
            <a href="#skills" class="nav-link">skills</a>
            <a href="#projects" class="nav-link">projects</a>
            <a href="#experience" class="nav-link">experience</a>
        </div>
        <div style="display:flex;align-items:center;gap:0.75rem;">
            <a href="/admin" class="nav-link text-xs font-mono text-gray-400 hover:text-[var(--accent)] hidden md:block">admin_panel()</a>

            <a href="#contact" class="btn-nav" style="display:none;" id="contact-nav">contact_me()</a>
            <script>document.getElementById('contact-nav').style.display='block';</script>

            <button id="theme-toggle" class="p-2 rounded-lg text-gray-400 hover:text-[var(--accent)] transition-colors" aria-label="Ubah Tema">
                <i class="fas fa-moon text-lg" id="theme-icon"></i>
            </button>

            <button id="mobile-btn" class="text-gray-400 hover:text-[var(--accent)]" aria-label="Buka Menu" onclick="document.getElementById('mobile-menu').style.display=document.getElementById('mobile-menu').style.display==='block'?'none':'block'">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden">
        <a href="#about" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">about</a>
        <a href="#skills" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">skills</a>
        <a href="#projects" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">projects</a>
        <a href="#experience" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">experience</a>
        <a href="/admin" class="nav-link font-mono text-xs">admin_panel()</a>
        <a href="#contact" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">contact</a>
    </div>
</nav>

<section id="hero" class="section-wrap">
    <div class="container">
        <div data-aos="fade-up" data-aos-duration="850" class="hero-inner">
            <div class="status-pill"><div class="status-dot"></div>Open to Opportunities</div>

            <h1 class="hero-name">
                @if($profile && $profile->title_name)
                    @php
                        $nameParts = explode(' ', $profile->title_name);
                        $lastName = array_pop($nameParts);
                        $firstName = implode(' ', $nameParts);
                    @endphp
                    {{ $firstName }} <span class="hl">{{ $lastName }}</span>
                @else
                    Putra Harapan <span class="hl">Tafonao</span>
                @endif
            </h1>
            <p class="hero-role"><span style="color:#334155">$</span> role = <span class="v">"{{ $profile->sub_title ?? 'IT Student & Web Developer' }}"</span></p>

            <p class="hero-desc"></p>

            <div class="hero-btns">
                <a href="#projects" class="btn-primary"><i class="fas fa-terminal"></i>Lihat Proyek</a>
                <a href="{{ asset('assets/pdf/CV_ATS_Putra_Harapan_Tafonao.pdf') }}" target="_blank" class="btn btn-primary"><i class="fas fa-eye me-2"></i>Lihat CV</a>
            </div>

            <div class="hero-stats" data-aos="fade-up" data-aos-delay="300">
                <div><div class="stat-val">{{ \App\Models\Project::count() > 0 ? \App\Models\Project::count() : '0' }}</div><div class="stat-lbl">Projects</div></div>
                <div class="stat-divider"></div>
                <div><div class="stat-val">10+</div><div class="stat-lbl">Certs</div></div>
                <div class="stat-divider"></div>
                <div><div class="stat-val">2024</div><div class="stat-lbl">Started</div></div>
            </div>
        </div>
    </div>
    <div class="scroll-hint">
        <span>scroll</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<section id="about" class="section-wrap">
    <div class="max-w container">
        <div class="section-header" data-aos="fade-right">
            <span class="section-num">01.</span>
            <h2 class="section-title">About Me</h2>
            <div class="section-line"></div>
        </div>
        <div class="about-grid">
            <div class="about-left" data-aos="fade-right" data-aos-delay="100">
                <div class="photo-frame">
                    <img src="{{ ($profile && $profile->profile_image) ? asset('storage/' . $profile->profile_image) : asset('assets/img/foto-formal.jpg') }}"
                         alt="Putra Harapan Tafonao Portrait"
                         loading="lazy"
                         decoding="async"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/260x330/0a1628/00f5d4?text=Foto+Saya';">
                </div>
                <div style="flex:1;">
                    <div class="code-box">
                        <span class="cm">// about me</span><br>
                        <span class="kw">const</span> <span class="fn">putra</span> = {<br>
                        &nbsp;&nbsp;<span class="str">role</span>: <span class="str">"IT Student"</span>,<br>
                        &nbsp;&nbsp;<span class="str">univ</span>: <span class="str">"Unimal"</span>,<br>
                        &nbsp;&nbsp;<span class="str">focus</span>: [<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="str">"Web Dev"</span>,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="str">"UI/UX"</span>,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="str">"AI/ML"</span><br>
                        &nbsp;&nbsp;],<br>
                        &nbsp;&nbsp;<span class="str">available</span>: <span class="kw">true</span>,<br>
                        &nbsp;&nbsp;<span class="str">coffee</span>: <span class="num">Infinity</span><br>
                        };<br><br>
                        <span class="cm">// always learning...</span>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="200">
                @if($profile && $profile->about_text)
                    <p class="about-text" style="white-space: pre-line;">{!! $profile->about_text !!}</p>
                @else
                    <p class="about-text">Sebagai <strong>Mahasiswa Teknik Informatika</strong> di Universitas Malikussaleh, saya tertarik pada persimpangan antara teknologi murni dan desain interaksi. Kode yang baik bukan hanya efisien - ia harus menghasilkan antarmuka yang intuitif dan memanjakan pengguna.</p>
                    <p class="about-text">Fokus utama mencakup pengembangan web modern (OOP, RESTful API), eksplorasi AI, dan penerapan prinsip <strong style="color:var(--accent)">UI/UX Design</strong> untuk solusi digital komprehensif. Saya mengutamakan kolaborasi dan sangat adaptif terhadap ekosistem teknologi yang terus berkembang.</p>
                @endif

                <div class="subsection-title">// Education</div>
                <div class="edu-item">
                    <div class="edu-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div>
                        <div class="edu-title">S1 Teknik Informatika</div>
                        <div class="edu-sub">Universitas Malikussaleh · Web & Mobile Engineering</div>
                    </div>
                </div>
                <div class="edu-item">
                    <div class="edu-icon" style="background:rgba(99,102,241,0.1);color:#818cf8;"><i class="fas fa-school"></i></div>
                    <div>
                        <div class="edu-title">SMA Negeri 1 Sungai Aur</div>
                        <div class="edu-sub">Jurusan MIPA · Lulus 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section-wrap">
    <div class="max-w container">
        <div class="section-header" style="justify-content:center;" data-aos="fade-up">
            <span class="section-num">02.</span>
            <h2 class="section-title">Tech Stack</h2>
            <div class="section-line" style="max-inline-size:200px;"></div>
        </div>

        <div class="skills-grid mt-8">
            <div class="skill-card" data-aos="fade-up" data-aos-delay="100">
                <div class="skill-card-title">// Languages</div>
                <div class="tech-grid">
                    @forelse($skills->where('category', 'Languages') as $sk)
                        <div class="tech-item">
                            <i class="{{ $sk->icon_class }}"></i>
                            <span>{{ $sk->name }}</span>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600 font-mono text-xs py-2">Belum ada data Languages</div>
                    @endforelse
                </div>
            </div>

            <div class="skill-card" data-aos="fade-up" data-aos-delay="200">
                <div class="skill-card-title">// Frameworks</div>
                <div class="tech-grid">
                    @forelse($skills->where('category', 'Frameworks') as $sk)
                        <div class="tech-item">
                            <i class="{{ $sk->icon_class }}"></i>
                            <span>{{ $sk->name }}</span>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600 font-mono text-xs py-2">Belum ada data Frameworks</div>
                    @endforelse
                </div>
            </div>

            <div class="skill-card" data-aos="fade-up" data-aos-delay="300">
                <div class="skill-card-title">// Tools & Design</div>
                <div class="tech-grid">
                    @forelse($skills->where('category', 'Tools & Design') as $sk)
                        <div class="tech-item">
                            <i class="{{ $sk->icon_class }}"></i>
                            <span>{{ $sk->name }}</span>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-600 font-mono text-xs py-2">Belum ada data Tools & Design</div>
                    @endforelse
                </div>
            </div>

            <div class="skill-card" data-aos="fade-up" data-aos-delay="400">
                <div class="skill-card-title">// Soft Skills</div>
                <div style="display:flex; flex-direction:column; gap:8px; margin-top:0.75rem;">
                    @forelse($skills->where('category', 'Soft Skills') as $sk)
                        <span class="soft-pill" style="display:inline-flex; align-items:center; width:fit-content;">
                            <i class="{{ $sk->icon_class ?? 'fas fa-brain' }}"></i>
                            {{ $sk->name }}
                        </span>
                    @empty
                        <div class="text-center text-gray-600 font-mono text-xs py-2">Belum ada data Soft Skills</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<section id="projects" class="section-wrap">
    <div class="max-w container">
        <div class="section-header" style="justify-content:center;" data-aos="fade-up">
            <span class="section-num">03.</span>
            <h2 class="section-title">Featured Projects</h2>
            <div class="section-line" style="max-inline-size:200px;"></div>
        </div>

        <div class="projects-grid">
            @forelse($projects as $index => $p)
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
                <div class="col-span-full text-center py-12">
                    <p class="font-mono text-xs text-gray-500">Belum ada proyek unggulan di database. Akses /admin untuk mengubah data.</p>
                </div>
            @endforelse
        </div>

        <div style="text-align:center; margin-top:4rem;" data-aos="fade-up">
            <a href="{{ route('projects.archive') }}"
               style="display:inline-flex; align-items:center; gap:8px; font-family:'JetBrains Mono',monospace; font-size:0.78rem; color:var(--accent); border:1px solid var(--border); padding:0.75rem 1.8rem; border-radius:6px; text-decoration:none; transition:all 0.28s;"
               onmouseover="this.style.background='rgba(0,245,212,0.08)'; this.style.borderColor='rgba(0,245,212,0.4)';"
               onmouseout="this.style.background='transparent'; this.style.borderColor='var(--border)';">
                <i class="fas fa-boxes-stacked"></i> View All Projects (Archive) →
            </a>
        </div>
    </div>
</section>

<section id="experience" class="section-wrap">
    <div class="max-w container">
        <div class="exp-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
            <div>
                <div class="section-header">
                    <span class="section-num">04.</span>
                    <h2 class="section-title">Experience</h2>
                </div>
                <div class="timeline">
                    <div class="timeline-bar"></div>

                    <div class="t-item" style="margin-bottom: 2rem; opacity: 1 !important; visibility: visible !important;">
                        <div class="t-dot" style="background:var(--accent); box-shadow:0 0 12px var(--accent); opacity: 1 !important; visibility: visible !important;"></div>
                        <div class="exp-card" style="border-color:rgba(0,245,212,0.35); background:rgba(0,245,212,0.025); opacity: 1 !important; visibility: visible !important;">
                            <div class="exp-title" style="color:var(--accent); font-weight: 600;">Asisten Laboratorium</div>
                            <div class="exp-org">Laboratorium Komputer Teknik Informatika Unimal</div>
                            <div class="exp-date">2025 – Sekarang</div>
                            <div class="exp-desc">
                                <ul style="list-style-type:disc; padding-left:1.2rem; margin-top:0.4rem; font-size:0.85rem;" class="flex flex-col gap-1 text-gray-300">
                                    <li>Memandu jalannya sesi praktikum koding, algoritma, and RPL mahasiswa.</li>
                                    <li>Mengonfigurasi serta merawat kesiapan hardware dan jaringan komputer lab.</li>
                                    <li>Membantu dosen mengevaluasi tugas pemrograman dan troubleshooting eror kode.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="t-item">
                        <div class="t-dot dim"></div>
                        <div class="exp-card">
                            <div class="exp-title">Relawan Pendidikan</div>
                            <div class="exp-org">Pengabdian Masyarakat</div>
                            <div class="exp-date dim">Jan – Mar 2026</div>
                            <div class="exp-desc">Terjun langsung dalam pendampingan siswa, melatih kecerdasan emosional dan problem-solving lapangan.</div>
                        </div>
                    </div>

                    <div class="t-item">
                        <div class="t-dot" style="background:linear-gradient(135deg,var(--accent),var(--primary));box-shadow:0 0 12px var(--accent)"></div>
                        <div class="exp-card" style="border-color:rgba(0,245,212,0.3);background:rgba(0,245,212,0.025);">
                            <div class="exp-title" style="color:var(--accent);">🚀 Open for Internship</div>
                            <div class="exp-date">Present</div>
                            <div class="exp-desc">Aktif mencari peluang magang di bidang Web Development & UI/UX Design untuk berkontribusi secara profesional.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="certificates">
                <div class="section-header">
                    <span class="section-num">05.</span>
                    <h2 class="section-title">Certificates</h2>
                </div>
                <a href="https://www.dicoding.com/certificates/0LZ0Y9473X65" target="_blank" rel="noopener noreferrer" class="cert-card" aria-label="Sertifikat Dasar Pemrograman Web Dicoding">
                    <div class="cert-left">
                        <div class="cert-icon"><i class="fas fa-code"></i></div>
                        <div><div class="cert-name">Belajar Dasar Pemrograman Web</div><div class="cert-issuer">Dicoding Indonesia</div></div>
                    </div>
                    <div class="cert-arrow"><i class="fas fa-external-link-alt"></i></div>
                </a>
                <a href="https://www.dicoding.com/certificates/ERZRLGY32ZYV" target="_blank" rel="noopener noreferrer" class="cert-card" aria-label="Sertifikat Dasar AI Dicoding">
                    <div class="cert-left">
                        <div class="cert-icon" style="color:#a78bfa;background:rgba(167,139,250,0.1);border-color:rgba(167,139,250,0.2)"><i class="fas fa-robot"></i></div>
                        <div><div class="cert-name">Belajar Dasar AI</div><div class="cert-issuer">Dicoding Indonesia</div></div>
                    </div>
                    <div class="cert-arrow"><i class="fas fa-external-link-alt"></i></div>
                </a>
                <a href="https://www.dicoding.com/certificates/MRZMWQJ1RPYQ" target="_blank" rel="noopener noreferrer" class="cert-card" aria-label="Sertifikat Pemrograman Kotlin Dicoding">
                    <div class="cert-left">
                        <div class="cert-icon" style="color:#7f52ff;background:rgba(127,82,255,0.1);border-color:rgba(127,82,255,0.2)"><i class="devicon-kotlin-plain" style="font-size:1.05rem"></i></div>
                        <div><div class="cert-name">Memulai Pemrograman dengan Kotlin</div><div class="cert-issuer">Dicoding Indonesia</div></div>
                    </div>
                    <div class="cert-arrow"><i class="fas fa-external-link-alt"></i></div>
                </a>
                <a href="https://www.dicoding.com/certificates/JLX1VD2K5Z72" target="_blank" rel="noopener noreferrer" class="cert-card" aria-label="Sertifikat Financial Literacy Dicoding">
                    <div class="cert-left">
                        <div class="cert-icon" style="color:#f97316;background:rgba(249,115,22,0.1);border-color:rgba(249,115,22,0.2)"><i class="fas fa-chart-line"></i></div>
                        <div><div class="cert-name">Introduction to Financial Literacy</div><div class="cert-issuer">Dicoding Indonesia</div></div>
                    </div>
                    <div class="cert-arrow"><i class="fas fa-external-link-alt"></i></div>
                </a>
                <div style="text-align:center;margin-block-start:1.2rem;">
                    <a href="https://drive.google.com/drive/folders/1BSOM43RpDUNJiQNDibaI37O80pZB7CJS" target="_blank" rel="noopener noreferrer"
                       style="display:inline-flex;align-items:center;gap:8px;font-family:'JetBrains Mono',monospace;font-size:0.76rem;color:var(--accent);border:1px solid var(--border);padding:0.65rem 1.4rem;border-radius:6px;text-decoration:none;transition:all 0.28s;"
                       onmouseover="this.style.background='rgba(0,245,212,0.08)';this.style.borderColor='rgba(0,245,212,0.4)'"
                       onmouseout="this.style.background='transparent';this.style.borderColor='var(--border)'">
                        <i class="fas fa-folder-open"></i>View All Certificates →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="section-wrap">
    <div class="max-w container">
        <div class="contact-box" data-aos="zoom-in">
            <div style="position:relative;z-index:1;">
                <p style="font-family:'JetBrains Mono',monospace;font-size:0.75rem;color:var(--accent);letter-spacing:0.12em;margin-block-end:0.8rem;">// get_in_touch()</p>
                <h2 class="contact-title">Ayo Berkolaborasi!</h2>
                <p class="contact-sub">Saya selalu terbuka untuk diskusi mengenai peluang magang, pekerjaan, atau proyek kolaborasi. Jangan ragu menghubungi saya!</p>
                <div class="contact-btns">
                    <a href="mailto:putraharapantafonao199@gmail.com" class="btn-primary" aria-label="Kirim Email ke Putra"><i class="fas fa-paper-plane"></i>Kirim Email</a>
                    <a href="https://wa.me/6281270857189?text=Halo%20Putra,%20saya%20melihat%20portofolio%20Anda%20dan%20ingin%20berdiskusi%20lebih%20lanjut." target="_blank" rel="noopener noreferrer" class="wa-btn" aria-label="Hubungi Putra via WhatsApp"><i class="fab fa-whatsapp text-lg"></i>WhatsApp</a>
                </div>
                <div class="divider-h"></div>
                <div class="socials">
                    <a href="{{ $profile->linkedin_link ?? 'https://www.linkedin.com/in/putra-harapan-tafonao-83b3b332b' }}" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="LinkedIn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ $profile->github_link ?? 'https://github.com/putraharapantafonao' }}" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="GitHub" title="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://www.dicoding.com/users/putraharapantafonao/academies" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="Profil Dicoding" title="Dicoding"><i class="fas fa-laptop-code"></i></a>
                    <a href="{{ $profile->instagram_link ?? 'https://www.instagram.com/putraharapantafonao714/profilecard/' }}" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="Instagram" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <p class="footer-quote">"Logic will get you from A to B. Imagination will take you everywhere."</p>
    <p class="footer-copy">&copy; 2026 Putra Harapan Tafonao — Built with ♥</p>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
<script src="{{ asset('assets/js/script.js') }}" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            once: true,
            mirror: false,
            disable: 'mobile'
        });

        // Logika Pengendali Fitur Toggle Dark/Light Mode
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');

        if (localStorage.getItem('theme') === 'light') {
            document.body.classList.remove('bg-[#030712]', 'text-gray-100');
            document.body.classList.add('bg-gray-100', 'text-gray-900');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
        }

        themeToggle.addEventListener('click', () => {
            if (document.body.classList.contains('bg-[#030712]')) {
                document.body.classList.remove('bg-[#030712]', 'text-gray-100');
                document.body.classList.add('bg-gray-100', 'text-gray-900');
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'light');
            } else {
                document.body.classList.remove('bg-gray-100', 'text-gray-900');
                document.body.classList.add('bg-[#030712]', 'text-gray-100');
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'dark');
            }
        });
    });
</script>
</body>
</html>
