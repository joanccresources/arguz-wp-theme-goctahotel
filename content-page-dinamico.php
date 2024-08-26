<!-- Dentro del article>.entry-content va todo lo de elementor -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-gocta="main">
  <div class="entry-content">
    <?php the_content(); ?>
    <?php
    wp_link_pages(array(
      'before' => '<div class="page-links">' . esc_html__('Pages:', 'sailing'),
      'after'  => '</div>',
    ));
    ?>
  </div>
</article>