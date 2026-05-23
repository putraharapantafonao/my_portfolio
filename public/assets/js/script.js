// ===== 1. AOS INITIATION =====
if (typeof AOS !== 'undefined') {
    AOS.init({ once: true, offset: 80, duration: 750, easing: 'ease-out-cubic' });
}

// ===== 2. DYNAMIC CANVAS DETECTION WITH STABLE CODES =====
const canvas = document.getElementById('hero-canvas') || document.getElementById('canvas-matrix');
let ctx = null;
let columns = 0;
let drops = [];
const fs = 14;
const chars = "1010101010101010101010101010{}[]=->;()".split('');

if (canvas) {
    ctx = canvas.getContext('2d');

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        columns = Math.floor(canvas.width / fs) + 2;

        drops = [];
        for (let i = 0; i < columns; i++) {
            drops[i] = Math.floor(Math.random() * -canvas.height / fs);
        }
    }

    resizeCanvas();

    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(resizeCanvas, 150);
    });
}

// ===== 3. INTEGRATED INTERACTIVE CURSOR PARTICLES =====
let mouse = { x: undefined, y: undefined };
let particlesArray = [];

window.addEventListener('mousemove', (event) => {
    mouse.x = event.clientX;
    mouse.y = event.clientY;

    if (canvas && ctx) {
        for (let i = 0; i < 2; i++) {
            particlesArray.push(new Particle(mouse.x, mouse.y));
        }
    }
});

window.addEventListener('mouseout', () => {
    mouse.x = undefined;
    mouse.y = undefined;
});

class Particle {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.size = Math.random() * 3 + 1;
        this.speedX = Math.random() * 1.5 - 0.75;
        this.speedY = Math.random() * 1.5 - 0.75;
        const cursorColors = ['#00f5d4', '#00ff66', '#0ea5e9'];
        this.color = cursorColors[Math.floor(Math.random() * cursorColors.length)];
    }
    update() {
        this.x += this.speedX;
        this.y += this.speedY;
        if (this.size > 0.1) this.size -= 0.05;
    }
    draw() {
        if (!ctx) return;
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
    }
}

function handleParticles() {
    for (let i = 0; i < particlesArray.length; i++) {
        particlesArray[i].update();
        particlesArray[i].draw();

        if (particlesArray[i].size <= 0.1) {
            particlesArray.splice(i, 1);
            i--;
        }
    }
}

// ===== 4. MAIN ANIMATION LOOP TIMELINE =====
function drawTimeline() {
    if (!canvas || !ctx) return;

    ctx.fillStyle = 'rgba(3, 7, 18, 0.05)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    ctx.font = `600 ${fs}px 'JetBrains Mono', monospace`;

    for (let i = 0; i < columns; i++) {
        const text = chars[Math.floor(Math.random() * chars.length)];
        const xPosition = i * fs;
        const yPosition = drops[i] * fs;

        if (yPosition > 0) {
            if (drops[i] === 1) {
                ctx.fillStyle = '#ffffff';
            } else if (drops[i] < 6) {
                ctx.fillStyle = '#00ffaa';
            } else {
                ctx.fillStyle = '#00ff66';
            }

            ctx.fillText(text, xPosition, yPosition);
        }

        if (drops[i] * fs > canvas.height && Math.random() > 0.975) {
            drops[i] = 0;
        }

        drops[i]++;
    }

    handleParticles();
}

if (canvas) {
    setInterval(drawTimeline, 45);
}

// ===== 5. DYNAMIC CARDS RENDERER =====
const pc = document.getElementById('project-container');
if (pc && typeof myProjects !== 'undefined') {
    pc.innerHTML = '';
    myProjects.forEach((p, i) => {
        const tags = p.tags.map(t => `<span class="tag">${t}</span>`).join('');
        pc.innerHTML += `
        <div data-aos="fade-up" data-aos-delay="${i * 110}" class="proj-card">
            <a href="${p.link}" target="_blank" rel="noopener noreferrer">
                <div class="proj-img-wrap">
                    <img src="${p.image}" alt="${p.title}" onerror="this.src='${p.fallbackImg}'">
                    <div class="proj-overlay"><span><i class="fas fa-external-link-alt" style="font-size:.7rem"></i> view_live_demo()</span></div>
                </div>
            </a>
            <div class="proj-body">
                <a href="${p.link}" target="_blank" class="proj-title">${p.title}</a>
                <p class="proj-desc">${p.description}</p>
                <div class="proj-tags">${tags}</div>
            </div>
        </div>`;
    });
}

