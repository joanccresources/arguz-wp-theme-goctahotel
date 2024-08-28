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