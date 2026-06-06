<?php
/**
 * Main Template File (Fallback)
 * Evita que el layout de la Home se muestre en entradas cuando hay fallos de jerarquía.
 */
get_header(); 

if ( is_singular() ) {
    get_template_part( 'single' );
} else {
    ?>
    <main class="page-content reveal" style="padding: 180px 40px; min-height: 100vh;">
        <span class="technical-label">SYSTEM LOG / ARCHIVO GENERAL</span>
        <h1 style="font-size: clamp(48px, 10vw, 120px); font-weight: 700; margin-bottom: 64px;">ARCHIVO.</h1>
        
        <div class="post-list" style="display: flex; flex-direction: column; gap: 80px; margin-top: 100px;">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="post-entry" style="text-decoration: none; display: flex; justify-content: space-between; align-items: baseline; border-bottom: 1px solid var(--line); padding-bottom: 40px; transition: border-color .3s;">
                    <div class="post-title-wrap">
                        <span class="meta" style="font-family: var(--font-mono); font-size: 11px; color: var(--fg-dim); text-transform: uppercase;">
                            <?php echo get_the_date('M Y'); ?> &middot; <?php the_category(', '); ?>
                        </span>
                        <h2 style="font-size: 32px; font-weight: 600; color: var(--fg); max-width: 800px; margin-top: 10px;">
                            <?php the_title(); ?>
                        </h2>
                    </div>
                    <span class="meta" style="font-family: var(--font-mono); font-size: 11px; color: var(--fg-dim);">
                        VIEW_LOG &rarr;
                    </span>
                </a>
            <?php endwhile; else : ?>
                <p><?php _e( 'No hay entradas disponibles.', 'diario-de-abordo' ); ?></p>
            <?php endif; ?>
        </div>
    </main>
    <?php
}

get_footer(); 
?>
