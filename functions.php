<?php
function mi_child_enqueue_styles()
{
    // Encolar la hoja de estilo del padre
    wp_enqueue_style(
        "parent-style",
        get_template_directory_uri() . "/style.css"
    );

    // // Encolar los estilos del child theme en archivos separados
    // wp_enqueue_style(
    //     'base-style',
    //     get_stylesheet_directory_uri() . '/css/base.css',
    //     array('parent-style'),
    //     filemtime(get_stylesheet_directory() . '/css/base.css') // Versionado dinámico
    // );

    wp_enqueue_style(
        "hero-style",
        get_stylesheet_directory_uri() . "/css/hero.css",
        ["hero-style"],
        filemtime(get_stylesheet_directory() . "/css/hero.css")
    );

    wp_enqueue_style(
        "header-style",
        get_stylesheet_directory_uri() . "/css/header.css",
        ["layout-style"],
        filemtime(get_stylesheet_directory() . "/css/header.css")
    );

    wp_enqueue_style(
        "sliderHero-style",
        get_stylesheet_directory_uri() . "/css/sliderHero.css",
        ["parent-style"],
        filemtime(get_stylesheet_directory() . "/css/sliderHero.css")
    );

    wp_enqueue_style(
        "cardBenefits-style",
        get_stylesheet_directory_uri() . "/css/cardBenefits.css",
        ["parent-style"],
        filemtime(get_stylesheet_directory() . "/css/cardBenefits.css")
    );

    wp_enqueue_style(
        "carrouselHome-style",
        get_stylesheet_directory_uri() . "/css/carrouselHome.css",
        ["parent-style"],
        filemtime(get_stylesheet_directory() . "/css/carrouselHome.css")
    );

    wp_enqueue_style(
        "contact-style",
        get_stylesheet_directory_uri() . "/css/contact.css",
        ["parent-style"],
        filemtime(get_stylesheet_directory() . "/css/contact.css")
    );

    wp_enqueue_style(
        "tabs-style",
        get_stylesheet_directory_uri() . "/css/consultView/tabsInfo.css",
        ["parent-style"],
        filemtime(get_stylesheet_directory() . "/css/consultView/tabsInfo.css")
    );

    wp_enqueue_style(
        'consult-style',
        get_stylesheet_directory_uri() . '/css/consultView/heroConsult.css',
        array('parent-style'),
        filemtime(get_stylesheet_directory() . '/css/consultView/heroConsult.css')
    );

    wp_enqueue_style(
        'blog-style',
        get_stylesheet_directory_uri() . '/css/blog/blogHome.css',
        array('parent-style'),
        filemtime(get_stylesheet_directory() . '/css/blog/blogHome.css')
    );

    // wp_enqueue_style(
    //     'responsive-style',
    //     get_stylesheet_directory_uri() . '/css/responsive.css',
    //     array('base-style'),
    //     filemtime(get_stylesheet_directory() . '/css/responsive.css')
    // );

    wp_enqueue_style(
        "google-fonts",
        "https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap",
        false
    );
}
add_action("wp_enqueue_scripts", "mi_child_enqueue_styles");

function agregar_variables_css()
{
    ?>
    <style>
        :root {
            --primary-color: <?php echo get_theme_mod(
                "primary_color",
                "#007bff"
            ); ?>;
            --secondary-color: <?php echo get_theme_mod(
                "secondary_color",
                "#6c757d"
            ); ?>;
            --blue-secondary: <?php echo get_theme_mod(
                "blue_secondary",
                "#F2F3FC"
            ); ?>;
            --blue-tecnology: <?php echo get_theme_mod(
                "blue_tecnology",
                "#4754D6"
            ); ?>;
            --blue-deep: <?php echo get_theme_mod(
                "blue_deep",
                "#05012C"
            ); ?>;
        }
    </style>
    <?php
}
add_action("wp_head", "agregar_variables_css");

function my_enqueue_slick_slider()
{
    // Encolar CSS de Slick
    wp_enqueue_style(
        "slick-css",
        get_stylesheet_directory_uri() . "/slick/slick.css"
    );
    wp_enqueue_style(
        "slick-theme-css",
        get_stylesheet_directory_uri() . "/slick/slick-theme.css"
    );

    // Encolar JS de Slick, asegurándote de que jQuery esté cargado
    wp_enqueue_script(
        "slick-js",
        get_stylesheet_directory_uri() . "/slick/slick.min.js",
        ["jquery"],
        "1.8.1",
        true
    );
}
add_action("wp_enqueue_scripts", "my_enqueue_slick_slider");


function mi_child_theme_scripts() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/header/customHeader.js',
        array(), 
        '1.0',
        true 
    );

    wp_enqueue_script(
        'button-modifier',
        get_stylesheet_directory_uri() . '/js/blog/blogPrincipal.js',
        array(), 
        '1.0',
        true 
    );
}
add_action('wp_enqueue_scripts', 'mi_child_theme_scripts');
