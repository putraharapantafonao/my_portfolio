<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Putra Harapan Tafonao | Portofolio</title>
    <meta name="description" content="Portofolio Personal Putra Harapan Tafonao, Mahasiswa Teknik Informatika yang berfokus pada Web Development dan UI/UX Design.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}">
</head>
<body class="bg-[#030712] text-gray-100 overflow-x-hidden">

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
        <div style="display:flex;align-items:center;gap:1rem;">
            <a href="#contact" class="btn-nav" style="display:none;" id="contact-nav">contact_me()</a>
            <script>document.getElementById('contact-nav').style.display='block';</script>
            <button id="mobile-btn" aria-label="Buka Menu" onclick="document.getElementById('mobile-menu').style.display=document.getElementById('mobile-menu').style.display==='block'?'none':'block'">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    <div id="mobile-menu">
        <a href="#about" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">about</a>
        <a href="#skills" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">skills</a>
        <a href="#projects" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">projects</a>
        <a href="#experience" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">experience</a>
        <a href="#contact" class="nav-link" onclick="document.getElementById('mobile-menu').style.display='none'">contact</a>
    </div>
</nav>

<section id="hero" class="section-wrap">
    <div class="hero-inner">
        <div data-aos="fade-up" data-aos-duration="850" class="flex flex-col items-center text-center md:items-start md:text-left">
            <div class="status-pill"><div class="status-dot"></div>Open to Opportunities</div>
            <h1 class="hero-name">
                Putra Harapan<br>
                <span class="hl">Tafonao</span>
            </h1>
            <p class="hero-role"><span style="color:#334155">$</span> role = <span class="v">"IT Student & Web Developer"</span></p>
            <p class="hero-desc">
                Memadukan <strong>logika pemrograman</strong> dengan estetika visual. Berfokus pada <span class="ac">Web Development</span>, <span class="pr">UI/UX Design</span>, dan merancang pengalaman digital yang intuitif.
            </p>
            <div class="hero-btns justify-center md:justify-start w-full">
                <a href="#projects" class="btn-primary"><i class="fas fa-terminal"></i>Lihat Proyek</a>
                <a href="{{ secure_asset('assets/pdf/CV_Putra_Harapan_Tafonao.pdf') }}" target="_blank" class="btn-secondary"><i class="fas fa-file-alt"></i>Unduh CV</a>
            </div>
            <div class="hero-stats justify-center md:justify-start w-full" data-aos="fade-up" data-aos-delay="300">
                <div><div class="stat-val">5+</div><div class="stat-lbl">Projects</div></div>
                <div class="stat-divider"></div>
                <div><div class="stat-val">7+</div><div class="stat-lbl">Certs</div></div>
                <div class="stat-divider"></div>
                <div><div class="stat-val">2024</div><div class="stat-lbl">Started</div></div>
            </div>
        </div>
        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200" style="display:flex;justify-content:center;">
            <div class="profile-wrap">
                <div class="profile-glow"></div>
                <div class="profile-ring"></div>
                <img src="{{ secure_asset('assets/img/foto-formal.jpg') }}" alt="Foto Profil Resmi Putra Harapan Tafonao" class="profile-img" decoding="async"
                     onerror="this.src='https://via.placeholder.com/320x320/0a1628/00f5d4?text=PHT'">
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
                    <img src="{{ secure_asset('assets/img/foto-formal.jpg') }}" alt="Putra Harapan Tafonao Portret" loading="lazy" decoding="async"
                         onerror="this.src='https://via.placeholder.com/260x330/0a1628/00f5d4?text=Foto+Saya'">
                </div>
                <div style="flex:1;">
                    <div class="code-box">
                        <span class="cm">// about.config.js</span><br>
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
                <p class="about-text">Sebagai <strong>Mahasiswa Teknik Informatika</strong> di Universitas Malikussaleh, saya tertarik pada persimpangan antara teknologi murni dan desain interaksi. Kode yang baik bukan hanya efisien - ia harus menghasilkan antarmuka yang intuitif dan memanjakan pengguna.</p>
                <p class="about-text">Fokus utama mencakup pengembangan web modern (OOP, RESTful API), eksplorasi AI, dan penerapan prinsip <strong style="color:var(--accent)">UI/UX Design</strong> untuk solusi digital komprehensif. Saya mengutamakan kolaborasi dan sangat adaptif terhadap ekosistem teknologi yang terus berkembang.</p>
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
        <div class="skills-grid">
            <div class="skill-card" data-aos="fade-up" data-aos-delay="100">
                <div class="skill-card-title">// Languages</div>
                <div class="tech-grid">
                    <div class="tech-item"><i class="devicon-php-plain" style="color:#7a86b8"></i><span>PHP</span></div>
                    <div class="tech-item"><i class="devicon-javascript-plain" style="color:#f7df1e"></i><span>JavaScript</span></div>
                    <div class="tech-item"><i class="devicon-python-plain" style="color:#3572A5"></i><span>Python</span></div>
                    <div class="tech-item"><i class="devicon-java-plain" style="color:#ea2d2e"></i><span>Java</span></div>
                    <div class="tech-item"><i class="devicon-kotlin-plain" style="color:#7f52ff"></i><span>Kotlin</span></div>
                    <div class="tech-item"><i class="devicon-html5-plain" style="color:#e34f26"></i><span>HTML5</span></div>
                    <div class="tech-item"><i class="devicon-css3-plain" style="color:#1572b6"></i><span>CSS3</span></div>
                    <div class="tech-item"><i class="devicon-cplusplus-plain" style="color:#00599c"></i><span>C++</span></div>
                </div>
            </div>
            <div class="skill-card" data-aos="fade-up" data-aos-delay="200">
                <div class="skill-card-title">// Frameworks</div>
                <div class="tech-grid">
                    <div class="tech-item"><i class="devicon-laravel-plain" style="color:#FF2D20"></i><span>Laravel</span></div>
                    <div class="tech-item"><i class="devicon-react-original" style="color:#61dafb"></i><span>React</span></div>
                    <div class="tech-item"><i class="devicon-tailwindcss-plain" style="color:#06b6d4"></i><span>Tailwind</span></div>
                    <div class="tech-item"><i class="devicon-flutter-plain" style="color:#54c5f8"></i><span>Flutter</span></div>
                    <div class="tech-item"><i class="devicon-mysql-plain" style="color:#00758f"></i><span>MySQL</span></div>
                </div>
            </div>
            <div class="skill-card" data-aos="fade-up" data-aos-delay="300">
                <div class="skill-card-title">// Tools & Design</div>
                <div class="tech-grid">
                    <div class="tech-item"><i class="devicon-git-plain" style="color:#f05032"></i><span>Git</span></div>
                    <div class="tech-item"><i class="devicon-github-original" style="color:#e2e8f0"></i><span>GitHub</span></div>
                    <div class="tech-item"><i class="devicon-figma-plain" style="color:#f24e1e"></i><span>Figma</span></div>
                    <div class="tech-item"><i class="devicon-vscode-plain" style="color:#0078d7"></i><span>VS Code</span></div>
                </div>
            </div>
            <div class="skill-card" data-aos="fade-up" data-aos-delay="400">
                <div class="skill-card-title">// Soft Skills</div>
                <div style="display:flex;flex-wrap:wrap;gap:4px;margin-block-start:0.5rem;">
                    <span class="soft-pill"><i class="fas fa-brain"></i>Problem Solving</span>
                    <span class="soft-pill"><i class="fas fa-users"></i>Leadership</span>
                    <span class="soft-pill"><i class="fas fa-handshake"></i>Collaboration</span>
                    <span class="soft-pill"><i class="fas fa-comments"></i>Communication</span>
                    <span class="soft-pill"><i class="fas fa-calendar-alt"></i>Event Mgmt</span>
                    <span class="soft-pill"><i class="fas fa-lightbulb"></i>Creative Thinking</span>
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
        <div id="project-container" class="projects-grid"></div>
    </div>
