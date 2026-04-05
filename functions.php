<?php
/**
 * AntiGravity Engine: Diario de Abordo Godly
 * Basado en el Manual de Transformación V1 - PM Approved
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 1. CONFIGURACIÓN DEL SISTEMA (Paridad & Soporte)
 */
function antigravity_setup() {
    // Soporte para Títulos Dinámicos e Imágenes Destacadas
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'] );
    
    // Alineaciones de Ancho Completo
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    
    // Registro de Menús
    register_nav_menus( array(
        'primary' => __( 'Navegación Principal', 'diario-de-abordo' ),
    ) );

    // Logo Personalizado
    add_theme_support( 'custom-logo', [
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ]);
}
add_action( 'after_setup_theme', 'antigravity_setup' );

/**
 * 2. ENCOLADO INTELIGENTE (Rutas Dinámicas & Optimización)
 */
function antigravity_enqueue_assets() {
    // Escudo anti-caché: generamos versión basada en la hora de modificación del fichero
    $css_version = file_exists( get_stylesheet_directory() . '/style.css' ) ? filemtime( get_stylesheet_directory() . '/style.css' ) : '1.3.0';
    $js_version = file_exists( get_template_directory() . '/main.js' ) ? filemtime( get_template_directory() . '/main.js' ) : '1.3.0';
    
    // Fuentes: Pre-conexión y carga
    wp_enqueue_style( 'ag-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;600;700;900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap', [], null );

    // Estilo Principal
    wp_enqueue_style( 'ag-main-style', get_stylesheet_uri(), [], $version );

    // Scripts Críticos (Detección automática)
    wp_enqueue_script( 'antigravity-main', get_template_directory_uri() . '/main.js', [], $version, true );
    
    // Localize para Paridad Total
    wp_localize_script( 'antigravity-main', 'agData', [
        'root' => esc_url_raw( rest_url() ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
        'site_url' => get_site_url(),
        'template_url' => get_template_directory_uri(),
    ]);
}
add_action( 'wp_enqueue_scripts', 'antigravity_enqueue_assets' );

/**
 * 3. SOPORTE DE MÓDULOS JS
 */
add_filter( 'script_loader_tag', function ( $tag, $handle, $src ) {
    if ( ! in_array( $handle, ['antigravity-main'] ) ) return $tag;
    return '<script type="module" src="' . esc_url( $src ) . '"></script>';
}, 10, 3 );

/**
 * 4. LIMPIEZA DE "BLOAT" (Core Web Vitals)
 */
function antigravity_clean_head() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action( 'init', 'antigravity_clean_head' );

/**
 * 5. SOPORTE PARA SVG & WEBP
 */
add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
});

/**
 * 6. MEJORAS PM: REDIRECCIÓN DE PÁGINAS ESTÁTICAS A WP
 */
// Esto asegura que si alguien busca "about.html" en el servidor, 
// no rompa la paridad con lo que estamos construyendo.
/**
 * ── BLOCK PATTERNS ──
 * Registramos patrones para que el usuario pueda insertar el Hero y Newsletter
 * directamente desde el editor de bloques.
 */
function antigravity_register_patterns() {
    register_block_pattern(
        'antigravity/hero',
        array(
            'title'       => __( 'Godly Hero', 'antigravity' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"hero-wrap"} -->
<section class="wp-block-group hero-wrap"><div class="hero-content container"><div class="hero-text-wrap"><h1 class="reveal">DIARIO DE<br>ABORDO.</h1><p class="premium-lead reveal">Exploraciones sistémicas sobre arquitectura de software, creatividad agentic y la frontera del código.</p><div class="hero-cta reveal"><a href="#posts-wrap" class="btn-primary">Ver Bitácora</a><span class="technical-label" style="margin-left: 20px; opacity: 0.5;">[ESTADO: TRANSMITIENDO]</span></div></div></div></section>
<!-- /wp:group -->',
            'categories'  => array( 'header' ),
        )
    );

    register_block_pattern(
        'antigravity/newsletter',
        array(
            'title'       => __( 'Godly Newsletter', 'antigravity' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"newsletter-wrap"} -->
<section class="wp-block-group newsletter-wrap" id="newsletter"><div class="container container-narrow" style="text-align:center;"><h2 class="reveal">Sintoniza la Frecuencia</h2><p class="premium-lead reveal">Recibe reflexiones semanales sobre sistemas y orquestación directamente en tu bandeja de entrada.</p><div class="reveal" style="margin-top:40px;"><iframe src="https://diariodeabordo.substack.com/embed" width="480" height="320" style="border:1px solid rgba(255,255,255,0.1); background:transparent;" frameborder="0" scrolling="no"></iframe></div></div></section>
<!-- /wp:group -->',
            'categories'  => array( 'buttons' ),
        )
    );
}
/**
 * ── CUSTOMIZER INTEGRATION ──
 * Añadimos controles para permitir que el Jefe edite todo desde el panel lateral.
 */
