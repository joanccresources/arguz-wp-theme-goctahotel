<?php

defined('ABSPATH') || exit();

?>

<?php

do_action('hotel_booking_before_single_product');

if (post_password_required()) {
	echo get_the_password_form();

	return;
} ?>



<div id="room-<?php the_ID(); ?>" <?php post_class('hb_single_room'); ?> data-joan>

	<?php
	do_action('hotel_booking_before_single_room');
	?>

	<div class="summary entry-summary">

		<?php
		do_action('hotel_booking_single_room_title');

		do_action('hotel_booking_price_single_room');

		do_action('hotel_booking_single_room_gallery');

		do_action('hotel_booking_single_room_infomation');
		?>

	</div>

	<?php
	do_action('hotel_booking_after_single_room');

	do_action('hotel_booking_single_shortcode_book_email');

	?>

</div>
<?php
do_action('hotel_booking_after_single_product'); ?>