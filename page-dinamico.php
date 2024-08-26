<?php
get_header();
do_action('thim_wrapper_loop_start');
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('content', 'page-dinamico'); ?>
    <?php
    if (comments_open() || get_comments_number()) :
      comments_template();
    endif;
    ?>

<?php endwhile; ?>

<?php
do_action('thim_wrapper_loop_end');

get_footer(); ?>