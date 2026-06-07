<?php 
/**
 * Template Name: Mapa del Sitio (Sitemap HTML)
 */
get_header(); ?>

<main class="page-content" style="background: var(--godly-black); color: white; min-height: 100vh; padding: 140px 40px; font-family: var(--font-mono);">
    <article class="container" style="max-width: 800px; margin: 0 auto;">
        
        <header class="page-header" style="margin-bottom: 80px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 40px;">
            <span class="technical-meta" style="font-size: 10px; opacity: 0.5; letter-spacing: 2px; text-transform: uppercase;">
                SYSTEM_INDEX // LOG_DIRECTORY
            </span>
            <h1 style="font-size: clamp(32px, 5vw, 64px); font-weight: 800; line-height: 1; letter-spacing: -0.03em; margin: 20px 0 0 0; font-family: var(--font-sans);">
                MAPA DEL SITIO
            </h1>
        </header>

        <div class="sitemap-content">
            
            <section style="margin-bottom: 60px;">
                <h2 style="font-size: 24px; color: var(--accent); margin-bottom: 20px; font-family: var(--font-sans);">01 // PÁGINAS PRINCIPALES</h2>
                <ul style="list-style: none; padding: 0; margin: 0; border-left: 1px solid rgba(255,255,255,0.2); padding-left: 20px;">
                    <?php 
                    wp_list_pages(array(
                        'title_li' => '',
                        'depth' => 1,
                        'link_before' => '<span style="color: var(--fg); text-transform: uppercase; font-size: 14px; letter-spacing: 1px;">',
                        'link_after' => '</span>'
                    )); 
                    ?>
                </ul>
            </section>

            <section style="margin-bottom: 60px;">
                <h2 style="font-size: 24px; color: var(--accent); margin-bottom: 20px; font-family: var(--font-sans);">02 // REGISTROS DE BITÁCORA (BLOG)</h2>
                <ul style="list-style: none; padding: 0; margin: 0; border-left: 1px solid rgba(255,255,255,0.2); padding-left: 20px;">
                    <?php
                    $args = array('posts_per_page' => -1, 'post_status' => 'publish');
                    $all_posts = new WP_Query($args);
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                    ?>
                        <li style="margin-bottom: 15px;">
                            <span style="opacity: 0.5; font-size: 12px; margin-right: 15px;"><?php echo get_the_date('Y.m.d'); ?></span>
                            <a href="<?php the_permalink(); ?>" style="color: var(--fg); text-decoration: none; font-size: 14px; font-family: var(--font-sans);"><?php the_title(); ?></a>
                        </li>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
            </section>

        </div>

    </article>
</main>

<?php get_footer(); ?>
