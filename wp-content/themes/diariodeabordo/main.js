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
