<?php 
/**
 * Template Name: Home Page Godly
 */
get_header(); ?>

<main id="godly-home">
    <!-- 1. HERO SECTION -->
    <section class="hero-stage" style="position: relative; overflow: hidden; background: #000;">
        <video autoplay loop muted playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; filter: grayscale(1); opacity: 0.6;">
            <source src="<?php echo get_template_directory_uri(); ?>/hero-video.mp4" type="video/mp4">
        </video>
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.1) 100%); z-index: 1;"></div>
        
        <div class="hero-content" style="position: relative; z-index: 2;">
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

    <!-- 3. LATEST POSTS (ACCORDION) -->
    <section id="posts-wrap" style="padding: 100px 0; background: #000; text-align: center;">
        <div class="sliced-gallery" style="height: 70vh; margin: 0 auto; width: 90%;">
            <?php
            // Obtener las últimas 8 entradas del blog
            $args = array('posts_per_page' => 8, 'post_status' => 'publish');
            $featured_posts = new WP_Query($args);
            $count = 0;
            
            // Fallbacks si la entrada no tiene foto asignada
            $fallbacks = ['leadership.png', 'growth.png', 'productivity.png'];

            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post();
                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if(!$img_url) {
                        $img_url = get_template_directory_uri() . '/' . $fallbacks[$count % 3];
                    }
                    ?>
                    <div class="gallery-slice" 
                         style="position: relative; overflow: hidden; background-image: url('<?php echo $img_url; ?>'); background-size: cover; background-position: center;" 
                         onclick="location.href='<?php the_permalink(); ?>'">
                         
                         <!-- Overlay oscuro para que el texto resalte -->
                         <div style="position:absolute; top:0; left:0; width:100%; height:100%; background: linear-gradient(180deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0.9) 100%); pointer-events:none;"></div>
                         
                         <!-- Título vertical del post (3 líneas) -->
                         <?php
                            $title = get_the_title();
                            $words = explode(' ', $title);
                            $half = ceil(count($words) / 2);
                            $line1 = implode(' ', array_slice($words, 0, $half));
                            $line2 = implode(' ', array_slice($words, $half));
                         ?>
                         <span class="technical-label" style="position:absolute; bottom: 40px; left: 50%; transform: translateX(-50%) rotate(180deg); writing-mode: vertical-rl; color:var(--accent); font-size: clamp(14px, 1.2vw, 18px); font-weight:800; letter-spacing: 0.1em; text-transform: uppercase; text-shadow: 0 0 10px rgba(0,0,0,0.8); line-height: 1.5; text-align: left;">
                            <?php echo esc_html($line1); ?><br>
                            <?php echo esc_html($line2); ?><br>
                            <span style="opacity: 0.6; font-size: 0.8em; margin-top: 20px; display: inline-block;"><?php echo get_the_date('d.m.Y'); ?></span>
                         </span>
                    </div>
                <?php 
                $count++;
                endwhile;
                wp_reset_postdata();
            else:
                // Fallback si no hay entradas en el blog
                echo '<h3 style="color:#fff;">No hay entradas en la bitácora aún.</h3>';
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
