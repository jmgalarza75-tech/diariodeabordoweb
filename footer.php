        <footer id="da-footer" style="padding-top: 40px;">
            <!-- 4. GLOBAL NEWSLETTER SECTION -->
            <section id="newsletter" style="padding: 40px 40px 80px 40px; display: flex; flex-direction: column; align-items: center; text-align: center; background: transparent; position: relative; z-index: 10;">
                <span class="technical-label" style="margin-bottom: 20px;">REGISTRO DE BIT&Aacute;CORA / SUBSTACK</span>
                <h2 style="font-size: clamp(30px, 4.5vw, 54px); font-weight: 700; margin-bottom: 40px;">&Uacute;NETE A LA TRIPULACI&Oacute;N.</h2>
                <div style="background: transparent; border: 1px solid var(--line); padding: 5px; position: relative;">
                    <iframe src="https://josemgalarza.substack.com/embed" width="480" height="320" 
                            style="border: none; background: transparent; filter: invert(1) hue-rotate(180deg) contrast(1.1); transform: scale(1.05);">
                    </iframe>
                    <!-- Overlay para tapar la parte inferior del iframe -->
                    <div style="position:absolute; bottom: 0; left: 0; right: 0; height: 30px; background: #000; pointer-events: none;"></div>
                </div>
            </section>

            <div class="footer-bottom">
                &copy; <?php echo date('Y'); ?> DIARIO DE ABORDO. <span style="color: var(--accent);">[SYSTEMS DIV // MISSION_READY]</span>
                <span style="margin: 0 15px; color: var(--fg-dim);">|</span>
                <a href="<?php echo home_url('/mapa-del-sitio/'); ?>" style="color: var(--fg); text-decoration: none; font-size: 0.9em; letter-spacing: 0.1em; text-transform: uppercase; transition: color 0.3s;">Mapa del Sitio</a>
                
                <div style="margin-top: 15px; font-size: 0.9em; opacity: 0.6; letter-spacing: 0.1em; text-transform: uppercase;">
                    DISE&Ntilde;ADO POR <a href="https://pyme360.online" target="_blank" rel="noopener noreferrer" style="color: var(--accent); text-decoration: none; border-bottom: 1px solid rgba(201,168,76,0.3); padding-bottom: 2px; transition: all 0.3s;">PYME360</a>
                </div>
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
