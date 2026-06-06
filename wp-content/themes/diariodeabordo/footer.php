        <footer id="da-footer">
            <div class="footer-grid">
                <!-- BLOCK 1: CONTACT -->
                <div class="footer-block contact-block">
                    <span class="technical-label">Canal de Contacto</span>
                    <a href="mailto:josemgalarza@diariodeabordo.es" class="footer-link">josemgalarza@diariodeabordo.es</a>
                    <div class="social-links">
                        <a href="#" class="technical-label">X/Twitter</a>
                        <a href="#" class="technical-label">LinkedIn</a>
                    </div>
                </div>

                <!-- BLOCK 2: LOGO -->
                <div class="footer-block logo-block">
                    <a href="<?php echo home_url('/'); ?>" class="da-brand-logo">
                        <div class="brand-text">
                            <span>Diario de</span>
                            <span><em>Abordo</em></span>
                        </div>
                    </a>
                    <span class="technical-label" style="opacity: 0.3; margin-top: 10px;">V.41.0 // BEYOND VIBE</span>
                </div>

                <!-- BLOCK 3: LEGALS -->
                <div class="footer-block legals-block">
                    <span class="technical-label">Navegaci&oacute;n Legal</span>
                    <nav class="footer-nav">
                        <a href="<?php echo home_url('/privacy/'); ?>">Privacidad</a>
                        <a href="<?php echo home_url('/sitemap/'); ?>">Mapa del Sitio</a>
                        <a href="<?php echo home_url('/terms/'); ?>">T&eacute;rminos</a>
                    </nav>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2026 DIARIO DE ABORDO. <span style="color: var(--accent);">[SYSTEMS DIV // MISSION_READY]</span>
            </div>
        </footer>
    </div><!-- #app -->

    <?php wp_footer(); ?>
    
    <!-- ── REVEAL OBSERVER (PM MANUAL: Optimized UX) ── -->
    <script>
        const agObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    agObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.reveal').forEach(el => agObserver.observe(el));
    </script>
</body>
</html>
