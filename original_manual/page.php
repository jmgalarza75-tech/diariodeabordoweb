<?php get_header(); ?>

<main class="page-standard" style="background: var(--godly-black); color: white; min-height: 100vh; padding-top: 120px;">
    <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <header class="page-header" style="margin-bottom: 80px; text-align: center;">
                <span class="technical-meta" style="font-family: 'Space Mono', monospace; font-size: 10px; opacity: 0.5; letter-spacing: 4px; display: block; margin-bottom: 20px;">MODULE // SYSTEM_PILAR</span>
                <h1 style="font-size: 10vw; font-weight: 800; line-height: 0.8; letter-spacing: -0.05em; margin: 0; color: var(--godly-gold);">
                    <?php the_title(); ?>
                </h1>
            </header>

            <div class="page-content" style="font-size: 20px; line-height: 1.5; opacity: 0.9;">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
