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
