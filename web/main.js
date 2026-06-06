/* ── DIARIO DE ABORDO — MARQUEE SYSTEM v23.0 ── */

// 1. MODULE: Navigation
const nav = `
  <nav id="da-nav">
    <a href="index.html" class="da-brand-logo">
        <div class="brand-text">
            <span>Diario de</span>
            <span><em>Abordo</em></span>
        </div>
    </a>
    <button id="nav-toggle" class="nav-toggle">
        <span></span><span></span><span></span>
    </button>
    <div class="links" id="nav-links">
      <a href="leadership.html" class="technical-label">Leadership</a>
      <a href="growth.html" class="technical-label">Growth</a>
      <a href="productivity.html" class="technical-label">Sistemas</a>
      <a href="blog.html" class="technical-label">Blog</a>
      <a href="about.html" class="technical-label">Qui&eacute;n Soy</a>
      <a href="#newsletter" class="btn-sub da-btn-confetti" style="background:var(--accent); color:#000;">Suscribirse</a>
    </div>
  </nav>
`;

// 2. MODULE: Decorative Lines
const decorativeLines = `
    <div class="vertical-line" style="left: 40px; opacity: 0.3;"></div>
    <div class="vertical-line" style="right: 40px; opacity: 0.3;"></div>
`;

// 3. MODULE: Godly Hero (Screen-Filling Layout)
const hero = `
  <section class="hero-stage">
    <div class="hero-content">
        <div class="hero-left reveal">
            <h2 class="manifesto-text">
                EL LIDERAZGO NO ES EL RUIDO QUE HACES. ES LA <span style="color:var(--accent); font-weight:600;">DIRECCI&Oacute;N</span> QUE MANTIENES 
                CUANDO EL MAR SE PONE DIF&Iacute;CIL.
            </h2>
            <h1 class="hero-title">ABORDO.</h1>
            <div class="hero-buttons">
                <a href="about.html" class="btn-secondary">Mi Manifiesto &rarr;</a>
                <a href="#newsletter" class="btn-primary" id="hero-cta" onclick="triggerConfetti(event); return false;">Subir a bordo &rarr;</a>
            </div>
        </div>

        <div class="hero-right reveal">
            <div class="hero-image-wrap">
                <img src="jose_maria.jpg" alt="Jose Maria">
            </div>
        </div>
    </div>
  </section>
`;

// 4. MODULE: CATEGORY TICKER + GALLERY
const conceptStr = "NO HAY VIENTO FAVORABLE PARA QUIEN NO SABE A DÓNDE VA | ";
const postSection = `
  <div class="marquee-wrap">
    <div class="marquee-content">
        <span class="marquee-item">${conceptStr}</span>
        <span class="marquee-item">${conceptStr}</span>
        <span class="marquee-item">${conceptStr}</span>
    </div>
  </div>

  <section id="posts-wrap" style="padding: 100px 0; background: #000; text-align: center;">
    <div class="sliced-gallery" style="height: 70vh; margin: 0 auto; width: 90%;">
        ${[1,2,3,4,5,6,7,8,9,10,11,12].map(i => {
            const img = i <= 4 ? 'leadership.png' : i <= 8 ? 'growth.png' : 'productivity.png';
            const link = i <= 4 ? 'leadership.html' : i <= 8 ? 'growth.html' : 'productivity.html';
            const label = i === 2 ? 'LIDERAZGO' : i === 6 ? 'CRECIMIENTO' : i === 10 ? 'SISTEMAS' : '';
            return `<div class="gallery-slice" 
                         style="background-image: url('${img}'); background-position: ${(i-1) * 9}% 50%;" 
                         onclick="location.href='${link}'">
                         ${label ? `<span class="technical-label" style="position:absolute; bottom: 40px; left: 20px; writing-mode: vertical-rl; transform:rotate(180deg); color:var(--accent); font-size:14px; font-weight:800;">${label}</span>` : ''}
                    </div>`;
        }).join('')}
    </div>
  </section>
`;

// 5. MODULE: Newsletter
const newsletterSection = `
  <section id="newsletter" style="padding:150px 40px; border-top: 1px solid var(--line); display: flex; flex-direction: column; align-items: center; text-align: center; background: #050505; position: relative; z-index: 10;">
    <span class="technical-label" style="margin-bottom: 20px;">REGISTRO DE BIT&Aacute;CORA / SUBSTACK</span>
    <h2 style="font-size: clamp(30px, 4.5vw, 54px); font-weight: 700; margin-bottom: 40px;">&Uacute;NETE A LA TRIPULACI&Oacute;N.</h2>
    <div style="background: transparent; border: 1px solid var(--line); padding: 5px; position: relative;">
        <iframe src="https://josemgalarza.substack.com/embed" width="480" height="320" 
                style="border: none; background: transparent; filter: invert(1) hue-rotate(180deg) contrast(1.1); transform: scale(1.05);">
        </iframe>
        <div style="position:absolute; bottom: 0; left: 0; right: 0; height: 30px; background: #050505; pointer-events: none;"></div>
    </div>
  </section>
`;

// RENDER ALL (ONLY ON HOME - PREVENT AUTO-SHIFT ON SUBPAGES)
const app = document.getElementById('app');
const path = window.location.pathname;
const isHome = path.endsWith('index.html') || path === '/' || path.endsWith('web/') || path === '/web';

if(app && isHome) {
  app.innerHTML = nav + decorativeLines + hero + postSection + newsletterSection;
}

// ── INTERACTIVITY ──
window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    const navEl = document.getElementById('da-nav');
    if(navEl) navEl.style.background = scrolled > 50 ? 'rgba(0,0,0,0.98)' : 'transparent';
}, { passive: true });

// ── MOBILE MENU ──
const toggle = document.getElementById('nav-toggle');
const menu = document.getElementById('nav-links');
if(toggle && menu) {
    toggle.addEventListener('click', () => {
        toggle.classList.toggle('active');
        menu.classList.toggle('active');
    });
}

// ── REVEAL ──
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) entry.target.classList.add('visible');
  });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ── SONAR ──
window.triggerConfetti = (e) => {
    const pulse = document.createElement('div');
    pulse.className = 'sonar-ping';
    const x = e ? e.clientX : window.innerWidth / 2;
    const y = e ? e.clientY : window.innerHeight / 2;
    pulse.style.left = x + 'px';
    pulse.style.top = y + 'px';
    document.body.appendChild(pulse);
    setTimeout(() => pulse.remove(), 1200);

    const target = document.getElementById('newsletter');
    if(target) target.scrollIntoView({ behavior: 'smooth' });
};
