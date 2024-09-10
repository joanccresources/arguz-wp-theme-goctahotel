<?php
$border_top = '';
$class2     = '';

if (get_theme_mod('thim_footer_style') == true) {
	$class  = 'container_custom';
	$class2 = 'footer_style_new';
} else {
	$class = 'container';
}

?>

<?php if (is_active_sidebar('main-bottom')) : ?>
	<div class="main-bottom">
		<div class="<?php echo $class; ?>">
			<div class="row">
				<?php dynamic_sidebar('main-bottom'); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if (get_theme_mod('thim_footer_background_img')) {
	$style = 'background-image: url(' . thim_ssl_secure_url(get_theme_mod('thim_footer_background_img')) . ');';
} else {
	$style = '';
} ?>

<!-- BEGIN - GALERIA -->
<?php
$args = array(
	'post_type' => 'galeria-footer',
	'posts_per_page' => 4, // Para obtener todos los posts
	'orderby' => 'date',    // Ordenar por fecha
	'order' => 'DESC',      // Orden descendente (el más reciente primero)
);
$query = new WP_Query($args);
if ($query->have_posts()) : ?>
	<div class="footer-galeria">
		<div class="container">
			<section
				class="elementor-section elementor-top-section elementor-element elementor-element-45a6b9a elementor-section-full_width elementor-section-height-default elementor-section-height-default"
				data-id="45a6b9a"
				data-element_type="section"
				id="home-galeria">
				<div class="elementor-container elementor-column-gap-no">
					<div
						class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-94d71e8"
						data-id="94d71e8"
						data-element_type="column">
						<div class="elementor-widget-wrap elementor-element-populated">
							<div
								class="elementor-element elementor-element-967b43a elementor-widget elementor-widget-thim-ekits-heading"
								data-id="967b43a"
								data-element_type="widget"
								data-widget_type="thim-ekits-heading.default">
								<div class="elementor-widget-container">
									<div class="thim-ekits-heading thim-ekit__heading">
										<h2 class="title">Galería</h2>
									</div>
								</div>
							</div>

							<div
								class="elementor-element elementor-element-7ea0e15 elementor-widget elementor-widget-thim-gallery"
								data-id="7ea0e15"
								data-element_type="widget"
								data-widget_type="thim-gallery.default">
								<div class="elementor-widget-container">
									<div class="wrapper-filter-controls">
										<div class="filter-controls">
											<a class="filter active" data-filter="*" href="javascript:;">Todos</a>
											<a
												class="filter"
												href="javascript:;"
												data-filter=".filter-gallery-10766">Interior</a><a
												class="filter"
												href="javascript:;"
												data-filter=".filter-gallery-10758">Local</a>
										</div>
									</div>
									<div
										class="wrapper-gallery-filter grid row"
										itemscope
										itemtype="http://schema.org/ItemList">

										<?php while ($query->have_posts()) : $query->the_post(); ?>
											<div class="item-photo element col-sm-4 filter-gallery-10766">
												<div class="inner">
													<?php
													if (has_post_thumbnail()) :
														$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
													?>
														<a
															class="fancybox"
															data-fancybox-group="gallery"
															href="<?= esc_url($thumbnail_url); ?>"><img
																decoding="async"
																src="<?= esc_url($thumbnail_url); ?>"
																alt="<?= get_the_title() ?>"
																title="<?= get_the_title() ?>" /></a>
													<?php endif; ?>
												</div>
											</div>
										<?php endwhile; ?>
									</div>
								</div>
							</div>

							<div
								class="elementor-element elementor-element-dd477c6 button-galeria elementor-widget elementor-widget-thim-ekits-button"
								data-id="dd477c6"
								data-element_type="widget"
								data-widget_type="thim-ekits-button.default">
								<div class="elementor-widget-container">
									<div class="thim-ekits-button">
										<a href="https://goctaamazonashotel.com/galeria/" role="button">
											<span class="button-content-wrapper">
												VER TODA LA GALERÍA
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php endif; ?>

