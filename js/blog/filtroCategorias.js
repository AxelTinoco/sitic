jQuery(document).ready(function ($) {
  // Verificar si existen ambos elementos en la página
  if (
    $(".filtro-categorias-botones").length > 0 &&
    $("#posts-filtrados").length > 0
  ) {
    // Cargar posts iniciales al cargar la página
    cargarPosts("all");

    // Manejar clics en los botones de categoría
    $(".cat-filter").on("click", function () {
      // Obtener el ID de categoría
      var categoria = $(this).data("categoria");

      // Actualizar estado activo
      $(".cat-filter").removeClass("active");
      $(this).addClass("active");

      // Desplazarse al contenedor de posts si está lejos en la página
      if ($("#posts-filtrados").length) {
        // Solo hacer scroll si el contenedor está fuera de la vista
        var containerTop = $("#posts-filtrados").offset().top;
        var scrollPosition = $(window).scrollTop();
        var windowHeight = $(window).height();

        if (
          containerTop < scrollPosition ||
          containerTop > scrollPosition + windowHeight
        ) {
          $("html, body").animate(
            {
              scrollTop: $("#posts-filtrados").offset().top - 100,
            },
            500,
          );
        }
      }

      // Cargar posts según la categoría seleccionada
      cargarPosts(categoria);
    });
  }

  // Función para cargar posts mediante AJAX
  function cargarPosts(categoria) {
    // Mostrar indicador de carga
    $("#cargando-posts").show();
    $("#posts-filtrados").hide();

    // Realizar petición AJAX
    $.ajax({
      url: filtroCategoriasData.ajax_url,
      type: "POST",
      data: {
        action: "filtrar_posts_por_categoria",
        categoria: categoria,
      },
      success: function (response) {
        // Ocultar indicador de carga
        $("#cargando-posts").hide();

        // Mostrar posts filtrados con animación
        $("#posts-filtrados").html(response).fadeIn(300);
      },
      error: function () {
        // Manejar error
        $("#cargando-posts").hide();
        $("#posts-filtrados")
          .html(
            '<p class="no-posts">Ocurrió un error al cargar los posts. Por favor, intenta de nuevo.</p>',
          )
          .fadeIn(300);
      },
    });
  }
});
