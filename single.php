<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- GEO/SEO: JSON-LD Structured Data para que las IAs entiendan el contenido -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?php echo esc_js(get_the_title()); ?>",
  "image": "<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php echo esc_js(get_the_author()); ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Diario de Abordo"
  },
  "datePublished": "<?php echo get_the_date('c'); ?>",
  "dateModified": "<?php echo get_the_modified_date('c'); ?>",
  "description": "<?php echo esc_js(wp_strip_all_tags(get_the_excerpt())); ?>"
}
</script>
<?php endwhile; endif; rewind_posts(); ?>

<main class="post-bitacora" style="background: var(--godly-black); color: white; min-height: 100vh; padding-top: 120px;">
    <article class="container" style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <header class="post-header" style="margin-bottom: 60px; border-left: 2px solid var(--godly-gold); padding-left: 30px;">
                <span class="technical-meta" style="font-family: 'Space Mono', monospace; font-size: 10px; opacity: 0.5; letter-spacing: 2px; display: block; margin-bottom: 10px;">
                    LOG_FILE // <?php echo get_the_date('Y.m.d'); ?> // ARCHIVE_ID: <?php the_ID(); ?>
                </span>
                <h1 style="font-size: clamp(32px, 5vw, 64px); font-weight: 800; line-height: 1; letter-spacing: -0.03em; margin: 0;">
                    <?php the_title(); ?>
                </h1>
            </header>

            <!-- GEO: BLUF (Bottom Line Up Front) / Resumen Ejecutivo para IAs -->
            <?php if(has_excerpt()): ?>
            <div class="post-bluf" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); padding: 30px; margin-bottom: 50px; font-size: 20px; font-style: italic; color: var(--godly-gold); border-radius: 4px;">
                <strong>Resumen Ejecutivo:</strong> <?php echo get_the_excerpt(); ?>
            </div>
            <?php endif; ?>

            <div class="post-content" style="font-size: 18px; line-height: 1.6; opacity: 0.9;">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-media" style="margin-bottom: 40px; border: 1px solid rgba(255,255,255,0.1); padding: 10px;">
                        <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; filter: grayscale(1);', 'alt' => esc_attr(get_the_title())]); ?>
                    </div>
                <?php endif; ?>

                <?php the_content(); ?>
            </div>

            <footer style="margin-top: 80px; padding-top: 40px; border-top: 1px solid rgba(255,255,255,0.1);">
                <a href="<?php echo home_url(); ?>" style="color: var(--godly-gold); text-decoration: none; font-family: 'Space Mono', monospace; font-size: 12px; letter-spacing: 2px;">
                    ← RETURN_TO_COMMAND_CENTER
                </a>
            </footer>
        <?php endwhile; endif; ?>
    </article>
</main>

<?php get_footer(); ?>
