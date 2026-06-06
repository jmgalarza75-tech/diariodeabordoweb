<?php
/**
 * The Blog Archive Template
 * Repositorio: Diario de Abordo 2.2
 */
get_header(); ?>

<main class="page-content reveal" style="padding: 180px 40px; min-height: 100vh; display: flex; flex-direction: column; align-items: center;">
    <div style="text-align: center; max-width: 800px; width: 100%;">
        <span class="technical-label">ARCHIVO COMPLETO / HIST&Oacute;RICO</span>
        <h1 style="font-size: clamp(48px, 10vw, 120px); font-weight: 700; margin-bottom: 64px;">BIT&Aacute;CORA.</h1>
    </div>
    
    <div class="post-list" style="display: flex; flex-direction: column; gap: 80px; margin-top: 100px; width: 100%; max-width: 1000px; position:relative; z-index:100;">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="post-entry" style="display: flex; justify-content: space-between; align-items: baseline; border-bottom: 1px solid var(--line); padding-bottom: 40px; transition: border-color .3s; position: relative; width: 100%;">
                
                <!-- STRETCHED LINK (Base layer) -->
                <a href="<?php the_permalink(); ?>" class="stretched-link" style="position: absolute; inset: 0; z-index: 10;" aria-hidden="true"></a>
                
                <div class="post-title-wrap" style="position: relative; z-index: 20;">
                    <span class="meta" style="font-family: var(--font-mono); font-size: 11px; color: var(--fg-dim); text-transform: uppercase; position: relative; z-index: 30;">
                        <?php echo get_the_date('M Y'); ?> &middot; <span style="position: relative; z-index: 40;"><?php the_category(', '); ?></span>
                    </span>
                    <h2 style="font-size: 32px; font-weight: 600; color: var(--fg); max-width: 800px; margin-top: 10px; transition: color 0.3s; position: relative; z-index: 20; pointer-events: none;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--fg)'">
                        <?php the_title(); ?>
                    </h2>
                </div>
                <span class="meta" style="position: relative; z-index: 20; font-family: var(--font-mono); font-size: 11px; color: var(--accent); pointer-events: none;">
                    VIEW_LOG &rarr;
                </span>
                    VIEW_LOG &rarr;
                </span>
            </article>
        <?php endwhile; else : ?>
            <p style="text-align: center; width: 100%;"><?php _e( 'No hay entradas disponibles en este momento.', 'diario-de-abordo' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
