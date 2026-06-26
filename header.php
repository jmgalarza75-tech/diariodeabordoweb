<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // SEO & GEO: Meta Description Dinámica
    if (!has_action('wp_head', 'wpseo_head')) {
        $meta_desc = '';
        if (is_single() || is_page()) {
            $custom_desc = get_post_meta(get_the_ID(), 'meta_description', true);
            if (!empty($custom_desc)) {
                $meta_desc = $custom_desc;
            } elseif (has_excerpt()) {
                $meta_desc = get_the_excerpt();
            }
        } else {
            $meta_desc = get_bloginfo('description');
        }
        
        if ($meta_desc) {
            echo '<meta name="description" content="' . esc_attr(wp_strip_all_tags($meta_desc)) . '">' . "\n";
        }
    }
    ?>
    <?php wp_head(); ?>
    <?php
    // GEO: Inyección de Schema JSON-LD para IAs generativas y Google
    if (is_front_page() || is_home()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => get_bloginfo('name'),
            'url' => home_url('/'),
            'description' => get_bloginfo('description'),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name')
            )
        );
        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
    } elseif (is_single()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_post_meta(get_the_ID(), 'seo_title', true) ?: get_the_title(),
            'description' => get_post_meta(get_the_ID(), 'meta_description', true) ?: wp_strip_all_tags(get_the_excerpt()),
            'url' => get_permalink(),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author()
            ),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c')
        );
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ($image) {
            $schema['image'] = $image;
        }
        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
    }
    ?>
    <style>
        /* ── DYNAMIC ASSET PARITY: Ensure correct image URLs for templates ── */
        :root {
            --template-dir: url('<?php echo get_template_directory_uri(); ?>');
        }
    </style>
</head>
<body <?php body_class(); ?>>
    <div id="app">
        <!-- ── VERTICAL GUIDES ── -->
        <div class="vertical-line" style="left: 40px; opacity: 0.1;"></div>
        <div class="vertical-line" style="right: 40px; opacity: 0.1;"></div>

        <nav id="da-nav">
            <div class="nav-left">
                <?php 
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="da-brand-logo">
                        <div class="brand-text">
                            <span>Diario de</span>
                            <span><em>Abordo</em></span>
                        </div>
                    </a>
                <?php } ?>
                <span class="technical-label status-label" style="margin-left: 20px; font-size: 8px; opacity: 0.5;">NAVIGATIONAL LOG // PHASE: ASCENSION</span>
            </div>
            
            <div class="nav-right">
                <div class="links" id="nav-links">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => function() {
                            echo '<a href="' . home_url('/leadership/') . '" class="technical-label">Leadership</a>';
                            echo '<a href="' . home_url('/growth/') . '" class="technical-label">Growth</a>';
                            echo '<a href="' . home_url('/sistemas/') . '" class="technical-label">Sistemas</a>';
                            echo '<a href="' . home_url('/blog/') . '" class="technical-label">Blog</a>';
                        },
                    ));
                    ?>
                    <div class="nav-tech-data" style="margin-left: 30px; border-left: 1px solid var(--line); padding-left: 20px; display: flex; gap: 20px;">
                        <span class="technical-label" style="font-size: 8px;">INDEX / 02</span>
                        <span class="technical-label" style="font-size: 8px;">COORD / 40.4&deg;N 3.7&deg;W</span>
                    </div>
                    <a href="<?php echo home_url('/#newsletter'); ?>" class="btn-sub">Suscribirse</a>
                </div>
                <button class="nav-toggle" id="nav-toggle"><span></span><span></span><span></span></button>
            </div>
        </nav>
