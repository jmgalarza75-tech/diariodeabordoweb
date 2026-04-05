<?php
/**
 * Template Name: Sistemas // Operativa
 * Repositorio: Diario de Abordo 2.2
 */
get_header(); ?>

<main class="page-content reveal" <?php if ( ! is_front_page() ) echo 'style="padding-top: 100px;"'; ?>>
    <header class="article-hero" style="position: relative; overflow: hidden; min-height: 100vh; display: flex; align-items: center; padding: 60px 0;">
        <div class="hero-bg" style="position:absolute; top:0; left:0; right:0; bottom:0; z-index:-1; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/productivity.png'); background-size: cover; background-position: center;"></div>
        
        <div class="container hero-content" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 8vw; align-items: center; max-width: 1400px; margin: 0 auto; padding: 0 40px; width: 100%;">
            <div class="hero-left">
                <span class="technical-label" style="color:var(--accent); letter-spacing: 0.3em; font-family:var(--font-mono); font-size: 13px; display:block; margin-bottom: 20px;">SISTEMAS // INGENIER&Iacute;A OPERATIVA</span>
                <h1 style="font-size: clamp(38px, 6vw, 60px); line-height: 0.85; margin-bottom: 30px;">EL MOTOR DE<br>TU OPERATIVA.</h1>
                
                <div class="body-text" style="font-size: 1.1rem; line-height: 1.8; color: rgba(255,255,255,0.85); max-width: 800px;">
                    <p style="margin-bottom: 30px;">La productividad no es trabajar m&aacute;s. Es crear una m&aacute;quina que trabaje por ti para liberar tu mayor recurso: <strong style="color:var(--fg);">el pensamiento estrat&eacute;gico.</strong></p>
                    
                    <div class="sop-block" style="background: rgba(0,0,0,0.5); border-left: 2px solid var(--accent); padding: 20px; font-family: var(--font-mono); font-size: 14px; margin-bottom: 40px;">
                        <code style="color: var(--accent); display: block;">[SYSTEM_AUDIT] --mode=radical</code>
                        <code style="color: #666; display: block;">// Eliminando fugas de energ&iacute;a</code>
                        <code style="display: block;">> Automatizar reportes semanales</code>
                        <code style="display: block;">> Delegar micro-gesti&oacute;n de canales</code>
                        <code style="display: block;">> Bloqueo de Deep Work: 08:00 - 11:00</code>
                    </div>

                    <h2 style="font-family: var(--font-mono); font-size: 0.9rem; letter-spacing: 0.2em; color: var(--accent); margin-top: 60px; margin-bottom: 20px;">ARQUITECTURA DE EFICIENCIA</h2>
                    <span class="premium-tag" style="background: var(--accent); color: #000; padding: 4px 12px; font-size: 10px; font-weight: 700; border-radius: 2px; text-transform: uppercase; letter-spacing: 0.1em;">PREMIUM CONTENT</span>
                    
                    <ul style="list-style: none; padding: 0; margin-top: 40px;">
                        <li style="margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <strong style="color: var(--accent); display: block; margin-bottom: 5px;">01 BISTUR&Iacute; T&Aacute;CTICO</strong>
                            Elimina cualquier reuni&oacute;n que no tenga un objetivo de 3 puntos y una duraci&oacute;n de 15 minutos.
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="hero-right">
                <div class="image-frame" style="border: 1px solid rgba(255,255,255,0.1); padding: 10px; background: #080808;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; filter: grayscale(0.2) contrast(1.1); display: block;']); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/productivity.png" alt="Productivity Portada" style="width: 100%; height: auto; filter: grayscale(0.2) contrast(1.1); display: block;">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
</main>

<?php get_footer(); ?>
