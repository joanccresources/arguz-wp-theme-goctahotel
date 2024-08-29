<?php

/*** Editor clasico ***/
add_filter('use_block_editor_for_post', '__return_false', 10);

/* Obtener estilos del tema padre */
function enqueue_parent_styles()
{
  // Encola el estilo del tema padre
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');


/*** Cambiar texto ***/
function cambiar_texto_ingles($translated_text, $text, $domain)
{
  if ($text === 'All' && $domain === 'sailing') {
    $translated_text = 'Todos';
  }
  return $translated_text;
}
add_filter('gettext', 'cambiar_texto_ingles', 20, 3);

function cambiar_texto_ingles_rooms_1($translated_text, $text, $domain)
{
  switch ($text) {
    case 'Additional Information':
      $translated_text = __('Información Adicional', 'sailing');
      break;
    case 'Facilities':
      $translated_text = __('Instalaciones', 'wp-hotel-booking');
      break;
    case 'Description':
      $translated_text = __('INFORMACIÓN', 'sailing');
      break;
    case 'Other Rooms':
      $translated_text = __('Otras habitaciones', 'sailing');
      break;
    case 'Price:':
      $translated_text = __('Precio:', 'sailing');
      break;
    case 'night':
      $translated_text = __('noche', 'sailing');
      break;

    case 'Arrival Date':
      $translated_text = __('Fecha de llegada', 'sailing');
      break;
    case 'Departure Date':
      $translated_text = __('Fecha de salida', 'sailing');
      break;
    case 'Adults':
      $translated_text = __('Adultos', 'sailing');
      break;
    case 'Children':
      $translated_text = __('Niños', 'sailing');
      break;
      // case 'Your cart is empty!':
      //   $translated_text = __('¡Tu carrito está vacío!', 'sailing');
      //   break;
      // case 'Your Reservation':
      //   $translated_text = __('Tu reservacion', 'sailing');
      //   break;
  }

  return $translated_text;


  // if ($text === 'Other Rooms' && $domain === 'sailing') {
  //   $translated_text = 'Otras habitaciones';
  // }
  // return $translated_text;
}
add_filter('gettext', 'cambiar_texto_ingles_rooms_1', 20, 3);




// Mostrará una lista de todos los post types registrados, incluidos sus argumentos
// function list_custom_post_types()
// {
//   $post_types = get_post_types(array(), 'objects');
//   foreach ($post_types as $post_type) {
//     echo '<pre>';
//     print_r($post_type);
//     echo '</pre>';
//   }
// }
// add_action('init', 'list_custom_post_types');


function wpc_elementor_shortcode_servicios_espacio_first($atts)
{
  // Consulta para obtener las últimas 3 entradas de la categoría "espacios"
  $query = new WP_Query(array(
    'category_name' => 'espacios', // Slug de la categoría
    'posts_per_page' => 3, // Número de posts a mostrar
    'order' => 'ASC',
  ));

  // Comienza la estructura del ul
  $output = '<ul class="thim-column-posts">';

  // Recorre los posts
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      // Obtiene el título, el excerpt y la URL de la imagen destacada
      $title = get_the_title();
      $excerpt = get_the_excerpt();
      $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

      // Agrega cada <li> al output
      $output .= '
        <div class="post-item col-md-4">
          <li class="post-' . get_the_ID() . ' post type-post status-publish format-standard has-post-thumbnail hentry category-espacios">
            <div class="article-title-wrapper">
              <h5><span class="article-title">' . esc_html($title) . '</span></h5>
              <p class="article-txt">' . esc_html($excerpt) . '</p>
            </div>
            <div class="article-image">
              <img loading="lazy" decoding="async" width="434" height="419" src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '" class="" />
            </div>
          </li>
        </div>';
    }
  }

  // Cierra la estructura del ul
  $output .= '</ul>';

  // Resetea los datos de la consulta, para evitar problemas con otras futuras consultas
  wp_reset_postdata();

  // Retorna el contenido generado
  return $output;
}
add_shortcode("servicios_espacio_first", "wpc_elementor_shortcode_servicios_espacio_first");

function wpc_elementor_shortcode_servicios_espacio_last($atts)
{
  // Consulta para obtener las últimas 3 entradas de la categoría "espacios"
  $query = new WP_Query(array(
    'category_name' => 'espacios', // Slug de la categoría
    'posts_per_page' => 3, // Número de posts a mostrar
    'order' => 'DESC',
  ));

  // Comienza la estructura del ul
  $output = '<ul class="thim-column-posts">';

  // Recorre los posts
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      // Obtiene el título, el excerpt y la URL de la imagen destacada
      $title = get_the_title();
      $excerpt = get_the_excerpt();
      $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

      // Agrega cada <li> al output
      $output .= '
        <div class="post-item col-md-4">
          <li class="post-' . get_the_ID() . ' post type-post status-publish format-standard has-post-thumbnail hentry category-espacios">
            <div class="article-title-wrapper">
              <h5><span class="article-title">' . esc_html($title) . '</span></h5>
              <p class="article-txt">' . esc_html($excerpt) . '</p>
            </div>
            <div class="article-image">
              <img loading="lazy" decoding="async" width="434" height="419" src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '" class="" />
            </div>
          </li>
        </div>';
    }
  }

  // Cierra la estructura del ul
  $output .= '</ul>';

  // Resetea los datos de la consulta, para evitar problemas con otras futuras consultas
  wp_reset_postdata();

  // Retorna el contenido generado
  return $output;
}
add_shortcode("servicios_espacio_last", "wpc_elementor_shortcode_servicios_espacio_last");