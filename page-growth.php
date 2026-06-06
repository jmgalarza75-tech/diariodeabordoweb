<?php
/**
 * Template Name: Growth // Crecimiento
 */
get_header(); ?>

<main class="page-content reveal">
    <header class="article-hero" style="position: relative; overflow: hidden; min-height: 100vh; display: flex; align-items: center; padding: 60px 0;">
        <div class="hero-bg" style="position:absolute; top:0; left:0; right:0; bottom:0; z-index:-1; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/growth.png'); background-size: cover; background-position: center;"></div>
        
        <div class="container hero-content" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 8vw; align-items: center; max-width: 1400px; margin: 0 auto; padding: 0 40px; width: 100%;">
            <div class="hero-left">
                <span class="technical-label" style="color:var(--accent); letter-spacing: 0.3em; font-family:var(--font-mono); font-size: 13px; display:block; margin-bottom: 20px;">SEMANA 02 // ESTOICISMO DE TRINCHERA</span>
                <h1 style="font-size: clamp(38px, 6vw, 60px); line-height: 0.85; margin-bottom: 30px;">ESTOICISMO<br>DE TRINCHERA.</h1>
                
                <div class="body-text" style="font-size: 1.1rem; line-height: 1.8; color: rgba(255,255,255,0.85); max-width: 800px;">
                    <p style="margin-bottom: 30px;">La mayor&iacute;a de los humanos viven en el pasado. Los dem&aacute;s, en el futuro. <strong style="color:var(--fg);">T&uacute; vives en el ahora, o mueres.</strong></p>
                    <p style="margin-bottom: 40px; border-left: 2px solid var(--accent); padding-left: 30px; font-style: italic; color: #fff;">"Si el sistema cae, t&uacute; te mantienes. Si la suerte te abandona, tu disciplina la sustituye. T&uacute; eres la ciudadela."</p>

                    <h2 style="font-family: var(--font-mono); font-size: 0.9rem; letter-spacing: 0.2em; color: var(--accent); margin-top: 60px; margin-bottom: 20px;">PROTOCOLO DE ENTORNO POST-COLAPSO</h2>
                    <span class="premium-tag" style="background: var(--accent); color: #000; padding: 4px 12px; font-size: 10px; font-weight: 700; border-radius: 2px; text-transform: uppercase; letter-spacing: 0.1em;">PREMIUM CONTENT</span>
                    
                    <ul style="list-style: none; padding: 0; margin-top: 40px;">
                        <li style="margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <strong style="color: var(--accent); display: block; margin-bottom: 5px;">01 DUDA DEL PLACER</strong>
                            Si algo es f&aacute;cil, es in&uacute;til. Si algo duele, es progreso real.
                        </li>
                        <li style="margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <strong style="color: var(--accent); display: block; margin-bottom: 5px;">02 MUERTE AL EGO</strong>
                            No eres lo que dices, eres lo que haces cuando nadie te ve en la trinchera.
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="hero-right">
                <div class="image-frame" style="border: 1px solid rgba(255,255,255,0.1); padding: 10px; background: #080808;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; filter: grayscale(0.2) contrast(1.1); display: block;']); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/growth.png" alt="Growth Portada" style="width: 100%; height: auto; filter: grayscale(0.2) contrast(1.1); display: block;">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <div class="content-body" style="max-width: 800px; margin: 100px auto; padding: 40px;">
        <div class="editorial-text reveal" style="font-size: 26px; line-height: 1.5; color: var(--fg); font-weight: 300; border-left: 2px solid var(--accent); padding-left: 40px; margin-bottom: 120px;">
            La realidad no te debe nada. Preocuparse por lo que no depende de ti es regalar tu <strong style="font-weight: 700; color: var(--accent);">RAM mental</strong> al enemigo. <strong style="font-weight: 700; color: var(--accent);">M Market</strong> se mueve. T&uacute; decides si te mueves con &eacute;l o te congelas.
        </div>

        <div class="premium-gate reveal" style="background: rgba(20,20,20,0.8); backdrop-filter: blur(20px); border: 1px solid var(--line); padding: 80px 60px; margin-top: 100px; position: relative; box-shadow: 0 50px 100px rgba(0,0,0,0.8);">
            <span class="premium-label" style="background: var(--accent); color: #000; padding: 4px 12px; font-weight: 700; font-family: var(--font-mono); font-size: 11px; margin-bottom: 40px; display: inline-block;">DEEP PREMIUM / ACCESO RESTRINGIDO</span>
            <h2 style="font-size: 38px; color: #fff; font-weight: 700; line-height: 1.1;">DICOTOM&Iacute;A DEL CONTROL: INSTRUCCIONES DE RESILIENCIA T&Aacute;CTICA</h2>
            
            <ul class="tactical-list" style="list-style: none; margin-top: 60px; padding: 0;">
                <li style="margin-bottom: 40px; padding-left: 40px; border-left: 1px solid var(--line); position: relative;">
                    <span style="position: absolute; left: -20px; top: 0; font-family: var(--font-mono); font-size: 10px; color: var(--accent); background: #000; padding: 0 10px;">01</span>
                    <h4 style="font-size: 20px; font-weight: 700; color: var(--fg); margin-bottom: 12px; text-transform: uppercase; letter-spacing: .1em;">Auditor&iacute;a de Hechos</h4>
                    <p style="font-size: 16px; color: var(--fg-dim); line-height: 1.8;">Haz una lista de los desastres actuales. Elimina los adjetivos. Solo datos. La objetividad es un arma.</p>
                </li>
                <li style="margin-bottom: 40px; padding-left: 40px; border-left: 1px solid var(--line); position: relative;">
                    <span style="position: absolute; left: -20px; top: 0; font-family: var(--font-mono); font-size: 10px; color: var(--accent); background: #000; padding: 0 10px;">02</span>
                    <h4 style="font-size: 20px; font-weight: 700; color: var(--fg); margin-bottom: 12px; text-transform: uppercase; letter-spacing: .1em;">Aislamiento de Control</h4>
                    <p style="font-size: 16px; color: var(--fg-dim); line-height: 1.8;">Marca qu&eacute; puedes cambiar en las pr&oacute;ximas 2 horas. El resto es ruido. Ignora el ruido o morir&aacute;s con &eacute;l.</p>
                </li>
                <li style="margin-bottom: 40px; padding-left: 40px; border-left: 1px solid var(--line); position: relative;">
                    <span style="position: absolute; left: -20px; top: 0; font-family: var(--font-mono); font-size: 10px; color: var(--accent); background: #000; padding: 0 10px;">03</span>
                    <h4 style="font-size: 20px; font-weight: 700; color: var(--fg); margin-bottom: 12px; text-transform: uppercase; letter-spacing: .1em;">Escudo Mental (Amor Fati)</h4>
                    <p style="font-size: 16px; color: var(--fg-dim); line-height: 1.8;">Aceptaci&oacute;n radical del obst&aacute;culo como combustible. Lo que antes era un impedimento ahora es el camino. No solo lo toleras, lo deseas.</p>
                </li>
                <li style="margin-bottom: 40px; padding-left: 40px; border-left: 1px solid var(--line); position: relative;">
                    <span style="position: absolute; left: -20px; top: 0; font-family: var(--font-mono); font-size: 10px; color: var(--accent); background: #000; padding: 0 10px;">04</span>
                    <h4 style="font-size: 20px; font-weight: 700; color: var(--fg); margin-bottom: 12px; text-transform: uppercase; letter-spacing: .1em;">Ejecuci&oacute;n Fr&iacute;a</h4>
                    <p style="font-size: 16px; color: var(--fg-dim); line-height: 1.8;">Frenar la par&aacute;lisis por an&aacute;lisis. Si no hay control, hay acci&oacute;n pura. Convertir la ansiedad en movimiento cin&eacute;tico inmediato.</p>
                </li>
                <li style="margin-bottom: 40px; padding-left: 40px; border-left: 1px solid var(--line); position: relative;">
                    <span style="position: absolute; left: -20px; top: 0; font-family: var(--font-mono); font-size: 10px; color: var(--accent); background: #000; padding: 0 10px;">05</span>
                    <h4 style="font-size: 20px; font-weight: 700; color: var(--fg); margin-bottom: 12px; text-transform: uppercase; letter-spacing: .1em;">Reporte de Da&ntilde;os</h4>
                    <p style="font-size: 16px; color: var(--fg-dim); line-height: 1.8;">An&aacute;lisis post-tormenta sin ego. ¿Qu&eacute; sistema fall&oacute;? ¿Qu&eacute; redundancia necesitamos? La crisis es el mejor consultor de ingeniería.</p>
                </li>
            </ul>
        </div>
    </div>
</main>

<?php get_footer(); ?>
