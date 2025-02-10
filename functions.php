<?php
function mi_child_enqueue_styles() {
    // Encolar la hoja de estilo del padre
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // // Encolar los estilos del child theme en archivos separados
    // wp_enqueue_style(
    //     'base-style',
    //     get_stylesheet_directory_uri() . '/css/base.css',
    //     array('parent-style'), 
    //     filemtime(get_stylesheet_directory() . '/css/base.css') // Versionado dinámico
    // );

    wp_enqueue_style(
        'hero-style',
        get_stylesheet_directory_uri() . '/css/hero.css',
        array('hero-style'), 
        filemtime(get_stylesheet_directory() . '/css/hero.css')
    );

    wp_enqueue_style(
        'header-style',
        get_stylesheet_directory_uri() . '/css/header.css',
        array('layout-style'), 
        filemtime(get_stylesheet_directory() . '/css/header.css')
    );

    // wp_enqueue_style(
    //     'footer-style',
    //     get_stylesheet_directory_uri() . '/css/footer.css',
    //     array('layout-style'), 
    //     filemtime(get_stylesheet_directory() . '/css/footer.css')
    // );

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

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap', false);

}
add_action('wp_enqueue_scripts', 'mi_child_enqueue_styles');