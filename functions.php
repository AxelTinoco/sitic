<?php
function mi_child_enqueue_styles()
{
    // Encolar la hoja de estilo del padre
    wp_enqueue_style(
        "parent-style",
        get_template_directory_uri() . "/style.css"
    );

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
        "submenu-style",
        get_stylesheet_directory_uri() . "/css/subMenu.css",
        ["layout-style"],
        filemtime(get_stylesheet_directory() . "/css/subMenu.css")
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
        "consult-style",
        get_stylesheet_directory_uri() . "/css/consultView/heroConsult.css",
        ["parent-style"],
        filemtime(
            get_stylesheet_directory() . "/css/consultView/heroConsult.css"
        )
    );

    wp_enqueue_style(
        "blog-style",
        get_stylesheet_directory_uri() . "/css/blog/blogHome.css",
        ["parent-style"],
        filemtime(get_stylesheet_directory() . "/css/blog/blogHome.css")
    );

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
            --blue-deep: <?php echo get_theme_mod("blue_deep", "#05012C"); ?>;
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

function mi_child_theme_scripts()
{
    wp_enqueue_script(
        "custom-script",
        get_stylesheet_directory_uri() . "/js/header/customHeader.js",
        [],
        "1.0",
        true
    );

    wp_enqueue_script(
        "button-modifier",
        get_stylesheet_directory_uri() . "/js/blog/blogPrincipal.js",
        [],
        "1.0",
        true
    );
}
add_action("wp_enqueue_scripts", "mi_child_theme_scripts");

//Header del post
function custom_post_header_styles()
{
    wp_enqueue_style(
        "custom-header-post-style",
        get_stylesheet_directory_uri() . "/css/blog/headerPost.css",
        ["parent-style"],
        filemtime(get_stylesheet_directory() . "/css/blog/headerPost.css")
    );
}
add_action("wp_enqueue_scripts", "custom_post_header_styles");

