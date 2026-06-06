<<<<<<< HEAD
/* ── DIARIO DE ABORDO — GODLY EDITION v2 ── */

const app = document.getElementById('app');

// 1. MODULE: Vertical Logic & Lines
const decorativeLines = `
  <div class="vertical-line"></div>
  <div style="position:fixed;right:40px;top:40px;z-index:1000;" class="technical-label">
    INDEX / 02 <br>
    COORD / 40.4&#176;N 3.7&#176;W
  </div>
`;

// 2. MODULE: 3D Rotating Ring
const ring = `
  <div class="ring-container">
    <div class="ring">
      <span class="ring-text">COMMAND THE HELM &middot; OWNERSHIP RADICAL &middot; STRATEGIC LEADERSHIP &middot; DIARIO DE ABORDO &middot; </span>
    </div>
  </div>
`;

// 3. MODULE: Godly Hero
const hero = `
  <section class="container" style="min-height:100vh;display:flex;flex-direction:column;justify-content:center;position:relative;z-index:2;">
    <p class="technical-label" style="margin-bottom:24px;">NAVIGATIONAL LOG / CURRENT PHASE: ASCENSION</p>
    <h1 class="hero-title reveal">
        DIARIO<br>DE<br>ABORDO.
    </h1>
    <div style="display:flex;justify-content:space-between;margin-top:100px;align-items:flex-end;">
        <p style="max-width:320px;font-size:14px;color:var(--fg-dim);line-height:1.7;font-family:var(--font-mono);letter-spacing:.05em;">
            [L-S] RADICAL OWNERSHIP <br>
            [D-S] STRATEGIC STOICISM <br>
            [P-E] PRODUCTIVITY ENG.
        </p>
    </div>
  </section>
`;

// 4. MODULE: Custom Accordion (Each image is a post/pillar)
const postAccordion = `
  <section class="container" style="margin: 100px 0;">
    <div class="technical-label" style="margin-bottom: 24px;">ARCHIVE / PILARES ESTRAT&Eacute;GICOS</div>
    <div class="accordion reveal">
      <div class="accordion-item" style="background-image: url('leadership_accordion_bg_1775163791614.png');" onclick="location.href='leadership.html'">
        <div class="item-content">
          <span class="technical-label">01 / LEADERSHIP</span>
          <h3>OWNERSHIP<br>RADICAL.</h3>
        </div>
      </div>
      <div class="accordion-item" style="background-image: url('growth_accordion_bg_1775163815166.png');" onclick="location.href='growth.html'">
        <div class="item-content">
          <span class="technical-label">02 / GROWTH</span>
          <h3>ESTOICISMO<br>DE TRINCHERA.</h3>
        </div>
      </div>
      <div class="accordion-item" style="background-image: url('productivity_accordion_bg_1775163840210.png');" onclick="location.href='productivity.html'">
        <div class="item-content">
          <span class="technical-label">03 / PRODUCTIVITY</span>
          <h3>INGENIER&Iacute;A<br>DE SISTEMAS.</h3>
        </div>
      </div>
    </div>
  </section>
`;

// 5. MODULE: Minimal Content
const statement = `
  <section id="newsletter" class="container" style="padding:100px 0;">
    <h2 style="font-size: clamp(34px, 5vw, 78px); font-weight: 700; max-width: 900px; line-height: 1; letter-spacing: -0.04em;">
      EL LIDERAZGO NO ES EL RUIDO QUE HACES. ES LA DIRECCI&Oacute;N QUE MANTIENES CUANDO EL MAR SE PONE DIF&Iacute;CIL.
    </h2>
    
    <div style="margin-top:100px;">
        <p style="color:var(--fg-dim);font-size:14px;margin-bottom:24px;">&Uacute;nete a la tripulaci&oacute;n. Semanalmente.</p>
        <a href="#newsletter" class="btn-primary">Subir a bordo &rarr;</a>
    </div>
  </section>
`;

// RENDER
app.innerHTML = decorativeLines + ring + hero + postAccordion + statement;

// ── INTERACTIVITY ──

// Scroll Reveal Observer
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
        entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// 3D Ring Animation Enhancement
const ringEl = document.querySelector('.ring');
window.addEventListener('scroll', () => {
    const rotation = window.scrollY * 0.1;
    ringEl.style.transform = `rotateZ(${rotation}deg)`;
}, { passive: true });
=======
/* ── DIARIO DE ABORDO — WORDPRESS THEME CORE JS ── */

document.addEventListener('DOMContentLoaded', () => {

    // ── GLOBAL IMPACT WAVES (SONAR PING) ──
    document.addEventListener('mousedown', (e) => {
        if (e.button !== 0) return; // Solo clic izquierdo

        const pulse = document.createElement('div');
        pulse.className = 'sonar-ping';
        pulse.style.left = e.clientX + 'px';
        pulse.style.top = e.clientY + 'px';
        document.body.appendChild(pulse);
        
        // Auto-limpieza de la onda
        setTimeout(() => pulse.remove(), 1200);
    });

    // ── NAVIGATION SCROLL LOGIC ──
    const navEl = document.getElementById('da-nav');
    if (navEl) {
        window.addEventListener('scroll', () => {
            navEl.style.background = window.scrollY > 50 ? 'rgba(0,0,0,0.98)' : 'rgba(0,0,0,0.9)';
            navEl.style.padding = window.scrollY > 50 ? '10px 40px' : '15px 40px';
        }, { passive: true });
    }

    // ── MOBILE MENU ──
    const toggle = document.getElementById('nav-toggle');
    const menu = document.getElementById('nav-links');
    if(toggle && menu) {
        toggle.addEventListener('click', () => {
            toggle.classList.toggle('active');
            menu.classList.toggle('active');
        });
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                toggle.classList.remove('active');
                menu.classList.remove('active');
            });
        });
    }

    // ── REVEAL ANIMATIONS ──
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // ── SONAR PING CALL (Helper for scripts) ──
    window.triggerConfetti = (e) => {
        const x = e ? e.clientX : window.innerWidth / 2;
        const y = e ? e.clientY : window.innerHeight / 2;
        const pulse = document.createElement('div');
        pulse.className = 'sonar-ping';
        pulse.style.left = x + 'px';
        pulse.style.top = y + 'px';
        document.body.appendChild(pulse);
        setTimeout(() => pulse.remove(), 1200);
    };

});
>>>>>>> d9b0067f5619c2f2a372199bf767e2b4e61aa73a
