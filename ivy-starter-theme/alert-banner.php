<?php 
	$meta_query = array(
		array(
			'key' => 'expiration', 
			'value' => date('Ymd'),
			'type' => 'DATE',
			'compare' => '>='
		)
	);
	$args = array(
		'post_type' => 'alert_banner',
		'posts_per_page' => -1,
		'meta_key' => 'expiration', 
		'meta_query' => $meta_query
	);
	$the_query = new WP_Query( $args ); 

	if ($the_query -> have_posts()) {

		while ($the_query -> have_posts()) : $the_query -> the_post();

			// If today is the expiration day
			date_default_timezone_set("America/New_York");
			if (get_field('expiration') == date('Ymd')) :

				$hour = get_field('select_hour');
				$minute = get_field('select_minute');
				if ($minute < 10) : 
					$minute = '0'.$minute; // Add leading 0 to single digit minutes
				endif;
				$exp_time = $hour.':'.$minute;

				// Check the hour/time
				if ( $exp_time > date('H:i') ) : ?>
					<aside role="alert" class="alert-banner">
						<div class="wide-wrap">
							<strong><?php the_field('alert_message'); ?></strong>
						</div>
					</aside><?php // end .alert-banner
				endif; 

			// The expiration day is in the future so don't worry about hour/minute
			else : ?>
				<aside role="alert" class="alert-banner">
					<div class="wide-wrap">
						<strong><?php the_field('alert_message'); ?></strong>
					</div>
				</aside><?php // end .alert-banner
			endif;

			// RESET TO HELP MODERN EVENTS CALENDAR
			date_default_timezone_set('UTC');
			// RESET TO HELP MODERN EVENTS CALENDAR

		endwhile; 

	} else {
		// no alerts found 
	}

	wp_reset_postdata();
?>