/* ── SONAR SYSTEM OPERATOR (v61.0) ── */
document.addEventListener('mousedown', (e) => {
    // Si el usuario hace click con el botón izquierdo
    if (e.button === 0) {
        const ping = document.createElement('div');
        ping.className = 'sonar-ping';
        ping.style.left = e.clientX + 'px';
        ping.style.top = e.clientY + 'px';
        document.body.appendChild(ping);
        
        // El CSS sonar-pulse dura 1.2s, limpiamos a los 1.5s
        setTimeout(() => {
            ping.remove();
        }, 1500);
    }
});