function antigravity_customize_register( $wp_customize ) {
    // 1. Sección de Colores Godly
    $wp_customize->add_section( 'antigravity_colors' , array(
        'title'      => __('Colores Godly', 'antigravity'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting( 'accent_color' , array(
        'default'   => '#c9a84c',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
        'label'      => __('Color de Acento', 'antigravity'),
        'section'    => 'antigravity_colors',
        'settings'   => 'accent_color',
    )));
}
add_action( 'customize_register', 'antigravity_customize_register' );

/**
 * ── BANNER ADMIN MENU (Página de Ajustes) ──
 * Como theme.json puede ocultar el Customizer, creamos un menú visible.
 */
function antigravity_banner_menu() {
    add_theme_page(
        'Banner Home',
        'Banner Home',
        'manage_options',
        'antigravity-banner',
        'antigravity_banner_page_html'
    );
}
add_action('admin_menu', 'antigravity_banner_menu');

function antigravity_banner_page_html() {
    if (isset($_POST['ag_banner_submit'])) {
        update_option('ag_marquee_fixed_text', sanitize_text_field($_POST['marquee_fixed_text']));
        update_option('ag_marquee_show_categories', isset($_POST['marquee_show_categories']) ? 'yes' : 'no');
    }
    
    $fixed_text = get_option('ag_marquee_fixed_text', 'DIARIO DE ABORDO | BIT&Aacute;CORA | ');
    $show_cats = get_option('ag_marquee_show_categories', 'yes');
    ?>
    <div class="wrap">
        <h1>Ajustes del Banner (Texto Corredizo)</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="marquee_fixed_text">Texto Fijo del Banner</label></th>
                    <td>
                        <input type="text" name="marquee_fixed_text" id="marquee_fixed_text" value="<?php echo esc_attr($fixed_text); ?>" style="width:100%; max-width:600px;">
                        <p class="description">Este es el texto que se repetirá en la banda inferior.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Categorías Dinámicas</th>
                    <td>
                        <label>
                            <input type="checkbox" name="marquee_show_categories" value="1" <?php checked($show_cats, 'yes'); ?>>
                            Extraer e incluir Nombres de Categorías (como Uncategorized) antes del texto fijo.
                        </label>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="ag_banner_submit" value="1">
            <?php submit_button('Guardar Banner'); ?>
        </form>
    </div>
    <?php
}

/**
 * ── INJECT CUSTOMIZER CSS ──
 */
function antigravity_customize_css() {
    $accent = get_theme_mod('accent_color', '#c9a84c');
    ?>
    <style type="text/css">
        :root { --accent: <?php echo $accent; ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'antigravity_customize_css' );

/**
 * ── AUTO-ORCHESTRATOR ──
 * Este motor crea las páginas, menús y entradas necesarias al activar el tema.
 * Para que todo funcione "Out of the box".
 */
function antigravity_setup_content() {
    // 0. Crear Categorías de Blog si no existen
    $blog_categories = ['Leadership', 'Growth', 'Sistemas', 'Arquitectura', 'Estrategia', 'Books'];
    foreach ($blog_categories as $cat_name) {
        if (!term_exists($cat_name, 'category')) {
            wp_insert_term($cat_name, 'category');
        }
    }

    // Renombrar 'Uncategorized' (Categoría por defecto ID 1) a 'Bitácora'
    wp_update_term(1, 'category', array(
        'name' => 'Bitácora',
        'slug' => 'bitacora'
    ));

    // 1. Crear Menú si no existe
    $menu_name = 'Navigational Log Main';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        // Crear Home si no existe y asignarla como portada
        $home_check = get_page_by_title('Home');
        if (!isset($home_check->ID)) {
            $home_id = wp_insert_post(array(
                'post_type'      => 'page',
                'post_title'     => 'Home',
                'post_content'   => '<!-- wp:pattern {"slug":"antigravity/hero"} /-->',
                'post_status'    => 'publish',
                'post_author'    => 1,
            ));
            update_post_meta($home_id, '_wp_page_template', 'front-page.php');
            
            // CONFIGURAR PORTADA ESTÁTICA AUTOMÁTICAMENTE
            update_option('show_on_front', 'page');
            update_option('page_on_front', $home_id);
        }

        // Crear el resto de páginas
        $pages = array(
            'Leadership' => 'page-leadership.php',
            'Growth' => 'page-growth.php',
            'Sistemas' => 'page-sistemas.php'
        );

        foreach ($pages as $title => $template) {
            $page_id = wp_insert_post(array(
                'post_type'      => 'page',
                'post_title'     => $title,
                'post_content'   => 'Documentación operativa de ' . $title,
                'post_status'    => 'publish',
                'post_author'    => 1,
            ));
            update_post_meta($page_id, '_wp_page_template', $template);
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title'   =>  $title,
                'menu-item-object'  => 'page',
                'menu-item-object-id' => $page_id,
                'menu-item-type'    => 'post_type',
                'menu-item-status'  => 'publish'
            ));
        }
    }
}
// Removemos el gancho clásico de activación y lo reemplazamos por el hook 'init'
// de forma temporal para asegurar que se ejecute la próxima vez que cargues la página
add_action('init', 'antigravity_setup_content');

add_action( 'init', 'antigravity_register_patterns' );
