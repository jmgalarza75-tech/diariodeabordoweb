<?php
/**
 * The Blog Archive Template
 * Repositorio: Diario de Abordo 2.2
 */
get_header(); ?>

<style>
.blog-archive-redesign {
    position: relative;
    padding: 140px 40px;
    min-height: 100vh;
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
}

.blog-background {
    position: absolute;
    inset: 0;
    z-index: -10;
    opacity: 0.6;
    overflow: hidden;
    pointer-events: none;
}

.bg-shape {
    position: absolute;
    top: 0; left: 0;
    border-radius: 50%;
    transform: rotate(-45deg);
}
.shape-1 {
    height: 1280px; width: 560px;
    transform: rotate(-45deg) translateY(-350px);
    background: radial-gradient(68.54% 68.72% at 55.02% 31.46%, rgba(201,168,76, 0.06) 0, rgba(150,150,150,0.02) 50%, rgba(0,0,0,0.01) 80%);
}
.shape-2 {
    height: 1280px; width: 240px;
    transform: translate(5%, -50%) rotate(-45deg);
    background: radial-gradient(50% 50% at 50% 50%, rgba(201,168,76, 0.04) 0, rgba(0,0,0,0.01) 80%, transparent 100%);
}
.shape-3 {
    height: 1280px; width: 240px;
    transform: rotate(-45deg) translateY(-350px);
    background: radial-gradient(50% 50% at 50% 50%, rgba(201,168,76, 0.04) 0, rgba(0,0,0,0.01) 80%, transparent 100%);
}

.blog-header {
    margin-bottom: 40px;
}
.blog-title {
    font-family: var(--font-mono);
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 700;
    letter-spacing: 0.05em;
    margin-top: 10px;
}
.blog-subtitle {
    color: var(--fg-dim);
    font-size: 16px;
    margin-top: 10px;
    max-width: 600px;
}

.blog-divider {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed var(--line);
    margin-bottom: 40px;
}

.blog-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    position: relative;
    z-index: 10;
}
@media (min-width: 768px) {
    .blog-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (min-width: 1024px) {
    .blog-grid { grid-template-columns: repeat(3, 1fr); }
}

.blog-card {
    display: flex;
    flex-direction: column;
    gap: 12px;
    border-radius: 8px;
    padding: 12px;
    text-decoration: none !important;
    transition: background-color 0.2s;
    background: transparent;
}
.blog-card:hover {
    background: rgba(201,168,76, 0.05);
}

.blog-card-image-wrap {
    width: 100%;
    aspect-ratio: 16/9;
    overflow: hidden;
    border-radius: 6px;
    background: #111;
}

.blog-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.blog-card:hover .blog-image {
    transform: scale(1.05);
}

.blog-card-content {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding: 0 8px 8px 8px;
}

.blog-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--fg-dim);
    font-size: 11px;
    font-family: var(--font-sans);
}
.meta-dot {
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background-color: var(--fg-dim);
}

.blog-card-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--fg);
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.blog-card-desc {
    color: var(--fg-dim);
    font-size: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.5;
}
.blog-card-desc p {
    margin: 0;
    font-size: inherit;
    color: inherit;
}
</style>

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
        <p class="blog-subtitle">Descubre las últimas transmisiones, tácticas de crecimiento y reflexiones de liderazgo.</p>
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
