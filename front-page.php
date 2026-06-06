<?php 
/**
 * Template Name: Home Page Godly
 */
get_header(); ?>

<main id="godly-home">
    <!-- 1. HERO SECTION -->
    <section class="hero-stage" style="background-image: linear-gradient(to right, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.2) 100%), url('<?php echo get_template_directory_uri(); ?>/hero-bg.jpg'); background-size: cover; background-position: center;">
        <div class="hero-content">
            <div class="hero-left reveal">
                <h2 class="manifesto-text">
                    EL LIDERAZGO NO ES EL RUIDO QUE HACES. ES LA <span style="color:var(--accent); font-weight:600;">DIRECCI&Oacute;N</span> QUE MANTIENES 
                    CUANDO EL MAR SE PONE DIF&Iacute;CIL.
                </h2>
                <h1 class="hero-title">ABORDO.</h1>
            </div>

            <div class="hero-right reveal">
                <div class="hero-image-wrap">
                    <!-- Photo removed -->
                </div>
                <div class="hero-buttons">
                    <a href="<?php echo site_url('/about'); ?>" class="btn-secondary">Mi Manifiesto →</a>
                    <a href="#newsletter" class="btn-primary" id="hero-cta">Subir a bordo →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. CATEGORY MARQUEE -->
    <div class="marquee-wrap">
        <div class="marquee-content">
            <?php 
            $categories = get_categories();
            $cat_string = " | ";
            foreach($categories as $category) {
                $cat_string .= strtoupper($category->name) . " | ";
            }
            $final_marquee = $cat_string . "DIARIO DE ABORDO | BIT&Aacute;CORA | ";
            ?>
            <span class="marquee-item"><?php echo str_repeat($final_marquee, 3); ?></span>
            <span class="marquee-item"><?php echo str_repeat($final_marquee, 3); ?></span>
        </div>
    </div>

    <!-- 3. FEATURED POSTS (THE SHARDS) -->
    <section id="posts-wrap" style="padding: 100px 0; background: #000; text-align: center;">
        <div class="sliced-gallery" style="height: 70vh; margin: 0 auto; width: 90%;">
            <?php
            $args = array('posts_per_page' => 3, 'post_status' => 'publish');
            $featured_posts = new WP_Query($args);
            $count = 0;
            
            // Fallback assets mapping
            $fallbacks = ['leadership.png', 'growth.png', 'productivity.png'];

            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post();
                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if(!$img_url) {
                        $img_url = get_template_directory_uri() . '/' . $fallbacks[$count % 3];
                    }
                    for($i=0; $i<4; $i++): // 4 slices per post
                        $slice_index = ($count * 4) + $i;
                        $pos = $slice_index * 9;
                        ?>
                        <div class="gallery-slice" 
                             style="background-image: url('<?php echo $img_url; ?>'); background-position: <?php echo $pos; ?>% 50%;" 
                             onclick="location.href='<?php the_permalink(); ?>'">
                             <?php if($i === 1): ?>
                             <span class="technical-label" style="position:absolute; bottom: 40px; left: 20px; writing-mode: vertical-rl; transform:rotate(180deg); color:var(--accent); font-size:14px; font-weight:800;">
                                <?php the_title(); ?>
                             </span>
                             <?php endif; ?>
                        </div>
                    <?php endfor;
                    $count++;
                endwhile;
                wp_reset_postdata();
            else:
                // Full static fallback if NO entries exist yet
                for($f=0; $f<3; $f++):
                    $img_url = get_template_directory_uri() . '/' . $fallbacks[$f];
                    for($i=0; $i<4; $i++):
                        $slice_index = ($f * 4) + $i;
                        $pos = $slice_index * 9;
                        ?>
                        <div class="gallery-slice" 
                             style="background-image: url('<?php echo $img_url; ?>'); background-position: <?php echo $pos; ?>% 50%;">
                        </div>
                    <?php endfor;
                endfor;
            endif; ?>
        </div>
    </section>

    <!-- 4. NEWSLETTER SECTION -->
    <section id="newsletter" style="padding:150px 40px; border-top: 1px solid var(--line); display: flex; flex-direction: column; align-items: center; text-align: center; background: #050505; position: relative; z-index: 10;">
        <span class="technical-label" style="margin-bottom: 20px;">REGISTRO DE BIT&Aacute;CORA / SUBSTACK</span>
        <h2 style="font-size: clamp(30px, 4.5vw, 54px); font-weight: 700; margin-bottom: 40px;">&Uacute;NETE A LA TRIPULACI&Oacute;N.</h2>
        <div style="background: transparent; border: 1px solid var(--line); padding: 5px; position: relative;">
            <iframe src="https://josemgalarza.substack.com/embed" width="480" height="320" 
                    style="border: none; background: transparent; filter: invert(1) hue-rotate(180deg) contrast(1.1); transform: scale(1.05);">
            </iframe>
            <div style="position:absolute; bottom: 0; left: 0; right: 0; height: 30px; background: #050505; pointer-events: none;"></div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
