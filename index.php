<?php
/**
 * Main Template File (Fallback)
 * Repositorio: Diario de Abordo 2.2
 */
get_header(); ?>

<main class="page-content blog-archive-redesign reveal">
    <!-- Background Gradients -->
    <div class="blog-background" aria-hidden="true">
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>
        <div class="bg-shape shape-3"></div>
    </div>

    <!-- Header -->
    <div class="blog-header">
        <span class="technical-label">ARCHIVO COMPLETO / HIST&Oacute;RICO</span>
        <h1 class="blog-title">BIT&Aacute;CORA.</h1>
        <p class="blog-subtitle">Una bitácora sobria para recuperar dirección, criterio y dignidad en medio de una transición vital o profesional.</p>
    </div>
    
    <div class="blog-divider"></div>

    <div class="blog-grid z-10">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="blog-card group">
                <div class="blog-card-image-wrap">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('large', ['class' => 'blog-image']);
                    } else { ?>
                        <img src="https://placehold.co/640x360?text=DIARIO+DE+ABORDO" alt="<?php the_title_attribute(); ?>" class="blog-image" />
                    <?php } ?>
                </div>
                
                <div class="blog-card-content">
                    <div class="blog-meta">
                        <p>por <?php the_author(); ?></p>
                        <div class="meta-dot"></div>
                        <p><?php echo get_the_date('d M Y'); ?></p>
                        <div class="meta-dot"></div>
                        <p>Log <?php the_ID(); ?></p>
                    </div>
                    <h2 class="blog-card-title"><?php the_title(); ?></h2>
                    <div class="blog-card-desc">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </a>
        <?php endwhile; else : ?>
            <p style="text-align: center; width: 100%; grid-column: 1 / -1;"><?php _e( 'No hay entradas disponibles en este momento.', 'diario-de-abordo' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
