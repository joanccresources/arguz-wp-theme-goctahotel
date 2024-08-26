<?php
/* Todos los posttype de "rooms"
Ejemplo:
- https://goctaamazonashotel.com/rooms/habitacion-matrimonial/
*/
defined('ABSPATH') || exit();
?>

<?php

get_header();
do_action('thim_wrapper_loop_start');


do_action('hotel_booking_before_main_content');
?>

<?php while (have_posts()) : the_post(); ?>

  <?php
  if (get_theme_mod('thim_hb_single_style', 'layout-1') == 'layout-2') {
    hb_get_template_part('content', 'single-room-v2');
  } else {
    hb_get_template_part('content', 'single-room');
  }
  ?>

<?php endwhile; ?>

<?php do_action('hotel_booking_after_main_content'); ?>

<?php
// do_action('hotel_booking_sidebar');
?>

<?php do_action('thim_wrapper_loop_end'); ?>

<?php get_footer(); ?>