// Shortcode para el encabezado del post (ahora sin el CSS)
add_shortcode("custom_post_header", function () {
    ob_start();

    // Variables dinámicas del post
    $post_id = get_the_ID();
    $post_date = get_the_date('j \d\e F \d\e Y');
    $content = get_post_field("post_content", $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    $post_title = get_the_title();
    $author_id = get_post_field("post_author", $post_id);
    $author_name = get_the_author_meta("display_name", $author_id);
    $author_image = get_avatar_url($author_id, ["size" => 96]);
    $post_url = urlencode(get_permalink());
    $featured_image = has_post_thumbnail()
        ? get_the_post_thumbnail_url($post_id, "large")
        : "";
    ?>
    <!-- Solo el HTML del encabezado del post -->
    <div class="post-header-custom">
        <div class="post-meta">
            <span class="post-date"><?php echo $post_date; ?></span>
            <span class="post-reading-time"><?php echo $reading_time; ?> min</span>
        </div>

        <h1 class="post-title"><?php echo $post_title; ?></h1>

        <div class="post-author">
            <div class="post-with-image-author">
                <img src="https://dev.siticsoftware.com/wp-content/uploads/2025/03/logo-positivo.svg" alt="sitic" class="sitic-theme">
                <span class="author-name">El equipo de SITIC</span>
            </div>

            <div class="social-share">
                <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>" class="share-twitter">
                    <img src="https://dev.siticsoftware.com/wp-content/uploads/2025/03/twitter.svg" width="24" height="24" alt="Twitter">
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_url; ?>" class="share-linkedin">
                    <img src="https://dev.siticsoftware.com/wp-content/uploads/2025/03/linkedIn.svg" width="24" height="24" alt="LinkedIn">
                </a>
                <a href="#" class="share-link" onclick="navigator.clipboard.writeText('<?php echo get_permalink(); ?>');return false;">
                    <img src="https://dev.siticsoftware.com/wp-content/uploads/2025/03/share.svg" width="24" height="24" alt="Copiar enlace">
                </a>
            </div>
        </div>

        <?php if ($featured_image): ?>
        <div class="post-featured-image">
            <img src="<?php echo $featured_image; ?>" alt="<?php echo $post_title; ?>">
        </div>
        <?php endif; ?>
    </div>
    <?php return ob_get_clean();
});

// Código para filtrar posts por categoría
function enqueue_filtro_categorias_scripts()
{
    wp_enqueue_style(
        "filtro-categorias-style",
        get_stylesheet_directory_uri() . "/css/blog/filtroCategorias.css",
        ["blog-style"],
        filemtime(get_stylesheet_directory() . "/css/blog/filtroCategorias.css")
    );

    wp_enqueue_script(
        "filtro-categorias-script",
        get_stylesheet_directory_uri() . "/js/blog/filtroCategorias.js",
        ["jquery"],
        "1.0",
        true
    );

    // Pasar datos a JavaScript
    wp_localize_script("filtro-categorias-script", "filtroCategoriasData", [
        "ajax_url" => admin_url("admin-ajax.php"),
    ]);
}
add_action("wp_enqueue_scripts", "enqueue_filtro_categorias_scripts");

// Shortcode para los botones del filtro de categorías
add_shortcode("botones_filtro_categorias", function () {
    ob_start(); ?>
    <div class="filtro-categorias-botones">
        <button class="cat-filter active" data-categoria="all">Todas</button>
        <?php
        $categories = get_categories([
            "orderby" => "name",
            "order" => "ASC",
            "hide_empty" => true,
        ]);

        foreach ($categories as $category) {
            echo '<button class="cat-filter" data-categoria="' .
                esc_attr($category->term_id) .
                '">' .
                esc_html($category->name) .
                "</button>";
        }
        ?>
    </div>
    <?php return ob_get_clean();
});

// Shortcode para el área donde se mostrarán los posts filtrados
add_shortcode("posts_filtrados", function () {
    ob_start(); ?>
    <div class="posts-filtrados-container">
        <div id="posts-filtrados" class="posts-grid-filtrados">
            <!-- Los posts se cargarán aquí -->
        </div>
        <div id="cargando-posts" class="cargando-posts" style="display: none;">
            <div class="spinner"></div>
        </div>
    </div>
    <?php return ob_get_clean();
});

// Función para manejar el filtrado AJAX
function filtrar_posts_por_categoria()
{
    // Obtener y sanitizar la categoría
    $categoria = isset($_POST["categoria"])
        ? sanitize_text_field($_POST["categoria"])
        : "all";

    // Configurar argumentos para la consulta
    $args = [
        "post_type" => "post",
        "posts_per_page" => 9,
        "post_status" => "publish",
    ];

    // Filtrar por categoría si no es "todas"
    if ($categoria !== "all") {
        $args["cat"] = intval($categoria);
    }

    // Realizar la consulta
    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {

            $query->the_post();
            $post_date = get_the_date('j \d\e F \d\e Y');
            ?>
            <article class="post-item">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail("medium"); ?>
                    </div>
                    <?php endif; ?>
                    <small class="post-date"><?php echo $post_date; ?></small>
                    <h3 class="post-title"><?php the_title(); ?></h3>
                </a>
                <div class="post-excerpt"><?php echo wp_trim_words(
                    get_the_excerpt(),
                    20
                ); ?></div>
                <a href="<?php the_permalink(); ?>" class="read-more et_pb_button">Conoce más</a>
            </article>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<p class="no-posts">No hay publicaciones en esta categoría.</p>';
    }

    $output = ob_get_clean();
    echo $output;
    wp_die();
}

// Registrar funciones AJAX para usuarios logueados y no logueados
add_action(
    "wp_ajax_filtrar_posts_por_categoria",
    "filtrar_posts_por_categoria"
);
add_action(
    "wp_ajax_nopriv_filtrar_posts_por_categoria",
    "filtrar_posts_por_categoria"
);
