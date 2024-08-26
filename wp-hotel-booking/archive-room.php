<?php
/*
- https://goctaamazonashotel.com/rooms/
- https://goctaamazonashotel.com/room-type/matrimonial/
- https://goctaamazonashotel.com/room-type/simple/
- https://goctaamazonashotel.com/room-type/doble/
- https://goctaamazonashotel.com/room-type/150/
*/
wp_enqueue_script('cookie');
defined('ABSPATH') || exit();
?>

<?php
global $post;
get_header();
do_action('thim_wrapper_loop_start');

do_action('hotel_booking_before_main_content');
?>

<?php
do_action('hotel_booking_archive_description');
?>

<?php if (have_posts()) : ?>

  <?php do_action('hotel_booking_before_shop_loop'); ?>

  <div class="thim-room-top switch-layout-container">
    <?php do_action('thim_result_on_page') ?>
    <?php
    if (get_theme_mod('thim_hb_cate_enable_sort') == true && get_theme_mod('thim_hb_cate_style_layout', 'base') == 'layout-1') {
      $data = array();
      hb_get_template('search/v2/sort-by.php', compact('data'));
    }
    ?>
    <?php do_action('thim_switch_layout') ?>

  </div>

  <?php hotel_booking_room_loop_start(); ?>
  <?php hotel_booking_room_subcategories(); ?>

  <div id="thim-room-archive" class="">
    <?php while (have_posts()) : the_post(); ?>
      <?php hb_get_template_part('content', 'room'); ?>
    <?php endwhile; ?>
  </div>

  <?php hotel_booking_room_loop_end(); ?>

  <?php
  do_action('hotel_booking_after_shop_loop');
  ?>

<?php endif; ?>

<?php
do_action('hotel_booking_after_main_content');
?>

<?php
do_action('hotel_booking_sidebar');
?>


<?php do_action('hotel_booking_after_room_loop'); ?>

<?php do_action('thim_wrapper_loop_end'); ?>
<?php get_footer(); ?>