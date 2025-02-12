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

    // wp_enqueue_style(
    //     'buttons-style',
    //     get_stylesheet_directory_uri() . '/css/buttons.css',
    //     array('base-style'),
    //     filemtime(get_stylesheet_directory() . '/css/buttons.css')
    // );

    // wp_enqueue_style(
    //     'forms-style',
    //     get_stylesheet_directory_uri() . '/css/forms.css',
    //     array('base-style'),
    //     filemtime(get_stylesheet_directory() . '/css/forms.css')
    // );

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
        }
    </style>
    <?php
}
add_action("wp_head", "agregar_variables_css");
