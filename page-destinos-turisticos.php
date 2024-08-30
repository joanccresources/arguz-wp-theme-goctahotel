<?php
/*
Template Name: Destinos turisticos
*/
get_header();

$args = array(
  "post_type" => "destinos_turisticos",
  "posts_per_page" => -1,
  "order" => "ASC",
);
$destinos = new WP_Query($args);
$maps = [];
?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php
    $thumbnail_url = "https://sailing.thimpress.com/demo-2/wp-content/themes/sailing/assets/images/bg-blog.jpg";
    if (has_post_thumbnail())
      $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    ?>
    <div class="top_site_main images_parallax layout-1" style="color: #fff;background-image: url(<?= $thumbnail_url ?>);" data-parallax_images="scroll" data-image-src="<?= $thumbnail_url ?>">
      <div class="page-title-wrapper">
        <div class="banner-wrapper container article_heading">
          <h1 class="heading__secondary" style="transition: initial;"><?= get_the_title() ?></h1>
        </div>
      </div>
    </div>

    <?php if ($destinos->have_posts()) : ?>
      <section class="site-content pb-0">
        <div class="container container-content">
          <div class="row row-main-destinos">

            <div class="col-md-8 mt-4 mt-md-0 col-2">
              <?php $i = 0; ?>
              <?php while ($destinos->have_posts()) : ?>
                <?php $destinos->the_post(); ?>
                <?php $i++; ?>
                <?php
                $imagethumb_dest_large = '';
                $arr_image_dest_large = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                if ($arr_image_dest_large[0] != '')
                  $imagethumb_dest_large = $arr_image_dest_large[0];

                $imagethumb_dest_full = '';
                $ubicacion = get_post_meta(get_the_ID(), "ubicacion", true);
                $titulo_descriptivo = get_post_meta(get_the_ID(), "titulo_descriptivo", true);
                array_push($maps, get_post_meta(get_the_ID(), "mapa", true));
                ?>
                <div id="destino-<?= $i ?>" class="tabcontent">
                  <h2 class="turismo__title"><i class="fas fa-map-marker-alt icon-title"></i><span class="ms-2"><?= get_the_title() ?></span></h2>
                  <h5><span>Ubicación:</span> <span><?= $ubicacion ?></span></h5>
                  <hr />
                  <h3><?= $titulo_descriptivo ?></h3>
                  <div class="mb-3">
                    <img src="<?= $imagethumb_dest_large ?>" alt="<?= get_the_title() ?>" class="w-100">
                  </div>
                  <div>
                    <?= get_the_content() ?>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
            <div class="col-md-4 col-1">
              <div class="tab">
                <div id="tab-menu" class="d-flex align-items-center justify-content-between d-md-block">
                  <p class="turismo__aside-title text-start text-md-center ps-4 ps-md-0">Turismo</p>
                  <i class="fas fa-chevron-down d-md-none pt-3 pe-4"></i>
                  <i class="fas fa-chevron-up d-none d-md-none pt-3 pe-4"></i>
                </div>
                <div class="tab-child d-none d-md-flex">
                  <?php $i = 0; ?>
                  <?php while ($destinos->have_posts()) : ?>
                    <?php
                    // echo "<pre>";
                    // print_r($destinos);
                    // echo "</pre>";
                    ?>
                    <?php $destinos->the_post(); ?>
                    <?php $i++; ?>
                    <button class="tablinks" id="tab-destino-<?= $i ?>" onclick="openCity(event, 'destino-<?= $i ?>')" data-slug="#<?= basename(get_the_permalink()) ?>">
                      <div>
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        <span><?= get_the_title(); ?></span>
                      </div>
                    </button>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <?php if (count($maps) > 0) : ?>
            <?php for ($i = 0; $i < count($maps); $i++) { ?>
              <div class="turismo__map" id="map-destino-<?= ($i + 1) ?>">
                <?= $maps[$i] ?>
              </div>
            <?php } ?>
          <?php endif; ?>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
?>