</section>

<section id="experience" class="section-wrap">
    <div class="max-w container">
        <div class="exp-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
            <div data-aos="fade-right">
                <div class="section-header">
                    <span class="section-num">04.</span>
                    <h2 class="section-title">Experience</h2>
                </div>
                <div class="timeline">
                    <div class="timeline-bar"></div>
                    <div class="t-item">
                        <div class="t-dot"></div>
                        <div class="exp-card">
                            <div class="exp-title">Anggota Divisi Desain & Broadcasting</div>
                            <div class="exp-org">FORMADIKSI KIP-K Unimal</div>
                            <div class="exp-date">2025 – 2026</div>
                            <div class="exp-desc">Merancang materi visual dan mengelola konten digital organisasi, mengasah keahlian di bidang estetika desain and UI/UX.</div>
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

            <div data-aos="fade-left" id="certificates">
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
                    <a href="https://www.linkedin.com/in/putra-harapan-tafonao-83b3b332b" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="LinkedIn Putra Harapan Tafonao" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/putraharapantafonao" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="GitHub Putra Harapan Tafonao" title="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://www.dicoding.com/users/putraharapantafonao/academies" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="Profil Dicoding Putra Harapan Tafonao" title="Dicoding"><i class="fas fa-laptop-code"></i></a>
                    <a href="https://www.instagram.com/putraharapantafonao714/profilecard/" target="_blank" rel="noopener noreferrer" class="soc-btn" aria-label="Instagram Putra Harapan Tafonao" title="Instagram"><i class="fab fa-instagram"></i></a>
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
<script src="{{ secure_asset('assets/js/projects.js') }}" defer></script>
<script src="{{ secure_asset('assets/js/script.js') }}" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi AOS (Otomatis nonaktif di mobile untuk melejitkan nilai performa ke zona hijau)
        AOS.init({
            once: true,
            mirror: false,
            disable: 'mobile'
        });
    });
</script>
</body>
</html>