<!-- END - GALERIA -->
<!-- BEGIN - Agregamos el iframe -->
<iframe loading="lazy"
	src="https://maps.google.com/maps?q=gocta%20amazonas%20hotel%20sac&#038;t=m&#038;z=13&#038;output=embed&#038;iwloc=near"
	title="gocta amazonas hotel sac"
	aria-label="gocta amazonas hotel sac"
	id="iframe-map-hotel"></iframe>
<!-- END - Agregamos el iframe -->
<footer style="<?php echo $style; ?>" id="colophon" class="site-footer <?php echo $class2; ?>">
	<?php if (get_theme_mod('thim_footer_style') == false) { ?>
		<div class="<?php echo $class; ?>">
			<div class="row">
				<?php if (is_active_sidebar('footer')) : ?>
					<div class="footer">
						<?php $border_top = ' border-copyright' ?>
						<?php dynamic_sidebar('footer'); ?>
					</div>
				<?php endif; ?>
				<?php
				if (is_active_sidebar('footer_copyright')) {
					echo '<div class="col-sm-12"><div class="text-copyright' . $border_top . '">';
					dynamic_sidebar('footer_copyright');
					echo '</div></div>';
				}
				?>
			</div>
		</div>
	<?php } else { ?>
		<div class="<?php echo $class; ?>">
			<div class="row">
				<?php if (is_active_sidebar('footer')) : ?>
					<div class="footer">
						<?php $border_top = ' border-copyright' ?>
						<?php dynamic_sidebar('footer'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
		if (is_active_sidebar('footer_copyright')) {
			echo '<div class="copy-right-new"><div class="text-copyright' . $border_top . '">';
			dynamic_sidebar('footer_copyright');
			echo '</div></div>';
		}
		?>
	<?php } ?>

</footer>

<?php if (get_theme_mod('thim_show_to_top') == 1) { ?>
	<a id='back-to-top' class="scrollup show" title="<?php esc_attr_e('Go To Top', 'sailing'); ?>"></a>
<?php } ?>
</div><!--end main-content-->
</div>
</div><!-- .wrapper-container -->

<?php if (get_theme_mod('thim_show_offcanvas_sidebar') == true && is_active_sidebar('offcanvas_sidebar')) { ?>
	<div class="slider-sidebar">
		<?php dynamic_sidebar('offcanvas_sidebar'); ?>
	</div> <!--slider_sidebar-->
<?php } ?>
<div class="covers-parallax"></div>
<?php wp_footer(); ?>
<!-- Load Javascript Files -->
<?php $page = get_queried_object(); ?>
<?php $pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/main.js?v=<?= time() ?>" type="module"></script>
<!--  -->
<?php if (is_page("home")): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/home.js?v=<?= time() ?>"></script>
<?php endif; ?>
<!--  -->
<?php if (is_page("reservacion")): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/reservacion.js?v=<?= time() ?>"></script>
<?php endif; ?>
<!--  -->
<?php if (is_page("servicios")): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/servicios.js?v=<?= time() ?>"></script>
<?php endif; ?>
<!--  -->
<?php if (is_page("nosotros")): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/nosotros.js?v=<?= time() ?>"></script>
<?php endif; ?>
<!--  -->
<?php if (is_page("galeria")): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/galeria.js?v=<?= time() ?>"></script>
<?php endif; ?>
<!--  -->
<?php if (is_page("destinos-turisticos")): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/destinos-turisticos.js?v=<?= time() ?>"></script>
<?php endif; ?>
<!-- Habitaciones -->
<?php if ($page->name === 'hb_room'): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/habitaciones.js?v=<?= time() ?>"></script>
<?php endif; ?>
<?php
/*
echo "<pre>";
print_r($page);
echo "</pre>";
*/
?>

<!-- Detalle de habitaciones -->
<?php if (preg_match('#^/rooms/[a-z0-9\-]+/$#', $pathname)): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/habitaciones-detalle.js?v=<?= time() ?>"></script>
<?php endif; ?>
</body>

</html>