// ===== 6. EXTENSION: MULTI-LINE LOOPING TERMINAL TYPEWRITER EFFECT =====
document.addEventListener('DOMContentLoaded', () => {
    const nameElement = document.querySelector('.hero-name');
    const descElement = document.querySelector('.hero-desc');

    if (nameElement && descElement) {
        const firstNameText = "Putra Harapan ";
        const lastNameText = "Tafonao";

        // Pemisahan baris kalimat mentah yang utuh (Disertai tag HTML langsung agar aman dan konsisten)
        const descSlides = [
            'Memadukan <strong>logika pemrograman</strong> dengan estetika visual. Berfokus pada ',
            '<span class="ac">Web Development</span>, <span class="pr">UI/UX Design</span>, dan merancang pengalaman digital yang intuitif.'
        ];

        const cursor = document.createElement('span');
        cursor.textContent = '|';
        cursor.style.color = '#00f5d4';
        cursor.style.animation = 'blink 0.8s infinite';
        cursor.style.fontFamily = 'monospace';
        cursor.style.marginLeft = '4px';
        cursor.style.display = 'inline-block';

        nameElement.style.opacity = '1';
        descElement.style.opacity = '1';

        let currentSlideIdx = 0;
        let charIndex = 0;
        let isDeleting = false;
        let nameTyped = false;

        function typewriterEngine() {
            // --- FASE A: MENGETIK NAMA UTAMA (HANYA SEKALI DI AWAL) ---
            if (!nameTyped) {
                if (charIndex < firstNameText.length) {
                    nameElement.textContent = firstNameText.substring(0, charIndex + 1);
                    nameElement.appendChild(cursor);
                    charIndex++;
                    setTimeout(typewriterEngine, 70);
                } else {
                    let spanHL = nameElement.querySelector('.hl');
                    if (!spanHL) {
                        spanHL = document.createElement('span');
                        spanHL.className = 'hl';
                        nameElement.appendChild(spanHL);
                    }

                    let subIndex = charIndex - firstNameText.length;
                    if (subIndex < lastNameText.length) {
                        spanHL.textContent = lastNameText.substring(0, subIndex + 1);
                        nameElement.appendChild(cursor);
                        charIndex++;
                        setTimeout(typewriterEngine, 85);
                    } else {
                        nameTyped = true;
                        charIndex = 0;
                        setTimeout(typewriterEngine, 200);
                    }
                }
                return;
            }

            // --- FASE B: SIKLUS DESKRIPSI MULTI-BARIS BERPUTAR AMAN ---
            const currentHTMLTemplate = descSlides[currentSlideIdx];

            if (!isDeleting) {
                // >>> AKSI MENGETIK MASUK DENGAN PARSING HTML OLEH BROWSER <<<
                if (charIndex < currentHTMLTemplate.length) {
                    // Cek jika karakter saat ini adalah bagian dari tag HTML (< atau &)
                    if (currentHTMLTemplate.charAt(charIndex) === '<') {
                        // Lompat langsung sampai tag penutup '>' selesai agar struktur HTML tidak rusak di layar
                        charIndex = currentHTMLTemplate.indexOf('>', charIndex) + 1;
                    } else if (currentHTMLTemplate.charAt(charIndex) === '&') {
                        charIndex = currentHTMLTemplate.indexOf(';', charIndex) + 1;
                    } else {
                        charIndex++;
                    }

                    descElement.innerHTML = currentHTMLTemplate.substring(0, charIndex);
                    descElement.appendChild(cursor);
                    setTimeout(typewriterEngine, 30); // Kecepatan ketik masuk teks
                } else {
                    isDeleting = true;
                    setTimeout(typewriterEngine, 3500); // Diam 3.5 detik untuk dibaca
                }
            } else {
                // >>> AKSI HAPUS MUNDUR KELUAR SECARA HALUS per KARAKTER MURNI <<<
                if (charIndex > 0) {
                    // Cek jika proses hapus mundur menabrak tag HTML penutup '>'
                    if (currentHTMLTemplate.charAt(charIndex - 1) === '>') {
                        // Lompat mundur melewati seluruh tag HTML sekaligus agar tidak merusak DOM
                        charIndex = currentHTMLTemplate.lastIndexOf('<', charIndex - 1);
                    } else if (currentHTMLTemplate.charAt(charIndex - 1) === ';') {
                        charIndex = currentHTMLTemplate.lastIndexOf('&', charIndex - 1);
                    } else {
                        charIndex--;
                    }

                    descElement.innerHTML = currentHTMLTemplate.substring(0, charIndex);
                    descElement.appendChild(cursor);
                    setTimeout(typewriterEngine, 15); // Kecepatan hapus keluar teks
                } else {
                    // Pindah ke slide baris berikutnya secara berputar otomatis
                    isDeleting = false;
                    currentSlideIdx = (currentSlideIdx + 1) % descSlides.length;
                    setTimeout(typewriterEngine, 400); // Jeda sejenak sebelum mulai mengetik baris baru
                }
            }
        }

        typewriterEngine();
    }
});
