// ===== AOS =====
AOS.init({ once: true, offset: 80, duration: 750, easing: 'ease-out-cubic' });

// ===== CODE RAIN CANVAS =====
const canvas = document.getElementById('hero-canvas');
const ctx = canvas.getContext('2d');
function resizeCanvas() { canvas.width = window.innerWidth; canvas.height = window.innerHeight; }
resizeCanvas();
window.addEventListener('resize', () => { resizeCanvas(); columns = Math.floor(canvas.width / fs); drops = Array(columns).fill(1); });

const chars = "01アイウエオカキクケコサシスセソ{}[];()=>const let fn return import class async await".split('');
const fs = 13;
let columns = Math.floor(canvas.width / fs);
let drops = Array(columns).fill(1);
const colors = ['#00f5d4', '#0ea5e9', '#7c3aed', '#00f5d4'];

function drawMatrix() {
    ctx.fillStyle = 'rgba(5,13,26,0.048)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = `${fs}px JetBrains Mono, monospace`;
    for (let i = 0; i < drops.length; i++) {
        ctx.fillStyle = colors[i % colors.length];
        ctx.fillText(chars[Math.floor(Math.random() * chars.length)], i * fs, drops[i] * fs);
        if (drops[i] * fs > canvas.height && Math.random() > 0.975) drops[i] = 0;
        drops[i]++;
    }
}
setInterval(drawMatrix, 58);

// ===== RENDER PROJECTS =====
const pc = document.getElementById('project-container');
if (pc && typeof myProjects !== 'undefined') {
    myProjects.forEach((p, i) => {
        const tags = p.tags.map(t => `<span class="tag">${t}</span>`).join('');
        pc.innerHTML += `
        <div data-aos="fade-up" data-aos-delay="${i*110}" class="proj-card">
            <a href="${p.link}" target="_blank" rel="noopener noreferrer">
                <div class="proj-img-wrap">
                    <img src="${p.image}" alt="${p.title}" onerror="this.src='${p.fallbackImg}'">
                    <div class="proj-overlay"><span><i class="fas fa-external-link-alt" style="font-size:.7rem"></i>Lihat Proyek</span></div>
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